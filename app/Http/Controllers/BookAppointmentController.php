<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\ServiceLocation;
use App\Models\ServiceTime;

class BookAppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BookAppointment()
    {
        return view('Booking_Appointments.calender_booking');
    }
    public function petAdaption()
    {
        return view('Booking_Appointments.PetAdoption');
    }
    public function petAdoptionSearch(Request $request)
    {
        $result[0] = $request->animal_type_id;
        $result[1] = $request->state_id;
        $result[2] = $request->state_id;
        return response()->json(['data' => $result]);
    }
    public function ServiceAppointment(Request $request)
    {
        $service=$request->service_name;

        return view('Booking_Appointments.SearchLocation',compact('service'));
    }
    public function SearchServiceList(Request $request)
    {
        // dd($request->all());
        try {
            $collection = ServiceLocation::where('service_locations.state_id',$request->state_id)
            ->where('service_locations.city_id',$request->city_id)
            ->where('service_locations.suburb_id',$request->suburb_id)
            ->select('service_locations.*','states.state','cities.city','suburbs.suburb')
            ->leftJoin('states','states.id','service_locations.state_id')
            ->leftJoin('cities','cities.id','service_locations.city_id')
            ->leftJoin('suburbs','suburbs.id','service_locations.suburb_id')
            ->get();
            $result_count = $collection->count();
            $collection = $collection->toArray();
            // dd($result_count,$collection);
            if ($result_count > 0 ) {
                return response()->json(['status' => 'success','is_data_available' => 1,'data' => $collection,'result_count' => $result_count]);
            } else {
                return response()->json(['status' => 'success','is_data_available' => 0,'data' => $collection]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error','message' => 'Something went wrong','error' => $th->getMessage(),'line no' => $th->getLine()]);
        }
    }
    public function getAvailableTimingByDate(Request $request)
    {
        dd($request->all());
        $dateStr =  date("l", strtotime($request->date));
        $dateStr = "Monday";
        // if(!$dateStr == 'Sunday') {
        //     $availableTimingArr =
        // }
    }
}
