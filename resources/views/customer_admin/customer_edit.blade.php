@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Edit User </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
               @if($customer->user_role=="customer")
               <li class="breadcrumb-item"><a href="{{ url('/customers') }}"><i class="zmdi zmdi-home"></i> Customers</a></li>
               @endif
               @if($customer->user_role=="booking")
               <li class="breadcrumb-item"><a href="{{ url('/service-partners-users') }}"><i class="zmdi zmdi-home"></i> Service Partner User</a></li>
               @endif
               <li class="breadcrumb-item active">Edit User  </li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="container">
@if (count($errors) > 0)
<div class="alert alert-danger">
   <strong>Whoops!</strong> There were some problems with your input.<br><br>
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
   <button type="button" class="close" data-dismiss="alert">×</button>
   <strong>{{ $message }}</strong>
</div>
@endif 
<div class="card border-dark mb-3 p-3">
    <form action="{{ route('customer_update',$profile->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
       {!! csrf_field() !!}
        <div class="form-row">
        <div class="form-group col-md-6">
             <label for="name">User Name :</label>
             <input type="text" class="form-control" name="name" value="{{$customer->name}}" readonly>
          </div>
          <div class="form-group col-md-6">
             <label for="zip">E-Mail</label>
             <input type="text" class="form-control" name="email" value="{{ $customer->email }}" readonly>
          </div>
       </div>
       
       <div class="form-row">
           <div class="form-group col-md-6">
                <strong>States</strong>
                
                <select class="form-control" id="countrySelect" name="countrySelect" onchange="makeSubmenu(this.value)" >
                
                <option value="" disabled selected>Choose State...</option>
                
                <option value="New South Wales">New South Wales</option>
                <option value="Northern Territory">Northern Territory</option>
                <option value="Queensland">Queensland</option>
                <option value="South Australia">South Australia</option>
                <option value="Tasmania">Tasmania</option>
                <option value="Victoria">Victoria</option>
                <option value="Western Australia">Western Australia</option>
                
                </select>
                <div class="invalid-feedback">
                Please select a valid country.
                </div>
                
                </div>
                <div class="form-group col-md-6">
                <strong>Suburb</strong>
                
                <select class="form-control" id="citySelect" name="citySelect" >
                
                <option value=""  disabled selected>Choose City...</option>
                <option></option>
                
                </select>
                <div class="invalid-feedback">
                Please provide a valid state.
                </div>
                
                </div>

       </div>
       <div class="form-row">
           
          <div class="form-group col-md-6">
             <label for="address">Address</label>
             <textarea class="form-control" name="address"placeholder="Address..." style="resize:none;">{{ $profile->address }}</textarea>
          </div>
          <div class="form-group col-md-6">
             <label for="addrOpt">Address Opt</label>
             <textarea class="form-control" name="addrOpt" placeholder="Address Opt..." style="resize:none;">{{ $profile->addrOpt }}</textarea>
          </div>
          
          <div class="form-group col-md-6">
             <label for="phone">Mobile Number :</label>
             <input type="text" class="form-control" name="phone" value="{{$profile->phone}}" placeholder="Phone...">
          </div>
          <div class="form-group col-md-6">
             <label for="zip">Zip Code</label>
             <input type="text" class="form-control" name="zip" value="{{ $profile->zip }}" placeholder="Zip Code...">
          </div>
       </div>
       
       
       <button type="submit" class="btn btn-primary btn-lg btn-block">Update Information</button>
    </form>
</div>
 </div>
      </div>
   </div>
</div>
<script src="{{ asset('js/statesCity.js') }}"></script>
@endsection