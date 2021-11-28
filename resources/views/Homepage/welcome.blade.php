@extends('layouts.mainApp')
@section('content')
@include('Homepage.homeSlider')
@include('Homepage.policyBlock')
@include('Homepage.homeFunctionalities')
<!-- Category  01 -->
@include('Homepage.homeCategory01')

<div class="pt-block static-middle-store3" id="deskBookOnline01">
   <div class="image">
      <a href="#"><img src="{{ asset('images/HomeBookOnline.png') }}" class="imgBook" alt="img1"></a>
   </div>
</div>

<!-- homeNewProducts  -->
@include('Homepage.homeNewProducts')
<!-- Category  02 -->
@include('Homepage.homeCategory02')
<!-- Category  07 -->
@include('Homepage.homeCategory07')
<!-- Category  08 -->
@include('Homepage.homeCategory08')
</div>
<!-- Right Home SideBar  -->
@include('Homepage.homeRightSideBar')
</div>
</div>
</div>
</div>
</div>
<div class="main-row ">
   <div class="container">
      <div class="row">
         <div class="main-col col-sm-12 col-md-12">
            <div class="row sub-row">
               <div class="sub-col col-sm-12 col-md-12">
                  @include('Homepage.homeShopCategoryCarousel')
                  @include('Homepage.homeResourceCenterCarousel')
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection