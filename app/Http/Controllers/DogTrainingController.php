<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceContent;
use App\Models\Point;
use App\Models\ImgInfoCard;
use App\Models\Testimonial;
use App\Models\ImageLocation;

class DogTrainingController extends Controller
{
    public function dogTrainingAdmin()
    {
        return view('Services_Admin.dog_training_admin');
    }
    public function inStoreDogTraining()
    {
        return view('Services_Admin.InStoreTraining_admin');
    }
    public function onlineDogTraining()
    {
        return view('Services_Admin.online_training_admin');
    }
    public function updateTopicDogTraining(Request $request)
    {
        $id=$request->training_id;
        $input['topic'] = $request->topic1;
        ServiceContent::whereId($id)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateInfoDogTraining(Request $request)
    {
        $id=$request->training_id;
        $input['information'] = $request->information1;
        ServiceContent::whereId($id)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateImgDogTraining(Request $request)
    {
            $id=$request->training_id;
            $input['image_path'] = $request->image_path;
            ServiceContent::whereId($id)->update($input);
            return back()->with('success','Row-1 Image Updated Successfully.');
    }
    public function updatePointInstoreTraining(Request $request)
    {
        $id= $request->pointId;
        $input['point'] = $request->point;
        Point::whereId($id)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateInfoCardInstoreTraining(Request $request)
    {
        $id= $request->cardId;
        $input['info'] = $request->info;
        Point::whereId($id)->update($input);
        return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateImgCardInstoreTraining(Request $request)
    {
        $id= $request->cardId;
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        ImgInfoCard::whereId($id)->update($input);
         return back()->with('success','Service Information Updated Successfully.');
    }
    public function updateTrainerImgDogTraining(Request $request)
    {
        $id= $request->testimionial_id;
        if($request->hasFile('photo'))
        {
            $input['photo'] = 'storage/'.time().'.'.$request->photo->extension();
            $saveimage = $request->photo->move(public_path('storage/'), $input['photo']);

        }
        Testimonial::whereId($id)->update($input);
         return back()->with('success','Trainer Photo Changed Successfully.');
    }
    public function update_infoTrainer_dog_training(Request $request)
    {
        $id= $request->testimionial_id;
        $input['custumer'] = $request->custumer;
        $input['review'] = $request->review;
        Testimonial::whereId($id)->update($input);
        return back()->with('success','Trainer Information Updated Successfully.');
    }
    public function updateImgIconInstoreTraining(Request $request)
    {
        $id= $request->cardId;
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        ImageLocation::whereId($id)->update($input);
         return back()->with('success','Image Changed Successfully.');
    }
}
