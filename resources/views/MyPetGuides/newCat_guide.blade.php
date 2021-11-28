@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<link rel="stylesheet" href="{{ asset('css/DogGuideStyle.css') }}">
<style>
   .imgFaq {
   height: 100%!important;
   width: 100%!important;  
   }
   .imgBanner{
   width:100%!important;
   height:100%!important;
   }
   #pet-parenting-made-easy-mob{
   display:none!important;
   }
   #pet-parenting-made-easy{
   display:block!important;
   }
   #welcome-home-tabs {
   display:block!important;
   }
   #mobileWelcome {
   display:none!important;
   }
   #new-dog-checklist-bnr{
   display:block!important;
   }
   #new-dog-checklist-bnr-mob{
   display:none!important;
   }
   #step-1-tabs {
   display:block!important;
   }
   #step-1-tabs-mob {
   display:none!important;
   }
   #right-sized-crate-bnr-mob {
   display:none!important;  
   }
   #right-sized-crate-bnr{
   display:block!important;
   }
   #step-2-tabs{
   display:block!important;  
   }
   #step-2-tabs-mob{
   display:none!important;  
   }
   #step-3-tabs{
   display:block!important;  
   }
   #step-3-tabs-mob{
   display:none!important;  
   }
   #step-4-tabs-mob{
   display:none!important;
   }
   #step-4-tabs{
   display:block!important;
   }
   #step-5-tabs-mob{
   display:none!important;
   }
   #step-5-tabs{
   display:block!important;
   }
   .pashaImgsty {
   height: 215px;
   width: 295px;
   border: 1px solid #fff;
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
   #new-dog-checklist-bnr .img-holder {
   background: url("images/new-cat-checklist-1500w-1000h.jpg") center no-repeat;
   background-size: cover;
   height: 212px;
   margin: 0 2%;
   }
   #right-sized-crate-bnr {
   background: #F4F7FF;
   }
   #right-sized-crate-bnr .container {
   max-width: 1095px !important;
   padding: 40px 0;
   }
   #right-sized-crate-bnr .row {
   display: flex;
   }
   #right-sized-crate-bnr .heading-holder {
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   text-align: center;
   margin-bottom: 40px;
   }
   #right-sized-crate-bnr .heading-holder h2 {
   padding-bottom: 10px;
   }
   #right-sized-crate-bnr .heading-holder p {
   max-width: 525px;
   }
   #right-sized-crate-bnr .content-holder {
   display: flex;
   flex-direction: column;
   align-items: center;
   margin-bottom: 40px;
   }
   #right-sized-crate-bnr .img-holder {
   display: flex;
   flex-direction: column;
   justify-content: center;
   height: 225px;
   margin-bottom: 20px;
   }
   #right-sized-crate-bnr .img-holder img {
   border-radius: 100%;
   max-height: 185px;
   width: 185px;
   border: 2px solid #fff;
   }
   #right-sized-crate-bnr .text-holder {
   display: flex;
   flex-direction: column;
   text-align: center;
   }
   #right-sized-crate-bnr .text-holder h3 {
   font-size: 25px;
   color: #005080;
   padding-bottom: 5px;
   }
   #right-sized-crate-bnr .text-holder h4 {
   font-size: 20px;
   padding-bottom: 20px;
   }
   #right-sized-crate-bnr .text-holder p {
   padding: 0 10%;
   }
   #step-5-tabs .container {
   max-width: 1095px !important;
   }
   #step-5-tabs .heading-holder {
   margin-bottom: 20px;
   }
   #step-5-tabs .heading-holder h2 {
   padding-bottom: 10px;
   }
   #step-5-tabs .text-holder {
   display: flex;
   flex-wrap: wrap;
   width: 46%;
   margin-bottom: 40px;
   }
   #step-5-tabs .text-holder div {
   display: flex;
   flex: calc(50%);
   align-items: center;
   margin-bottom: 10px;
   }
   #step-5-tabs .text-holder div p {
   margin: 0 10px;
   line-height: 1.38;
   }
   #step-5-tabs .category-selector {
   overflow-y: auto;
   border-bottom: 2px solid #00205B;
   margin-bottom: 40px;
   -ms-overflow-style: none; 
   scrollbar-width: none; 
   }
   #step-5-tabs .category-selector::-webkit-scrollbar {
   display: none; 
   }
   #step-5-tabs .category-selector ul {
   display: flex;
   justify-content: space-around;
   align-items: flex-end;
   list-style: none;
   text-align: center;
   }
   #step-5-tabs .category-selector li {
   display: flex;
   flex-direction: column;
   align-items: center;
   list-style: none;
   }
   #step-5-tabs .category-selector h5 {
   letter-spacing: 0.225px;
   font-weight: 300;
   text-transform: uppercase;
   text-align: center;
   color: #00205B;
   padding-bottom: 10px;
   }
   #step-5-tabs .step-5-category.active h5 {
   font-weight: 700 !important;
   }
   #step-5-tabs .step-5-category {
   cursor: pointer;
   width: 100%;
   }
   #step-5-tabs .step-5-category.active>.active-indicator {
   width: 100%;
   transition: width .15s ease-in;
   margin: auto;
   }
   #step-5-tabs .active-indicator {
   height: 6px;
   width: 0;
   background: #00205B;
   }
   #step-5-tabs .tab-content-holder .active {
   display: flex;
   flex-direction: column;
   }
   #step-5-tabs .step-5-content {
   display: none;
   }
   #step-5-tabs .step-5-content .row {
   margin-bottom: 10px;
   }
   #step-5-tabs .content-holder {
   display: flex;
   }
   #step-5-tabs .product-content {
   display:flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #F2F2F2;
   }
   #step-5-tabs .box {
   flex: 1 0 calc(20% - 25px);
   margin: 10px;
   background: #fff;
   padding: 0;
   }
   #step-5-tabs .box:after{
   content: '';
   display: block;
   padding-bottom: 100%;
   }
   #step-5-tabs .box:first-of-type {
   margin-left: 20px;
   }
   #step-5-tabs .box:last-of-type {
   margin-right: 20px;
   }
   #step-5-tabs .img-holder {
   display: flex;
   justify-content: center;
   align-items: center;
   box-sizing: border-box;
   cursor: pointer;
   background: #fff;
   margin: 10px;
   }
   #step-5-tabs .img-holder img {
   max-width: 140px;
   max-height: 140px;
   }
   #step-5-tabs .brands-mobile {
   display: none;
   }
   #step-5-tabs .carousel-control.left {
   background-image: url("images/Icon_Carat_Carousel-Left");
   background-size: cover;
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   left: 0;
   height: 40px;
   width: 40px;
   }
   #step-5-tabs .carousel-control.right {
   background-image: url("images/Icon_Carat_Carousel-Right");
   background-size: cover;
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   right: 0;
   height: 40px;
   width: 40px;
   }
   #step-5-tabs .carousel-control {
   opacity: 1;
   width: 0%;
   }
   #step-5-tabs .carousel-control:after {
   display: none;
   }
   #step-5-tabs .btn-holder {
   display: flex;
   justify-content: center;
   margin: 40px 0;
   }
   #step-5-tabs .btn-holder a {
   max-width: 211px;
   width: 100%;
   }
   #step-5-tabs .btn-holder a button {
   max-width: 211px;
   width: 100%;
   font-family: "PetcoCircular", Arial, sans-serif;
   }
   #step-5-tabs a {
   color: #00205B;
   }
   @media screen and (max-width: 768px) {
   #step-5-tabs .text-holder {
   width: 96%;
   }
   #step-5-tabs .text-holder div {
   flex: calc(50%);
   }
   #step-5-tabs .category-selector {
   width: 98%;
   margin: .5rem 0 20px 2%;
   }
   #step-5-tabs .tab-content-holder .active {
   display: flex;
   flex-direction: column;
   }
   #step-5-tabs ul {
   min-width: 1000px;
   }
   #step-5-tab-1-carousel {
   display: none;
   }
   #step-5-tab-2-carousel {
   display: none;
   }
   #step-5-tab-3-carousel {
   display: none;
   }
   #step-5-tab-4-carousel {
   display: none;
   }
   #step-5-tabs .brands-mobile {
   display: flex;
   }
   #step-5-tabs .tile-scroller {
   overflow: auto;
   white-space: nowrap;
   }
   #step-5-tabs .brands-mobile .row {
   display: flex;
   justify-content: flex-start;
   margin-bottom: 20px;
   }
   #step-5-tabs .heading-holder div {
   flex-direction: column;
   }
   #step-5-tabs .product-content {
   white-space: normal;
   min-width: 190px;
   height: 190px;
   margin: 10px;
   }
   #step-5-tabs .product-content:first-of-type {
   margin-left: 0;
   }
   #step-5-tabs .img-holder {
   height: 140px;
   width: 140px;
   }
   }
   @media screen and (max-width: 768px) {
   #right-food-finder-bnr .container {
   height: auto;
   }
   #right-food-finder-bnr .row {
   flex-direction: column;
   height: auto;
   }
   #right-food-finder-bnr .text-holder {
   text-align: center;
   margin-top: 40px;
   }
   #right-food-finder-bnr .text-holder h2 {
   padding: 0 5% 10px 5%;
   }
   #right-food-finder-bnr .text-holder p {
   padding: 0 5% 10px 5%;
   }
   #right-food-finder-bnr .img-holder {
   background-color: #6EDCFA;
   width: 100%;
   margin: 0;
   }
   #right-food-finder-bnr .img-holder img {
   max-width: 375px;
   margin-top: 10px;
   }
   #right-food-finder-bnr .btn-holder {
   margin-bottom: 40px;
   }
   }
   @media screen and (max-width: 768px) {
   #right-sized-crate-bnr .row {
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   #right-sized-crate-bnr .heading-holder {
   width: 80%;
   }
   #right-sized-crate-bnr .img-holder {
   height: 175px;
   }
   #right-sized-crate-bnr .img-holder img {
   max-height: 175px;
   }
   }
   @media screen and (max-width: 768px) {
   #step-1-tabs .text-holder {
   width: 96%;
   }
   #step-1-tabs .text-holder div {
   flex: calc(50%);
   }
   #step-1-tabs .category-selector {
   width: 98%;
   margin: .5rem 0 20px 2%;
   }
   #step-1-tabs .tab-content-holder .active {
   display: flex;
   flex-direction: column;
   }
   #step-1-tabs ul {
   min-width: 1000px;
   }
   #step-1-tab-1-carousel {
   display: none;
   }
   #step-1-tab-2-carousel {
   display: none;
   }
   #step-1-tab-3-carousel {
   display: none;
   }
   #step-1-tab-4-carousel {
   display: none;
   }
   #step-1-tab-5-carousel {
   display: none;
   }
   #step-1-tab-6-carousel {
   display: none;
   }
   #step-1-tabs .brands-mobile {
   display: flex;
   }
   #step-1-tabs .tile-scroller {
   overflow: auto;
   white-space: nowrap;
   }
   #step-1-tabs .brands-mobile .row {
   display: flex;
   justify-content: flex-start;
   margin-bottom: 20px;
   }
   #step-1-tabs .heading-holder div {
   flex-direction: column;
   }
   #step-1-tabs .product-content {
   white-space: normal;
   min-width: 190px;
   height: 190px;
   margin: 10px;
   }
   #step-1-tabs .product-content:first-of-type {
   margin-left: 0;
   }
   #step-1-tabs .img-holder {
   height: 140px;
   width: 140px;
   }
   }
   @media screen and (max-width: 768px) {
   #new-dog-checklist-bnr .row {
   flex-direction: column;
   height: auto;
   }
   #new-dog-checklist-bnr .img-holder {
   width: 100%;
   height: 260px;
   }
   #new-dog-checklist-bnr .svg-holder {
   width: 96%;
   margin-top: 40px;
   }
   #new-dog-checklist-bnr .svg-holder img {
   width: 95px;
   }
   #new-dog-checklist-bnr .text-holder {
   text-align: center;
   margin-bottom: 40px;
   }
   #new-dog-checklist-bnr .text-holder h2 {
   padding-bottom: 10px;
   }
   }
   @media screen and (max-width: 768px) {
   #welcome-home-tabs .heading-holder p {
   width: 80%;
   }
   #welcome-home-tabs .category-selector {
   width: 98%;
   margin: .5rem 0 20px 2%;
   }
   #welcome-home-tabs .tab-content {
   flex-direction: column;
   height: auto;
   }
   #welcome-home-tabs .content-holder .active {
   display: flex;
   flex-direction: column;
   }
   #welcome-home-tabs .tab-content .row {
   display: flex;
   flex-direction: column;
   }
   #welcome-home-tabs .text-holder {
   width: 96%;
   margin: .5rem 2% !important;
   }
   }
   @media only screen and (max-width: 600px) {
   #welcome-home-tabs {
   display:none!important;
   }
   #new-dog-checklist-bnr{
   display:none!important;
   }
   #mobileWelcome {
   display:block!important;
   }
   #new-dog-checklist-bnr-mob{
   display:block!important;
   }
   #step-1-tabs{
   display:none!important;
   }
   #step-1-tabs-mob {
   display:block!important;
   }
   #right-sized-crate-bnr{
   display:none!important;  
   }
   #right-sized-crate-bnr-mob{
   display:block!important;  
   }
   #step-2-tabs{
   display:none!important;
   }
   #step-2-tabs-mob{
   display:block!important;
   }
   #right-food-finder-bnr{
   display:none!important;
   }
   #step-3-tabs-mob{
   display:block!important;
   }
   #step-3-tabs{
   display:none!important;
   }
   #step-4-tabs-mob{
   display:block!important;
   }
   #step-4-tabs{
   display:none!important;
   }
   #step-5-tabs-mob{
   display:block!important;
   }
   #step-5-tabs{
   display:none!important;
   }
   #pet-parenting-made-easy-mob{
   display:block!important;
   }
   #pet-parenting-made-easy{
   display:none!important;
   }
   .imgCircle {
   width:300px!important;
   height:300px!important;
   border-radius:100%!important;
   border: 2px solid #fff;
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
               <span>New Cat Guides</span>
               </a>
            </li>
         </ul>
</div>

<img src="{{ asset('images/catGuide.png') }}" alt="bannerimage" class="imgBanner">
<div id="main" style="margin-bottom:15px; ">
   <div class="page-home">
      <div class="container">
         <div class="about-us-content">
            <br>
            <h2 class="text-center">WELCOME HOME</h2>
            <p class="text-center">Adding a kitty to your family is a fun-filled occasion that can also raise a lot of questions. Be sure you're prepared by taking the right steps before and after bringing them home.</p>
            <section class="spacing-top-md spacing-bottom-md bg-white">
               <div id="welcome-home-tabs">
                  <div class="container">
                     <div class="row">
                        <div class="column category-selector">
                           <ul>
                              <li class="tab-category active" id="tab-category1" onclick="OpenCategory01()" >
                                 <h5>Before coming home</h5>
                                 <div class="active-indicator"></div>
                              </li>
                              <li class="tab-category" id="tab-category2" onclick="OpenCategory02()">
                                 <h5>Decoding your cat's behavior</h5>
                                 <div class="active-indicator"></div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="row">
                        <div class="content-holder">
                           <div class="tab-content active"  id="tab-1">
                              <div class="row">
                                 <div class="column text-holder">
                                    <h3>Create a safe space</h3>
                                    <p>Create a feline-friendly space in one room that has your new cat's food, water, bed and litter box.</p>
                                 </div>
                                 <div class="column text-holder">
                                    <h3>Cat-proof your home</h3>
                                    <p>Cat-proof by picking up small objects and electrical cords, and be sure that any plants in your house are nontoxic to your cat.</p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="column text-holder">
                                    <h3>Research their food</h3>
                                    <p>Ask what food your dog has been eating so you can continue feeding the same or transition slowly to a new brand.</p>
                                 </div>
                                 <div class="column text-holder">
                                    <h3>Find a vet</h3>
                                    <p>Identify your kitty’s new veterinarian (Psst…MPMP offers a variety of vet services at many locations!)</p>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-content" id="tab-2">
                              <div class="row">
                                 <div class="column text-holder">
                                    <h3>Rubbing</h3>
                                    <p>Rubbing their head or body against things? This is called scent marking and is a sign of settling in.</p>
                                 </div>
                                 <div class="column text-holder">
                                    <h3>Meowing</h3>
                                    <p>Meowing a lot? Your cat would like some attention and perhaps to be calmly petted.</p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="column text-holder">
                                    <h3>Kneading</h3>
                                    <p>Kneading with their paws? Congratulations—you have one happy kitty.</p>
                                 </div>
                                 <div class="column text-holder">
                                    <h3>Making aggressive noises</h3>
                                    <p>Growling, hissing or spitting? Your cat is likely fearful or frustrated. Give them time and space to adjust.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--mobile welc-->
               <div id="mobileWelcome">
                  <div class="container">
                     <table class="table table-bordered text-capitalize p-3">
                        <thead class="thead-light">
                           <tr>
                              <th class="text-center" colspan="2">
                                 <h4>Before coming home</h4>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Create a safe space</th>
                              <td>Create a feline-friendly space in one room that has your new cat's food, water, bed and litter box.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Cat-proof your home</th>
                              <td>Cat-proof by picking up small objects and electrical cords, and be sure that any plants in your house are nontoxic to your cat.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Research their food</th>
                              <td>Ask what food your dog has been eating so you can continue feeding the same or transition slowly to a new brand.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;"  scope="row">Find a vet</th>
                              <td>Identify your kitty’s new veterinarian (Psst…MPMP offers a variety of vet services at many locations!)</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="container">
                     <table class="table  table-bordered  text-capitalize p-3">
                        <thead class="thead-light">
                           <tr>
                              <th class="text-center" colspan="2">
                                 <h4>Decoding your cat's behavior</h4>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Rubbing</th>
                              <td>Rubbing their head or body against things? This is called scent marking and is a sign of settling in.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Meowing</th>
                              <td>Meowing a lot? Your cat would like some attention and perhaps to be calmly petted.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Kneading</th>
                              <td>Kneading with their paws? Congratulations—you have one happy kitty.</td>
                           </tr>
                           <tr>
                              <th style="width:40%; padding:5px;" scope="row">Making aggressive noises</th>
                              <td>Growling, hissing or spitting? Your cat is likely fearful or frustrated. Give them time and space to adjust.</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
            </section>
            </div>
         </div>
         <section class="spacing-top-md spacing-bottom-md bg-white">
            <div id="new-dog-checklist-bnr">
               <div class="container">
                  <div class="row">
                     <div class="col-5 col-12-sm img-holder">&nbsp;</div>
                     <div class="col-2 col-12-sm svg-holder">
                        <img src="{{ asset('images/check-icon.png') }}" lazyimg="loaded" data-src="{{ asset('images/check-icon.png') }}" alt="checkmark symbol" class="center-block img-responsive">
                     </div>
                     <div class="col-5 col-12-sm text-holder">
                        <h2>New kitten checklist</h2>
                        <p>We’re to help with the essentials your new cat will need. Get started below.</p>
                     </div>
                  </div>
               </div>
            </div>
            <!--New cat mobile-->
            <div id="new-dog-checklist-bnr-mob">
               <div class="container alert alert-info">
                  <div class="text-center text-capitalize">
                     <table>
                        <tr>
                           <td>
                              <img src="{{ asset('images/check-icon.png') }}" lazyimg="loaded" data-src="{{ asset('images/check-icon.png') }}" alt="checkmark symbol" style="width:35px;height:35px;" class="img-responsive">
                           </td>
                           <td>
                              <h4 class="p-3">New kitten checklist</h4>
                           </td>
                        </tr>
                     </table>
                     <p>>We’re to help with the essentials your new cat will need. Get started below.</p>
                  </div>
               </div>
            </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
            <div id="step-1-tabs">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-12-sm heading-holder">
                        <h2>Step 1: Serve up the right nutriton</h2>
                        <p>From minimally processed to scientifically formulated foods, we offer high-quality options at prices that won’t break the bank.</p>
                     </div>
                     <div class="col-12 col-12-sm text-holder">
                        <div>
                           <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                           <p>Dry Food</p>
                        </div>
                        <div>
                           <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                           <p>Wet Food</p>
                        </div>
                        <div>
                           <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                           <p>Treats</p>
                        </div>
                        <div>
                           <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                           <p>Food and Water Bowls</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Mob-->
            <div id="step-1-tabs-mob">
               <div class="container mb-5">
                  <div class="row">
                     <div class="col-10 col-10-sm heading-holder">
                        <h2>Step 1: Serve up the right nutriton</h2>
                        <p>From minimally processed to scientifically formulated foods, we offer high-quality options at prices that won’t break the bank.</p>
                     </div>
                     <div class="col-10 col-10-sm text-holder">
                        <table>
                           <tr>
                              <td>
                                 <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                                 <span>Dry Food</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                                 <span>Wet Food</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                                 <span>Treats</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
                                 <span>Food and Water Bowls</span>
                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
         <div id="right-sized-crate-bnr">
         <div class="container">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Types of cat litter</h2>
         <p>Finding the right cat litter can help ease feline stress and prevent litter box issues like urinating outside of the litter box.</p>
         </div>
         </div>
         <div class="row">
         <div class="col-4 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-clumping-litter-458w-608h.png') }}" class="center-block img-responsive">
         </div>
         <div class="text-holder">
         <h4>Clumping</h4>
         <p>Helps with odor control and easy waste removal.</p>
         </div>
         </div>
         <div class="col-4 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-non-tracking-litter-426w-617h.png') }}" class="center-block img-responsive">
         </div>
         <div class="text-holder">
         <h4>Non-tracking</h4>
         <p>Helps keep litter in the box and not around the home.</p>
         </div>
         </div>
         <div class="col-4 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-dust-free-litter-434w-613h.png') }}" class="center-block img-responsive">
         </div>
         <div class="text-holder">
         <h4>Dust-free</h4>
         <p>Helps keep households free of litter dust in the air.</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!--Mobile-->
         <div id="right-sized-crate-bnr-mob">
         <div class="container alert alert-primary">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Types of cat litter</h2>
         <p>Finding the right cat litter can help ease feline stress and prevent litter box issues like urinating outside of the litter box.</p>
         </div>
         </div>
         <div class="row">
         <div class="col-12 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-clumping-litter-458w-608h.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-cat-clumping-litter-458w-608h.png') }}" alt="img" class="center-block imgCircle">
         </div>
         <div class="text-holder">
         <h4>Clumping</h4>
         <p>Helps with odor control and easy waste removal.</p>
         </div>
         </div>
         </div>
         <div class="row">
         <div class="col-12 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-non-tracking-litter-426w-617h.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-cat-non-tracking-litter-426w-617h.png') }}" alt="img" class="center-block imgCircle">
         </div>
         <div class="text-holder">
         <h4>Non-tracking</h4>
         <p>Helps keep litter in the box and not around the home.</p>
         </div>
         </div>
         </div>
         <div class="row">
         <div class="col-12 col-12-sm content-holder">
         <div class="img-holder">
         <img src="{{ asset('images/new-cat-dust-free-litter-434w-613h.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-cat-dust-free-litter-434w-613h.png') }}" alt="img" class="center-block imgCircle">
         </div>
         <div class="text-holder">
         <h4>Dust-free</h4>
         <p>Helps keep households free of litter dust in the air.</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
         <div id="step-2-tabs">
         <div class="container">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 2: Home sweet home</h2>
         <p>Ensure your space feels like their new home.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Beds</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Scratchers</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Cleaning Supplies</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Litter</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Litter Boxes & Scoops</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Litter Accessories</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!--Mob step-2-tabs-->
         <div id="step-2-tabs-mob">
         <div class="container alert alert-info">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 2: Home sweet home</h2>
         <p>Ensure your space feels like their new home.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Beds</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Scratchers</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Cleaning Supplies</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Litter</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Litter Boxes & Scoops</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Litter Accessories</span>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-lg spacing-bottom-lg">
         <div id="right-food-finder-bnr">
         <div class="container">
         <div class="row">
         <div class="col-3 img-holder">
         <img src="{{ asset('images/new-cat-rff-bnr-1800w-1200h.jpg') }}" alt="Right Food Finder on phone" class="center-block img-responsive">
         </div>
         <div class="col-6 col-12-sm text-holder">
         <h2>TAKE THE GUESSWORK OUT OF NUTRITION</h2>
         <p>Explore our Right Food Finder flowchart to find the right food for your kitten's unique needs.</p>
         </div>
         <div class="col-3 btn-holder">
         <button class="btn-category slide_right">Get Started</button>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
         <div id="step-3-tabs">
         <div class="container">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 3: Good to go</h2>
         <p>Help you new cat adapt to traveling with products that support a stress-free trip for all.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Collars</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>ID Tags</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Leashes and Harnesses</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Crates and Carriers</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!--step-3-tabs-mob-->
         <div id="step-3-tabs-mob">
         <div class="container alert alert-primary">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 3: Good to go</h2>
         <span>Help you new cat adapt to traveling with products that support a stress-free trip for all.</span>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Collars</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>ID Tags</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Leashes and Harnesses</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Crates and Carriers</span>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
         <div id="step-4-tabs">
         <div class="container">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 4: Healthy start</h2>
         <p>Set up a care plan tailored to your pup's long-term needs.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Flea and Tick Prevention</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Vitamins and Supplements</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Dental Care</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <p>Grooming Supplies</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!--step-4-tabs-mob-->
         <div id="step-4-tabs-mob">
         <div class="container alert alert-info">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 4: Healthy start</h2>
         <p>Set up a care plan tailored to your pup's long-term needs.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Flea and Tick Prevention</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Dental Care</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Vitamins and Supplements</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Grooming Tools</span>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-md bg-white">
         <div id="step-5-tabs">
         <div class="container">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 5: Fun and helpful extras</h2>
         <p>Keep your cat happy and engaged with fun extras.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}" alt="">
         <p>Cat Furniture</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}" alt="">
         <p>Toys</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}" alt="">
         <p>Water Fountains</p>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}" alt="">
         <p>Diffusers and Sprays</p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!--mob step-5-tabs-mob-->
         <div id="step-5-tabs-mob">
         <div class="container alert alert-primary">
         <div class="row">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Step 5: Fun and helpful extras</h2>
         <p>Keep your cat happy and engaged with fun extras.</p>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Cat Furniture</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Toys</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Water Fountains</span>
         </div>
         <div>
         <img src="{{ asset('images/new-pet-checkmark.png') }}" lazyimg="loaded" data-src="{{ asset('images/new-pet-checkmark.png') }}">
         <span>Diffusers and Sprays</span>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <section class="spacing-top-md spacing-bottom-md bg-white">
         <div id="pet-parenting-made-easy">
         <div class="container">
         <div class="row text-center">
         <div class="column heading-holder">
         <h2>Services that support their health</h2>
         <p>MPMP is your one-stop destination for everything you and your new friend need to enjoy a happy, successful life together.</p>
         </div>
         </div>
         <div class="row">
         <div class="column text-holder">
         <img src="{{ asset('images/new-cat-vet-services-1074w-628h.jpg') }}" class="imageVitalCare" />
         <div>
         <h4 class="text-center p-2">Vet services</h4>
         <p>We are committed to delivering compassionate vet care with a broad range of affordable, personalized solutions. Whatever your pet needs, our vets can help.</p>
         <p class="text-center"><a href="#" class="btn-category slide_right">Find a Vet</a></p>
         </div>
         </div>
         <div class="column text-holder">
         <img src="{{ asset('images/new-cat-insurance-1074w-628h (1).jpg') }}" class="imgInsurance" />
         <div>
         <h4 class="text-center p-2">Pet insurance</h4>
         <p>From accidents to illnesses, be ready for anything with insurance coverage that helps ensure you don’t have to choose between quality care for your pet and paying your bill.</p>
         <p class="text-center"><a href="#" class="btn-category slide_right">Get A Free Quote</a></p>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!-- pet-parenting-made-easy mob  -->
         <div id="pet-parenting-made-easy-mob">
         <div class="container">
         <div class="row text-center">
         <div class="col-12 col-12-sm heading-holder">
         <h2>Services that support their health</h2>
         <p>MPMP is your one-stop destination for everything you and your new friend need to enjoy a happy, successful life together.</p>
         </div>
         </div>
         <div class="row">
         <div class="col-12 col-12-sm text-holder">
         <img src="{{ asset('images/new-cat-vet-services-1074w-628h.jpg') }}" class="imageVitalCare" />
         <div>
         <h4 class="text-center p-2">Vet services</h4>
         <p>We are committed to delivering compassionate vet care with a broad range of affordable, personalized solutions. Whatever your pet needs, our vets can help.</p>
         <p class="text-center p-3"><a href="#" class="btn-category slide_right">Find a Vet</a></p>
         </div>
         </div>
         <div class="col-12 col-12-sm text-holder">
         <img src="{{ asset('images/new-cat-insurance-1074w-628h (1).jpg') }}" class="imgInsurance" />
         <div>
         <h4 class="text-center p-2">Pet insurance</h4>
         <p>From accidents to illnesses, be ready for anything with insurance coverage that helps ensure you don’t have to choose between quality care for your pet and paying your bill.</p>
         <p class="text-center p-3"><a href="#" class="btn-category slide_right">Get A Free Quote</a></p>
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>
         <div class="container text-center">
         <h2>New kitten tips and tricks from the experts</h2>
         <p>Set yourself up for success with these useful resources.</p>
         <div class="row">
         <div class="column">
         <img src="{{ asset('images/first-vet-visit-guide-article-img-dr.jpg') }}" class="pashaImgsty">
         <h4>First Vet Visit Guide</h4>
         <p><a href="{{ url('how-to-prepare-for-your-kitten-s-first-vet-visit') }}" class="btn-category slide_right">Read More</a></a>
         </div>
         <div class="column">
         <img src="{{ asset('images/kitten-nutritional-needs-article-img-700w-500h.jpg') }}" class="pashaImgsty">
         <h4>Unique nutritional needs of kittens</h4>
         <p><a href="{{ url('the-unique-nutritional-needs-of-kittens-and-how-to-address-them') }}" class="btn-category slide_right">Read More</a></a>
         </div>
         <div class="column">
         <img src="{{ asset('images/new-cat-litter-article-img-700w-500h.jpg') }}" class="pashaImgsty">
         <h4>How to do litter the right way</h4>
         <p><a href="{{ url('Cat-Food-Nutrition-Guidelines-from-Kitten-to-Senior') }}" class="btn-category slide_right">Read More</a></a>
         </div>
         </div>
         </div>
         <div class="container-fluid">
         <div class="row align-items-center">
         <div class="col-lg-7 col-md-12">
         <div class="faq-accordion">
         <h3>Frequently Asked Questions</h3>
         <ul class="accordion">
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> Can a kitten be left alone during the day?
         </a>
         <p class="accordion-content">
         While cats are typically lower maintenance pets and can mostly take care of themselves, a kitten may need additional attention if you plan to be gone for long stretches of time. If you have adopted a new or very young kitten, it's best to not leave them alone for more than a four-hour stretch without checking on them to ensure they have plenty of water and have not gotten into any dangerous situations while exploring their new surroundings. As they age, they will be perfectly happy waiting for you to return from work to play with them.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> How long does it take for a kitten to get used to a new home?
         </a>
         <p class="accordion-content">
         Different kittens may take different amounts of time to become fully adjusted to their new space. You can help your new family member get used to their new home by giving them a safe place to call their own and slowly introducing them to other people and pets.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> What essentials do I need for a new kitten?
         </a>
         <p class="accordion-content">
         If you're adopting a new kitten, start by getting these essential supplies before bringing them home: kitten food, kitten treats and food and water bowls; litter, a litterbox and accessories, like a scoop, deodorizer and litter liners; a stain and odor remover; a cat scratcher; a perch or cat condo; toys; a bed; a collar and ID tags; a kitten carrier; and calming solutions, like supplements or diffusers.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> What should do I with my kitten on the first night?
         </a>
         <p class="accordion-content">
         Your new kitten will likely feel overwhelmed and a little bit nervous when they first come home. You can alleviate some of this by creating a safe space in a bedroom or bathroom and letting them explore and get used to that area first. If you have other pets in your home, make sure introductions happen slowly.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> What supplies do you need for a cat?
         </a>
         <p class="accordion-content">
         A basic supplies checklist for your new cat includes cat food, cat treats and food and water bowls; litter, a litterbox and accessories, like a scoop, deodorizer and litter liners; a stain and odor remover; a cat scratcher; a perch or cat condo; toys; a bed; a collar and ID tags; a travel carrier; and calming solutions, like supplements or diffusers.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> How long will it take for a cat to get used to a new home?
         </a>
         <p  class="accordion-content ml-2 list-unstyled">
         Depending on your new cat's age and personality, they may take some time to become fully accustomed to their new space. To help ease this transition, be sure you have all the right supplies before you bring your new cat home. Once there, give them a dedicated space, introduce them to other people and pets slowly and give them hands-on attention when they want it.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> Is Vital Care only for dogs?
         </a>
         <p  class="accordion-content ml-2 list-unstyled">
         Vital Care was built with dogs in mind, as most of our pet parents are dog family members, but cats can join, too! Cats can enjoy all benefits outside of nail trims and teeth-brushing.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> What is MPMP Insurance?
         </a>
         <p  class="accordion-content ml-2 list-unstyled">
         Petco Insurance is flexible, affordable and dependable pet insurance. This insurance coverage allows you to visit any vet, manage your insurance plan from any location and get free expert guidance with our pet concierge team. For full Petco Insurance terms and conditions.
         </p>
         </li>
         <li class="accordion-item">
         <a class="accordion-title" href="javascript:void(0)">
         <i class="fa fa-plus-circle"></i> How much does a Petco Insurance plan cost?
         </a>
         <p  class="accordion-content ml-2 list-unstyled">
         Insurance plan pricing varies, depending on the on age and breed of your pet, as well as your zip code. You can also customize your plan’s price by choosing from the options for annual limit, reimbursement percentage and annual deductible amount.
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
         </div>
         </div>
      </div>
      <br><br>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   var x1 = document.getElementById("tab-1");
   var x2 = document.getElementById("tab-2");
   
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