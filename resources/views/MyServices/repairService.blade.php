@extends('layouts.myApp')
@section('content')
<style>
.imgService{
    width:540px!important;
    height:425px!important;
}
.background-img-newsaltwaterfish-hero-container {
        background-image: url(images/repairbanner.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center fixed;
        max-width: 100%!important;
        padding: 50px;
        margin-left:5px!important;
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
                <span>Repair Service</span>
                </a>
             </li>
         </ul>
</div>

  <img src="{{ asset('images/repairbanner.png') }}" alt="Nature" style="width:100%;height:100%">
 <?php $repairService=App\Models\ServiceContent::findOrFail(1); ?>
 <div id="main" style="margin-bottom:15px; ">
    <div class="page-home">
       <div class="container">
          <div class="about-us-content">
                {!! $repairService->topic !!}
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 right">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid imgService" src="{{ asset($repairService->image_path) }}" alt="image" />
                                </a>
                    </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 left">
                            <div class="cms-block f-right">
                                {!! $repairService->information !!}
                            </div>
                    </div>
                   <?php $repairService1=App\Models\ServiceContent::findOrFail(2); ?> 
                    <div class="col-lg-6 col-md-6 col-sm-6 right">
                                <div class="cms-block f-left">
                                    {!! $repairService1->information !!}
                                </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 left">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid imgService" src="{{ asset($repairService1->image_path) }}"  alt="image" />
                                </a>
                            </div>
                </div>
                
             </div>
      </div>
    </div>
 </div>
</div>
 
  @endsection