@extends('layouts.myApp')
@section('content')
<style>
   .bg-white {
   background-color: #fff;
   }
   .padding-bottom-sm {
   padding-bottom: 10px;
   }
   .padding-top-xs {
   padding-top: 5px;
   }
   .row {
   position: relative;
   width: 100%;
   }
   .col-3-sm {
   width: 21%;
   }
   ul.list-unstyled>li {
   list-style: none;
   display: inline-block;
   vertical-align: top;
   }
   .sceneImg{
   height: 300px;
   width: 550px;
   border: 10px solid #fff;
   box-shadow: 2px 3px #005080;
   }
   .bg-lightestgray {
   background-color: #F5F5FF;
   }
   .container .col-3, .container.margin .col-3 {
   width: 21%;
   }
   .container .col-7, .container.margin .col-7 {
   width: 54.33333%;
   }
   .container {
   width:100%!important;
   max-width: 100%!important;
   margin-left: auto;
   margin-right: auto;
   margin-top:5px;
   clear: both;
   }
   .padding-top-none {
   padding-top: 0;
   }
   .row .col-center {
   float: none;
   margin: .5rem auto;
   clear: both;
   display: block;
   }
   .background-img-newsaltwaterfish-hero-container {
   background-image: url(images/newsaltwaterfishHero.png);
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center fixed;
   max-width: 1440px!important;
   padding: 50px;
   }
   .background-img-whattobuyfish-hero-container {
   background-image: url(images/arhamfishbg.jpg);
   opacity: 0.65;
   border: solid 5px #fff;
   }
   .background-img-whattoknowfish-hero-container {
   background-image: url(images/aliyabuyfish.png);
   opacity: 0.65;
   border: solid 5px #fff;
   }
   .all-rounded-corners-dropshadow {
   background-color: #fff;
   border-radius: 5px;
   box-shadow: 0 2px 5px 0 rgb(0 0 0 / 10%);
   }
   h1.white, h2.white, h3.white, h4.white, h5.white {
   color: #fff;
   font-weight: 700;
   line-height: 1.1em;
   margin: 0;
   }
   .spacer-sm-bottom {
   padding-bottom: 20px;
   }
   .spacer-md-bottom {
   padding-bottom: 40px;
   }
   .spacer-sm-top {
   padding-top: 20px;
   }
   .padding-xlg {
   padding: 40px;
   }
   p.white {
   font-weight: 400;
   color: #fff;
   }
   .padding-left-lg {
   padding-left: 20px;
   }
   .padding-right-lg {
   padding-right: 20px;
   }
   .age_tabs_wrapper {
   display: block;
   width: 45%;
   padding: 23px 0 20px;
   position: relative;
   top: -50px;
   z-index: 1;
   }
   .triangle {
   position: relative;
   margin: 3em;
   box-sizing: border-box;
   background-color: #fff;
   border-radius: 5px;
   box-shadow: 0 4px 25px 0 rgb(0 0 0 / 10%);
   }
   .age_content_container {
   width: 100%;
   display: block;
   margin: 0 auto;
   overflow: auto;
   }
   p.animal_type_label {
   display: block;
   float: left;
   width: 20%;
   text-align: center;
   padding-top: 10px;
   }
   .margin-bottom-none {
   margin-bottom: 0!important;
   }
   .age-label-navigation-tab-2 {
   display: block;
   float: left;
   width: 38%;
   cursor: pointer;
   text-decoration: none;
   text-align: center;
   color: #001952;
   background: #fff;
   border: solid 1px #8e9da2;
   clear: none;
   }
   ul {
   font-size: .9375em;
   }
   .rounded-bottom-left {
   border-bottom-left-radius: 5px;
   }
   .rounded-top-left {
   border-top-left-radius: 5px;
   }
   .rounded-bottom-right {
   border-bottom-right-radius: 5px;
   }
   .rounded-top-right {
   border-top-right-radius: 5px;
   }
   .background-img-newpetguidebook-hero-container {
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center;
   position: relative;
   width: 100%;
   padding-bottom: 100px;
   }
   .background-img-newpetguidebook-hero-container {
   background-image: url(images/newpetguidebook-081117-hero-1440w-418h-d.png);
   }
   .background-img-newpetguidebook-hero-content {
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -moz-flex;
   display: -webkit-flex;
   display: flex;
   -webkit-flex-direction: column;
   -ms-flex-direction: column;
   flex-direction: column;
   -webkit-justify-content: center;
   justify-content: center;
   position: relative;
   top: 55px;
   bottom: 0;
   left: 0;
   right: 0;
   }
   .text-tile-lg {
   background-color: #fff;
   border-radius: 5px;
   box-shadow: 0 2px 5px 0 rgb(0 0 0 / 10%);
   }
   .maazAlignDesk {
   margin: 0px 32rem!important;
   }
   .muhDeskAlign1 {
   margin: 0px 155px;
   }
   #fish-hero-mob{
   display:none!important;
   }
   #fish-hero{
   display:block!important;
   }
   #newpetguidebook {
   display:block!important;  
   }
   #petguidebook-mob {
   display:none!important;  
   }
   #fishType{
   display:block!important;   
   }
   #fishGuides{
   display:block!important; 
   }
   #fishGuides-mob{
   display:none!important; 
   }
    #petNeeds{
      display:block!important;   
    }
    #petNeeds-mob{
      display:none!important;   
    }
   @media only screen and (max-width: 600px) {
   #fish-hero-mob{
   display:block!important;
   }
   #fish-hero{
   display:none!important;
   }
   #newpetguidebook {
   display:none!important;  
   }
   #petguidebook-mob {
   display:block!important;  
   } 
   #fishType{
   display:none!important;   
   }
   #fishGuides{
   display:none!important; 
   }
   #fishGuides-mob{
   display:block!important; 
   }
   .background-img-newsaltwaterfish-hero-container {
   background-image: url(images/myFish.jpg);
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center fixed;
   max-width: 100%!important;
   }
    #petNeeds{
      display:none!important;   
    }
    #petNeeds-mob{
      display:block!important;   
    }
     .sceneImg{
       height: 300px;
       width: 100%;
       border: 10px solid #fff;
       box-shadow: 2px 3px #005080;
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
               <a href="{{ url('new-pet-guides') }}">
               <span>New Pet Guides</span>
               </a>
            </li>
            <li>
               <a href="javascript:void(0)">
               <span>Saltwater Fish Guide</span>
               </a>
            </li>
         </ul>
</div>

      <div class="container full-width">
         <div class="row background-img-newsaltwaterfish-hero-container text-center"  id="fish-hero">
            <div class="col-2">&nbsp;</div>
            <div class="col-8 background-img-newsaltwaterfish-hero-content col-center block">
               <div class="row padding-xlg">
                  <h1 class="white spacer-sm-top spacer-sm-bottom">Bringing home your new saltwater fish</h1>
                  <p class="white padding-left-lg padding-right-lg"><strong>Discover everything you need to keep your new saltwater fish happy &amp; healthy.</strong></p>
               </div>
            </div>
            <div class="col-2">&nbsp;</div>
         </div>
         <!--Mob Bird hero-->
         <div  id="fish-hero-mob"  class="background-img-newsaltwaterfish-hero-container">
            <div class="row  text-center">
               <div class="col-12 col-12-sm ">
                  <h3 class="white spacer-sm-top spacer-sm-bottom">Bringing home your new saltwater fish</h3>
                  <p class="white padding-left-lg padding-right-lg"><strong>Discover everything you need to keep your new saltwater fish happy &amp; healthy.</strong></p>
               </div>
            </div>
         </div>
      </div>
      <div class="container bg-white" id="fishType">
         <div class="age_tabs_wrapper triangle maazAlignDesk">
            <div class="age_content_container">
               <p class="animal_type_label"><strong>Fish Type</strong></p>
               <div class="age_nav_container">
                  <ul class="age_nav">
                     <li class="margin-bottom-none age-label-navigation-tab-2 rounded-top-left rounded-bottom-left"><a class="active" href="#" onclick="clickTrackLink(this);"><span class="icon-check-white spacer-xsm-right"></span>Saltwater</a></li>
                     <li class="margin-bottom-none age-label-navigation-tab-2 rounded-top-right rounded-bottom-right"><a href="#">Freshwater</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="container bg-white">
         <div class="row background-img-newpetguidebook-hero-container text-center" id="newpetguidebook">
            <div class="col-9 background-img-newpetguidebook-hero-content col-center text-tile-lg padding-top-xs padding-bottom-sm muhDeskAlign1 ">
               <div class="row">
                  <div class="col-3"><img src="{{ asset('images/welcometofamily-082317-logo-140w-82h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/welcometofamily-082317-logo-140w-82h-d.png') }}" alt="Welcome to the Family!" class="img-responsive center-block" style="width:auto;"> </div>
                  <div class="col-7">
                     <h3>New Pet Parent Guidebook</h3>
                     <p>Ask for your new pet parent starter guide book to get free food and huge savings. Available in-store only.</p>
                  </div>
               </div>
               <br><br>
               <div class="row">
                  <div class="col-12">
                     <a href="#" class="btn btn-primary inline margin-right-lg mobile-btn-line">FREE Shopping Checklist</a>
                     <a href="#" target="_blank" class="btn btn-primary inline margin-right-lg mobile-btn-line">See What's Inside</a>
                     <a href="#" class="btn btn-gray inline mobile-btn-line margin-top-lg"> Find a Store </a> 
                  </div>
               </div>
            </div>
         </div>
         <!--mobile-->
         <div id="petguidebook-mob" class="alert alert-info">
            <h3>New Pet Parent Guidebook</h3>
            <p>Ask for your new pet parent starter guide book to get free food and huge savings. Available in-store only.</p>
            <br><br>
            <div class="row mt-5">
               <div class="col-12 col-12-sm">
                  <a href="#" class="btn btn-primary">FREE Shopping Checklist</a>
                  <a href="#" target="_blank" class="btn btn-primary">See What's Inside</a>
                  <a href="#" class="btn btn-gray"> Find a Store </a> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container bg-white  spacer-sm-bottom">
   <div class="container" id="fishGuides">
      <h2 class="text-center pb-3">Saltwater Fish Guides</h2>
      <div class="row services-row-md text-center spacer-md-bottom">
         <div class="col-6 background-img-whattobuyfish-hero-container all-rounded-corners-dropshadow border-medium padding-sm text-center">
            <div class="background-img-whattobuyfish-hero-content">
               <div class="col-12 text-center">
                  <p class="margin-top-xlg">
                  </p>
                  <h3 class="white padding-top-none">What to Buy </h3>
                  <p class="white">From food to fun, explore top products to welcome—and pamper—your new saltwater fish.</p>
                  <div class="margin-bottom-lg"><a href="#" class="btn btn-primary inline mobile-btn-line margin-top-lg">Shop</a></div>
                  <p></p>
               </div>
            </div>
         </div>
         <div class="col-6 background-img-whattoknowfish-hero-container all-rounded-corners-dropshadow border-medium padding-sm text-center">
            <div class="background-img-whattoknowfish-hero-content">
               <div class="row">
                  <div class="col-12 text-center">
                     <p class="margin-top-xlg">
                     </p>
                     <h3 class="white padding-top-none">What to Know</h3>
                     <p class="white">The best articles and videos from our MPMP experts to help you care for your new saltwater fish.</p>
                     <div class="margin-bottom-lg"><a href="#" class="btn btn-primary inline mobile-btn-line margin-top-lg">Learn</a></div>
                     <p></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--Mobile-->
   <div class="container" id="fishGuides-mob">
      <h2 class="text-center pb-3">Fish Guides</h2>
      <div class="row services-row-md text-center spacer-md-bottom">
         <div class="col-12 background-img-whattobuyfish-hero-container all-rounded-corners-dropshadow border-medium padding-sm text-center">
            <div class="background-img-whattobuyfish-hero-content">
               <div class="col-12 text-center">
                  <p class="margin-top-xlg">
                  </p>
                  <h3 class="white padding-top-none">What to Buy </h3>
                  <p class="white">From food to fun, explore top products to welcome—and pamper—your new saltwater fish.</p>
                  <div class="margin-bottom-lg"><a href="#" class="btn btn-primary inline mobile-btn-line margin-top-lg">Shop</a></div>
                  <p></p>
               </div>
            </div>
         </div>
         <div class="col-12 background-img-whattoknowfish-hero-container all-rounded-corners-dropshadow border-medium padding-sm text-center">
            <div class="background-img-whattoknowfish-hero-content">
               <div class="row">
                  <div class="col-12 text-center">
                     <p class="margin-top-xlg">
                     </p>
                     <h3 class="white padding-top-none">What to Know</h3>
                     <p class="white">The best articles and videos from our MPMP experts to help you care for your new saltwater fish.</p>
                     <div class="margin-bottom-lg"><a href="#" class="btn btn-primary inline mobile-btn-line margin-top-lg">Learn</a></div>
                     <p></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container text-center bg-lightestgray spacer-sm-top">
    <div id="petNeeds">
   <div class="row">
      <div class="col-4 col-center">
         <ul class="list-unstyled">
            <li class="col-3-sm text-center"><img src="{{ asset('images/grooming-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/grooming-072517-icon-155w-155h-d.png') }}" alt="Grooming" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/pettraining-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/pettraining-072517-icon-155w-155h-d.png') }}" alt="Petco Training" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/vetservices-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/vetservices-072517-icon-155w-155h-d.png') }}" alt="Petco Clinics" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/petsitting-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/petsitting-072517-icon-155w-155h-d.png') }}" alt="Pet Sitting &amp; Walking" class="img-responsive center-block" style="width:auto;"></li>
         </ul>
         <h3>Everything your pet needs</h3>
         <a href="#" class="btn btn-primary inline mobile-btn-line margin-top-sm">Learn About Our Services</a>
      </div>
   </div>
</div>

<!--Mob-->
<div id="petNeeds-mob">
   <div class="row">
      <div class="col-12 col-center">
         <ul class="list-unstyled">
            <li class="col-3-sm text-center"><img src="{{ asset('images/grooming-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/grooming-072517-icon-155w-155h-d.png') }}" alt="Grooming" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/pettraining-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/pettraining-072517-icon-155w-155h-d.png') }}" alt="Petco Training" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/vetservices-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/vetservices-072517-icon-155w-155h-d.png') }}" alt="Petco Clinics" class="img-responsive center-block" style="width:auto;"></li>
            <li class="col-3-sm text-center"><img src="{{ asset('images/petsitting-072517-icon-155w-155h-d.png') }}" lazyimg="loaded" data-src="{{ asset('images/petsitting-072517-icon-155w-155h-d.png') }}" alt="Pet Sitting &amp; Walking" class="img-responsive center-block" style="width:auto;"></li>
         </ul>
         
      </div>
      <div class="col-12 col-center">
	<h3>Everything your pet needs</h3>
         <a href="{{ url('services') }}" class="btn btn-primary inline mobile-btn-line margin-top-sm">Learn About Our Services</a>
         </div>
   </div>
</div>

   <div class="row bg-white">
      <div class="column">
         <h3>Adopt the love of your life</h3>
         <p>The love of pets changes everything. Love is why at the Petco Foundation, we bring pets in need together with loving people - with 5.3 million pets adopted so far. By supporting pet adoption and our lifesaving efforts, you can put your love into action, too. Together, let's create a better world for pets.</p>
         <a href="#" class="btn btn-primary inline mobile-btn-line margin-top-sm">Adopt at MPMP</a>
         <a href="#" class="btn btn-primary inline mobile-btn-line margin-top-sm">Search Adoptable Pets</a>
      </div>
      <div class="column">
         <img src="{{ asset('images/jaaneman.png') }}" class="sceneImg" alt="image">
      </div>
   </div>
</div>

@endsection