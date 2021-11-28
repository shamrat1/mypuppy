<?php

namespace App\Http\Controllers;

use App\Models\AppointmentEvent;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use App\Models\Profile;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PartnerRole;
use App\Models\ServiceTime;
use PHPUnit\Util\Json;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {


        $orders = Order::orderBy('id','DESC')->get();

        return view('Admin_Orders.admin_dashboard',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSingleOrder(Request $request,$id)
    {

        $orderitems = OrderItems::where('order_id',$id)->get();

        $order = Order::find($id);

        return view('Admin_Orders.show_orders', compact('orderitems','order'));
    }


    public function myOrders(Request $request)
    {
        // $orders = Order::leftJoin('order_items','order_items.order_id','orders.id')
        //         ->where('orders.user_id',Auth::user()->id)
        //         ->orderBy('orders.id','DESC')
        //         ->get();
        $orders = Order::where('user_id',Auth::user()->id)
                    ->orderBy('id','DESC')
                    ->get();
        return view('Webpages.my_orders', compact('orders'));
    }

    public function genInvoice(Request $request,$id)
    {
        $orderitems = OrderItems::where('order_id',$id)

                                    ->get();

        $order = Order::find($id);
        return view('Webpages.invoice', compact('orderitems','order'));
    }

    public function editOrdStatus(Request $request, $id)
    {
        $order = Order::find($id);

        return view('Admin_Orders.orderStatusEdit', compact('order'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $request->validate([
            'delivery_status' => 'required',
        ]);
        $order->update([
            'delivery_status' => $request->delivery_status,

        ]);
        return redirect()->back()->with(['success' => 'Order Status Updated Successfully']);
    }
    public function allCustomers()
    {

        $users =User::leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
                ->where('users.user_role','customer')
                ->get();

        return view('customer_admin.customers',compact('users'));
    }
    public function editCustomer(Request $request,$id)
    {
        $customer = User::findOrFail($id);
        $profile = Profile::findOrFail($customer->id);
      return view('customer_admin.customer_edit',compact('customer','profile'));
    }
    public function updateCustomer(Request $request,$id)
    {
        $input['state'] = $request->countrySelect;
        $input['city'] = $request->citySelect;
        $input['phone'] = $request->phone;
        $input['address'] = $request->address;
        $input['addrOpt'] = $request->addrOpt;
        $input['zip'] = $request->zip;
        $profile = Profile::whereId($id)->update($input);
        return back()->with('success','Profile Updated Successfully.');
    }
    public function ServicePartnersUsers()
    {
        $users =User::leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
                ->where('users.user_role','booking')
                ->get();

        return view('customer_admin.servicePartnerInfo',compact('users'));
    }
    public function setServicePartner($id)
    {
        $input['user_role'] = "booking";
        $user = User::whereId($id)->update($input);
        return back()->with('success','Profile Updated Successfully.');
    }
    public function setRoleCustomer($id)
    {
        $input['user_role'] = "customer";
        $user = User::whereId($id)->update($input);
        return back()->with('success','Profile Updated Successfully.');
    }
    public function serviceList($id)
    {
        $user= User::findOrFail($id);
        return view('customer_admin.ServiceList',compact('user'));
    }
    public function updateStoreRole(Request $request)
    {
        $this->validate($request, [
            "role_id" => 'required',
            "user_id" => 'required',
            "service_id" => 'required',
		]);
        $id=$request->role_id;
        $input['user_id'] = $request->user_id;
        $input['service_id'] = $request->service_id;
        $input['status'] = $request->status;
        PartnerRole::whereId($id)->update($input);
        return back()->with('success','Partner Role Updated Successfully.');
    }
    public function addCalendarEventAjax(Request $request)
    {
    //    dd($request->all()) ;
        if ($request->action == 'add') {
            try {
                $event = AppointmentEvent::firstOrNew(['user_id' =>  Auth::user()->id,'event_date' => $request->event_date]);
                $event->user_id = Auth::user()->id;
                $event->event_title = $request->title;
                $event->event_date = $request->date;
                $event->save();
                return response()->json(["status" => "success","message" => "Event Added Successfully"]);
            } catch (\Throwable $th) {
                return response()->json(["status" => "error","message" => $th->getMessage(),"line No" => $th->getLine()]);
                //throw $th;
            }
        }
        if ($request->action == 'delete') {
            // dd($request->all());
            try {
                $event = AppointmentEvent::where('event_date',$request->date)->where('user_id',Auth::user()->id)->first();
                $event->delete();
                return response()->json(["status" => "success","message" => "Event Deleted Successfully"]);
            } catch (\Throwable $th) {
                return response()->json(["status" => "error","message" => $th->getMessage(),"line No" => $th->getLine()]);
            }
        }


    }
    public function getScheduleData(Request $request)
    {
        // dd($request->all());
        $dateStr =  date("l", strtotime($request->date));
        $dateStr = "Monday"; // for testing purpose i set it today is monday
        if($dateStr == 'Sunday') {
            return response()->json(['status' => 'error','message' => "Today is sunday no data available",'data' =>[] ]);
        } else {
            try {
                $availableTimingStr =  ServiceTime::select('available_time')->where('servLocation_id',$request->store_id)
                                        ->where('day',$dateStr)->first();
                if($availableTimingStr) {
                    $availableTimingStr = $availableTimingStr->available_time;
                } else {
                    return response()->json(['status' => 'error','message' => "No data found",'data' =>[] ]);
                }
                // dd($availableTimingStr);
                $availableTimingArr = explode (",", $availableTimingStr);
                return response()->json(['status' => 'success','data' => $availableTimingArr]);
            } catch (\Throwable $th) {
                return response()->json(['status' => 'error','message' => $th->getMessage(),'data' =>[] ]);
            }
        }
    }
}
