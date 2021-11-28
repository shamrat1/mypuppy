<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceContent;
class ServiceController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
public function services()
{
return view('Services_Admin.services_admin');
}
public function updateServiceDetails(Request $request)
{
if($request->hasFile('image_path'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
$saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
}
$id=$request->service_id;
$input['service_name'] = $request->service_name;
$service = Service::whereId($id)->update($input);
return back()->with('success','Service Updated Successfully.');
}
public function repairServiceAdmin()
{
return view('Services_Admin.repair_service_admin');
}
public function updateHeadingrepairService(Request $request)
{
$input['topic'] = $request->topic;
//dd($input['topic']);
ServiceContent::whereId(1)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo1RepairService(Request $request)
{
$input['information'] = $request->information1;
ServiceContent::whereId(1)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg1RepairService(Request $request)
{
if($request->hasFile('image_path'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
$saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
}
ServiceContent::whereId(1)->update($input);
return back()->with('success','Row-1 Image Updated Successfully.');
}
public function updateInfo2RepairService(Request $request)
{
$input['information'] = $request->information2;
ServiceContent::whereId(2)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg2RepairService(Request $request)
{
if($request->hasFile('image_path1'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path1->extension();
$saveimage = $request->image_path1->move(public_path('storage/'), $input['image_path']);
}
ServiceContent::whereId(2)->update($input);
return back()->with('success','Row-2 Image Updated Successfully.');
}
public function vitalCareAdmin()
{
return view('Services_Admin.vital_care_admin');
}
public function updateHeading1vitalCare(Request $request)
{
$input['topic'] = $request->topic1;
//dd($input['topic']);
ServiceContent::whereId(3)->update($input);
return back()->with('success','Service Content Updated Successfully.');
}
public function updateInfo1VitalCare(Request $request)
{
$input['information'] = $request->information1;
//dd($input['information']);
ServiceContent::whereId(3)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg1VitalCare(Request $request)
{
if($request->hasFile('image_path'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
$saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(3)->update($input);
return back()->with('success','Tab-1 Image Updated Successfully.');
}
public function updateHeading2vitalCare(Request $request)
{
$input['topic'] = $request->topic2;
//dd($input['topic']);
ServiceContent::whereId(4)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo2VitalCare(Request $request)
{
$input['information'] = $request->information2;
//dd($input['information']);
ServiceContent::whereId(4)->update($input);
return back()->with('success','Service Content Updated Successfully.');
}
public function updateImg2VitalCare(Request $request)
{
if($request->hasFile('image_path1'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path1->extension();
$saveimage = $request->image_path1->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(4)->update($input);
return back()->with('success','Tab-2 Image Updated Successfully.');
}
public function updateHeading3vitalCare(Request $request)
{
$input['topic'] = $request->topic3;
//dd($input['topic']);
ServiceContent::whereId(5)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo3VitalCare(Request $request)
{
$input['information'] = $request->information3;
//dd($input['information']);
ServiceContent::whereId(5)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg3VitalCare(Request $request)
{
if($request->hasFile('image_path2'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path2->extension();
$saveimage = $request->image_path2->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(5)->update($input);
return back()->with('success','Tab-3 Image Updated Successfully.');
}
public function updateHeading4vitalCare(Request $request)
{
$input['topic'] = $request->topic4;
//dd($input['topic']);
ServiceContent::whereId(6)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo4VitalCare(Request $request)
{
$input['information'] = $request->information4;
//dd($input['information']);
ServiceContent::whereId(6)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg4VitalCare(Request $request)
{
if($request->hasFile('image_path3'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path3->extension();
$saveimage = $request->image_path3->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(6)->update($input);
return back()->with('success','Tab-3 Image Updated Successfully.');
}
public function dogGroomingAdmin()
{
return view('Services_Admin.dogGrooming_admin');
}
public function updateHeading1DogGrooming(Request $request)
{
$input['topic']=$request->topic1;
// dd($input['topic']);
ServiceContent::whereId(7)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo1DogGrooming(Request $request)
{
$input['information'] = $request->information1;
ServiceContent::whereId(7)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg1DogGrooming(Request $request)
{
if($request->hasFile('image_path'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
$saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
}
ServiceContent::whereId(7)->update($input);
return back()->with('success','Tab-1 Image Updated Successfully.'); 
}
public function updateHeading2DogGrooming(Request $request)
{
$input['topic'] = $request->topic2;
//dd($input['topic']);
ServiceContent::whereId(8)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo2DogGrooming(Request $request)
{
$input['information'] = $request->information2;
ServiceContent::whereId(8)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg2DogGrooming(Request $request)
{
if($request->hasFile('image_path1'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path1->extension();
$saveimage = $request->image_path1->move(public_path('storage/'), $input['image_path']);
}
ServiceContent::whereId(8)->update($input);
return back()->with('success','Tab-2 Image Updated Successfully.');
}
public function updateHeading3DogGrooming(Request $request)
{
$input['topic'] = $request->topic3;
//dd($input['topic']);
ServiceContent::whereId(9)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo3DogGrooming(Request $request)
{
$input['information'] = $request->information3;
//dd($input['information']);
ServiceContent::whereId(9)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg3DogGrooming(Request $request)
{
if($request->hasFile('image_path2'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path2->extension();
$saveimage = $request->image_path2->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(9)->update($input);
return back()->with('success','Tab-3 Image Updated Successfully.');
}
public function updateHeading4DogGrooming(Request $request)
{
$input['topic'] = $request->topic4;
//dd($input['topic']);
ServiceContent::whereId(10)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo4DogGrooming(Request $request)
{
$input['information'] = $request->information4;
//dd($input['information']);
ServiceContent::whereId(10)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg4DogGrooming(Request $request)
{
if($request->hasFile('image_path3'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path3->extension();
$saveimage = $request->image_path3->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(10)->update($input);
return back()->with('success','Tab-3 Image Updated Successfully.');
}
public function updateHeading5DogGrooming(Request $request)
{
$input['topic'] = $request->topic5;
//dd($input['topic']);
ServiceContent::whereId(11)->update($input);
return back()->with('success','Service Topic Updated Successfully.'); 
}
public function updateInfo5DogGrooming(Request $request)
{
$input['information'] = $request->information5;
//dd($input['information']);
ServiceContent::whereId(11)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg5DogGrooming(Request $request)
{
if($request->hasFile('image_path4'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path4->extension();
$saveimage = $request->image_path4->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(11)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateHeading6DogGrooming(Request $request)
{
$input['topic'] = $request->topic6;
//dd($input['topic']);
ServiceContent::whereId(12)->update($input);
return back()->with('success','Service Topic Updated Successfully.'); 
}
public function updateInfo6DogGrooming(Request $request)
{
$input['information'] = $request->information6;
//dd($input['information']);
ServiceContent::whereId(12)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg6DogGrooming(Request $request)
{
if($request->hasFile('image_path5'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path5->extension();
$saveimage = $request->image_path5->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(12)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateHeading7DogGrooming(Request $request)
{
$input['topic'] = $request->topic7;
//dd($input['topic']);
ServiceContent::whereId(13)->update($input);
return back()->with('success','Service Topic Updated Successfully.'); 
}
public function updateInfo7aDogGrooming(Request $request)
{
$input['information'] = $request->information7a;
//dd($input['information']);
ServiceContent::whereId(13)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7aDogGrooming(Request $request)
{
if($request->hasFile('image_path6a'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6a->extension();
$saveimage = $request->image_path6a->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(13)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo7bDogGrooming(Request $request)
{
$input['information'] = $request->information7b;
//dd($input['information']);
ServiceContent::whereId(14)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7bDogGrooming(Request $request)
{
if($request->hasFile('image_path6b'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6b->extension();
$saveimage = $request->image_path6b->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(14)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo7cDogGrooming(Request $request)
{
$input['information'] = $request->information7c;
//dd($input['information']);
ServiceContent::whereId(15)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7cDogGrooming(Request $request)
{
if($request->hasFile('image_path6c'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6c->extension();
$saveimage = $request->image_path6c->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(15)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo7dDogGrooming(Request $request)
{
$input['information'] = $request->information7d;
//dd($input['information']);
ServiceContent::whereId(16)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7dDogGrooming(Request $request)
{
if($request->hasFile('image_path6d'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6d->extension();
$saveimage = $request->image_path6d->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(16)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo7eDogGrooming(Request $request)
{
$input['information'] = $request->information7e;
//dd($input['information']);
ServiceContent::whereId(17)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7eDogGrooming(Request $request)
{
if($request->hasFile('image_path6e'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6e->extension();
$saveimage = $request->image_path6e->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(17)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo7fDogGrooming(Request $request)
{
$input['information'] = $request->information7f;
//dd($input['information']);
ServiceContent::whereId(18)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg7fDogGrooming(Request $request)
{
if($request->hasFile('image_path6f'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path6f->extension();
$saveimage = $request->image_path6f->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(18)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateHeading8DogGrooming(Request $request)
{
$input['topic'] = $request->topic8;
//dd($input['topic']);
ServiceContent::whereId(19)->update($input);
return back()->with('success','Service Topic Updated Successfully.');
}
public function updateInfo8aDogGrooming(Request $request)
{
$input['information'] = $request->information8a;
//dd($input['information']);
ServiceContent::whereId(19)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8bDogGrooming(Request $request)
{
$input['information'] = $request->information8b;
//dd($input['information']);
ServiceContent::whereId(20)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8cDogGrooming(Request $request)
{
$input['information'] = $request->information8c;
//dd($input['information']);
ServiceContent::whereId(21)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8dDogGrooming(Request $request)
{
$input['information'] = $request->information8d;
//dd($input['information']);
ServiceContent::whereId(22)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8eDogGrooming(Request $request)
{
$input['information'] = $request->information8e;
//dd($input['information']);
ServiceContent::whereId(23)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8fDogGrooming(Request $request)
{
$input['information'] = $request->information8f;
//dd($input['information']);
ServiceContent::whereId(24)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8gDogGrooming(Request $request)
{
$input['information'] = $request->information8g;
//dd($input['information']);
ServiceContent::whereId(25)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo8hDogGrooming(Request $request)
{
$input['information'] = $request->information8h;
//dd($input['information']);
ServiceContent::whereId(26)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateSection1dogGrooming(Request $request)
{
$input['information'] = $request->section1;
//dd($input['information']);
ServiceContent::whereId(27)->update($input);
return back()->with('success','Service Section-1 Updated Successfully.');
}
public function updateSection2dogGrooming(Request $request)
{
$input['information'] = $request->section2;
//dd($input['information']);
ServiceContent::whereId(28)->update($input);
return back()->with('success','Service Section-2 Updated Successfully.');
}
public function updateInfo9DogGrooming(Request $request)
{
$input['information'] = $request->information9;
//dd($input['information']);
ServiceContent::whereId(29)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg9DogGrooming(Request $request)
{
if($request->hasFile('image_path9'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path9->extension();
$saveimage = $request->image_path9->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(29)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo10DogGrooming(Request $request)
{
$input['information'] = $request->information10;
//dd($input['information']);
ServiceContent::whereId(30)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg10DogGrooming(Request $request)
{
if($request->hasFile('image_path10'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path10->extension();
$saveimage = $request->image_path10->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(30)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateSection3dogGrooming(Request $request)
{
$input['information'] = $request->section3;
//dd($input['information']);
ServiceContent::whereId(31)->update($input);
return back()->with('success','Service Section-3 Updated Successfully.');
}
public function updateImg11DogGrooming(Request $request)
{
if($request->hasFile('image_path11'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path11->extension();
$saveimage = $request->image_path11->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(31)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo11DogGrooming(Request $request)
{
$input['information'] = $request->information11;
//dd($input['information']);
ServiceContent::whereId(32)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo12DogGrooming(Request $request)
{
$input['information'] = $request->information12;
//dd($input['information']);
ServiceContent::whereId(33)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo13DogGrooming(Request $request)
{
$input['information'] = $request->information13;
//dd($input['information']);
ServiceContent::whereId(34)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo14DogGrooming(Request $request)
{
$input['information'] = $request->information14;
//dd($input['information']);
ServiceContent::whereId(35)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo15DogGrooming(Request $request)
{
$input['information'] = $request->information15;
//dd($input['information']);
ServiceContent::whereId(36)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo16DogGrooming(Request $request)
{
$input['information'] = $request->information16;
//dd($input['information']);
ServiceContent::whereId(37)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateInfo17DogGrooming(Request $request)
{
$input['information'] = $request->information17;
//dd($input['information']);
ServiceContent::whereId(38)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateSection4dogGrooming(Request $request)
{
$input['topic'] = $request->section4;
//dd($input['information']);
ServiceContent::whereId(39)->update($input);
return back()->with('success','Service Section-4 Updated Successfully.');
}
public function updateInfo18DogGrooming(Request $request)
{
$input['information'] = $request->information18;
//dd($input['information']);
ServiceContent::whereId(39)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg12DogGrooming(Request $request)
{
if($request->hasFile('image_path12'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path12->extension();
$saveimage = $request->image_path12->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(39)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo19DogGrooming(Request $request)
{
$input['information'] = $request->information19;
//dd($input['information']);
ServiceContent::whereId(40)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg13DogGrooming(Request $request)
{
if($request->hasFile('image_path13'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path13->extension();
$saveimage = $request->image_path13->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(40)->update($input);
return back()->with('success','Image Updated Successfully.');
}
public function updateInfo20DogGrooming(Request $request)
{
$input['information'] = $request->information20;
//dd($input['information']);
ServiceContent::whereId(41)->update($input);
return back()->with('success','Service Information Updated Successfully.');
}
public function updateImg14DogGrooming(Request $request)
{
if($request->hasFile('image_path14'))
{
$input['image_path'] = 'storage/'.time().'.'.$request->image_path14->extension();
$saveimage = $request->image_path14->move(public_path('storage/'), $input['image_path']);
}
//dd($input['image_path']);
ServiceContent::whereId(41)->update($input);
return back()->with('success','Image Updated Successfully.');
}



public function diyDogWashAdmin()
{
    return view('Services_Admin.diy_dog_wash_admin');
}
}