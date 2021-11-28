<?php

namespace App\Http\Controllers;

use App\Models\AnimalBreed;
use App\Models\AnimalType;
use App\Models\AppointmentType;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\BookService;
use App\Models\City;
use App\Models\Colour;
use App\Models\PetDetail;
use App\Models\ServiceLocation;
use App\Models\ServiceTime;
use App\Models\Suburb;
use App\Models\User;
use App\Models\PartnerRole;
use Illuminate\Support\Facades\Auth;

class FullCalenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function bookService()
	{
		return view('Admin_Booking_Appointments.book_service');
	}
	public function updateBookService(Request $request)
	{
		$id=$request->service_id;
		$input['service_name'] = $request->service_name;
		$service = BookService::whereId($id)->update($input);
		return back()->with('success','Service Updated Successfully.');
	}
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('Admin_Booking_Appointments.full-calender');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
	public function cities()
	{
		return view('Admin_Booking_Appointments.city');
	}
	public function AddCity()
	{
		return view('Admin_Booking_Appointments.addCity');
	}
	public function saveCity(Request $request)
	{
		$this->validate($request, [
			'city' => 'required',
			'state_id'=>'required'
		]);
		$input['state_id'] = $request->state_id;
		$input['city'] = $request->city;
		City::create($input);
		return back()->with('success', 'City Created Successfully');
	}
	public function updateCity(Request $request)
	{
		
		$this->validate($request, [
			'city' => 'required',
			'state_id'=>'required'
		]);
		
		$id = $request->city_id;
		$input['state_id'] = $request->state_id;
		$input['city'] = $request->city;
		City::whereId($id)->update($input);
		return back()->with('success', 'City Updated Successfully');
		
	}
	public function suburbs()
	{
		return view('Admin_Booking_Appointments.suburbs');
	}
	public function AddSuburb()
	{
		return view('Admin_Booking_Appointments.addSuburb');
	}
	public function saveSuburb(Request $request)
	{
		$this->validate($request, [
			"suburb" => 'required',
			"state_id" => 'required',
			"city_id" => 'required',
		]);
		
		$input['suburb'] = $request->suburb;
		$input['state_id'] = $request->state_id;
		$input['city_id'] = $request->city_id;
		Suburb::create($input);
		
		return back()->with('success', 'Suburb Updated Successfully');
	}
	public function updateSuburb(Request $request)
	{
		$this->validate($request, [
			"suburb" => 'required',
			"state_id" => 'required',
			"city_id" => 'required',
		]);
		$id = $request->suburb_id;
		$input['suburb'] = $request->suburb;
		$input['state_id'] = $request->state_id;
		$input['city_id'] = $request->city_id;
		Suburb::whereId($id)->update($input);
		return back()->with('success', 'City Created Successfully');
	}
	public function serviceLocations()
	{
		return view('Admin_Booking_Appointments.serviceLocation');
	}
	
	public function AddServiceLocations()
	{
		return view('Admin_Booking_Appointments.addServiceLocation');
	}
	public function cityDropdown(Request $request)
    {
        $city = City::select('id as city_type_id','state_id','city')
                                            ->where('state_id',$request->state_id)
                                            ->get()->toArray();
        return response()->json(['data' => $city]);
    }
	public function locationDropdown(Request $request)
	{
		$location = ServiceLocation::select('id as location_type_id','state_id','store_name')
                                            ->where('state_id',$request->state_id)
                                            ->get()->toArray();
        return response()->json(['data' => $location]);
	}
	public function suburbDropdown(Request $request)
	{
		$suburb = Suburb::select('id as suburb_type_id','city_id','suburb')
							->where('city_id',$request->city_id)
							->get()->toArray();
        return response()->json(['data' => $suburb]);
	}
	public function storeDropdown(Request $request)
	{
		$store = ServiceLocation::select('id as store_type_id','service_id','store_name')
							->where('service_id',$request->service_id)
							->get()->toArray();
        return response()->json(['data' => $store]);
	}
	public function animalBreedDropdown(Request $request)
	{
		$animalBreed = AnimalBreed::select('id as animal_breed_id','animal_id','breed_name')
							->where('animal_id',$request->animal_type_id)
							->get()->toArray();
        return response()->json(['data' => $animalBreed]);
	}
	public function saveServiceLocation(Request $request)
	{
		$this->validate($request, [
			"store_name" => 'required',
			"user_id"=>'required',
			"phone" => 'required',
			"address" => 'required',
			"pincode" => 'required',
			"state_id" => 'required',
			"city_id" => 'required',
			"suburb_id"=>'required'
		]);
		$input['store_name'] = $request->store_name;
		$input['user_id']= $request->user_id;
		$input['phone'] = $request->phone;
		$input['address'] = $request->address;
		$input['state_id'] = $request->state_id;
		$input['city_id'] = $request->city_id;
		$input['suburb_id']=$request->suburb_id;
		$input['pincode'] = $request->pincode;
		ServiceLocation::create($input);
		return back()->with('success', 'Service Location Created Successfully');
	}
	public function updateServiceLocation(Request $request)
	{
		$this->validate($request, [
			"store_name" => 'required',
			"user_id"=>'required',
			"phone" => 'required',
			"address" => 'required',
			"pincode" => 'required',
			"state_id" => 'required',
			"city_id" => 'required',
			"suburb_id"=>'required'
		]);
		$id = $request->location_id;
		$input['store_name'] = $request->store_name;
		$input['user_id']= $request->user_id;
		$input['phone'] = $request->phone;
		$input['address'] = $request->address;
		$input['state_id'] = $request->state_id;
		$input['city_id'] = $request->city_id;
		$input['suburb_id']=$request->suburb_id;
		$input['pincode'] = $request->pincode;
		ServiceLocation::whereId($id)->update($input);
		return back()->with('success', 'Service Location Created Successfully');
	}
	public function servTimings($id)
	{
		$servTimings = ServiceTime::where('servLocation_id',$id)->orderBy('id','DESC')->get();
		$myStoreId = ServiceLocation::findOrFail($id);
		
		return view('Admin_Booking_Appointments.ServiceTimings',compact('servTimings','myStoreId'));
	}
	public function OurServTimings()
	{
		$id=Auth::user()->id;
		$partner=PartnerRole::where('user_id',$id)->first();
		return view('Admin_Booking_Appointments.MyServiceTImings',compact('partner'));
	}
	public function AddServTimings($id)
	{
		$myStore = ServiceLocation::findOrFail($id);
		return view('Admin_Booking_Appointments.addServiceTimings',compact('myStore'));
	}
	public function saveServTimings(Request $request)
	{
		$this->validate($request, [
			"timing" => 'required',
			"servLocation_id" => 'required',
			"day" => 'required'
		]);
		$input['timing'] = $request->timing;
		$input['servLocation_id'] = $request->servLocation_id;
		$input['day'] = $request->day;
		ServiceTime::create($input);
		return back()->with('success', 'Service Time Created Successfully');
	}
	public function updateServTimings(Request $request)
	{
		$this->validate($request, [
			"timing" => 'required',
			"servLocation_id" => 'required',
			"day" => 'required'
		]);
		$id = $request->timing_id;
		$input['timing'] = $request->timing;
		$input['servLocation_id'] = $request->servLocation_id;
		$input['day'] = $request->day;
		ServiceTime::whereId($id)->update($input);
		return back()->with('success', 'Service Time Updated Successfully');
	}
	public function animalTypes()
	{
		return view('Admin_Booking_Appointments.animalType');
	}
	public function AddAnimalType()
	{
		return view('Admin_Booking_Appointments.addAnimalType');
	}
	public function saveAnimalType(Request $request)
	{
		$this->validate($request, [
			"animal_name" => 'required',
		]);
		$input['animal_name'] = $request->animal_name;
		AnimalType::create($input);
		return back()->with('success', 'Animal Type Created Successfully');
	}
	public function updateAnimalType(Request $request)
	{
		$this->validate($request, [
			"animal_name" => 'required',
			"animal_id"=>'required'
		]);
		$id = $request->animal_id;
		$input['animal_name'] = $request->animal_name;
		AnimalType::whereId($id)->update($input);
		return back()->with('success', 'Animal Type Updated Successfully');
	}
	public function animalBreeds()
	{
		return view('Admin_Booking_Appointments.BreedAnimal');
	}
	public function AddAnimalBreed()
	{
		return view('Admin_Booking_Appointments.addBreedAnimal');
	}
	public function saveAnimalBreed(Request $request)
	{
		$this->validate($request, [
			"breed_name" => 'required',
			"animal_id" => 'required'
		]);
		$input['animal_id'] = $request->animal_id;
		$input['breed_name'] = $request->breed_name;
		AnimalBreed::create($input);
		return back()->with('success', 'Animal Breed Created Successfully');
	}
	public function updateAnimalBreed(Request $request)
	{
		$this->validate($request, [
			"breed_name" => 'required',
			"animal_id" => 'required'
		]);
		$id=$request->breed_id;
		$input['animal_id'] = $request->animal_id;
		$input['breed_name'] = $request->breed_name;
		AnimalBreed::whereId($id)->update($input);
		return back()->with('success', 'Animal Breed Created Successfully');
	}
	public function animalColours()
	{
		return view('Admin_Booking_Appointments.colourAnimal');
	}
	public function AddAnimalColour()
	{
		return view('Admin_Booking_Appointments.addColourAnimal');
	}
	public function saveAnimalColour(Request $request)
	{
		$this->validate($request, [
			"colour" => 'required',
		]);
		$input['colour'] = $request->colour;
		Colour::create($input);
		return back()->with('success', 'Animal Colour Created Successfully');
	}
	public function updateAnimalColour(Request $request)
	{
		$this->validate($request, [
			"colour" => 'required',
			"colour_id" => 'required'
		]);
		$id= $request->colour_id;
		$input['colour'] = $request->colour;
		Colour::whereId($id)->update($input);
		return back()->with('success', 'Animal Colour Updated Successfully');
	}
	public function petDetails()
	{
		return view('Admin_Booking_Appointments.petDetails');
	}
	public function AddPetDetail()
	{
		return view('Admin_Booking_Appointments.addPetDetails');
	}
	public function savePetDetails(Request $request)
	{
		$this->validate($request, [
			"pet_name" => 'required',
			"gender" => 'required',
			"animal_type_id" => 'required',
			"animal_breed_id" => 'required',
			"colour_id" => 'required',
			"size" => 'required',
			"servLocation_id" => 'required',
			"age" => 'required',
			"about_animal" => 'required',
		]);
		//dd($request->all());
		$input['pet_name'] = $request->pet_name;
		$input['gender'] = $request->gender;
		$input['animal_type_id'] = $request->animal_type_id;
		$input['animal_breed_id'] = $request->animal_breed_id;
		$input['colour_id'] = $request->colour_id;
		$input['size'] = $request->size;
		$input['servLocation_id'] = $request->servLocation_id;
		$input['age'] = $request->age;
		$input['about_animal'] = $request->about_animal;
		if($request->hasFile('image_path'))
        {
            $input['image_path'] = time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
		PetDetail::create($input);
		return back()->with('success', 'Pet Details Created Successfully');
	}
	public function updatePetDetails(Request $request)
	{
		$this->validate($request, [
			"pet_name" => 'required',
			"gender" => 'required',
			"animal_type_id" => 'required',
			"animal_breed_id" => 'required',
			"colour_id" => 'required',
			"size" => 'required',
			"servLocation_id" => 'required',
			"age" => 'required',
			"about_animal" => 'required',
		]);
		$id=$request->pet_id;
		$input['pet_name'] = $request->pet_name;
		$input['gender'] = $request->gender;
		$input['animal_type_id'] = $request->animal_type_id;
		$input['animal_breed_id'] = $request->animal_breed_id;
		$input['colour_id'] = $request->colour_id;
		$input['size'] = $request->size;
		$input['servLocation_id'] = $request->servLocation_id;
		$input['age'] = $request->age;
		$input['about_animal'] = $request->about_animal;
		PetDetail::whereId($id)->update($input);
		return back()->with('success', 'Pet Details Updated Successfully');
	}
	public function petImageGallery($id)
	{
		  $data = PetDetail::findOrFail($id);
		  return view('Admin_Booking_Appointments.petImageGallery', compact('data'));
		
	}
	public function petGallery_Update(Request $request,$id) {
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
            $data = PetDetail::whereId($id)->update($input);
            return back()->with('success','Image Updated Successfully.');

        }

          if($request->hasFile('image_path1'))
        {
            $input['image_path1'] = time().'.'.$request->image_path1->extension();
            $saveimage01 = $request->image_path1->move(public_path('storage/'), $input['image_path1']);
            $data = PetDetail::whereId($id)->update($input);
            return back()->with('success','Gallery Image-1 Updated Successfully.');

        }
          if($request->hasFile('image_path2'))
        {
            $input['image_path2'] = time().'.'.$request->image_path2->extension();
            $saveimage02 = $request->image_path2->move(public_path('storage/'), $input['image_path2']);
            $data = PetDetail::whereId($id)->update($input);
            return back()->with('success','Gallery Image-2 Updated Successfully.');
        }
          if($request->hasFile('image_path3'))
        {
            $input['image_path3'] = time().'.'.$request->image_path3->extension();
            $saveimage03 = $request->image_path3->move(public_path('storage/'), $input['image_path3']);
            $data = PetDetail::whereId($id)->update($input);
            return back()->with('success','Gallery Image-3 Updated Successfully.');
        }
    }
	public function appointmentTypes()
	{
		return view('Admin_Booking_Appointments.appointmentTypes');
	}
	public function AddAppointmentTypes()
	{
		return view('Admin_Booking_Appointments.addAppointmentType');
	}
	public function saveAppointmentTypes(Request $request)
	{
		$this->validate($request, [
			"service_id" => 'required',
			"appointment_for" => 'required',
			"animal" => 'required',
		]);
		$input['service_id'] = $request->service_id;
		$input['appointment_for'] = $request->appointment_for;
		$input['animal'] = $request->animal;
		AppointmentType::create($input);
		return back()->with('success', 'Appointment Types Created Successfully');
	}
	public function updateAppointmentTypes(Request $request)
	{
		$this->validate($request, [
			"service_id" => 'required',
			"appointment_for" => 'required',
			"animal" => 'required',
		]);
		$id=$request->appointment_type_id;
		$input['service_id'] = $request->service_id;
		$input['appointment_for'] = $request->appointment_for;
		$input['animal'] = $request->animal;
		AppointmentType::whereId($id)->update($input);
		return back()->with('success', 'Appointment Types Updated Successfully');
	}
	
	public function allAppointments()
	{
		return view('Admin_Booking_Appointments.bookingDashboard');
	}
	public function editAvailableTime($id)
	{
	    $data=ServiceTime::findOrfail($id);
		//return $data;
		//$myStore = ServiceLocation::findOrFail($data->id)();
	    return view('Admin_Booking_Appointments.editAvailableTime',compact('data','id'));
	}
	public function updateAvailableTime(Request $request,$id)
	{
	    $this->validate($request, [
	    "available_time" => 'required',
		]);
		$input['available_time'] = $request->available_time;
		ServiceTime::whereId($id)->update($input);
		return back()->with('success', 'Service Time Updated Successfully');
	}
	public function servicePartnerRole($id)
	{
		$user = User::findOrFail($id);
		return view('Admin_Booking_Appointments.servicePartnerRole',compact('user'));
	}
	public function roleStore(Request $request,$id)
	{
		$this->validate($request, [
			"service_id" => 'required',
		]);


              $liked = PartnerRole::create([
                  'user_id' => $id,
                  'service_id'=>$request->service_id,
                  'status' => 1                
              ]);
			return back()->with('success', 'Service Role Save Successfully');
	}
	public function OurServiceLocations()
	{
		$id=Auth::user()->id;
		$partner=PartnerRole::where('user_id',$id)->first();
		return view('Admin_Booking_Appointments.myServiceLocation',compact('partner'));
	}
	public function SpecificAppointments($id)
	{
		return view('Admin_Booking_Appointments.ServiceBooking');
	}
}
