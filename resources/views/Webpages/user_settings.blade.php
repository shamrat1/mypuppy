@extends('layouts.myApp')

@section('content')
<div class="breadcrumbs">
  <ul class="breadcrumb">
     <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
     <li><a href="{{ url('home') }}">My Account</a></li>
     <li><a href="javascript:void(0)">Change Password</a></li>
  </ul>
</div>

<?php  $profile = App\Models\Profile::findOrFail(Auth::user()->id); 
        ?>
<div class="container p-5  border " style="background-color: #F5F5F5">
    <h1 class="mb-5 p-3"> Hi,<span class="text-success"> {{ Auth::user()->name }}</span></h1>
    @foreach ($errors->all() as $error)
    <div class="cart_added_status alert-danger }} alert-dismissable">
     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <i class="glyphicon"></i>
      <strong>{{ $error }} </strong>
     </div>   
    <p class="text-danger"></p>
    @endforeach 
    @if(Session::has('success'))
    <div class="cart_added_status alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
     <i class="glyphicon glyphicon-{{ Session::get('success') == '✔ Password change successfully!' ? 'ok' : 'remove'}}"></i> {{ Session::get('success') }}
    </div>
    @endif
    
   
        
        <div class="card mt-5">
            <div class="card-header">
              <h3>Change Password</h3> 
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('change.password') }}">
                    @csrf 

 

                     

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="c-form__button c-cart-empty__backward">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
            
          
        
</div>
  
</div>
<script src="{{ asset('js/statesCity.js') }}"></script>
@endsection