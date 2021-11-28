@extends('layouts.myApp')
@section('content')
<style>
 .imgBanner{
       width:100%!important;
       height:100%!important;
   }
   .imgBanner1 {
      width: 500px;
      height: 350px;
      border: 2px solid #fff;
      
   }
   .imgBanner2 {
      width: 220px;
      height: 140px;
      border: 2px solid #fff;
   }
   .imgBanner3 {
      width: 370px;
      height: 200px;

   }
   .imgRound1 {
      width: 200px;
      height: 200px;
      border: 2px solid #fff;
      border-radius: 100%;
   }
   @media only screen and (max-width: 600px) {
       .imgBanner1 {
     width: 220px;
      height: 140px;
      border: 2px solid #fff;
      
   }
   }
</style>
<div class="container">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                  <a href="{{ url('/services') }}">
                  <span>Services</span>
                  </a>
               </li>
               <li>
               <a href="javascript:void(0)">
               <span>New Pet Guides</span>
               </a>
            </li>
         </ul>
</div>

         <img src="{{ asset('images/newPetGuidesBanner.png') }}" alt="bannerimage" class="imgBanner">
         
         <div id="main" style="margin-bottom:15px; ">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <br>
                     <h2 class="text-center">WELCOME HOME</h2>
                     <p class="text-center">We’ll help your new pet thrive with supplies, advice and routine services so every need is covered.</p>

                     <div class="row text-center">
                         <?php $petGuide = App\Models\PetGuide::findOrFail(1); ?>
                        <div class="column">
                           <a href="{{ url('new-dog-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner1" alt=""></a>
                           <br><br>
                           <a href="{{ url('new-dog-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a>
                        </div>
                        <?php $petGuide = App\Models\PetGuide::findOrFail(2); ?>
                        <div class="column">
                           <a href="{{ url('new-cat-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner1"  alt=""></a>
                           <br><br>
                          <a href="{{ url('new-cat-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a> 
                        </div>
                     </div>

                     <div class="row text-center">
                         <?php $petGuide = App\Models\PetGuide::findOrFail(3); ?>
                        <div class="column">
                           <a href="{{ url('reptile-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner2" alt=""></a>
                           <br><br>
                           <a href="{{ url('reptile-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a>
                        </div>
                        <?php $petGuide = App\Models\PetGuide::findOrFail(4); ?>
                        <div class="column">
                           <a href="{{ url('bird-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner2"  alt=""></a>
                           <br><br>
                          <a href="{{ url('bird-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a> 
                        </div>
                        <?php $petGuide = App\Models\PetGuide::findOrFail(5); ?>
                        <div class="column">
                           <a href="{{ url('saltwater-fish-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner2" alt=""></a>
                           <br><br>
                           <a href="{{ url('saltwater-fish-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a>
                        </div>
                        <?php $petGuide = App\Models\PetGuide::findOrFail(6); ?>
                        <div class="column">
                           <a href="{{ url('new-rabbit-guide') }}"><img src="{{ asset($petGuide->image_path) }}" class="imgBanner2"  alt=""></a>
                           <br><br>
                          <a href="{{ url('new-rabbit-guide') }}" class="btn-category slide_right">{{ $petGuide->petGuide_name }}</a> 
                        </div>
                     </div>
                     <div class="container text-center">
                        <h3>Here for all your pet’s needs</h3>
                        <p>We have everything you need to make sure your pet grows up to be happy and healthy—and thrives along the way.</p>
                        <div class="row">
                           <div class="column">
                              <img src="{{ asset('images/new-pet-services-partners.jpg') }}" class="imgRound1" alt="">
                              <h4>Store Partners</h4>
                              <p>Our Knowledgeable partners can help you the right food for your new pet and guide you through every need.</p>
                              <a href="{{ url('store-services') }}" class="btn-category slide_right">Find a Store</a>
                           </div>
                           <div class="column">
                              <img src="{{ asset('images/new-pet-services-vet.jpg') }}" class="imgRound1" alt="">
                              <h4>Veterinarians</h4>
                              <p>Help ensure lasting health with services ranging from vaccinations to surgeries</p>
                              <br>
                              <a href="{{ url('services-locations') }}" class="btn-category slide_right">Find a Vet</a>
                           </div>
                           <div class="column">
                              <img src="{{ asset('images/new-pet-services-groomer.jpg') }}" class="imgRound1" alt="">
                              <h4>Groomers</h4>
                              <p>Our stylists complete a 20-week, 800-hour certification course, so your best friend will be in good hands.</p>
                             
                              <a href="{{ url('dog-grooming') }}" class="btn-category slide_right">Book Now</a>
                           </div>
                           <div class="column">
                              <img src="{{ asset('images/new-pet-services-trainer.jpg') }}" class="imgRound1" alt="">
                              <h4>Trainers</h4>
                              <p>Start training off on the right foot with in-store and online classes catered to their needs.</p>
                              <br>
                              <a href="{{ url('dog-training') }}" class="btn-category slide_right">Book Now</a>
                           </div>
                        </div>
                     </div>
               </div>
           </div>
           
           <div class="container text-center">
            <h3>Save a life with MPMP Love</h3>
            <p>Join the MPMP Love’s growing community of pet parents who have adopted through its shelter network.</p>
            
               <div class="row text-center">
                  <div class="column">
                     <img src="{{ asset('images/new-pet-donate-1.jpg') }}" class="imgBanner2" alt="">
                  </div>
                  <div class="column">
                     <img src="{{ asset('images/new-pet-donate-2.jpg') }}" class="imgBanner2" alt="">
                     
                  </div>
                  <div class="column">
                     <img src="{{ asset('images/new-pet-donate-3.jpg') }}" class="imgBanner2" alt="">
                  
                  </div>
                  <div class="column">
                     <img src="{{ asset('images/new-pet-donate-4.jpg') }}" class="imgBanner2" alt="">

                  </div>
                  
               </div>
            </div>
            <div class="container text-center">
               <h3>Tips to kick off life together</h3>
               <p>Whether you’re a first-time pet parent or a pet pro, our tips can help you build a great life with your new family member.</p>
               <div class="row">
                  <div class="column" style="padding: 0px!important;">
                     <img src="{{ asset('images/new-pet-services-partners.jpg') }}" class="imgBanner3" alt="">
                     <h4>Teaching your kids about pets</h4>
                     <p style="padding: 10px;">Help make sure your kids are prepared to welcome home your new pet.</p>
                     <a href="{{ url('pets-and-children--how-to-talk-about-pet-parenthood') }}">Read More</a>
                     <br><br>
                  </div>
                  <div class="column" style="padding: 0px!important;">
                     <img src="{{ asset('images/new-pet-services-vet.jpg') }}" class="imgBanner3" alt="">
                     <h4>Your pet wellness checklist</h4>
                     <p style="padding: 10px;">Feel more prepared and less stressed about their care by following these tips.</p>
                     <a href="{{ url('your-pet-wellness-checklist') }}">Read More</a>
                     <br><br>
                  </div>
                  <div class="column" style="padding: 0px!important;">
                     <img src="{{ asset('images/new-pet-services-groomer.jpg') }}" class="imgBanner3" alt="">
                     <h4>The best pet for your family</h4>
                     <p style="padding: 10px;">Before you make the decision, learn about each type of pet and what they require.</p>
                     <a href="{{ url('what-type-of-pet-should-you-or-your-family-get') }}">Read More</a>
                     <br><br>
                  </div>
               </div>
            </div>
@endsection