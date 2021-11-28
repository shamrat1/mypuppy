@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/DogGuideStyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/adoptions.css') }}">
<style>
   li{
   padding: 2px;
   }
   .checklist li:before {
   content: "\2714";
   }
   .imgBanner{
   width:100%!important;
   height:100%!important;
   }
   .imgAdoption {
   height: 410px;
   width: 540px;
   }
   #pet-service-categories{
   display:block!important;
   }
   #pet-service-categories-mob{
   display:none!important;
   }
   .imgFaq {
   height: 100%!important;
   width: 100%!important;  
   }
   
   @media only screen and (max-width: 600px) {
   .imgAdoption {
   height: 320px;
   width: 350px;
   }
   #pet-service-categories{
   display:none!important;
   }
   #pet-service-categories-mob{
   display:block!important;
   }
   .riyanImg {
   height: 75px!important;
   width: 80px!important;
   padding:5px!important;
   margin:5px!important;
   }
   .imgFaq {
   height: 100%!important;
   width: 100%!important;  
   }
   }   
</style>
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
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
         <span>Adoptions</span>
         </a>
      </li>
   </ul>
</div>
<!-- main content -->
<img src="{{ asset('images/adoptionBanner.png') }}" alt="bannerimage" class="imgBanner">
<div class="booknow">
   <a href="{{ url('adopt-a-pet') }}" class="btn btn-category">Adopt a pet</a>
</div>

<div class="container">
   <div class="about-us-content">
      <br>
      <div class="row">
         <?php $myData1 = App\Models\ServiceContent::findOrFail(44);   ?>
         <div class="col-lg-6 col-md-6 col-sm-6 right">
            <a href="Javascript:void(0)">
            <img class="imgAdoption" src="{{ asset($myData1->image_path) }}" alt="#" />
            </a>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 left">
            <div class="cms-block f-right">
               {!! $myData1->information !!}
               <a href="{{ url('adopt-a-pet') }}" class="btn btn-category">Adopt a pet</a>
            </div>
         </div>
      </div>
      <div class="container" style="text-align:center;">
         <div class="cms-block f-left">
            <h2 class="page-subheading">ADOPT AT MY PUPPY MY PET</h2>
            <h4>Search Adoptable Pets</h4>
            <h5>New Pet? 
               <span style="color:blue;">
               Everything you need to know</span>
            </h5>
            <h2> <b>1. New Dog Guide : </b></h2>
            @include('newDogInclude')
         </div>
      </div>
   </div>
</div>
<section class="spacing-top-md spacing-bottom-md">
   <div id="pet-service-categories">
      <div class="container">
         <div class="row">
            <div class="col-12 col-12-sm heading-holder">
               <h2>Other Local Pet Services</h2>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('dog-grooming') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(28);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('dog-training') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(29);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('veterinary-services') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(30);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('/adoptions') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(31);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('diy-dog-wash') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(32);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('in-store-dog-training') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(33);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('pet-insurance') }}">
                  <?php $card = App\Models\ImgInfoCard::findOrFail(34);  ?>
                  <div class="img-holder">
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-3 col-6-sm content-holder">
               <a href="{{ url('store-services') }}" target="_blank">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(35);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="center-block img-responsive">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
   <div id="pet-service-categories-mob">
      <div class="container text-center">
         <h2>Other Local Pet Services</h2>
         <div class="row">
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('dog-grooming') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(28);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('dog-training') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(29);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('veterinary-services') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(30);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('/adoptions') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(31);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('diy-dog-wash') }}">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(32);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('in-store-dog-training') }}">
                  <div class="img-holder">
                     @php
                     $card = App\Models\ImgInfoCard::findOrFail(33); 
                     @endphp
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('pet-insurance') }}">
                  <?php $card = App\Models\ImgInfoCard::findOrFail(34);  ?>
                  <div class="img-holder">
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
            <div class="col-12 col-12-sm content-holder p-2">
               <a href="{{ url('store-services') }}" target="_blank">
                  <div class="img-holder">
                     <?php $card = App\Models\ImgInfoCard::findOrFail(35);  ?>
                     <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" class="riyanImg">
                  </div>
                  <div class="text-holder">
                     <h4>{{ $card->info }}</h4>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<div class="container-fluid">
   <div class="row align-items-center">
      <div class="col-lg-7 col-md-12">
         <div class="faq-accordion">
            <h2>Frequently Asked Questions</h2>
            <ul class="accordion">
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What supplies do I need for a puppy?
                  </a>
                  <p class="accordion-content">
                     If you're welcoming home a new puppy, having the right supplies on hand will help you both feel more comfortable. We recommend the following puppy products: puppy food, puppy treats and food and water bowls, potty pads, waste bags and cleanup products; toys; a collar, harness, ID tag and leash; a crate; a bed; puppy shampoo and appropriate grooming tools.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What supplies do I need for a new dog?
                  </a>
                  <p class="accordion-content">
                     Whether you've adopted or are welcoming an older dog into your family, there are a few essential supplies that will help your new dog feel right at home. We recommend getting dog food, dog treats and food and water bowls; waste bags and cleanup products; toys, including interactive puzzle toys; a collar, harness, ID tag and leash; a crate; a bed; shampoo and appropriate grooming tools.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How do I make my new dog feel at home?
                  </a>
                  <p class="accordion-content">
                     Entering a new environment can be overwhelming for a new dog or puppy. Meeting new people, smelling new things and experiencing a new environment can be overwhelming, so if you can plan to have the first full day at home with your new pooch, that would be best. To help them make the transition to their new space, start by creating a welcoming space before they arrive. Be sure to at least have a comfortable bed, size-appropriate crate, some toys and food and water bowls. When they come home, allow them to explore their new home under supervision, taking it one space at a time. Keep new meetings, of both people and other pets, to a minimum until they begin to gain confidence.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How long does it take for dog to bond with new pet parents?
                  </a>
                  <p class="accordion-content">
                     How quickly a dog bonds with their pet parent will differ for each dog. However, you can help build trust and forge a bond by spending more time with your dog through playtime (both indoors and outside), giving them treats (ensure treats do not make up more than 10% of their overall diet) and training them.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> Where should a puppy sleep the first night?
                  </a>
                  <p class="accordion-content">
                     It’s best to keep your dog in a crate in your bedroom for the first few nights. This helps establish important boundaries while also letting your puppy know that you are nearby should they need you. Crate training can also help with the potty training process.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>At what age can a puppy go all night without a potty break?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     Many factors will impact how long your puppy can hold their bladder. To reduce the likelihood of nighttime accidents, try crate training your puppy so they can tell you when they need to go. Be sure to reduce their food and water intake right before bedtime and take them outside right before they go to sleep. Within a few months, you'll notice your pup being able to go longer stretches before needing to go outside.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>My puppy is very young. How can I help them sleep at night?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     Puppies who are 10 weeks old or younger will likely need to wake up in the night to go to the bathroom and, if left to their own devices, may decide the middle of the night is a great playtime! However, by beginning crate training early, your pup will be more likely to associate time in their crate with rest time, only waking you up when they need a potty break.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>What do I need for my puppy?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     Before bringing home your puppy, be sure to stock up on the basics like puppy food, puppy treats and food and water bowls, potty pads, waste bags and cleanup products; toys; a collar, harness, ID tag and leash; a crate; a bed; puppy shampoo and appropriate grooming tools.
                     <br>
                     You'll also want to consider booking their remaining vaccinations with a veterinarian and looking into dog training options.
                  </p>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-5 col-md-12">
         <div class="p-1">
            <img src="{{ asset('images/faq-img1.png') }}" class="imgFaq" alt="image">
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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