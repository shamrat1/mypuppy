@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Service Role </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/service-locations-admin') }}"><i class="zmdi zmdi-home"></i> Service Partner Users</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/service-list',$user->id) }}"><i class="zmdi zmdi-home"></i> Service List</a></li>
               <li class="breadcrumb-item active">Service Role  </li>
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
    <form action="{{ url('role-store',$user->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
       {!! csrf_field() !!}
        <div class="form-row">
        <div class="form-group col-md-6">
             <label for="user_id">User Name :</label>
             <input type="text" class="form-control" name="user_id" value="{{$user->name}}" readonly>
          </div>
          <div class="form-group col-md-6">
             <label for="zip">E-Mail</label>
             <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
          </div>
       </div>
       
      <div class="form-group col-md-6">
      <strong>Select Service</strong>
      
      <select name="service_id" id="service_id" class="form-control" size="1">
         <option  disabled selected>--Select Service Name--</option>
         <?php $services=App\Models\BookService::OrderBy('service_name','ASC')->get() ?>
         @foreach ( $services as $service)
         <option  value="{{ $service->id }}" >{{ $service->service_name }} </option> 
         @endforeach
     </select>
      <div class="invalid-feedback">
      Please provide a valid Service.
      </div>
      
      </div>

       </div> 
       <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Information</button>
    </form>
</div>
 </div>
      </div>
   </div>
</div>
@endsection