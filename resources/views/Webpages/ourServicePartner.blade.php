@extends('layouts.myApp')
@section('content')
<style>
    .imgthumbnail01 {
        width:250px;
        height:180px;
        border: 2px solid #fff;
    }
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
               <a href="javascript:void(0)">
               <span>Our Service Partners</span>
               </a>
            </li>
         </ul>
</div>

             <div class="container mb-3">
             <h1 class="title-page">Our Service Partners</h1>
            
            <div class="row">
                <div class="column">
                    <img src="{{ asset('images\petAdoption.jpg') }}" class="imgthumbnail01">
                    <h4>Adoption</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\dogSchool.jpg') }}" class="imgthumbnail01">
                    <h4>Dog school</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\dogwash.jpg') }}" class="imgthumbnail01">
                    <h4>DIY dog wash</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\dogtraining.jpg') }}" class="imgthumbnail01">
                    <h4>Dog training</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\dogGrooming.jpg') }}" class="imgthumbnail01">
                    <h4>Grooming</h4>
                </div>    
                <div class="column">
                     <img src="{{ asset('images\petfoundation.png') }}" class="imgthumbnail01">
                    <h4>Pet foundation</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\petInsurance.jpg') }}" class="imgthumbnail01">
                    <h4>Pet insurance</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\puppyschool.jpg') }}" class="imgthumbnail01">
                    <h4>Puppy school</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\petsalon.jpg') }}" class="imgthumbnail01">
                    <h4>Salon</h4>
                </div>    
                <div class="column">
                    <img src="{{ asset('images\veterinary.jpg') }}" class="imgthumbnail01">
                    <h4>Veterinary services</h4>
                </div>    
            </div>
            </div>
        </div>
                     
    
@endsection