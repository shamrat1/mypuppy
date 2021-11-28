@extends('layouts.myApp')
@section('content')
<style>
.imgService {
    width: 235px;
    height: 165px;
    border: 2px solid #fff;
}
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                  <a href="javascript:void(0)">
                  <span>Services</span>
                  </a>
               </li>
         </ul>
</div>

          <img src="{{ asset('images/Services-banner.png') }}" alt="Nature" style="width:100%;height:100%">
         
                        <?php $service = App\Models\Service::findOrFail(1);?>
         <div id="main" style="margin-bottom:15px; ">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <div class="row text-center">
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            
                            <p class="pt-5">
                            <a href="{{ url('repair-service') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                        <?php $service = App\Models\Service::findOrFail(2);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            
                            <p class="pt-5">
                           <a href="{{ url('vital-care') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                         <?php $service = App\Models\Service::findOrFail(3);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            <p class="text-center pt-5">
                           <a href="{{ url('dog-grooming') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                        <?php $service = App\Models\Service::findOrFail(4);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            <p class="pt-5">
                           <a href="{{ url('veterinary-services') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                        <?php $service = App\Models\Service::findOrFail(5);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            <p class="pt-5">
                           <a href="{{ url('adoptions') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                        <?php $service = App\Models\Service::findOrFail(6);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            <p class="pt-5">
                           <a href="{{ url('dog-training') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                        <?php $service = App\Models\Service::findOrFail(7);?>
                        <div class="column">
                            <img src="{{$service->image_path}}" class="imgService" alt="services" />
                            <p class="pt-5">
                           <a href="{{ url('diy-dog-wash') }}" class="btn-category slide_right">{{ $service->service_name }}</a>
                           </p>
                        </div>
                     </div>
                </div>
              </div>
            </div>
         </div>
      </div>
  @endsection