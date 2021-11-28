@extends('layouts.myApp')
@section('content')
<div class="breadcrumbs">
    <ul class="breadcrumb">
       <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
       <li>
          <a href="javascript:void(0)">
          <span>My Accounts</span>
          </a>
       </li>
    </ul>
 </div>
 <br>
 <div id="content" class="col-sm-12 pl-5">
    <h2>My Account</h2>
    <ul class="list-unstyled">
      <li><a href="">Edit your account information</a></li>
      <li><a href="">Change your password</a></li>
      <li><a href="">Modify your address book entries</a></li>
      <li><a href="">Modify your wish list</a></li>
    </ul>
          <h2>My Orders</h2>
    <ul class="list-unstyled">
      <li><a href="">View your order history</a></li>
      
              <li><a href="">Your Reward Points</a></li>
              <li><a href="">View your return requests</a></li>
      <li><a href="">Your Transactions</a></li>
    </ul>
    <h2>My Affiliate Account</h2>
    <ul class="list-unstyled">
              <li><a href="">Register for an affiliate account</a></li>
            </ul>
    <h2>Newsletter</h2>
    <ul class="list-unstyled">
      <li><a href="">Subscribe / unsubscribe to newsletter</a></li>
    </ul>
    </div>
@endsection