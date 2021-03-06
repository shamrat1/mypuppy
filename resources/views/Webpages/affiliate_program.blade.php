@extends('layouts.myApp')
@section('content')
<style>
.imgBanner{
   width:100%!important;
   height:100%!important;
}
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Affiliate Program</a></li>
         </ul>
</div>
<img src="{{ asset('images/affiliateBanner.png') }}" alt="bannerimage" class="imgBanner">
<div id="affiliate-login" class="container">
  <br>
      <div class="row">
                <div id="content" class="col-sm-12">
      
      <p>Affiliate program is free and enables members to earn revenue by placing a link or links on their web site which advertises Marketplace 3 or specific products on it. Any sales made to customers who have clicked on those links will earn the affiliate commission. The standard commission rate is currently 5%.</p><p>For more information, visit our FAQ page or see our Affiliate terms &amp; conditions.</p>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>New Affiliate</h2>
            <p></p><p>I am not currently an affiliate.</p><p>Click Continue below to create a new affiliate account. Please note that this is not connected in any way to your customer account.</p><p></p>
            <a class="btn btn-primary" href="{{ url('register') }}">Continue</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>Affiliate Login</h2>
            <p><strong>I am a returning affiliate.</strong></p>
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label" for="input-email">Affiliate E-Mail</label>
                <input type="text" name="email" value="" placeholder="Affiliate E-Mail" id="input-email" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">Password</label>
                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                <a href="#">Forgotten Password</a> </div>
              <input type="submit" value="Login" class="btn btn-primary">
                          </form>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
@endsection