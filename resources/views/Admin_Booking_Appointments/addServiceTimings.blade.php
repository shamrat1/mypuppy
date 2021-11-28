@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Store Time</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/service-timings',$myStore->id) }}"> Store Timings</a></li>
              <li class="breadcrumb-item active">Add Store Time </li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Store Time
                </h3>

            <form action="{{ route('save_service_timings') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">



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
              <div class="row mb-5">
              <div class="col-md-5">
                <strong>Service Timing:</strong>
                <input type="text" name="timing" class="form-control"  placeholder="Enter Timing">
              </div>

            <div class="col-md-5">
                <strong>Select Store:</strong>
                      <select name="servLocation_id"  class="form-control" size="1" readonly>
                        <option  value="{{ $myStore->id }}" selected>{{ $myStore->store_name }} </option>
                    </select>
            </div>

            <div class="col-md-5">
                <strong>Select Day:</strong>

                      <select name="day"  class="form-control" size="1">
                      <option  disabled selected>--Select Day--</option>
                      <option value="Sunday">Sunday</option>
                      <option value="Monday">Monday</option>
                      <option value="Tueday">Tueday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                    </select>
            </div>
              <div class="col-md-2">
                  <br/>
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
            </div>


        </div>
            </form>

    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
