@extends('layouts.myApp')

@section('content')
<div class="breadcrumbs">
   
      <div class="container-inner">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}><i class="fa fa-home"></i>home</a></li>
            <li><a href="javascript:void(0)">Account</a></li>
            <li><a href="javascript:void(0)">Sign Up</a></li>
         </ul>
      </div>
</div>
<div class="container">
    <div class="row justify-content-center p-5 m-5 shadow">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                <h3>{{ __('Create an account') }}</h3>
                <p class="text-muted">It's quick and easy.</p>
            </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if(session()->has('referrer'))
                            <input type="hidden" name="referrer" value="{{ session()->get('referrer') }}">
                        @endif
                        <h4  class="text-muted">Account Information </h4>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                           <div class="col-md-6">
                               <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="UserName" required autocomplete="username">
                               @error('username')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <h4  class="text-muted">Basic Information </h4>
                        <hr>
            
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-left">{{ __('Address') }}</label>
            
                                        <div class="col-md-6">
                                            <textarea id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address"  required autocomplete="address" style="resize: none;" autofocus>{{ old('address') }}</textarea>
            
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="addrOpt" class="col-md-4 col-form-label text-md-left">{{ __('Address (opt) :') }}</label>
            
                                        <div class="col-md-6">
                                            <textarea id="addrOpt" type="text" placeholder="Landmark" class="form-control @error('addrOpt') is-invalid @enderror" name="addrOpt"  required autocomplete="addrOpt" style="resize: none;" autofocus>{{ old('addrOpt') }}</textarea>
            
                                            @error('addrOpt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Mobile Number :') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="phone" placeholder="Mobile Number" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-left">States</label>
                                        <div class="col-md-6">
                                          <select class="custom-select d-block w-100"  id="countrySelect" name="state" onchange="makeSubmenu(this.value)" >
                                            
                                            <option  disabled selected>---Choose State---</option>
            
                                            <option value="New South Wales">New South Wales</option>
                                            <option value="Northern Territory">Northern Territory</option>
                                            <option value="Queensland">Queensland</option>
                                            <option value="South Australia">South Australia</option>
                                            <option value="Tasmania">Tasmania</option>
                                            <option value="Victoria">Victoria</option>
                                            <option value="Western Australia">Western Australia</option>
            
                                          </select>
                                        </div>
                                          <div class="invalid-feedback">
                                            Please select a valid State.
                                          </div>
            
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-left">Suburb</label>
                                        <div class="col-md-6">
                                          <select class="custom-select d-block w-100" id="citySelect" name="city" >
                                            
                                            <option disabled selected>---Choose Suburb---</option>
                                            <option></option>
            
                                          </select>
                                        </div>
                                          <div class="invalid-feedback">
                                            Please provide a valid Suburb.
                                          </div>
            
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-left">Zip</label>
            
                                        <div class="col-md-6">
                                      <input type="text" class="form-control" id="zip"  name="zip" value="" placeholder="Zipcode">
                                      <div class="invalid-feedback">
                                        Zip code required.
                                      </div>
                                        </div>
                                    </div>
            
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;  
                             {{ __('Sign Up') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                        <div class="col card-header border">
                            <div class="m-5 pt-5 pl-5">
                            <img src="{{ asset('images/user-alreadyAcc.png') }}" style="width:100px;height:100px;">
                            
                        </div>
                        <div class="text-center">
                        <h4>Already registered?</h4>
                            <p>Welcome back. Click below to sign into your account.</p>
                        <a href="{{ url('login') }}" class="btn btn-success btn-block rounded-pill" ><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp Sign In</a>
                        </div>
                    </div>
                    </div>
                </div>
            
        </div>
    </div>

<script src="{{ asset('js/statesCity.js') }}"></script>

@endsection
