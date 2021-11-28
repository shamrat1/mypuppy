@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<link rel="stylesheet" href="{{ asset('css/DogGuideStyle.css') }}">
<style>
   .imgBanner{
   width:100%!important;
   height:100%!important;
   }
   .imageVitalCare {
   background-size: auto 375px;
   background-color: #06FF86;
   height: 235px;
   width: 100%;
   margin: 0;
   }
   .imgInsurance {
   background-size: auto 220px;
   background-color: #06FF86;
   height: 235px;
   width: 100%;
   margin: 0;
   }
   .imgPay{
   background-size: auto 220px;
   background-color: #06FF86;
   height: 235px;
   width: 100%;
   margin: 0;
   }
   .iconimg{
   margin: 10px 70px;
   height: 40px!important;
   width: auto;
   }
   #new-pet-services-mob{
           display:none!important;
       }
       #new-pet-services{
           display:block!important;
       }
        #new-dog-articles-mob {
           display:none!important;
       }
        #new-dog-articles {
           display:block!important;
       }
        #pupbox-bnr-mob{
           display:none!important;
       }
        #pupbox-bnr{
           display:block!important;
       }
   @media only screen and (max-width: 600px) {
       #new-pet-services-mob{
           display:block!important;
       }
       #new-pet-services{
           display:none!important;
       }
       #new-dog-articles-mob {
           display:block!important;
       }
        #new-dog-articles {
           display:none!important;
       }
       #pupbox-bnr-mob{
           display:block!important;
       }
        #pupbox-bnr{
           display:none!important;
       }
       .imgFaq {
   height: 100%!important;
   width: 100%!important;  
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
               <span>New Dog Guides</span>
               </a>
            </li>
         </ul>
</div>


   <img src="{{ asset('images/dogGuideBanner.png') }}" alt="bannerimage" class="imgBanner">
   <div id="main" style="margin-bottom:15px; ">
      <div class="page-home">
         <div class="container">
            <div class="about-us-content">
               <br>
               @include('newDogInclude')
               <section class="spacing-top-md spacing-bottom-md bg-white">
                  <div id="pet-parenting-made-easy">
                     <div class="container">
                        <div class="row text-center">
                           <div class="column heading-holder">
                              <h2>Pet parenting made easy</h2>
                              <p>Discover plans that help make caring for your pet easier—and more rewarding.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="column text-holder">
                              <img src="{{ asset('images/memberships-vital-care-hair-brush-img.png') }}" class="imageVitalCare" />
                              <div>
                                 <img src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/membership-vital-care-logo" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/membership-vital-care-logo" class="iconimg img-responsive" alt="Petco Vital Care">
                                 <h4>Routine wellness<br> made affordable</h4>
                                 <p>Routine care makes a lifelong difference. Our experts developed an annual plan dedicated to your pet’s wellness needs with savings on full-service grooming visits, routine vet exams and more for $19 a month.*</p>
                                 <p><a href="#" class="main-link clickable" >Enroll Now</a></p>
                                 <p class="disclaimer-text">*Annual commitment required.</p>
                              </div>
                           </div>
                           <div class="column text-holder">
                              <img src="{{ asset('images/pals-rewards-petco-insurance-shield-img.png') }}" class="imgInsurance" />
                              <div>
                                 <img src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/petco-insurance-logo" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/petco-insurance-logo" class="iconimg img-responsive" alt="Petco Protect">
                                 <h4>Trusted insurance protection from pet experts</h4>
                                 <p>From accidents to illnesses, be ready for anything with insurance coverage that helps ensure you don’t have to choose between quality care for your pet and paying your bill.</p>
                                 <p><a href="/shop/PetcoInsuranceView?catalogId=10051&amp;langId=-1&amp;storeId=10151" class="main-link clickable" manual_cm_sp="newdog:na:petplans:2:insurance:getafreequote">Get A Free Quote</a></p>
                              </div>
                           </div>
                           <div class="column text-holder">
                              <img src="{{ asset('images/pals-rewards-petco-pay-dog-img.png') }}" class="imgPay"/>
                              <div>
                                 <img src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/petco-pay-logo" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/h_72,f_auto,q_auto:best,dpr_2.0/petco-pay-logo" class="iconimg img-responsive" alt="Petco Pay">
                                 <h4>Meet the credit<br> card for pet lovers</h4>
                                 <p>Earn 8% back¹ in Pals Rewards at Petco plus get 20% off your first purchase⁴ when you use your Petco Pay credit card the same day you open an account.</p>
                                 <p><a href="#" class="main-link clickable">Learn More</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="spacing-top-md spacing-bottom-md">
                  <div id="new-pet-services">
                     <div class="container">
                        <div class="row">
                           <div class="col-12 col-12-sm heading-holder">
                              <h2>Services that support their health</h2>
                              <p>We are your one-stop destination for everything you and your new friend need to enjoy a happy, successful life together.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-positive-training-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-positive-training-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-training-diploma" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-training-diploma" class="center-block">
                                 <h4>Training classes</h4>
                                 <p>We offer positive reinforcement classes online and in store to support your dog’s total well-being.</p>
                                 <p><a href="{{ url('dog-training') }}">Learn More</a></p>
                              </div>
                           </div>
                           <div class="col-4 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-vet-services-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-vet-services-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/services-stethoscope" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/services-stethoscope" class="center-block">
                                 <h4>Vet services</h4>
                                 <p>We are committed to delivering compassionate vet care with a broad range of affordable, personalized solutions.</p>
                                 <p><a href="#">Find a Vet</a></p>
                              </div>
                           </div>
                           <div class="col-4 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-grooming-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-grooming-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-grooming" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-grooming" class="center-block">
                                 <h4>Grooming</h4>
                                 <p>The grooming destination that puts your pet’s health first with personalized solutions.</p>
                                 <p><a href="{{ url('dog-grooming') }}">Learn More</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Mobile-->
                  <div id="new-pet-services-mob">
                     <div class="container">
                        <div class="row">
                           <div class="col-12 col-12-sm heading-holder">
                              <h2>Services that support their health</h2>
                              <p>We are your one-stop destination for everything you and your new friend need to enjoy a happy, successful life together.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-positive-training-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-positive-training-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-training-diploma" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-training-diploma" class="center-block">
                                 <h4>Training classes</h4>
                                 <p>We offer positive reinforcement classes online and in store to support your dog’s total well-being.</p>
                                 <p><a href="{{ url('shop',1) }}">Learn More</a></p>
                              </div>
                           </div>
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-vet-services-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-vet-services-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/services-stethoscope" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/services-stethoscope" class="center-block">
                                 <h4>Vet services</h4>
                                 <p>We are committed to delivering compassionate vet care with a broad range of affordable, personalized solutions.</p>
                                 <p><a href="#">Find a Vet</a></p>
                              </div>
                           </div>
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-grooming-700x500" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/q_auto:best,dpr_2.0/services-grooming-700x500" class="img-responsive">
                              <div class="text-holder">
                                 <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-grooming" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/membership-icon-grooming" class="center-block">
                                 <h4>Grooming</h4>
                                 <p>The grooming destination that puts your pet’s health first with personalized solutions.</p>
                                 <p><a href="{{ url('dog-grooming') }}">Learn More</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="spacing-top-md spacing-bottom-md">
                  <div id="training-takes-positivity">
                     <div class="container">
                        <div class="row">
                           <div class="col-12 col-12-sm heading-holder">
                              <h2>Training takes positivity</h2>
                              <p>We believe in the power of positive reinforcement training, guided by expert tested methods meant to build trust and support your dog’s physical, social, and mental health.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-12-sm video-holder">
                              <iframe class="video" src="https://www.youtube.com/embed/rsrUcFKytwg" allowfullscreen=""></iframe>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="spacing-top-md spacing-bottom-md">
                  <div id="pupbox-bnr">
                     <div class="container">
                        <div class="row">
                           <div class="col-6 img-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/pupbox-bnr-img-1108x580" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/pupbox-bnr-img-1108x580" alt="PupBox" class="center-block img-responsive">
                           </div>
                           <div class="col-6 content-holder">
                              <div class="text-holder">
                                 <h2>Puppyhood is hard.</h2>
                                 <h2>PupBox makes it easier.</h2>
                                 <p>Toys, treats and training guides customized for your puppy and delivered monthly.</p>
                                 <div class="btn-holder">
                                    <a href="#" onclick="clickTrackLink(this);"  target="_blank">
                                    <button class="btn-category slide_right">GET STARTED</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Mobile pupbox-->
                  <div id="pupbox-bnr-mob">
                     <div class="container alert alert-primary">
                        <div class="row">
                           <div class="col-12 col-12-sm img-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/pupbox-bnr-img-1108x580" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/pupbox-bnr-img-1108x580" alt="PupBox" class="center-block img-responsive">
                           </div>
                           <div class="col-12 col-12-sm content-holder">
                              <div class="text-holder">
                                 <h2>Puppyhood is hard.</h2>
                                 <h2>PupBox makes it easier.</h2>
                                 <p>Toys, treats and training guides customized for your puppy and delivered monthly.</p>
                                 <div class="btn-holder">
                                    <a href="#"   target="_blank">
                                    <button class="btn-category slide_right">GET STARTED</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="spacing-top-md spacing-bottom-md">
                  <div id="new-dog-articles">
                     <div class="container">
                        <div class="row">
                           <div class="col-12 col-12-sm heading-holder">
                              <h2>New dog tips and tricks from the experts</h2>
                              <p>Set yourself up for success with these useful resources.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-1" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-1" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>How to potty train a puppy: Tips for new pet parents</h3>
                                 <p class="text-center"><a href="{{ url('Tips-and-Tricks-for-Housetraining-a-Puppy-or-Dog') }}" class="text-center">Read More</a></p>
                              </div>
                           </div>
                           <div class="col-4 content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-2" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-2" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>How to transition your dog or cat to a new food</h3>
                                 <p class="text-center"><a href="{{ url('how-to-transition-your-dog-or-cat-to-a-new-food')}}">Read More</a></p>
                              </div>
                           </div>
                           <div class="col-4 content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-3" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-3" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>Dog behavior training: 12 habits to change</h3>
                                 <p class="text-center"><a href="{{ url('Learn-How-to-Reward-Good-Dog-Behaviors-and-Discourage-Unwanted-Behaviors') }}">Read More</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Mobile new dog articles-->
                  <div id="new-dog-articles-mob">
                     <div class="container">
                        <div class="row">
                           <div class="col-12 col-12-sm heading-holder">
                              <h2>New dog tips and tricks from the experts</h2>
                              <p>Set yourself up for success with these useful resources.</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-1" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-1" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>How to potty train a puppy: Tips for new pet parents</h3>
                                 <p class="text-center"><a href="{{ url('Tips-and-Tricks-for-Housetraining-a-Puppy-or-Dog') }}" class="text-center">Read More</a></p>
                              </div>
                           </div>
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-2" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-2" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>How to transition your dog or cat to a new food</h3>
                                 <p class="text-center"><a href="{{ url('how-to-transition-your-dog-or-cat-to-a-new-food')}}">Read More</a></p>
                              </div>
                           </div>
                           <div class="col-12 col-12-sm content-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-3" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0/new-pet-dog-article-3" class="center-block img-responsive">
                              <div class="text-holder">
                                 <h3>Dog behavior training: 12 habits to change</h3>
                                 <p class="text-center"><a href="{{ url('Learn-How-to-Reward-Good-Dog-Behaviors-and-Discourage-Unwanted-Behaviors') }}">Read More</a></p>
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
                                 <i class="fa fa-plus-circle"></i> At what age can a puppy go all night without a potty break?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    Many factors will impact how long your puppy can hold their bladder. To reduce the likelihood of nighttime accidents, try crate training your puppy so they can tell you when they need to go. Be sure to reduce their food and water intake right before bedtime and take them outside right before they go to sleep. Within a few months, you'll notice your pup being able to go longer stretches before needing to go outside.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> My puppy is very young. How can I help them sleep at night?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    Puppies who are 10 weeks old or younger will likely need to wake up in the night to go to the bathroom and, if left to their own devices, may decide the middle of the night is a great playtime! However, by beginning crate training early, your pup will be more likely to associate time in their crate with rest time, only waking you up when they need a potty break.
                                 </p>
                              </li>
                              <li class="accordion-item">
                                 <a class="accordion-title" href="javascript:void(0)">
                                 <i class="fa fa-plus-circle"></i> What do I need for my puppy?
                                 </a>
                                 <p  class="accordion-content ml-2 list-unstyled">
                                    Before bringing home your puppy, be sure to stock up on the basics like puppy food, puppy treats and food and water bowls, potty pads, waste bags and cleanup products; toys; a collar, harness, ID tag and leash; a crate; a bed; puppy shampoo and appropriate grooming tools.
                                    <br>You'll also want to consider booking their remaining vaccinations with a veterinarian and looking into dog training options.
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
      <br><br>
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