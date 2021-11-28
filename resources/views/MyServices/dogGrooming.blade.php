@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<link rel="stylesheet" href="{{ asset('css/dogGrooming.css') }}">
<style>
   #search-by-category .search-container #text-search {
      width:60%!important;
   }
.newsletter-block .newsletter_email {
   width: 54%!important;
   height: 26px!important;
}
.newsletter-block .newsletter-content .content {
   width: 85%!important;
}
   #grooming-tab-content{
   display:block!important;
   }
   #grooming-tab-content-mob {
   display:none!important;
   }
   #grooming-stlyist-bnr{
   display:block!important;
   }
   #grooming-stlyist-bnr-mob{
   display:none!important;
   }
   #services-grooming-timeline-content{
   display:block!important;
   }
   #services-grooming-timeline-content-mob{
   display:none!important;
   }
   .img-grooming{
   width:185!important;
   height:165px!important;
   }
   .imgBanner{
   width:100%!important;
   height:100%!important;
   }
   #grooming-tab-content .tab-content .checkmark-icon {
   background: url('images/services-checkmark.png') center center no-repeat;
   background-size: contain;
   min-height: 20px;
   min-width: 20px;
   margin: 2px 5px 0 0;
   }
   .checkmark-icon {
   background-image: url('images/services-checkmark.png');
   background-repeat: no-repeat;
   background-size: 15px;
   background-position: right;
   width: 15px;
   display: inline-block;
   }
   #grooming-tab-content #tab-3 .bnr-img-1 {
   background: url('images/category-grooming-tabs-essentials-plus-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   }
   #grooming-tab-content #tab-3 .bnr-img-2 {
   background: url('images/category-grooming-tabs-flea-cleanse-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   }
   #grooming-tab-content #tab-3 .bnr-img-3 {
   background: url('images/category-grooming-tabs-shed-release-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   z-index: 9999999!important;
   }
   #grooming-tab-content #tab-3 .bnr-img-4 {
   background: url('images/category-grooming-tabs-shed-release-plus-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   }
   #grooming-tab-content #tab-3 .bnr-img-5 {
   background: url('images/category-grooming-tabs-calm-and-refresh-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   }
   #grooming-tab-content #tab-3 .bnr-img-6 {
   background: url('images/category-grooming-tabs-hydrate-and-restore-2190w-360h.jpg') center right no-repeat;
   background-size: cover;
   height: 180px;
   width: 100%;
   }
   .left::before {
   content: " ";
   height: 0;
   position: absolute;
   top: 22px;
   width: 0;
   z-index: 1;
   right: 30px;
   border: medium solid #474e5d;;
   border-width: 10px 0 10px 10px;
   border-color: #474e5d;;
   }
   @media (min-width: 992px){
      .col-md-4 {
         width: 28.333333%;
      }
   }
   @media only screen and (max-width: 600px) {
   .imgTimeline {
   width:100%!important;
   height:225px!important; 
   }
   .imgRiyan{
   width:300px!important;
   height:165px!important; 
   }
   .imgFaq {
   height: 100%!important;
   width: 100%!important;  
   }
   #grooming-tab-content {
   display : none!important;
   }
   #grooming-tab-content-mob {
   display:block!important;
   }
   #grooming-stlyist-bnr{
   display:none!important;
   }
   #grooming-stlyist-bnr-mob{
   display:block!important;
   }
   .mobMargin{
   margin:10px!important;
   }
   #services-grooming-timeline-content{
   display:none!important;
   }
   #services-grooming-timeline-content-mob{
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
                        <span>Dog Grooming</span>
                        </a>
                     </li>
         </ul>
</div>
         <img src="{{asset('images/DogGroomingBanner.png')}}" alt="bannerimage" class="imgBanner"/>
         <div class="booknow">
            
            <form action="{{ route('appointment.service',) }}" method="POST">
               @csrf
               <input type="hidden" name="service_name" value="Dog Grooming" />
            <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
            </form>
         </div>
         <div id="main">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <br>
                     <div class="container mobMargin">
                        <?php $mySection1 = App\Models\ServiceContent::findOrFail(27);   ?>
                        {!! $mySection1->information !!}
                        <div class="row">
                           <?php $myData1 = App\Models\ServiceContent::findOrFail(7);   ?>
                           <div class="column" style="text-align: center;">
                              <img src="{{ asset($myData1->image_path) }}" class="img-grooming" alt="">
                              <h4 style="text-align: center;">{!! $myData1->topic !!}</h4>
                              <p>{!!  $myData1->information !!}</p>
                           </div>
                           <?php $myData2 = App\Models\ServiceContent::findOrFail(8);   ?>
                           <div class="column" style="text-align: center;">
                              <img src="{{ asset($myData2->image_path) }}" class="img-grooming" alt="">
                              <h4 style="text-align: center;">{!! $myData2->topic !!}</h4>
                              <p>{!! $myData2->information !!}</p>
                              <br>
                           </div>
                           <?php $myData3 = App\Models\ServiceContent::findOrFail(9);   ?>
                           <div class="column" style="text-align: center;">
                              <img src="{{ asset($myData3->image_path) }}" class="img-grooming" alt="">
                              <h4 style="text-align: center;">{!! $myData3->topic !!}</h4>
                              <p>{!! $myData3->information !!}</p>
                              <br>
                           </div>
                           <?php $myData4 = App\Models\ServiceContent::findOrFail(10);   ?>
                           <div class="column" style="text-align: center;">
                              <img src="{{ asset($myData4->image_path) }}" class="img-grooming" alt="">
                              <h4>{!! $myData4->topic !!}</h4>
                              <p>{!! $myData4->information !!}</p>
                           </div>
                        </div>
                     </div>
                     <div id="grooming-tab-content">
                        <div class="container">
                           <div class="row tab-menu">
                              <div class="col-12 col-12-sm category-selector" id="outer">
                                 <ul id="bar" style="left: 0px;">
                                    <?php $myData5 = App\Models\ServiceContent::findOrFail(11);   ?>
                                    <li class="tab-category active" id="tab-category1" onclick="OpenCategory01()">
                                       <div class="category-title">{!! \Illuminate\Support\Str::limit( $myData5->topic, 150, ' [...]') !!}</div>
                                       <div class="active-indicator"></div>
                                    </li>
                                    <?php $myData6 = App\Models\ServiceContent::findOrFail(12);   ?>
                                    <li class="tab-category" id="tab-category2" onclick="OpenCategory02()">
                                       <div class="category-title">{!! \Illuminate\Support\Str::limit( $myData6->topic, 150, ' [...]') !!}</div>
                                       <div class="active-indicator"></div>
                                    </li>
                                    <?php $myData7 = App\Models\ServiceContent::findOrFail(13);   ?>
                                    <li class="tab-category" id="tab-category3" onclick="OpenCategory03()">
                                       <div class="category-title">{!! \Illuminate\Support\Str::limit( $myData7->topic, 150, ' [...]') !!}</div>
                                       <div class="active-indicator"></div>
                                    </li>
                                    <?php $myData8 = App\Models\ServiceContent::findOrFail(19);   ?>
                                    <li class="tab-category" id="tab-category4" onclick="OpenCategory04()">
                                       <div class="category-title">{!! \Illuminate\Support\Str::limit( $myData8->topic, 150, ' [...]') !!}</div>
                                       <div class="active-indicator"></div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 col-12-sm">
                                 <div class="container no-margin content-holder">
                                    <div class="tab-content active" id="tab-1">
                                       <div class="row">
                                           <table>
                                               <tr>
                                                   <td>
                                          <div class="col-4 col-12-sm">
                                             <div class="text-holder">
                                                {!!  $myData5->information !!}
                                             </div>
                                          </div>
                                          </td>
                                          <td>
                                          <div class="col-8 col-12-sm">
                                             <img src="{{ asset($myData5->image_path) }}" alt="" class="center-block img-responsive">
                                          </div>
                                          </td>
                                          </tr>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="tab-content" id="tab-2">
                                       <div class="row">
                                           <table>
                                               <tr>
                                                   <td>
                                          <div class="col-4 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData6->information !!}
                                             </div>
                                          </div>
                                          </td>
                                          <td>
                                          <div class="col-8 col-12-sm">
                                             <img src="{{ asset($myData6->image_path) }}" alt="" class="center-block img-responsive">
                                          </div>
                                          </td>
                                          </tr>
                                          </table>
                                       </div>
                                       
                                    </div>
                                    <div class="tab-content" id="tab-3">
                                       <div class="row">
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-1">
                                                <div class="row">
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7->image_path)}}" alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="content-holder bnr-img-1">
                                                      <div class="col-10 col-8-sm">
                                                         {!! $myData7->information !!}
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-2">
                                                <div class="row">
                                                   <?php $myData7b = App\Models\ServiceContent::findOrFail(14);   ?>
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7b->image_path)}}" alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="col-10 col-8-sm">
                                                      {!! $myData7b->information !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-3" >
                                                <div class="row">
                                                   <?php $myData7c = App\Models\ServiceContent::findOrFail(15);   ?>
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7c->image_path)}}"  alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="col-10 col-8-sm">
                                                      {!! $myData7c->information !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-4">
                                                <div class="row">
                                                   <?php $myData7d = App\Models\ServiceContent::findOrFail(16);   ?>
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7d->image_path)}}"  alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="col-10 col-8-sm">
                                                      {!! $myData7d->information !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-5">
                                                <div class="row">
                                                   <?php $myData7e = App\Models\ServiceContent::findOrFail(17);   ?>
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7e->image_path)}}" alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="col-10 col-8-sm">
                                                      {!! $myData7e->information !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-12-sm">
                                             <div class="content-holder bnr-img-6">
                                                <div class="row">
                                                   <?php $myData7f = App\Models\ServiceContent::findOrFail(18);   ?>
                                                   <div class="col-2 col-4-sm">
                                                      <div class="img-holder">
                                                         <img src="{{ asset($myData7f->image_path)}}" alt="" class="center-block img-responsive">
                                                      </div>
                                                   </div>
                                                   <div class="col-10 col-8-sm">
                                                      {!! $myData7f->information !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-content" id="tab-4">
                                       <div class="row">
                                          <?php $myData8a = App\Models\ServiceContent::findOrFail(19);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! \Illuminate\Support\Str::limit($myData8a->information, 150, ' [...]') !!}
                                             </div>
                                          </div>
                                          <?php $myData8b = App\Models\ServiceContent::findOrFail(20);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8b->information !!}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <?php $myData8c = App\Models\ServiceContent::findOrFail(21);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8c->information !!}
                                             </div>
                                          </div>
                                          <?php $myData8d = App\Models\ServiceContent::findOrFail(22);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8d->information !!}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <?php $myData8e = App\Models\ServiceContent::findOrFail(23);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8e->information !!}
                                             </div>
                                          </div>
                                          <?php $myData8f = App\Models\ServiceContent::findOrFail(24);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8f->information !!}
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <?php $myData8g = App\Models\ServiceContent::findOrFail(25);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8g->information !!}
                                             </div>
                                          </div>
                                          <?php $myData8h = App\Models\ServiceContent::findOrFail(26);   ?>
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8h->information !!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="grooming-tab-content-mob">
                        <div class="container">
                           <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    <?php $myData5 = App\Models\ServiceContent::findOrFail(11);   ?>
                                    <th class="text-center" colspan="2">
                                       <h4>{!! $myData5->topic !!}</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData5->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData5->information !!}
                                       </div>
                                    </th>
                                 </tr>
                              </tbody>
                           </table>
                           <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    <?php $myData6 = App\Models\ServiceContent::findOrFail(12);   ?>
                                    <th class="text-center" colspan="2">
                                       <h4>{!! $myData6->topic !!}</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData6->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData5->information !!}
                                       </div>
                                    </th>
                                 </tr>
                              </tbody>
                           </table>
                           <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    <?php $myData7 = App\Models\ServiceContent::findOrFail(13);   ?>
                                    <th class="text-center" colspan="2">
                                       <h4>{!! $myData7->topic !!}</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <?php $myData7b = App\Models\ServiceContent::findOrFail(14);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7b->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7b->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <?php $myData7c = App\Models\ServiceContent::findOrFail(15);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7c->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7c->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <?php $myData7d = App\Models\ServiceContent::findOrFail(16);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7d->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7d->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <?php $myData7e = App\Models\ServiceContent::findOrFail(17);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7e->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7e->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                                 <?php $myData7f = App\Models\ServiceContent::findOrFail(18);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData7f->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <tr>
                                    <td class="pl-3">
                                       <div class="col-12 col-12-sm p-3">
                                          <img src="{{ asset($myData7f->image_path) }}" alt="" class="center-block img-responsive">
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table class="table table-bordered text-capitalize p-3">
                              <thead class="thead-light">
                                 <tr>
                                    <?php $myData8 = App\Models\ServiceContent::findOrFail(19);   ?>
                                    <th class="text-center" colspan="2">
                                       <h4>{!! $myData8->topic !!}</h4>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $myData8a = App\Models\ServiceContent::findOrFail(19);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8a->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8b = App\Models\ServiceContent::findOrFail(20);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8b->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8c = App\Models\ServiceContent::findOrFail(21);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          <div class="col-6 col-12-sm">
                                             <div class="text-holder">
                                                {!! $myData8c->information !!}
                                             </div>
                                          </div>
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8d = App\Models\ServiceContent::findOrFail(22);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8d->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8e = App\Models\ServiceContent::findOrFail(23);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8e->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8f = App\Models\ServiceContent::findOrFail(24);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8f->information !!}
                                       </div>
                                    </th>
                                 </tr>
                                 <?php $myData8g = App\Models\ServiceContent::findOrFail(25);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8g->information !!}
                                       </div>
                                    </th>
                                    <?php $myData8h = App\Models\ServiceContent::findOrFail(26);   ?>
                                 <tr>
                                    <th scope="row">
                                       <div class="text-holder p-3">
                                          {!!  $myData8h->information !!}
                                       </div>
                                    </th>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <section class="spacing-top-md spacing-bottom-md text-center">
                        <div id="grooming-stlyist-bnr">
                           <div class="container">
                              <div class="row">
                                 <?php $mySection2 = App\Models\ServiceContent::findOrFail(28);   ?>
                                 <div class="col-12 col-12-sm heading-holder">
                                    {!! $mySection2->information !!}
                                 </div>
                              </div>
                              <div class="bg-holder"></div>
                              <div class="row">
                                 <?php $myData9 = App\Models\ServiceContent::findOrFail(29);   ?>
                                 <div class="col-6 col-12-sm content-holder">
                                    <img src="{{ asset($myData9->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData9->image_path) }}" class="center-block img-responsive">
                                    <div class="text-holder">
                                       {!! $myData9->information !!}
                                    </div>
                                 </div>
                                 <?php $myData10 = App\Models\ServiceContent::findOrFail(30);   ?>
                                 <div class="col-6 col-12-sm content-holder">
                                    <img src="{{ asset($myData10->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData10->image_path) }}" class="center-block img-responsive">
                                    <div class="text-holder">
                                       {!! $myData10->information !!}
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12 col-12-sm btn-holder">
                                    <a href="javascript:void(0)" class="btn btn-category slide_right">
                                       Book an Appointment
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--Mobile-->
                        <div id="grooming-stlyist-bnr-mob">
                           <div class="container">
                              <div class="p-3">
                                 <?php $mySection2 = App\Models\ServiceContent::findOrFail(28);   ?>
                                 {!! $mySection2->information !!}
                              </div>
                              <div class="row">
                                 <?php $myData9 = App\Models\ServiceContent::findOrFail(29);   ?>
                                 <div class="col-12 col-12-sm content-holder">
                                    <img src="{{ asset($myData9->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData9->image_path) }}" class="center-block img-responsive">
                                    <div class="text-holder">
                                       {!! $myData9->information !!}
                                    </div>
                                 </div>
                                 <?php $myData10 = App\Models\ServiceContent::findOrFail(30);   ?>
                                 <div class="col-12 col-12-sm content-holder">
                                    <img src="{{ asset($myData10->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData10->image_path) }}" class="center-block img-responsive">
                                    <div class="text-holder">
                                       {!! $myData10->information !!}
                                    </div>
                                 </div>
                              </div>
                              <div class="row text-center">
                                 <div class="col-12 col-12-sm btn-holder">
                                    <a href="javascript:void(0)">
                                    <button class="btn-category slide_right">Book an Appointment</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <div class="container-fluid">
                        <div class="row align-items-center">
                           <div class="col-lg-7 col-md-8">
                              <div class="faq-accordion">
                                 <h3>Frequently Asked Questions</h3>
                                 <ul class="accordion">
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> What is the price for a dog bath or bath with haircut?
                                       </a>
                                       <p class="accordion-content">
                                          You can call your local Petco grooming salon before your visit to receive an estimated price. Based on your preferred grooming service options, you can discuss details over the phone or in person when you meet your stylists at the start of your pet's groom.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> What vaccinations are required for salon services?
                                       </a>
                                       <p class="accordion-content">
                                          For the health and safety of all guests and stylists, we require proof of current vaccinations based on your pet’s age. Requirements include:
                                          <br><strong>Dogs</strong><br>
                                          1. Under 16 weeks: At least 2 sets of puppy starter vaccinations that include distemper, hepatitis and parvovirus<br>
                                          2. 16 weeks and older: Rabies vaccination<br>
                                          <br><strong>Cats</strong>
                                          <br>
                                          1. Under 16 weeks: Parvovirus, herpesvirus type-1 and calicivirus<br>
                                          2. 16 weeks and older: Rabies vaccination<br>
                                          <br>Please make sure there’s at least a 24-hour time period between vaccine administration and their grooming service. For questions, we recommend consulting with your Petco salon to ensure that your pet has the proper vaccinations prior to their appointment.
                                          <br>Are their vaccinations expired? Visit <a href="#" >MPMP Veterinary Services</a> to find a convenient Petco walk-in vaccination clinic.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> How long does a dog grooming service take?
                                       </a>
                                       <p class="accordion-content">
                                          The amount of time a grooming service takes depends on your pet's size and the type of service requested. Your stylist will be able to provide an estimated time of completion at check-in or over the phone.<br>
                                          Minor services, such as nail trimmings, approximately take 5 minutes and, depending on salon availability, no appointment is necessary. However, we recommend calling your local salon to confirm availability.<br>
                                          For a speedy grooming experience, an Express Service can be added to any full-service bath or haircut at an additional fee of $12. For brachycephalic breeds, such as French Bulldogs, English Bulldogs, Pugs and Boxers, we offer the Express Service (VIP) for the safety of the pet. Ask your stylist for details and availability.”
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> Do you kennel dry dogs?
                                       </a>
                                       <p class="accordion-content">
                                          We offer several methods of drying that are designed to ensure the safety and comfort of every pet. These methods include air drying, towel drying, non-heated hand-held and kennel dryers. For brachycephalic breeds that are prone to respiratory issues, we do not allow the use of kennel dryers.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> How do I get my pet started with a grooming service?
                                       </a>
                                       <p class="accordion-content">
                                          MPMP dog groomers are trained to the highest standards and must successfully complete an 800-hour, 20-week course for certification. Visit MPMP Grooming Certification Process for a more detailed guide on the certification process.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i>How do I change or cancel an appointment?
                                       </a>
                                       <p  class="accordion-content ml-2 list-unstyled">
                                          Please call your salon to cancel or make changes to your appointment.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> How is safety ensured for all dog grooming services?
                                       </a>
                                       <p  class="accordion-content ml-2 list-unstyled">
                                          We are committed to maintaining the highest standards of animal care and safety in the industry, as developed under the supervision of our Director of Veterinary Medicine, with counsel from several independent experts in animal care, behavior and ethics.<br>
                                          <strong> A few ways we ensure your pet’s safety in the grooming salon is by:</strong><br>
                                          1. Completing a comprehensive 7-Point Pet Care Check for every pet upon check-in to ensure nothing looks or feels abnormal<br>
                                          2. Using ramps or steps for senior dogs to get into the tubs or bathe really large dogs on the floor<br>
                                          3. Providing industry-standard comfortable and safe kennels<br>
                                          4. Utilizing the Groomer’s Helper tool, designed to help safely maintain control of your pet’s body and head while on the grooming table<br>
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> How is MPMP helping protect people and pets at grooming salons during COVID-19?
                                       </a>
                                       <p  class="accordion-content ml-2 list-unstyled">
                                          Based on guidance from the CDC and other public health experts, and to help protect the health and safety of our Petco partners, guests and the broader communities we serve, we respectfully require CDC-compliant facial coverings in all Petco stores nationwide. To help our groomers and pet parents maintain a safe distance from each other, we've restructured our Petco grooming schedules. We ask that only the pet receiving services and one pet parent visit our check-in desk – additional family members should remain home to help keep everyone safe. Pet parents are being asked to maintain a safe distance between themselves and others by waiting outside of the salon if another pet is being checked in and, when possible, we're scheduling pick-up times to limit the number of pet parents waiting for their newly-groomed dogs. We're also holding 15 to 20-minute windows between each grooming appointment to properly clean and disinfect the work area (counters, stations, and equipment) before welcoming the next pet. Visit petco.com/covid19 to obtain additional up-to-date information on how Petco is helping protect people and pets during COVID-19, as well as helpful resources for pet parents.
                                       </p>
                                    </li>
                                    <li class="accordion-item">
                                       <a class="accordion-title" href="javascript:void(0)">
                                       <i class="fa fa-plus-circle"></i> How are your care and safety policies developed?
                                       </a>
                                       <p  class="accordion-content ml-2 list-unstyled">
                                          With over 25 years of grooming experience, we continuously review and update our pet grooming policies, procedures and standards under the supervision of our Director of Veterinary Medicine, with counsel from several independent experts in animal care, behavior and ethics. Since 2015, we've worked together with the Pet Industry Joint Advisory Council (PIJAC) and the Professional Pet Groomers & Stylists Alliance (PPGSA) to encourage and support national health and safety standards for the grooming industry. We believe these standards are critical to the well-being of pets everywhere, and we continue to work with other pet industry leaders to encourage industry-wide adoption and adherence to them.
                                       </p>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="pt-5">
                                 <img src="{{ asset('images/faq-img1.png') }}" class="imgFaq" alt="image">
                              </div>
                           </div>
                        </div>
                     </div>
                     <section class="spacing-top-md spacing-bottom-md">
                        <div id="services-grooming-timeline-content">
                           <div class="container">
                              <div class="row">
                                 <?php $mySection3 = App\Models\ServiceContent::findOrFail(31);   ?>
                                 <div class="col-12 col-12-sm heading-holder">
                                    {!! $mySection3->information !!}
                                 </div>
                              </div>
                              <div class="row">
                                 <?php $myData11 = App\Models\ServiceContent::findOrFail(31);   ?>
                                 <div class="col-5 col-12-sm">
                                    <img src="{{ asset($myData11->image_path) }}" alt="" class="center-block img-responsive">
                                 </div>
                                 <div class="col-md-6">
                                    <div class="timeline-container">
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>1</h4>
                                          </div>
                                          <?php $myData11 = App\Models\ServiceContent::findOrFail(32);   ?>
                                          <div class="timeline-content">
                                             {!! $myData11->information !!}
                                          </div>
                                       </div>
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>2</h4>
                                          </div>
                                          <?php $myData12 = App\Models\ServiceContent::findOrFail(33);   ?>
                                          <div class="timeline-content">
                                             {!! $myData12->information !!}
                                          </div>
                                       </div>
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>3</h4>
                                          </div>
                                          <?php $myData13 = App\Models\ServiceContent::findOrFail(34);   ?>
                                          <div class="timeline-content">
                                             {!! $myData13->information !!}
                                          </div>
                                       </div>
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>4</h4>
                                          </div>
                                          <?php $myData14 = App\Models\ServiceContent::findOrFail(35);   ?>
                                          <div class="timeline-content">
                                             {!! $myData14->information !!}
                                          </div>
                                       </div>
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>5</h4>
                                          </div>
                                          <?php $myData15 = App\Models\ServiceContent::findOrFail(36);   ?>
                                          <div class="timeline-content">
                                             {!! $myData15->information, 150 !!}
                                          </div>
                                       </div>
                                       <div class="timeline-block">
                                          <div class="marker">
                                             <h4>6</h4>
                                          </div>
                                          <?php $myData16 = App\Models\ServiceContent::findOrFail(37);   ?>
                                          <div class="timeline-content">
                                             {!! $myData16->information !!}
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row desktop-only">
                                 <?php $myData17 = App\Models\ServiceContent::findOrFail(38);   ?>
                                 <div class="col-12 col-12-sm">
                                    <div class="text-holder">
                                       {!! $myData17->information !!}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--Mobile-->
                        <div id="services-grooming-timeline-content-mob">
                           <div class="container">
                              <div class="row">
                                 <?php $mySection3 = App\Models\ServiceContent::findOrFail(31);   ?>
                                 <div class="col-12 col-12-sm heading-holder">
                                    {!! $mySection3->information !!}
                                 </div>
                              </div>
                              <div class="row">
                                 <?php $myData11 = App\Models\ServiceContent::findOrFail(31);   ?>
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th scope="col" colspan="2">
                                             <img src="{{ asset($myData11->image_path) }}" alt="" class="imgTimeline">
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <th  class="p-3"> 1 </th>
                                          <?php $myData11 = App\Models\ServiceContent::findOrFail(32);   ?>
                                          <td class="pl-3">
                                             {!! $myData11->information !!}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th  class="p-3"> 2</th>
                                          <?php $myData12 = App\Models\ServiceContent::findOrFail(33);   ?>
                                          <td class="pl-3">
                                             {!! $myData12->information !!}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th  class="p-3"> 3</th>
                                          <?php $myData13 = App\Models\ServiceContent::findOrFail(34);   ?>
                                          <td class="pl-3">
                                             {!! $myData13->information !!}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th  class="p-3"> 4</th>
                                          <?php $myData14 = App\Models\ServiceContent::findOrFail(35);   ?>
                                          <td class="pl-3">
                                             {!! $myData14->information !!}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th  class="p-3"> 5</th>
                                          <?php $myData15 = App\Models\ServiceContent::findOrFail(36);   ?>
                                          <td class="pl-3">
                                             {!! $myData15->information, 150 !!}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th  class="p-3"> 6</th>
                                          <?php $myData16 = App\Models\ServiceContent::findOrFail(37);   ?>
                                          <td class="pl-3">
                                             {!! $myData16->information !!}
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <div class="row">
                                    <?php $myData17 = App\Models\ServiceContent::findOrFail(38);   ?>
                                    <div class="col-12 col-12-sm">
                                       <div class="text-holder">
                                          {!! $myData17->information !!}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </section>
                     <div class="left_espot">
                     <section class="spacing-top-md spacing-bottom-md">
                     <div id="grooming-icons-3">
                     <div class="container">
                     <div class="row">
                     <?php $myData18 = App\Models\ServiceContent::findOrFail(39);   ?>
                     <div class="col-12 col-12-sm heading-holder">
                     {!! $myData18->topic !!}
                     </div>
                     </div>
                     <div class="row">
                     <div class="column content-holder">
                     <div class="img-holder">
                     <img src="{{ asset($myData18->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData18->image_path) }}" alt="" class="center-block">
                     </div>
                     <div class="text-holder">
                     {!! $myData18->information !!}
                     </div>
                     </div>
                     <?php $myData19 = App\Models\ServiceContent::findOrFail(40);   ?>
                     <div class="column content-holder">
                     <div class="img-holder">
                     <img src="{{ asset($myData19->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData19->image_path) }}" alt="" class="center-block img-responsive">
                     </div>
                     <div class="text-holder">
                     {!! $myData19->information !!}
                     </div>
                     </div>
                     <?php $myData20 = App\Models\ServiceContent::findOrFail(41);   ?>
                     <div class="column content-holder">
                     <div class="img-holder">
                     <img src="{{ asset($myData20->image_path) }}" lazyimg="loaded" data-src="{{ asset($myData20->image_path) }}" alt="" class="pals-rewards center-block">
                     </div>
                     <div class="text-holder">
                     {!! $myData20->information !!}
                     </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-12 col-12-sm btn-holder">
                     <a href="javascript:void(0)"></a>
                     </div>
                     <div class="col-12 col-12-sm btn-holder">
                        <form action="{{ route('appointment.service',) }}" method="POST">
                           @csrf
                           <input type="hidden" name="service_name" value="Dog Grooming" />
                        <button type="submit" class="btn-appointment slide_right">Book an Appointment</button>
                        </form>
                     </div>
                     </div>
                     </div>
                     </div>
                     </section>
                     <section id="blogs">
                     <?php $myPoint = App\Models\Point::findOrFail(92); ?>
                     <div class="container-fluid text-center mb-5">
                     {!! $myPoint->point !!}
                     <div class="row">
                     <?php $card1 = App\Models\ImgInfoCard::findOrFail(36); ?>
                     <div class="column">
                     <img src="{{ asset($card1->image_path) }}" class="center-block img-responsive">
                     <span class="text-left">{!! $card1->info !!}</span>
                     <a href="#" class="btn category slide_right">Learn More</a>
                     </div>
                     <?php $card2 = App\Models\ImgInfoCard::findOrFail(37); ?>
                     <div class="column">
                     <img src="{{ asset($card2->image_path) }}" class="center-block img-responsive">
                     <span class="text-left">{!! $card2->info !!}</span>
                     <a href="#" class="btn category slide_right">Learn More</a>
                     </div>
                     <?php $card3 = App\Models\ImgInfoCard::findOrFail(38); ?>
                     <div class="column">
                     <img src="{{ asset($card3->image_path) }}" class="center-block img-responsive">
                     <span class="text-left">{!! $card3->info !!}</span>
                     <a href="#" class="btn category slide_right">Learn More</a>
                     </div>
                     </div>
                     </div>
                     </section>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      a2.classList.remove("active");
      a3.classList.remove("active");
      a4.classList.remove("active");
   }
   function OpenCategory02()
   {
      x2.style.display = "block";
      x1.style.display = "none";
      x3.style.display = "none";
      x4.style.display = "none";
      a2.classList.add("active");
      a1.classList.remove("active");
      a3.classList.remove("active");
      a4.classList.remove("active");
   }
   function OpenCategory03()
   {
      x3.style.display = "block";
      x1.style.display = "none";
      x2.style.display = "none";
      x4.style.display = "none";
      a3.classList.add("active");
      a2.classList.remove("active");
      a1.classList.remove("active");
      a4.classList.remove("active");
   }
   function OpenCategory04()
   {
      x4.style.display = "block";
      x1.style.display = "none";
      x2.style.display = "none";
      x3.style.display = "none";
      a4.classList.add("active");
      a2.classList.remove("active");
      a3.classList.remove("active");
      a1.classList.remove("active");
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