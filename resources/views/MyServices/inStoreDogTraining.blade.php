@extends('layouts.myApp')
@section('content')

<link rel="stylesheet" href="{{ asset('css/inStoreDogTraining.css') }}">
<style>
 .imgBanner{
       width:100%!important;
       height:100%!important;
   }
   #services-in-store-training-video{
            display:block!important;
        }
        #services-in-store-training-video-mob{
            display:none!important;
        }
        #services-in-store-training-tab-content{
            display:block!important;
        }
        #services-in-store-training-tab-content-mob{
            display:none!important;
        }
    @media only screen and (max-width: 600px) {
        #services-in-store-training-video-mob{
            display:block!important;
        }
        #services-in-store-training-video{
            display:none!important;
        }
        #services-in-store-training-tab-content-mob{
            display:block!important;
        }
        #services-in-store-training-tab-content{
            display:none!important;
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
                        <a href="{{ url('dog-training') }}">
                        <span>Dog Training</span>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <span>In Store Dog Training</span>
                        </a>
                     </li>
         </ul>
</div>

         <img src="{{asset('images/instoreDogTrainingBanner.png')}}" alt="bannerimage" class="imgBanner"/>
         <div class="booknow">
            
            <form action="{{ route('appointment.service',) }}" method="POST">
               @csrf
               <input type="hidden" name="service_name" value="Instore Dog Training" />
            <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
            </form>
         </div>
      <div id="main">
         <div class="page-home">
            <div class="container">
               <div class="about-us-content">
                  <br>
               </div>
               <div id="services-in-store-training-video">
                  <div class="container">
                     <div class="row">
                         <?php $myData1 = App\Models\ServiceContent::findOrFail(45);   ?>
                        <div class="col-12 col-12-sm heading-holder">
                           {!!  $myData1->topic !!}
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-12-sm">
                           <div class="video-holder">
                              <iframe class="video" src="{{ $myData1->image_path }}" allowfullscreen=""></iframe>
                           </div>
                           <div class="heading-holder">
                              {!!  $myData1->information !!}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--Mobile-->
               <div id="services-in-store-training-video-mob">
                   <div class="container">
                      <?php $myData1 = App\Models\ServiceContent::findOrFail(45);   ?>
                      <div class="p-3 heading-holder">
                         {!!  $myData1->topic !!}
                      </div>
                      <div class="p-3">
                         <div class="video-holder">
                            <iframe class="video" src="{{ $myData1->image_path }}" allowfullscreen=""></iframe>
                         </div>
                         <div class="heading-holder">
                            {!!  $myData1->information !!}
                         </div>
                      </div>
                   </div>
                </div>
               <div id="services-in-store-training-tab-content">
                  <div class="container" id="mujeer">
                     <div class="row text-center margin-bottom-xlg">
                        <div class="col-12 col-12-sm">
                            <?php $myPoint = App\Models\Point::findOrFail(1);  ?>
                           {!! $myPoint->point !!}
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-12-sm scrollbar">
                           <div class="category-row">
                              <ul class="category-selector">
                                 <li class="category active" id="tab-category1" onclick="OpenCategory01()" >
                                    <div class="category-title">Private Classes</div>
                                    <div class="active-indicator"></div>
                                 </li>
                                 <li class="category" id="tab-category2" onclick="OpenCategory02()">
                                    <div class="category-title">Group Classes</div>
                                    <div class="active-indicator"></div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-12 col-12-sm  tab-content-container">
                           <div class="container">
                              <div class="tab-content active" id="tab-1">
                                 <div class="row">
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(2);  ?>
                                                    {!! $myPoint->point !!}  
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(3);  ?>
                                                    {!! $myPoint->point !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(4);  ?>
                                                    {!! $myPoint->point !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(5);  ?>
                                                    {!! $myPoint->point !!}
                                                <br>
                                                <p style="text-align: center;"><a href="{{ url('register') }}" class="btn-category slide_right">Sign Up</a></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-content" id="tab-2">
                                 <div class="row">
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row row-1-2">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                 <?php $myPoint = App\Models\Point::findOrFail(6);  ?>
                                                    {!! $myPoint->point !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row row-1-2">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(7);  ?>
                                                    {!! $myPoint->point !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-12-sm">
                                       <div class="content-holder">
                                          <div class="row single-classes">
                                             <div class="col-12 col-12-sm padding-left-lg">
                                                <?php $myPoint = App\Models\Point::findOrFail(8);  ?>
                                                    {!! $myPoint->point !!}
                                             </div>
                                          </div>
                                          
                                          <div class="row">
                                               <?php $card = App\Models\ImgInfoCard::findOrFail(1);  ?>
                                            
                                             <div class="col-2">
                                                <div class="img-holder">
                                                   <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" alt="" class="center-block img-responsive">
                                                </div>
                                             </div>
                                             <div class="column">
                                                {!! $card->info !!}
                                             </div>
                                          </div>
                                          <div class="row ">
                                              <?php $card1 = App\Models\ImgInfoCard::findOrFail(2);  ?>
                                             <div class="col-2">
                                                <div class="img-holder">
                                                   <img src="{{ asset($card1->image_path) }}" lazyimg="loaded" data-src="{{ asset($card1->image_path) }}" alt="" class="center-block img-responsive">
                                                </div>
                                             </div>
                                             <div class="column">
                                                {!! $card1->info !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--Mobile-->
               <div id="services-in-store-training-tab-content-mob">
   <div class="container">
      <div class="text-center margin-bottom-xlg">
            <?php $myPoint = App\Models\Point::findOrFail(1);  ?>
            {!! $myPoint->point !!}
         </div>
         
        <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    
                                    <th class="text-center" colspan="2">
                                       <h4>Private Classes</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td  scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <?php $myPoint = App\Models\Point::findOrFail(2);  ?>
                                 		{!! $myPoint->point !!}
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                 <?php $myPoint = App\Models\Point::findOrFail(3);  ?>
                                 {!! $myPoint->point !!}
                              </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                 <?php $myPoint = App\Models\Point::findOrFail(4);  ?>
                                 {!! $myPoint->point !!}
                              </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                 <?php $myPoint = App\Models\Point::findOrFail(5);  ?>
                                 {!! $myPoint->point !!}
                                 <br>
                                 <p style="text-align: center;"><a href="{{ url('register') }}" class="btn-category slide_right">Sign Up</a></p>
                              </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table> 
         
          <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    
                                    <th class="text-center" colspan="2">
                                       <h4>Group Classes</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td  scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <?php $myPoint = App\Models\Point::findOrFail(6);  ?>
                                 		{!! $myPoint->point !!}
                                       </div>
                                    </td>
                                 </tr>
                                  <tr>
                                    <td  scope="row" class="pl-3">
                                 <div class="col-12 col-12-sm padding-left-lg">
                                 <?php $myPoint = App\Models\Point::findOrFail(7);  ?>
                                 {!! $myPoint->point !!}
                              </div>
                              </td>
                                 </tr>
                              
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-4 col-4-sm text-center p-3">
                                 <?php $card = App\Models\ImgInfoCard::findOrFail(1);  ?>
                                 <img src="{{ asset($card->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" alt="" class="center-block img-responsive">
                              </div>
                              <div class="col">
                                 {!! $card->info !!}
                              </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-4 col-4-sm p-3">
                                <?php $card1 = App\Models\ImgInfoCard::findOrFail(2);  ?>
                                 <img src="{{ asset($card1->image_path) }}" lazyimg="loaded" data-src="{{ asset($card->image_path) }}" alt="" class="center-block img-responsive">
                              </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td scope="row" class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                 
                                 {!! $card1->info !!}
                              
                              </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table> 
         
         
         
         
         </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<br>
<h3 class="text-center">Training Takes Mentors</h3>
<p class="text-center p-5">Enjoy peace of mind knowing your dog is in good hands. We've helped more than 1 million families with our positive training methods and recommendations. Learn more about some of our trainers credentials and expertise.</p>
<div class="row text-center" style="margin-left: 3px;">
   <div class="column">
      <img src="{{ asset('images/training-instore-mentors-icon-1.png') }}" alt="">
      <h4>Proven method</h4>
      <p>We've cheered on more than one million successful dog graduates as they've gained the skills and confidence needed to better enjoy life with their pet parents.</p>
   </div>
   <div class="column">
      <img src="{{ asset('images/training-instore-mentors.png') }}" alt="">
      <h4>AKC-certified</h4>
      <p>All our Petco-certified trainers are AKC CGC evaluators and are taught science-based training principles that reward appropriate behaviors instead of punishing negative ones.</p>
   </div>
   <div class="column">
      <img src="{{ asset('images/training-instore-mentors-icon-3.png') }}" alt="">
      <h4>360º health and wellness advisor</h4>
      <p>From nutrition recommendations to our favorite products and training tools, we’ll be by your side with guidance throughout every stage of you and your dog’s life together.</p>
   </div>
</div>
@include('MyServices.TrainingIncludeFAQ')
<script>
   var x1 = document.getElementById("tab-1");
   var x2 = document.getElementById("tab-2");
   var x3 = document.getElementById("tab-3");
   var x4 = document.getElementById("tab-4");
   var a1 = document.getElementById("tab-category1");
   var a2 = document.getElementById("tab-category2");
   
   
   function OpenCategory01()
   {
      
      x1.style.display = "block";
      x2.style.display = "none";
      a1.classList.add("active");
      a2.classList.remove("active");
   
   }
   function OpenCategory02()
   {
      
      x2.style.display = "block";
      x1.style.display = "none";
      a2.classList.add("active");
      a1.classList.remove("active");
      
   }
</script>
@endsection