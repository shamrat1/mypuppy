@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/dogTraining.css') }}">
<link rel="stylesheet" href="{{ asset('css/onlineDogTraining.css') }}">
<style>
   .imgBanner{
       width:100%!important;
       height:100%!important;
   }
   #articles.articles-3 {
       background-color: #005080;
       color: #fff;
   }
   .spacing-top-md {
        padding-top: 40px;
   }
   #articles.articles-3 .row {
   justify-content: center;
   }
   #articles.articles-3 .heading-holder {
   margin-bottom: 0;
   padding: 0 2rem;
   }
   #articles.articles-3 .col {
   margin: 0.5rem 1%;
   width: 96%;
   flex: 1;
   background-color: #F4F7FF;
   color: #000;
   }
   .imgTrainer {
   width: 140px;
   height :140px;
   border-radius: 100%;
   }
   .imgIcon {
       width: 140px;
       height :140px;
   }
   .center {
       margin: 0;
       position: absolute;
       left: 50%;
       -ms-transform: translate(-50%, -50%);
       transform: translate(-50%, -50%);
   }
   #dog-training-content-cards{
   display:block!important;
   }
   #dog-training-content-cards-mob{
   display:none!important;
   }
    #services-online-dog-training-video-mob{
       display:none!important;
   }
   #services-online-dog-training-video{
       display:block!important;
   }
   @media only screen and (max-width: 600px) {
   .spacing-top-lg {
   padding-top: 0px!important;
   }
   #dog-training-content-cards{
   display:none!important;
   }
   #dog-training-content-cards-mob{
   display:block!important;
   }
   #services-online-dog-training-video{
       display:none!important;
   }
   #services-online-dog-training-video-mob{
       display:block!important;
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
                        <span>Dog Training</span>
                        </a>
                     </li>
         </ul>
</div>
<!-- main content -->

         <img src="{{asset('images/dogTraining.png')}}" alt="bannerimage" class="imgBanner"/>
         <div id="main">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <br>
                  </div>
                  <div class="left_espot">
                     <section class="spacing-top-lg spacing-bottom-md">
                        <div id="dog-training-content-cards">
                           <div class="container">
                              <div class="row">
                                 <?php $myPointOnline = App\Models\Point::where('service_id',"40")->orderBy('id','asc')->get();  ?>
                                 @foreach($myPointOnline as $element)
                                 <div class="col-12 col-12-sm heading-holder">
                                    {!!  $element->point !!}
                                 </div>
                                 @endforeach
                              </div>
                              <div class="row">
                                 <?php $card = App\Models\ImgInfoCard::findOrFail(23);  ?>
                                 <div class="col-6 col-12-sm content-holder">
                                    <a href="{{ url('/in-store-dog-training') }}" >
                                    <img src="{{ asset( $card->image_path ) }}" class="center-block img-responsive"></a>
                                    <div class="text-holder">
                                       {!! $card->info !!}
                                       <div class="btn-holder mt-3">
                                          <a href="{{ url('/in-store-dog-training') }}" class="btn-category slide_right">Learn More</a>
                                       </div>
                                    </div>
                                 </div>
                                 <?php $card = App\Models\ImgInfoCard::findOrFail(24);  ?>
                                 <div class="col-6 col-12-sm content-holder">
                                    <a href="{{ asset('/online-dog-training-courses') }}" >
                                    <img src="{{ asset($card->image_path) }}" lazyimg="loaded" class="center-block img-responsive"></a>
                                    <div class="text-holder">
                                       {!! $card->info !!}
                                       <div class="btn-holder">
                                          <a href="{{ asset('/online-dog-training-courses') }}" class="btn-category slide_right">Learn More</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--Mobile-->
                        <div id="dog-training-content-cards-mob">
                           <div class="container">
                              <?php $myPointOnline = App\Models\Point::where('service_id',"40")->orderBy('id','asc')->get();  ?>
                              @foreach($myPointOnline as $element)
                              <div class="p-3">
                                 {!!  $element->point !!}
                              </div>
                              @endforeach
                              <div class="row text-center">
                                 <?php $card = App\Models\ImgInfoCard::findOrFail(23);  ?>
                                 <div class="col-12 col-12-sm content-holder">
                                    <a href="{{ url('/in-store-dog-training') }}" >
                                    <img src="{{ asset( $card->image_path ) }}" class="center-block img-responsive"></a>
                                    <div class="text-holder">
                                       {!! $card->info !!}
                                       <div class="btn-holder m-3">
                                          <a href="{{ url('/in-store-dog-training') }}" class="btn-category slide_right">Learn More</a>
                                       </div>
                                    </div>
                                 </div>
                                 <?php $card = App\Models\ImgInfoCard::findOrFail(24);  ?>
                                 <div class="col-12 col-12-sm content-holder">
                                    <a href="{{ asset('/online-dog-training-courses') }}" >
                                    <img src="{{ asset($card->image_path) }}" lazyimg="loaded" class="center-block img-responsive"></a>
                                    <div class="text-holder">
                                       {!! $card->info !!}
                                       <div class="btn-holder m-3">
                                          <a href="{{ asset('/online-dog-training-courses') }}" class="btn-category slide_right">Learn More</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <br><br>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div id="articles" class="articles-3 spacing-top-md spacing-bottom-md">
   <div class="container">
      <h2 class="pb-3">Pet well-being tips from our experts</h2>
      <div class="row">
         <?php $myCard=App\Models\ImgInfoCard::findOrFail(25); ?>
         <div class="col content-holder pt-4">
            <img src="{{ asset($myCard->image_path) }}" class="center-block img-responsive">
            <div class="text-holder">
               {!! $myCard->info !!}
            </div>
         </div>
         <?php $myCard=App\Models\ImgInfoCard::findOrFail(26); ?>
         <div class="col content-holder pt-4">
            <img src="{{ asset($myCard->image_path) }}" class="center-block img-responsive">
            <div class="text-holder">
               {!! $myCard->info !!}
            </div>
         </div>
         <?php $myCard=App\Models\ImgInfoCard::findOrFail(27); ?>
         <div class="col content-holder pt-4">
            <img src="{{ asset($myCard->image_path) }}" class="center-block img-responsive">
            <div class="text-holder">
               {!! $myCard->info !!}
            </div>
         </div>
      </div>
   </div>
   <br>
   <br>
</div>
<div id="services-online-dog-training-video">
   <div class="container">
      <div class="row">
         <?php $onlineStore = App\Models\ServiceContent::findOrFail(47);   ?>
         <div class="column heading-holder">
            {!! $onlineStore->topic !!}
         </div>
      </div>
      <div class="row">
         <div class="column">
            <div class="video-holder">
               <iframe class="video" src="{{ $onlineStore->image_path }}" allowfullscreen=""></iframe>
            </div>
            <div class="heading-holder">
               {!! $onlineStore->information !!}
            </div>
         </div>
      </div>
   </div>
</div>
<!--Mobile-->
<div id="services-online-dog-training-video-mob">
   <div class="container">
      <div class="row">
         <?php $onlineStore = App\Models\ServiceContent::findOrFail(47);   ?>
         <div class="column heading-holder">
            {!! $onlineStore->topic !!}
         </div>
      </div>
      <div class="row">
         <div class="column">
            <div class="video-holder">
               <iframe class="video" src="{{ $onlineStore->image_path }}" allowfullscreen=""></iframe>
            </div>
            <div class="heading-holder">
               {!! $onlineStore->information !!}
            </div>
         </div>
      </div>
   </div>
</div>
<section id="trainer">
   <div class="container text-center">
      <?php $myPointOnline = App\Models\Point::findOrFail(91); ?>
      {!! $myPointOnline->point !!}
      <div class="row align-items-center">
         <?php $myTestimonial1=App\Models\Testimonial::findOrFail(4); ?>
         <div class="column" style="height:545px;">
            <img src="{{ $myTestimonial1->photo }}" class="imgTrainer">
            <br>
            {!! $myTestimonial1->review !!}
            <br>
            {!! $myTestimonial1->custumer !!}
         </div>
         <?php $myTestimonial2=App\Models\Testimonial::findOrFail(5); ?>
         <div class="column" style="height:545px;">
            <img src="{{ $myTestimonial2->photo }}" class="imgTrainer">
            <br>
            {!! $myTestimonial2->review !!}
            <br>
            {!! $myTestimonial2->custumer !!}
         </div>
         <?php $myTestimonial3=App\Models\Testimonial::findOrFail(6); ?>
         <div class="column" style="height:545px;">
            <img src="{{ $myTestimonial3->photo }}" class="imgTrainer">
            <br>
            {!! $myTestimonial3->review !!}
            <br>
            {!! $myTestimonial3->custumer !!}
         </div>
      </div>
   </div>
</section>
@include('MyServices.trainingIncludeBlock')
@include('MyServices.TrainingIncludeFAQ')
@endsection