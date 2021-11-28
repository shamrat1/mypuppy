<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceContent;

class VeterinaryController extends Controller
{
    public function veterinaryServicesAdmin()
    {
        return view('Services_Admin.veterinary_services_admin');
    }
    public function updateInfo1VeterinaryService(Request $request)
    {
        $input['information'] = $request->information1;
        ServiceContent::whereId(42)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateImg1VeterinaryService(Request $request)
    {
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
        }
            ServiceContent::whereId(42)->update($input);
            return back()->with('success','Row-1 Image Updated Successfully.');
    }
    public function updateInfo2VeterinaryService(Request $request)
    {
        $input['information'] = $request->information2;
        ServiceContent::whereId(43)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateImg2VeterinaryService(Request $request)
    {
        if($request->hasFile('image_path1'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path1->extension();
            $saveimage = $request->image_path1->move(public_path('storage/'), $input['image_path']);
        }
            ServiceContent::whereId(43)->update($input);
            return back()->with('success','Row-1 Image Updated Successfully.');
    }
}
