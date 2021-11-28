<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\ContactInfo;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\WhyChooseUsPoint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin_Webpages.Home');
    }
    
      public function checkout(Request $request){
        //dd($request->all());
        return view("Payment.checkout");
    }
    public function company(Request $request)
    {
        $companyinfo=CompanyInfo::where('id', 1)->get();
   
        return view("Admin_Webpages.company",compact('companyinfo'));
    }
    public function sliders()
    {
        return view("Admin_Webpages.slider-images");
    }
    public function updateSlides(Request $request)
    {
        $this->validate($request, [
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $id = $request->thumb_id;
        
      

        $input['image_path'] = 'storage/'.time().'.'.$request->image_path->getClientOriginalExtension();
        $request->image_path->move(public_path('storage/'), $input['image_path']);
       
        Slider::whereId($id)->update($input);

        return back()->with('success','Image Updated Successfully');

        $input['caption'] = $request->caption;
        
    }
    public function contactDetails()
    {
        return view('Admin_Webpages.contact-details');
    }
 

    public function categories()
    {
        

        return view('Admin_Filters.categories');
    }
  
    public function addCategory()
    {
        return view('Admin_Filters.category_create');
    }
   
    public function saveCategory(Request $request)
    {
        $this->validate($request, [
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'category_name' => 'required',
        ]);
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('storage/'), $input['image_path']);
            $input['category_name'] = $request->category_name;
            $str = strtolower($request->category_name);
            $input['slug'] = preg_replace('/\s+/', '-', $str);
            Category::create($input);
            return back()->with('success', 'Category Created Successfully');
    }
    
    public function categoryDelete($id ) {

        Category::find($id)->delete();
        //dd($id);
    	return view('Admin_Filters.categories');

    }
    public function updateCategories(Request $request)
    {
        if ($request->hasFile('image_path')) {
            $this->validate($request, [
                   
                    'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                    
                ]);

            $id = $request->cat_id;
     
        

            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('storage/'), $input['image_path']);
            
            $input['category_name'] = $request->category_name;
            $str = strtolower($request->category_name);
            $input['slug'] = preg_replace('/\s+/', '-', $str);
            Category::whereId($id)->update($input);

            return back()->with('success', 'Image Updated Successfully');
        }
        }

        
        public function updateCaption(Request $request)
        {
           
                $id = $request->caption_id;
                $input['caption'] = $request->caption;
                Slider::whereId($id)->update($input);
                return back()->with('success', 'Slide Caption Updated Successfully');
           
        }
    

            
    public function updateCompanyInfo(Request $request)
    {
        
        if($request->hasFile('company_logo'))
        {
            $id = $request->comp_id;
            $input['company_logo'] = 'storage/'.time().'.'.$request->company_logo->extension();
            $saveimage = $request->company_logo->move(public_path('storage/'), $input['company_logo']);
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Company Logo Updated Successfully');
        }
        if($request->who_we_are)
        {
            $id = $request->who_id;
            $input['who_we_are'] = $request->who_we_are;
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Who We are Content Updated Successfully');
        }
        if($request->why_choose_us)
        {
            $id = $request->whychooseus_id;
            $input['why_choose_us'] = $request->why_choose_us;
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Who Choose Us Content Updated Successfully');
        }
        if($request->strategy)
        {
            $id = $request->strategy_id;
            $input['strategy'] = $request->strategy;
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Our Strategy Content Updated Successfully');
        }
        if($request->culture_values)
        {
            $id = $request->cul_id;
            $input['culture_values'] = $request->culture_values;
            //dd($request->culture_values);
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Culture and Values Content Updated Successfully');
        }
        if($request->hasFile('company_photo'))
        {
            $id = $request->photo_id;
            $input['company_photo'] = 'storage/'.time().'.'.$request->company_photo->extension();
            $saveimage = $request->company_photo->move(public_path('storage/'), $input['company_photo']);
            CompanyInfo::whereId($id)->update($input);
            return back()->with('success','Company Photo Updated Successfully');
        }
    }
    public function updateSixPoints(Request $request)
    {
        $id = $request->point_id;
        $input['point1'] = $request->point1;
        $input['point2'] = $request->point2;
        $input['point3'] = $request->point3;
        $input['point4'] = $request->point4;
        $input['point5'] = $request->point5;
        $input['point6'] = $request->point6;
        WhyChooseUsPoint::whereId($id)->update($input);
        return back()->with('success','Why Choose Us? 6 points Content Updated Successfully');
    }
    public function updateTestimonial(Request $request)
    {
        if($request->hasFile('photo1'))
        {
            $id=$request->testimonial_id1;
            $input['photo'] = 'storage/'.time().'.'.$request->photo1->extension();
            $saveimage = $request->photo1->move(public_path('storage/'), $input['photo']);
            $input['custumer'] = $request->custumer1;
            $input['review'] = $request->review1;
            Testimonial::whereId($id)->update($input);
            return back()->with('success','Testimonial content1 Updated Successfully');
        }
        if($request->hasFile('photo2'))
        {
            $id=$request->testimonial_id2;
            $input['photo'] = 'storage/'.time().'.'.$request->photo2->extension();
            $saveimage = $request->photo2->move(public_path('storage/'), $input['photo']);
            $input['custumer'] = $request->custumer2;
            $input['review'] = $request->review2;
            Testimonial::whereId($id)->update($input);
            return back()->with('success','Testimonial content2 Updated Successfully');
        }
    }

    public function updContactDetails(Request $request)
    {
        if($request->phone)
        {
            $id = $request->phone_id;
            $input['phone'] = $request->phone;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Mobile Number Updated Successfully');
        }
        if($request->email)
        {
            $id = $request->email_id;
            $input['email'] = $request->email;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','E-Mail ID Updated Successfully');
        }
        if($request->address)
        {
            $id = $request->address_id;
            $input['address'] = $request->address;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Office Address Updated Successfully');
        }
        if($request->fb_link)
        {
            $id = $request->fb_id;
            $input['fb_link'] = $request->fb_link;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Facebook Link Updated Successfully');
        }
        if($request->twitter_link)
        {
            $id = $request->twitter_id;
            $input['twitter_link'] = $request->twitter_link;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Twitter Link Updated Successfully');
        }
        if($request->youtube_link)
        {
            $id = $request->youtube_id;
            $input['youtube_link'] = $request->youtube_link;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Youtube Link Updated Successfully');
        }
        if($request->insta_link)
        {
            $id = $request->insta_id;
            $input['insta_link'] = $request->insta_link;
            ContactInfo::whereId($id)->update($input);
            return back()->with('success','Instagram Link Updated Successfully');
        }
    }

    public function aboutpageContent()
    {
        return view('Admin_Webpages.aboutPageInfo');
    }
    public function updatepageContent(Request $request)
    {
        
        if($request->hasFile('bannerimage'))
        {
            $id=$request->banner_id;
            $input['bannerimage'] = 'storage/'.time().'.'.$request->bannerimage->extension();
            $saveimage = $request->bannerimage->move(public_path('storage/'), $input['bannerimage']);
            About::whereId($id)->update($input);
            return back()->with('success','Banner image Updated Successfully');
        }
        if($request->paragraph_1)
        {
            $id = $request->paragraph_1_id;
            $input['paragraph_1'] = $request->paragraph_1;
            About::whereId($id)->update($input);
            return back()->with('success','Paragraph One Content Updated Successfully');
        }
        if($request->paragraph_2)
        {
            $id = $request->paragraph_2_id;
            $input['paragraph_2'] = $request->paragraph_2;
            About::whereId($id)->update($input);
            return back()->with('success','Paragraph Two Content Updated Successfully');
        }
        if($request->paragraph_3)
        {
            $id = $request->paragraph_3_id;
            $input['paragraph_3'] = $request->paragraph_3;
            About::whereId($id)->update($input);
            return back()->with('success','Paragraph Three Content Updated Successfully');
        }
        if($request->hasFile('sidebannerimage'))
        {
            
            $id=$request->sidebannerimage_id;
            
            $input['sidebannerimage'] = 'storage/'.time().'.'.$request->sidebannerimage->extension();
            $saveimage = $request->sidebannerimage->move(public_path('storage/'), $input['sidebannerimage']);
            $input['sidebarpoint1'] = $request->sidebarpoint1;
            $input['sidebarpoint2'] = $request->sidebarpoint2;
            $input['sidebarpoint3'] = $request->sidebarpoint3;
            About::whereId($id)->update($input);
            return back()->with('success','Sidebar Banner image Updated Successfully');
        }
        
        if($request->hasFile('collectionimg_1'))
        {
         
            $id=$request->collectionimg_1_id;
            
            $input['collectionimg_1'] = 'storage/'.time().'.'.$request->collectionimg_1->extension();
            $saveimage = $request->collectionimg_1->move(public_path('storage/'), $input['collectionimg_1']);
           
            About::whereId($id)->update($input);
        }
        if($request->hasFile('collectionimg_2'))
        {
         
            $id=$request->collectionimg_2_id;
            
            $input['collectionimg_2'] = 'storage/'.time().'.'.$request->collectionimg_2->extension();
            $saveimage = $request->collectionimg_2->move(public_path('storage/'), $input['collectionimg_2']);
            
            About::whereId($id)->update($input);
        }
        if($request->hasFile('collectionimg_3'))
        {
         
            $id=$request->collectionimg_3_id;
            
            $input['collectionimg_3'] = 'storage/'.time().'.'.$request->collectionimg_3->extension();
            $saveimage = $request->collectionimg_3->move(public_path('storage/'), $input['collectionimg_3']);
            About::whereId($id)->update($input);
           
        }
        if($request->hasFile('collectionimg_4'))
        {
         
            $id=$request->collectionimg_4_id;
            
            $input['collectionimg_4'] = 'storage/'.time().'.'.$request->collectionimg_4->extension();
            $saveimage = $request->collectionimg_4->move(public_path('storage/'), $input['collectionimg_4']);
        }
        if ($request->collectiondata_1!="") {
            $id=$request->collectionimg_1_id;
            $input['collectiondata_1'] = $request->collectiondata_1;
            About::whereId($id)->update($input);
        }  
        if ($request->collectiondata_2!="") {
            $id=$request->collectionimg_2_id;
            $input['collectiondata_2'] = $request->collectiondata_2;
            About::whereId($id)->update($input);
        }
        if ($request->collectiondata_3!="") {
            $id=$request->collectionimg_3_id;
            $input['collectiondata_3'] = $request->collectiondata_3;
            About::whereId($id)->update($input);
        }
        if ($request->collectiondata_4!="") {
            $id=$request->collectionimg_4_id;
            $input['collectiondata_4'] = $request->collectiondata_4;
            About::whereId($id)->update($input);
        }
        
        return back()->with('success','Collection Content Updated Successfully');
    }


    public function updateProfile(Request $request)
        {
                $id = Auth::user()->id;
                $input['address'] = $request->address;
                $input['addrOpt'] = $request->addrOpt;
                $input['phone'] = $request->phone;
                $input['state'] = $request->countrySelect;
                $input['city'] = $request->citySelect;
                $input['zip'] = $request->zip;
                Profile::whereId($id)->update($input);
                return back()->with('success', 'Profile Updated Successfully');
           
        }
        public function user_settings() {
            return view('Webpages.user_settings');
        }
        public function changePassword(Request $request)
        {
            
    
            return 'success';

        }
}
