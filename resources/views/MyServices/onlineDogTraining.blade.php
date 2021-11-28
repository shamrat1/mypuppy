@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<link rel="stylesheet" href="{{ asset('css/onlineDogTraining.css') }}">
<style>
.imgBanner{
       width:100%!important;
       height:100%!important;
   }
   .background-img-newsaltwaterfish-hero-container {
       background-image: url(images/onlineDogTraining.png);
       background-repeat: no-repeat;
       background-size: cover;
       background-position: center fixed;
       max-width: 1440px!important;
       padding: 50px;
       margin-left:5px!important;
       height: 180px;
   }
   .imgTrainer {
       width: 140px;
       height :140px;
       border-radius: 100%;
   }
  .imgOnline {
      width: 500px;
      height: 300px;
      border: 2px solid #fff;"
  }
  .center {
      margin: 0;
      position: absolute;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    #services-online-dog-training-video {
          display:block!important;
      }
      #services-online-dog-training-video-mob {
          display:none!important;
      }
      #services-online-dog-training-cards {
          display:block!important;
      }
      #services-online-dog-training-cards-mob {
          display:none!important;
      }
       #services-online-dog-training-positivity-bnr{
          display:block!important;
      }
       #services-online-dog-training-positivity-bnr-mob{
          display:none!important;
      }
       #desktop-booking-class{
          display:block!important;
      }
    @media only screen and (max-width: 600px) {
     .imgFaq {
       height: 100%!important;
       width: 100%!important;  
       }
      #services-online-dog-training-video {
          display:none!important;
      }
      #services-online-dog-training-video-mob {
          display:block!important;
      }
      #services-online-dog-training-cards {
          display:none!important;
      }
      #services-online-dog-training-cards-mob {
          display:block!important;
      }
       #services-online-dog-training-positivity-bnr-mob{
          display:block!important;
      }
      #services-online-dog-training-positivity-bnr{
           display:none!important;
      }
      #desktop-booking-class{
          display:none!important;
      }
      
      .imgOnline {
          width: 100%!important;
          height: 100%!important;
          border: 2px solid #fff;"
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
                        <span>Online Dog Training Courses</span>
                        </a>
                     </li>
         </ul>
</div>

         <img src="{{asset('images/onlineDogTraining.png')}}" alt="bannerimage" class="imgBanner"/>
         <div class="booknow">
            
            <form action="{{ route('appointment.service',) }}" method="POST">
               @csrf
               <input type="hidden" name="service_name" value="Online Dog Training" />
            <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
            </form>
         </div>
      <div id="main">
         <div class="page-home">
            <div class="container">
               <div class="about-us-content">
                  <br>
               </div>
               <div id="services-online-dog-training-video">
                  <div class="container">
                     <div class="row">
                         <?php $onlineStore = App\Models\ServiceContent::findOrFail(46);   ?>
                        <div class="col-12 colmd-12 heading-holder">
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
                         <?php $onlineStore = App\Models\ServiceContent::findOrFail(46);   ?>
                        <div class="col-12 colmd-12 heading-holder">
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
                
                  <div id="services-online-dog-training-cards">
                     <div class="container">
                        <div class="row">
                            <?php $myPoint = App\Models\Point::findOrFail(9); ?>
                           <div class="column heading-holder">
                              {!! $myPoint->point !!}
                           </div>
                        </div>
                        <div class="row">
                           <div class="column">
                               <?php $myPoint = App\Models\Point::findOrFail(10); ?>
                              <div class="text-holder">
                                 {!! $myPoint->point !!}
                              </div>
                           </div>
                           <div class="column">
                              <div class="text-holder">
                                 <?php $myPoint = App\Models\Point::findOrFail(11); ?>
                              <div class="text-holder">
                                 {!! $myPoint->point !!}
                              </div>
                              </div>
                           </div>
                           <div class="column">
                              <div class="text-holder">
                               <?php $myPoint = App\Models\Point::findOrFail(12); ?>
                              <div class="text-holder">
                                 {!! $myPoint->point !!}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--Mobile-->
               <div id="services-online-dog-training-cards-mob">
   <div class="container">
      <div class="row">
         <?php $myPoint = App\Models\Point::findOrFail(9); ?>
         <div class="col-12 colmd-12 heading-holder">
            {!! $myPoint->point !!}
         </div>
      </div>
      <div class="row">
         <div class="col-12 colmd-12">
            <?php $myPoint = App\Models\Point::findOrFail(10); ?>
            <div class="text-holder">
               {!! $myPoint->point !!}
            </div>
         </div>
         <div class="col-12 colmd-12">
            <div class="text-holder">
               <?php $myPoint = App\Models\Point::findOrFail(11); ?>
               <div class="text-holder">
                  {!! $myPoint->point !!}
               </div>
            </div>
         </div>
         <div class="col-12 colmd-12">
            <div class="text-holder">
               <?php $myPoint = App\Models\Point::findOrFail(12); ?>
               <div class="text-holder">
                  {!! $myPoint->point !!}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
               <div class="left_espot">
                  <section class="spacing-bottom-lg bg-white">
                     <div id="services-online-dog-training-positivity-bnr">
                        <div class="bg-holder"></div>
                        <div class="container">
                            <?php $card = App\Models\ImgInfoCard::findOrFail(7); ?>
                           <div class="row">
                              <div class="column img-holder">
                                 <img src="{{ asset($card->image_path)}}" lazyimg="loaded"  class="imgOnline center-block" alt="Woman and dog spending time on couch together">
                              </div>
                              <div class="column text-holder">
                                 {!! $card->info !!}
                                 <form action="{{ url('dog-training') }}" method="get">
                                    <button type="submit" class="primary-cta-blue" onclick="clickTrackLink(this);">Learn More</button>
                                 </form>
                                 <br>
                                 <button class="primary-cta-blue" onclick="clickTrackLink(this);">Book A Training Class</button>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--Image-->
                     <div id="services-online-dog-training-positivity-bnr-mob">
                       <div class="bg-holder"></div>
                       <div class="container">
                          <?php $card = App\Models\ImgInfoCard::findOrFail(7); ?>
                          <div class="row">
                             <div class="col-12 col-md-12 img-holder">
                                <img src="{{ asset($card->image_path)}}" lazyimg="loaded"  class="imgOnline center-block" alt="Woman and dog spending time on couch together">
                             </div>
                             <div class="col-12 col-md-12 text-holder">
                                {!! $card->info !!}
                                <form action="{{ url('dog-training') }}" method="get">
                                   <button type="submit" class="primary-cta-blue">Learn More</button>
                                </form>
                                <br>
                                <button class="primary-cta-blue" onclick="clickTrackLink(this);">Book A Training Class</button>
                             </div>
                          </div>
                       </div>
                    </div>
                  </section>
               </div>
               <section id="trainer" class="alert alert-info">
                   <?php $myPointOnline = App\Models\Point::findOrFail(88); ?>
                   {!! $myPointOnline->point !!}
                   <div class="row  align-items-center ">
                       <?php $myTestimonial1=App\Models\Testimonial::findOrFail(2); ?>
                        <div class="col mt-5 mb-5" style="height:420px;">
                            <table>
                                <tr>
                                    <td class="p-3"><img src="{{ $myTestimonial1->photo }}" class="imgTrainer"></td>
                                    <td class="p-3">{!! $myTestimonial1->custumer !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="p-5">{!! $myTestimonial1->review !!}</td>
                                </tr>
                            </table>
                        </div>
                        <?php $myTestimonial2=App\Models\Testimonial::findOrFail(3); ?>
                        <div class="col mt-5 mb-5" style="height:420px;">
                            <table>
                                <tr>
                                    <td class="p-3"><img src="{{ $myTestimonial2->photo }}" class="imgTrainer"></td>
                                    <td class="p-3">{!! $myTestimonial2->custumer !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="p-5">{!! $myTestimonial2->review !!}</td>
                                </tr>
                            </table>
                        </div>
                   </div>
                   
                   <div class="container m-5 p-5">
                       <div id="desktop-booking-class">
                           <div class="center">
                              <button class="primary-cta-blue" >BOOK A TRAINING CLASS</button>
                           </div>
                        </div>
                   </div>
                </section>
                @include('MyServices.trainingIncludeBlock')
               <div class="container-fluid">
                  <div class="row align-items-center">
                     <div class="col-lg-7 col-md-12">
                        <div class="faq-accordion">
                           <h3>Frequently Asked Questions</h3>
                           <ul class="accordion">
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> How will this be different from my in-store experience?
                                 </a>
                                 <p class="accordion-content">
                                    Our online dog training classes have been designed and curated by our Petco Certified dog trainers to meet the needs of pets and pet parents while also being able to approach through an online setting. While it’s not the same curriculum that we use in our in-store classes, it does address the important needs of pets in new ways so that we can teach pet parents how to be effective at guiding their pets through training.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> What platform are we using to host the classes?
                                 </a>
                                 <p class="accordion-content">
                                    We are using Zoom to host all of our online dog training classes.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> Why do I have to pick my time zone?
                                 </a>
                                 <p class="accordion-content">
                                    Choosing your time zone allows us to show the exact day and time that your class will be held in your time zone, and your trainer's schedule will be set up for that time zone too!
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> Are certain computer requirements needed to make this work on my computer?
                                 </a>
                                 <p class="accordion-content">
                                    See Zoom's recommendations on computer requirements here.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> Who are the trainers I'll be working with?
                                 </a>
                                 <p class="accordion-content">
                                    The MPMP Certified dog trainers you'll be working with through our online dog training offering are Senior dog trainers and are highly experiences. Read their bios above to find out more information on each trainer and find the trainer in your time zone.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i>How will I get the invite to my virtual class?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    You will receive the link to your zoom class 24 hours after you sign up for classes. Once received, keep this link in your records to access on the day of your class. Due to high demand, it might take trainers a longer period of time.
                                    <br> ★ If you don't receive the confirmation email from your trainer within 48 hours, please do the following: 
                                    <br> ★ Check your spam folder
                                    <br> ★ Check to make sure the email in your account is correct
                                    <br> ★ Contact Petco's customer care team to help 
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i>Will other participants be able to see me?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    In our 4-session group classes, yes, other participants will be able to see you during the class, and you'll learn together! In our single-session PRO classes, other participants will not be able to see you, and you'll just see the trainer.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i>What's the difference between 4-session group classes and single-session PRO classes?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    <br> ★ 4 sessions long
                                    <br> ★ 6 participants max
                                    <br> ★ Cover a variety of behaviors and topics
                                    <br> ★ Allow for one-on-one discussion with trainer
                                    <br> ★ Pet parent and dog actively participate in class
                                    <br>
                                    <br><strong>PRO sessions</strong>
                                    <br> ★ One session each
                                    <br> ★ Large number of attendees
                                    <br> ★ Deep dive into one particular, unique topic
                                    <br> ★ Limited chat-based Q&A at end with Trainer
                                    <br> ★ Observation only 
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> What if I want a different day or time than those listed?
                                 </a>
                                 <p class="accordion-content">
                                    There will be new classes added to the schedule regularly. Keep an eye on the website to find a day and time that works for you in your time zone.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> Can I join a group class that has already started?
                                 </a>
                                 <p class="accordion-content">
                                    Unfortunately, once a class has started, registration closes.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> What if I miss my class?
                                 </a>
                                 <p class="accordion-content">
                                    You'll get your trainer's information in your confirmation email. Reach out to them to discuss what to do if you miss your class.
                                 </p>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-12">
                        <div class="p-3">
                            <img src="{{ asset('images/faq-img1.png') }}" class="imgFaq" alt="image">
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
<br>

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
       $("#toggleMe1").click(function(){
         $("#showhide2").toggle(1000);
       });
       $("#toggleMe2").click(function(){
           $("#showhide3").toggle(1000);
         });
     });
    
   
   
</script>
@endsection