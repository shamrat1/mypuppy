<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   public function myOffers() {
       	$offers = Offer::orderBy('id','DESC')->get();
        return view('Admin_Webpages.offers',compact('offers'));
    }
    public function saveOffers(Request $request) {
        $this->validate($request, [
    		'name' => 'required',
            'code' => 'required',
            'min_amt' => 'required',
            'discount' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input['name'] = $request->name;
        $input['code'] = $request->code;
        $input['min_amt'] = $request->min_amt;
        $input['discount'] = $request->discount;
        $input['status'] = $request->expiry;
        $input['description'] = $request->description;

         Offer::create($input);

         return back()->with('success','Offer Created Successfully.');
    }    
    public function editOffer($id)
    {
        $offer=Offer::findOrFail($id);
        return view('Admin_Webpages.offer_edit',compact('offer'));
    }
    public function OfferUpdate(Request $request,$id)
    {
        $this->validate($request, [
    		'name' => 'required',
            'code' => 'required',
            'min_amt' => 'required',
            'discount' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input['name'] = $request->name;
        $input['code'] = $request->code;
        $input['min_amt'] = $request->min_amt;
        $input['discount'] = $request->discount;
        $input['status'] = $request->status;
        $input['description'] = $request->description;

        $offers = Offer::whereId($id)->update($input);

         return back()->with('success','Offer Updated Successfully.'); 
    }
    public function OfferDelete($id)
    {
        Offer::find($id)->delete();
        //dd($id);
       $offers = Offer::orderBy('id','DESC')->get();
    	return view('Admin_Webpages.offers',compact('offers'));
    }
}
