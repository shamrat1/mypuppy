<?php

namespace App\Http\Controllers;

use App\Models\PetGuide;
use Illuminate\Http\Request;

class PetGuideController extends Controller
{
    public function newPetGuidesAdmin()
    {
        return view('PetGuide_Admin.new-pet-guides-admin');
    }
    public function updatePetGuideDetails(Request $request)
    {
        
       if($request->hasFile('image_path'))
       {
           $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
           $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
       }
       $id=$request->petGuide_id;
       $input['petGuide_name'] = $request->petGuide_name;
       $petGuide = PetGuide::whereId($id)->update($input);
       return back()->with('success','Pet Guide Info Updated Successfully.');
    }

    public function newDogGuidesAdmin()
    {
        return view('PetGuide_Admin.new-dog-guide-admin');
    }
    public function newCatGuidesAdmin()
    {
        return view('PetGuide_Admin.new-cat-guide-admin');
    }
    public function newReptileGuidesAdmin()
    {
        return view('PetGuide_Admin.new-reptile-guide-admin');
    }
    public function newBirdGuidesAdmin()
    {
        return view('PetGuide_Admin.new-bird-guide-admin');
    }
    public function newFishGuidesAdmin()
    {
        return view('PetGuide_Admin.saltwater-fish-guide-admin');
    }
    public function newRabitGuidesAdmin()
    {
        return view('PetGuide_Admin.new-rabit-guide-admin'); 
    }
}
