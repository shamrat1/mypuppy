@extends('layouts.myApp')
@section('content')
@php
  $user = Auth::user();
@endphp
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
    <div class="row">
      <div class="col-3">
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
      <div class="col">
        @if($user->referalCode != null)
          <h2>Your Referral Code is {{ $user->referalCode }}</h2>
          <p>Your invite link: <span>{{route("register")}}?ref={{ $user->referalCode }}</span></p>
        @else
          <h2>You don't have any referral code right now.</h2>
          <form action="{{ route('home.generate.referral') }}" method="POST">
              @csrf
              <button class="btn btn-link rounded shadow ">Generate Referral Code to earn more.</button>
          </form>

        @endif
      </div>
    </div>
  </div>
  
@endsection