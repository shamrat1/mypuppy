@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Bardwell Solutions</a></li>
              <li class="breadcrumb-item active">Edit Order Status </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">          
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Edit Order Status
                </h3>
                <a href="{{ url('/dashboard') }}" class=" ml-5 btn btn-danger "><i class="fas fa-chevron-left"></i> Back</a>        
                <br><br>
<form action="{{ route('order.status',$order->id) }}" method="POST" >
                      
    {!! csrf_field() !!}
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

<div class="col-md-6">
  <strong>Order id :</strong>
  {{ $order->id }}
  
</div>
<div class="col-md-6">
  <strong>Customer Name :</strong>
  <?php $user =  App\Models\User::find($order->user_id); ?>
  {{ $user->name }}
  
</div>
<div class="col-md-6">
  <strong>Order status :</strong>
  {{ $order->delivery_status }}
  
</div>
    <p class="alert-light text-center p-2">   
    <strong>Change Order Status : </strong> <select name="delivery_status">
          <option selected disabled>Choose Status...</option>
            <option value="processing">Processing</option>
            <option value="Shipping">Shipping</option>
            <option value="Delivered">Delivered</option>

    </select>
  
    <button type="submit" class="btn btn-sm rounded-pill btn-outline-success"><i class="fas fa-save"> Update</i></button>
  </p>
</form>
   
</div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection