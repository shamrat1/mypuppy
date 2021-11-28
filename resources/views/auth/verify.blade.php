@extends('layouts.myApp')

@section('content')
<div class="breadcrumbs">
   
      <div class="container-inner">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}><i class="fa fa-home"></i>home</a></li>
            <li><a href="javascript:void(0)">Account</a></li>
            <li><a href="javascript:void(0)">Verify</a></li>
         </ul>
      </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
