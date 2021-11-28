@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Edit Offer </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/offers') }}"><i class="zmdi zmdi-home"></i> Offers</a></li>
               <li class="breadcrumb-item active">Edit Offers  </li>
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
    <form action="{{ route('offer_update',$offer->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
       {!! csrf_field() !!}
       <div class="form-row">
          <div class="form-group col-md-6">
             <label for="name">Name</label>
             <input type="text" class="form-control" name="name" value="{{$offer->name}}" placeholder="Name...">
          </div>
          <div class="form-group col-md-6">
             <label for="code">Code</label>
             <input type="text" class="form-control" name="code" id="code" value="{{$offer->code}}" placeholder="Code...">
          </div>
       </div>
       <div class="form-row">
          <div class="form-group col-md-6">
             <label for="min">Minimum Amount</label>
             <input type="text" class="form-control" name="min_amt" value="{{ $offer->min_amt }}" placeholder="Minimum Amount...">
          </div>
          <div class="form-group col-md-6">
             <label for="discountPercent">Discount Percent</label>
             <input type="text" class="form-control" name="discount" value="{{ $offer->discount }}" placeholder="Discount Percent...">
          </div>
       </div>
       <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select  class="form-control"  name="status" required>
                      <option value="{{ $offer->status }}" selected>
                          @if($offer->status==1)
                            Activate
                          @else
                            De-Activate
                        @endif
                          </option>
                      <option value="1">Activate</option>
                      <option value="0">De-Activate</option>
                    </select>
        </div>
       <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="3" style="resize: none" placeholder="Description">{{ $offer->description }}</textarea>
       </div>
       <button type="submit" class="btn btn-primary btn-lg btn-block">Update Offer</button>
    </form>
</div>
 </div>
      </div>
   </div>
</div>
@endsection