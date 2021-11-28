@extends('layouts.myApp')
@section('content')
<style>
   .imgBanner {
        width: 100%!important;
        height:100%;
    }

}
</style>

<link rel="stylesheet" href="{{ asset('css/vitalCare.css') }}">
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
                <span>Vital Care</span>
                </a>
             </li>
         </ul>
</div>

   <img src="{{ asset('images/vitalcareBanner.png') }}" alt="banner" class="imgBanner">
   <div class="booknow">
      <form action="{{ route('appointment.service',) }}" method="POST">
         @csrf
         <input type="hidden" name="service_name" value="Vital Care" />
      <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
      </form>
   </div>
   <div id="main" style="margin-bottom:15px; ">
      <div class="page-home">
         <div class="container">
            <div class="about-us-content">
               <br>
               <?php $myData1 = App\Models\ServiceContent::findOrFail(3);   ?>
               <div id="vital-care-tab-content">
                  <div class="container">
                     <div class="row">
                        <div class="col text-center">
                           <h2>Vital Care benefits</h2>
                        </div>
                     </div>
                     <div class="row tab-menu">
                        <a href="#myCarousel" data-slide="next" class="carousel-control left toggleLeft d-none">next</a>
                        <div class="col category-selector" id="outer">
                           <ul id="bar" style="left: 0px;">
                              <li class="tab-category1 active" data-target="#myCarousel" data-slide-to="0" onclick="OpenCategory01()">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.07 38.46">
                                    <path id="Path_2327" data-name="Path 2327" class="cls-1" d="M38,12.46a.67.67,0,0,0-.83-.45h0l-15.83,4.8,4.27-16a.68.68,0,0,0-.49-.8c-2.18-.57-4.58,3.7-5,5.25L16.92,18.2,9.45,20.42a5.32,5.32,0,1,0,1.2,4l4.93-1.47-1.33,4.94A5.37,5.37,0,0,0,9.8,31.8h0a5.34,5.34,0,1,0,8.45-2.89l2-7.42L33,17.62c1.52-.45,5.7-3,5-5.16M21.45,5.61A9.09,9.09,0,0,1,24,1.7L19.9,17.26l-1.51.45ZM6.2,26.83a3.12,3.12,0,1,1,1.86-1.52A3.12,3.12,0,0,1,6.2,26.83M18,34a3.11,3.11,0,1,1-2.2-3.81,3.07,3.07,0,0,1,1.89,1.45A3.14,3.14,0,0,1,18,34m-1-5.74L16.29,28l-.71-.13,1.47-5.39L18.7,22ZM32.57,16.38l-22,6.67a4.85,4.85,0,0,0-.14-.76,5.46,5.46,0,0,0-.26-.67l26.28-8a9.61,9.61,0,0,1-3.87,2.72"></path>
                                 </svg>
                                 <div class="category-title">{!! $myData1->topic !!}</div>
                                 <div class="active-indicator"></div>
                              </li>
                              
                              <li class="tab-category2" data-target="#myCarousel" data-slide-to="1" onclick="OpenCategory02()">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.47 37.09">
                                    <path id="Path_2333" data-name="Path 2333" class="cls-1" d="M28.33,2.58A5.23,5.23,0,0,0,25.69.82a1.71,1.71,0,1,0-.57,2.35A1.07,1.07,0,0,0,25.34,3a3,3,0,0,1,1.89,3.51l-3,13.35a5.14,5.14,0,0,1-10,0l-3-13.35A3,3,0,0,1,13.09,3,1.7,1.7,0,1,0,12.94.6l-.16.21A5.23,5.23,0,0,0,9.05,7l3,13.36a7.29,7.29,0,0,0,6.45,5.7v3.6a6.14,6.14,0,0,1-6.1,6.14C5.76,35.38,4.92,26,4.83,23.87a4.17,4.17,0,1,0-1.32,0,24,24,0,0,0,1.06,6.06C6,34.37,8.7,36.87,12.43,37.09a7.46,7.46,0,0,0,7.46-7.47V26.07a7.29,7.29,0,0,0,6.46-5.7L29.33,7a5.22,5.22,0,0,0-1-4.44m-27,17.17A2.86,2.86,0,1,1,4.17,22.6a2.85,2.85,0,0,1-2.85-2.85"></path>
                                    <path id="Path_2334" data-name="Path 2334" class="cls-1" d="M5.22,19.75a1,1,0,1,0-1,1.05,1.05,1.05,0,0,0,1-1.05h0"></path>
                                 </svg>
                                 <?php $myData2 = App\Models\ServiceContent::findOrFail(4);   ?>
                                 <div class="category-title">{!! $myData2->topic !!}</div>
                                 <div class="active-indicator"></div>
                              </li>
                              <li class="tab-category3" data-target="#myCarousel" data-slide-to="2" onclick="OpenCategory03()">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.8 37.4">
                                    <path id="Path_2335" data-name="Path 2335" class="cls-1" d="M14.71,13.89l-1-.17a8.33,8.33,0,0,1-2.51-.67,1.56,1.56,0,0,1,.87-.23h0a15.38,15.38,0,0,1,3.94.4h0a12.76,12.76,0,0,1,4.51,2.1A1.08,1.08,0,0,0,22.08,15l3.69-5.93a1.14,1.14,0,0,0-.26-1.47,15.76,15.76,0,0,0-9.15-3.34V.67A.66.66,0,0,0,15.71,0h-3A.65.65,0,0,0,12,.67h0V4.23C5.47,4.67,1.4,8.37,1.4,13.89V14c0,7,6.89,8.5,11.49,9.44l1.95.36a9.6,9.6,0,0,1,2.3.53,2,2,0,0,1-1.35.36c-3,0-7.89-1.2-10.36-3.16a1.06,1.06,0,0,0-1.56.26L.18,27.38A1.14,1.14,0,0,0,.44,28.9,21.69,21.69,0,0,0,12,33.13v3.61a.64.64,0,0,0,.65.66h3a.64.64,0,0,0,.65-.66h0V33.13c6.55-.58,10.45-4.19,10.45-9.66v-.09C26.8,17,21,15,14.7,13.85m9.93,9.66c0,5.83-5.37,7.17-8.58,7.44a1.08,1.08,0,0,0-.87.58.68.68,0,0,0-.13.4v4.14H13.32V31.84a.67.67,0,0,0-.35-.58,1,1,0,0,0-.69-.31,19.82,19.82,0,0,1-9.72-3.21L5,24A22.89,22.89,0,0,0,15.79,26.9c2.69,0,3.56-1.34,3.56-2.58v-.14c-.09-2-2.17-2.31-4.16-2.62l-1.83-.32c-6.5-1.33-9.8-2.85-9.8-7.25V13.9c0-4.37,3.3-7.17,8.85-7.48a1.09,1.09,0,0,0,.85-.54,1.15,1.15,0,0,0,.06-1V1.34h1.74V5.57a.65.65,0,0,0,.3.53,1.09,1.09,0,0,0,.73.36,14,14,0,0,1,7.29,2.27l-2.56,4.1A14.94,14.94,0,0,0,16.53,11h0A16.69,16.69,0,0,0,12,10.56h0c-2,0-3,1.24-3,2.44v.32c.35,1.86,2,2.18,4.34,2.58l.95.18c7.55,1.42,10.37,3.42,10.37,7.34Z"></path>
                                 </svg>
                                 <?php $myData3 = App\Models\ServiceContent::findOrFail(5);   ?>
                                 <div class="category-title">{!! $myData3->topic !!}</div>
                                 <div class="active-indicator"></div>
                              </li>
                              <li class="tab-category4" data-target="#myCarousel" data-slide-to="3" onclick="OpenCategory04()">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.43 35.75">
                                    <path id="Path_2414" data-name="Path 2414" class="cls-1" d="M33.31,7.11h-6.7a3.82,3.82,0,0,0,1.38-3C28,1.61,26.16,0,23.34,0s-5,2.19-5.95,3.18l-.18.13-.13-.13C16.1,2.24,13.5,0,11.13,0S6.48,1.61,6.48,4.07a3.8,3.8,0,0,0,1.34,3H1.12A1.12,1.12,0,0,0,0,8.23H0v5.82a1.12,1.12,0,0,0,1.12,1.12H2.24V34.63a1.12,1.12,0,0,0,1.11,1.12H30.63a1.12,1.12,0,0,0,1.12-1.12h0V15.17h1.56a1.12,1.12,0,0,0,1.12-1.12h0V8.23a1.12,1.12,0,0,0-1.12-1.12h0M18.16,3.94c.71-.67,3.17-2.87,5.18-2.87s3.54,1.12,3.54,3-1.35,3-3.54,3-4.47-2.19-5.19-2.86L18,4.08Zm-7-2.87c2,0,4.47,2.2,5.18,2.87l.14.13-.14.13c-.71.68-3.17,2.87-5.18,2.87S7.6,6,7.6,4.07s1.34-3,3.54-3M17.08,5l.14-.13.13.13a16.56,16.56,0,0,0,2.77,2.15H14.31A16.56,16.56,0,0,0,17.08,5M29.51,33.51h-25V15.17h25ZM32.2,12.93h-30V9.35h30Z"></path>
                                 </svg>
                                 <?php $myData4 = App\Models\ServiceContent::findOrFail(6);   ?>
                                 <div class="category-title">{!! $myData4->topic !!}</div>
                                 <div class="active-indicator"></div>
                              </li>
                           </ul>
                        </div>
                        <a href="#myCarousel" data-slide="next" class="carousel-control right toggleRight d-none">previous</a>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="container no-margin content-holder">
                              <div class="tab-content active" id="tab-1">
                                 <div class="row">
                                    <div class="col">
                                       <img src="{{ $myData1->image_path }}" lazyimg="loaded" data-src="{{ $myData1->image_path }}" alt="" class="center-block img-responsive">
                                    </div>
                                    <div class="col">
                                       <div class="text-holder">
                                           {!! $myData1->information !!}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-content" id="tab-2">
                                 <div class="row">
                                    <div class="col">
                                       <img src="{{ $myData2->image_path }}" lazyimg="loaded" data-src="{{ $myData2->image_path }}" alt="" class="center-block img-responsive">
                                    </div>
                                    <div class="col">
                                       <div class="text-holder">
                                          {!! $myData2->information !!}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-content" id="tab-3">
                                 <div class="row">
                                    <div class="col">
                                       <img src="{{ $myData3->image_path }}" lazyimg="loaded" data-src="{{ $myData3->image_path }}" alt="" class="center-block img-responsive">
                                    </div>
                                    <div class="col">
                                       <div class="text-holder">
                                         {!! $myData3->information !!}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-content" id="tab-4">
                                 <div class="row">
                                    <div class="col">
                                       <img src="{{ $myData4->image_path }}" lazyimg="loaded" data-src="{{ $myData4->image_path }}" alt="" class="center-block img-responsive">
                                    </div>
                                    <div class="col">
                                       <div class="text-holder">
                                          {!! $myData4->information !!}
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
      </div>
   </div>
</div>
<div id="vetLetter">
   <div class="container">
      <div class="row">
         <div class="col-4 col-12-sm memberBenefits__img">
            <img src="{{ asset('images/doctor.jpg') }}" lazyimg="loaded" data-src="{{ asset('images/doctor.jpg') }}" alt="Dr. Whitney Miller" class="img-responsive d-only">
            <img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" lazyimg="" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_237/vital-care-whitney-miller-headshot-237w-230h" alt="Dr. Whitney Miller" class="img-responsive m-only">
            <h2 class="d-only">Dr. Whitney Miller</h2>
            <p class="d-only">Chief Veterinarian</p>
         </div>
         <div class="col-8 col-12-sm memberBenefits__info">
            <div>
               <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_57/vital-care-quotation-icon57w-47h" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_57/vital-care-quotation-icon57w-47h" alt="">
            </div>
            <div>
               <p class="d-only">We know that dog parents are always looking for the best ways to give their pets the care they need to keep them healthy.</p>
               <p>Pet parents should create a schedule with their veterinarian and groomer. Most breeds need to be bathed every 4–8 weeks and groomed every 6–12 weeks.</p>
               <p>Even if your dog looks healthy, routine vet exams can help detect diseases before they become serious and allow for early intervention. Your vet will track your dog’s development and answer questions about their overall health.</p>
               <p class="d-only">With Vital Care, your dog gets the care they need from our knowledgeable store associates, Petco-certified groomers and veterinary partners.</p>
            </div>
            <div>
               <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_57/vital-care-quotation-icon57w-47h" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_57/vital-care-quotation-icon57w-47h" alt="">
            </div>
            <h2 class="m-only">Dr. Whitney Miller</h2>
            <p class="m-only">Chief Veterinarian, Petco</p>
         </div>
      </div>
   </div>
</div>

<div id="comparison">
   <div class="container">
      <div class="row">
         <div class="col-12 col-12-sm">
            <div class="heading-holder">
               <h2>Annual value of Vital Care</h2>
            </div>
         </div>
      </div>
      <div class="row spacing-bottom-sm">
         <div class="col-12 col-12-sm">
            <table>
               <thead>
                  <tr>
                     <th></th>
                     <th>
                        <div class="table-heading-holder">
                           <div class="img-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_95/vital-care-boston-terrier-chance" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_95/vital-care-boston-terrier-chance" alt="Boston Terrier tilting head" class="img-responsive">
                           </div>
                           <div class="name-holder">
                              <h4>Chance</h4>
                              <p>Not enrolled in Vital Care</p>
                           </div>
                        </div>
                     </th>
                     <th class="heading-green">
                        <div class="table-heading-holder">
                           <div class="img-holder">
                              <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_95/vital-care-champ" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_95/vital-care-champ" alt="Small brown fluffy dog with tongue out" class="img-responsive">
                           </div>
                           <div class="name-holder">
                              <h4>Champ</h4>
                              <p><span>Enrolled in Vital Care</span></p>
                           </div>
                        </div>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td></td>
                     <td colspan="4">30% off grooming benefit value**</td>
                  </tr>
                  <tr>
                     <td>30% off grooming benefit value**</td>
                     <td>None</td>
                     <td class="cell-green">$125</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Grooming add-on value**</td>
                  </tr>
                  <tr class="compare-row">
                     <td>Grooming add-on value**</td>
                     <td>None</td>
                     <td class="cell-green">$62</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Vet of your choice benefit</td>
                  </tr>
                  <tr>
                     <td>Vet of your choice benefit</td>
                     <td>Full price <span>out of pocket</span></td>
                     <td class="cell-green">$70</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Unlimited vet exams</td>
                  </tr>
                  <tr class="compare-row">
                     <td>Unlimited vet exams</td>
                     <td>Full price <span>out of pocket</span></td>
                     <td class="cell-green">Included</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Pals Rewards</td>
                  </tr>
                  <tr>
                     <td>Pals Rewards</td>
                     <td>None</td>
                     <td class="cell-green">$120 </td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Welcome gift</td>
                  </tr>
                  <tr>
                     <td>Welcome gift</td>
                     <td>None</td>
                     <td class="cell-green">$20 </td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td colspan="4">Vital Care value</td>
                  </tr>
                  <tr>
                     <td>Vital Care value</td>
                     <td></td>
                     <td class="cell-green">$397*</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="row ">
         <div class="col">
            <img  style="margin-top: -20px;" src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_124/vital-care-decorative-icons-248w-248h" lazyimg="loaded" data-src="https://assets.petco.com/petco/image/upload/f_auto,q_auto:best,dpr_2.0,w_124/vital-care-decorative-icons-248w-248h" alt="" class="img-responsive">
         </div>
         <div class="col">
            <div style="margin-top:-45px">
               <h3>Vital Care tip:</h3>
               <p>Enroll two or more pets to enjoy a $2 discount per pet every month.</p>
            </div>
         </div>
      </div>
      
   </div>
</div>
<div id="articles" class="articles-3 spacing-top-md spacing-bottom-md">
   <div class="container">
      <div class="row spacing-bottom-md">
         <div class="col heading-holder">
            <h2>Pet well-being tips from our experts</h2>
         </div>
      </div>
      <div class="row">
         <div class="col content-holder">
            <img src="{{ asset('images/vital-care01.jpg') }}" class="center-block img-responsive" alt="Dog sitting on a grooming table getting groomed">
            <div class="text-holder">
               <h3>The Health Benefits of Baths and Haircuts for Dogs</h3>
               <p>Learn how professional baths and haircuts can help your dog look and feel their best.</p>
               <p><a href="{{ asset('resource-center/5/5/85') }}">Read More</a></p>
            </div>
         </div>
         <div class="col content-holder">
            <img src="{{ asset('images/vital-care-routine-vet-exams-article-700w-500h.jpg') }}" lazyimg="loaded"  class="center-block img-responsive" alt="Veterinarian crouching down and petting a Dalmatian">
            <div class="text-holder">
               <h3>Routine Vet Exams for Dogs 101</h3>
               <p>Help your dog live a healthier and happier life.</p>
               <p><a href="{{ asset('resource-center/6/5/90') }}">Read More</a></p>
            </div>
         </div>
         <div class="col content-holder">
            <img src="{{ asset('images/vital-care-care-routines-article-700w-500h.jpg') }}" lazyimg="loaded"  class="center-block img-responsive" alt="Man giving a high-five to a Boxer">
            <div class="text-holder">
               <h3>Care Routines to Support Your Dog’s Well-Being</h3>
               <p>Discover how you can help support your dog’s physical and mental well-being.</p>
               <p><a href="{{ asset('resource-center/6/5/92') }}">Read More</a></p>
            </div>
         </div>
      </div>
   </div>
   <br>
   <br>
</div>

<script>
   var x1 = document.getElementById("tab-1");
   var x2 = document.getElementById("tab-2");
   var x3 = document.getElementById("tab-3");
   var x4 = document.getElementById("tab-4");
   var a1 = document.getElementById("tab-category1");
   var a2 = document.getElementById("tab-category2");
   var a3 = document.getElementById("tab-category3");
   var a4 = document.getElementById("tab-category4");

   function OpenCategory01()
   {
      x1.style.display = "block";
      x2.style.display = "none";
      x3.style.display = "none";
      x4.style.display = "none";
      a1.classList.add("active");


     

   }
   function OpenCategory02()
   {
      x2.style.display = "block";
      x1.style.display = "none";
      x3.style.display = "none";
      x4.style.display = "none";
      a2.classList.add("active");
 
   }
   function OpenCategory03()
   {
      x3.style.display = "block";
      x1.style.display = "none";
      x2.style.display = "none";
      x4.style.display = "none";
      a3.classList.add("active");
    
   }
   function OpenCategory04()
   {
      x4.style.display = "block";
      x1.style.display = "none";
      x2.style.display = "none";
      x3.style.display = "none";
      a4.classList.add("active");
      
   }
</script>
@endsection