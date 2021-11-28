@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<style>
.background-img-newsaltwaterfish-hero-container {
        background-image: url(images/veterinaryBanner.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center fixed;
        max-width: 100%!important;
        padding: 50px;
        margin-left:5px!important;
    }
    .imgBanner{
   width:100%!important;
   height:100%!important;
   }
    .responsive {
      width: 100%;
      height: auto;
    }
    .imgVImage {
        width: 400px;
        height:250px;
        border:4px solid #fff;
    }
    .btn-find {
        border-radius: 15px;
        color: #000;
        border: 2px solid #000;
        padding: 8px 70px;
        text-align: center;
        text-transform: uppercase;
        text-decoration: none;
        box-shadow: inset 0 0 0 0 #000;
        -webkit-transition: ease-out 1s;
        -moz-transition: ease-out 1s;
        transition: ease-out 1s;
    }
    
    .btn-find:hover {
        text-decoration: none;
        background-color: #000;
        color: #fff;
    }
    .maaz li {
        padding: 12px;
        font-weight: 500;
    }
    .maaz li::before {
        content: "✅ ";
      }
      @media only screen and (max-width: 600px) {
      .imgVImage {
            width: 100%!important;
            height:250px!important;
            border:4px solid #fff;
        }
}
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                  <a href="{{ url('/services') }}">
                  <span>Services</span>
                  </a>
               </li>
            <li>
                <a href="javascript:void(0)">
                <span>Veterinary Services</span>
                </a>
             </li>
         </ul>
</div>
         <img src="{{asset('images/veterinaryBanner.png')}}" alt="bannerimage" class="imgBanner"/>
         <div class="booknow">
            <form action="{{ route('appointment.service',) }}" method="POST">
               @csrf
               <input type="hidden" name="service_name" value="Veterinary Service" />
            <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
            </form>
         </div>
         <div id="main" style="margin-bottom:15px; ">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <br>
                        <div class="row" style="text-align:center;">
    <?php $myData1 = App\Models\ServiceContent::findOrFail(42);   ?>
                            <div class="column">
                                <img src="{{ asset($myData1->image_path)}}" class="imgVImage" alt="">
                                <div class="p-3">
                                  {!!  $myData1->information !!}
                                 </div>
                                <a href="javascript:void(0)" class="btn-find slide_right">FIND A VET</a>
                            </div>
                              <?php $myData2 = App\Models\ServiceContent::findOrFail(43);   ?>
                            <div class="column">
                                <img src="{{ asset($myData2->image_path)}}" class="imgVImage" alt="">
                                <div class="p-3">
                                {!!  $myData2->information !!}
                                </div>
                                
                                    <a href="javascript:void(0)" class="btn-find slide_right">FIND A CLINIC</a>
                                
                                
                            </div>
                        </div>
                  </div>
               </div>
               <div class="container">
                   <h2 style="text-align: center;margin:40px;">Full-service Veterinary Hospitals provide:</h2>
                   <div class="row" style="text-align:center">
                          <?php $data = App\Models\About::findOrFail(1); ?>
                 
                       <div class="col">
                           <img src="{{ asset($data->collectionimg_1) }}" style="width: 160px;height: 150px;" alt="">
                        <h4>{{ $data->collectiondata_1 }}</h4>
                       </div>
                       <div class="col">
                        <img src="{{ asset($data->collectionimg_2) }}" style="width: 160px;height: 150px;" alt="">
                        <h4>{{ $data->collectiondata_2 }}</h4>
                       </div>
                       <div class="col">
                        <img src="{{ asset($data->collectionimg_3) }}" style="width: 160px;height: 150px;" alt="">
                        <h4>{{ $data->collectiondata_3 }}</h4>
                       </div>
                       <div class="col">
                        <img src="{{ asset($data->collectionimg_4) }}" style="width: 160px;height: 150px;" alt="">
                        <h4>{{ $data->collectiondata_4 }}</h4>
                       </div>
                       
                   </div>
               </div>
               <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="faq-accordion">
                            <h2>Additional Hospital Services:</h2>
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Surgery
                                    </a>
                                    <p class="accordion-content">
                                        Surgeries are performed under anesthesia for various conditions. Our full-service hospitals offer a variety of outpatient surgeries for pets.
                                    </p>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Dental Care
                                    </a>
                                    <p class="accordion-content">
                                        Your pet's oral health is a good indicator of their overall health. Your pet's teeth should be checked at least once a year for early signs of problems. Our hospitals offer anesthetized dental cleanings and procedures.
                                    </p>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Nose-to-Tail Exams
                                    </a>
                                    <p class="accordion-content">
                                        At a wellness exam or checkup your veterinarian will observe your pet's general health, perform routine wellness screenings and administer vaccinations as needed.
                                    </p>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Dermatology
                                    </a>
                                    <p class="accordion-content">
                                        Irritated skin can be uncomfortable for your pet. Veterinarians can help diagnose common skin problems such as allergic reactions, infections and parasite issues.
                                    </p>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Mass Removals
                                    </a>
                                    <p class="accordion-content">
                                        Most masses, whether they are skin masses or within the body, require surgery to remove.
                                    </p>
                                </li>
        
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Vaccinations
                                    </a>
                                  
                                    <p  class="accordion-content ml-2 list-unstyled">
                                        Our hospitals offer diagnostic and treatment options for gastrointestinal symptoms such as vomiting, diarrhea or constipation.
                                    </p>
                                
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Digestive Care
                                    </a>
                                  
                                    <p class="accordion-content ml-2 list-unstyled">
                                        Our hospitals offer diagnostic and treatment options for gastrointestinal symptoms such as vomiting, diarrhea or constipation.
                                    </p>
                                
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Spay and Neuter
                                    </a>
                                  
                                    <p  class="accordion-content ml-2 list-unstyled">
                                        Spay or neuter your pet to help curb animal overpopulation and reduce the risk of serious health issues. 
                                    </p>
                                
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <div class="p-3 mt-3">
                            <img src="{{ asset('images/services.jpg') }}" class="responsive" width="500" height="400" alt="image">
                        </div>
                        <div class="m-3 text-center">
                            <a href="javascript:void(0)" class="btn-find slide_right">FIND A VET</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="container">
                <h2 style="text-align: center;margin:40px;">
                    Why choose vaccination clinics?
                </h2>
                <div class="row" style="text-align: center;">
                    <?php $data = App\Models\About::findOrFail(2); ?>
                    
                    <div class="col">
                        <img src="{{ asset($data->collectionimg_1) }}" />
                        <h4>{{$data->collectiondata_1}}</h4>
                    </div>
                    <div class="col">
                        <img src="{{ asset($data->collectionimg_2) }}" />
                        <h4>{{$data->collectiondata_2}}</h4>
                    </div>
                    <div class="col">
                        <img src="{{ asset($data->collectionimg_3) }}" />
                        <h4>{{$data->collectiondata_3}}</h4>
                    </div>
                </div>
            </div>
            <div class="container" style="background-color:#F5F5FF">
                <h2 style="text-align: center;margin:40px;">
                    Clinic services include:
                </h2>
                <div class="col-lg-7 col-md-12">
                    <img src="{{ asset('images/dog-and-vet-1-navy.png') }}" class="responsive imgVImage" />
                </div>
                <div class="col-lg-5 col-md-12">
                    <ol class="maaz">
                        <li>Vaccinations</li>
                        <li>Fecal testing</li>
                        <li>Canine heartworm testing</li>
                        <li>Microchipping</li>
                        <li>Deworming</li>
                        <li>And much more!</li>
                    </ol>
                </div>
            </div>
         </div>
      </div>
      
   </div>
</div>
<div class="container-fluid">
   <div class="row align-items-center">
      <div class="col-lg-7 col-md-12">
         <div class="faq-accordion">
            <h2>Frequently Asked Questions</h2>
            <ul class="accordion">
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How much do vaccinations cost at MPMP?
                  </a>
                  <p class="accordion-content">
                     The price will vary based off of the vaccinations needed and location. We offer a variety of packages and á la carte vaccination services to choose from. Pricing can be found by state on the Vetco Clinics website.
<br>
Our full-service hospitals can provide pricing for specific vaccinations. Use our store locator tool to find a full-service hospital or Vetco Vaccination Clinic near you.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>Does MPMP provide veterinary services?
                  </a>
                  <p class="accordion-content">
                     Yes, MPMP offers a complete range of affordable care, conveniently located inside your neighborhood MPMP Pet Care Center. Appointments are recommended. Use our store locator tool to find and book an appointment at a full-service hospital near you. For vaccinations only, MPMP offers affordable vaccination clinics at our Vetco locations.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> Does MPMP spay/neuter cats and dogs?
                  </a>
                  <p class="accordion-content">
                     Yes. MPMP offers spay and neutering for cat and dogs at our full-service pet hospitals. Use our store locator tool to find a full-service hospital near you and book an appointment today.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> Can I get my dog or cat vaccinated at MPMP?
                  </a>
                  <p class="accordion-content">
                     TYes. Bring your pet into one of our Vetco Vaccination Clinics (location and times available may vary) where we offer a variety of affordable vaccinations care services to help ensure the health and well-being of your dog or cat. If there are no vaccination clinics near you, our full-service hospitals also provide vaccinations in addition to all the nose-to-tail care your pet needs to stay healthy and feel their best.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> Does my dog need to complete level 1 in order to participate in level 2?
                  </a>
                  <p class="accordion-content">
                     We want to set you and your dog up to be successful! If you have already had some type of formal training with your (older than six months) dog, you may be ready for our Adult Level 2 class. Our Puppy Level classes are based on the age of your puppy.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>How much does it cost to microchip a dog or cat at MPMP?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                        he cost to microchip your pet will vary by location. Find pricing for our Vetco Vaccination clinics on their website. Call your local full-service hospital for microchip pricing. Use our store locator tool to find a full-service hospital or Vetco Vaccination Clinic near you.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What if my class lands on the same day as a major holiday?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     We schedule around major holidays and will add an additional week to ensure you get your six classes in the amount of weeks needed to complete them!
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How many dogs participate in a training class?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     It depends on the size of the training area, as we follow our safety policy to always keep a minimum of three feet in between dogs at all times!
                  </p>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-5 col-md-12">
         <div class="p-3 mt-3">
            <img src="{{ asset('images/faq-img1.png') }}"  class="responsive" width="350" height="250" alt="image">
         </div>
      </div>
   </div>
</div>
</div>
</div>
<br><br>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function show()
        {
            var m1=document.getElementById("showhide1");

       
            if(m1.style.display==="none" )
            {
                m1.style.display = "block";

               
            }
            else
            {
                m1.style.display = "none";

                
            }
            
        }

        $(document).ready(function(){
            $('.accordion').find('.accordion-title').on('click', function() {
                // Adds Active Class
                $(this).toggleClass('active');
                // Expand or Collapse This Panel
                $(this).next().slideToggle('fast');
                // Hide The Other Panels
                $('.accordion-content').not($(this).next()).slideUp('fast');
                // Removes Active Class From Other Titles
                $('.accordion-title').not($(this)).removeClass('active');
            });
          });
         
        
        
    </script>

@endsection