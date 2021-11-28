@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Service Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/service-locations-admin') }}"> Service Location</a></li>
              <li class="breadcrumb-item active">Add Service Location</li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Service Location
                </h3>
      
            <form action="{{ route('save_service_location') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
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
              <div class="row ml-5" >
              <div class="col-md-5">
                <strong>Store Name:</strong>
                  <input type="text" name="store_name" class="form-control"  placeholder="Enter Store Name">
              </div>
              <div class="col-md-5">
                <strong>Select User Account :</strong>
                <?php  $users  = App\Models\User::where('user_role','booking')->orderBy('name','ASC')->get(); ?>
                      <select name="user_id" class="form-control" size="1">
                      <option  disabled selected>--Select User Account--</option>
                      @foreach ( $users as $user)
                        
                        <option  value="{{ $user->id }}" >{{ $user->email }} </option> 
                        
                      @endforeach
                    </select>
              </div>
              <div class="col-md-5">
                <strong>Contact Number:</strong>
                  <input type="number" name="phone" class="form-control"  placeholder="Enter Contact Number">
              </div>
              
              <div class="col-md-5">
                <strong>Address:</strong>
                  <textarea name="address" class="form-control"  placeholder="Enter Address" style="resize: none;"></textarea>
              </div>
              <div class="col-md-5">
                <strong>Pincode:</strong>
                  <input type="number" name="pincode" class="form-control"  placeholder="Enter Pincode">
              </div>
              <div class="col-md-5">
                <strong>Select State :</strong>
                <?php  $states  = App\Models\State::orderBy('state','ASC')->get(); ?>
                      <select name="state_id" id="state" class="form-control" size="1">
                      <option  disabled selected>--Select State--</option>
                      @foreach ( $states as $state)
                        
                        <option  value="{{ $state->id }}" >{{ $state->state }} </option> 
                        
                      @endforeach
                    </select>
              </div>
            <div class="col-md-5">
                <strong>Select City:</strong>
                      <select name="city_id" id="city_id" class="form-control" size="1">
                      <option  disabled selected>--Select City--</option>
                    </select>
            </div>        
            <div class="col-md-5">
              <strong>Select Suburbs :</strong>
                    <select name="suburb_id" id="suburb_id" class="form-control" size="1">
                    <option  disabled selected>--Select Suburbs --</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>  
    $( document ).ready(function() {
        $("#state").on('change', function(){
          $('#city_id').find('option').not(':first').remove();
           var selected_value= $('#state').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "state_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('city_dropdown') }}",
                data: data,
                success: function(response) {
                    // console.log(response.dat );
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                        //   console.log(response.data)
                           var id = response.data[i].city_type_id ;
                           var name = response.data[i].city;

                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#city_id").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
        
         //suburb
         $("#city_id").on('change', function(){
          $('#suburb_id').find('option').not(':first').remove();
           var selected_value= $('#city_id').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "city_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('suburb_dropdown') }}",
                data: data,
                success: function(response) {
                    // console.log(response.dat );
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                        //   console.log(response.data)
                           var id = response.data[i].suburb_type_id ;
                           var name = response.data[i].suburb;

                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#suburb_id").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
      });  // end of doc ready
</script>
@endsection
