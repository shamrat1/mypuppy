@extends('layouts.myApp')
@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
<style>
    .deskSignIn01
    {
        padding: 0px 10rem;
    }
    .desktop-margin{
       margin: -35px 0px 85px;
    }
    
    .login-box .bklmj {
         background-color: transparent; 
        background: url("images/bg.png");
        background-size: cover;
        background-repeat: no-repeat;
  
  background-position: right; 
        margin: 0px;
        filter: bluescale(100%);
        padding: 45px 20px;
        padding-bottom: 48px;
    }
    @media only screen and (max-width: 600px) {
    .deskSignIn01
    {
        padding:0px;
    }
    .desktop-margin{
       margin: 0px;
    }
}
</style>
<div class="breadcrumbs">
   
      <div class="container-inner">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}><i class="fa fa-home"></i>home</a></li>
            <li><a href="javascript:void(0)">Account</a></li>
            <li><a href="javascript:void(0)">Login</a></li>
         </ul>
      </div>
</div>

                <!-- breadcrumb -->
                
               
        <div class="container-fluid desktop-margin ">
        
            <div class=" no-pdding login-box">
                <div class="row no-margin w-100 bklmj">
                    <div class="col-lg-8 col-md-6 deskSignIn01">
                        
                        <h2>Login</h2>
                        
                       
                        <div class="row no-margin past">
                            <p>Dont Have an Account? <span>Create your Account</span> </p>
                        </div>

                        
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-box-cont">
                            <div class="input-group mb-3">
                               
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                    
                        
                            <div class="right-bkij mb-3">
                                <button type="submit" class="btn btn-success btn-round">sign In</button>
                            </div>  
                            @if (Route::has('password.request'))
                            <a class="btn-link forget-p" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                             @endif
                        </div>
                        
                    </form>

                    </div>
                
                    <div class="col-lg-4 col-md-6 box-de">
                        <div class="ditk-inf">
                            <h2 class="w-100 text-white">Welcome Back </h2>
                            <p class="text-white">Simply Create your account by <br> clicking the Signup Button</p>
                            <a href="{{ route('register') }}" type="button" class="btn btn-category slide_right h4"><i class="fa fa-user-plus"> </i>&nbsp; Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection