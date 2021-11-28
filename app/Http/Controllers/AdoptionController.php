<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceContent;

class AdoptionController extends Controller
{
    public function adoptionServiceAdmin()
    {
    return view('Services_Admin.adoptions_admin');
    }
    public function updateInfo1Adoptions(Request $request)
    {
        $input['information'] = $request->information1;
        ServiceContent::whereId(44)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateImg1Adoptions(Request $request)
    {
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
        }
            ServiceContent::whereId(44)->update($input);
            return back()->with('success','Row-1 Image Updated Successfully.');
    }
}
