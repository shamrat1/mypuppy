@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Pet Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/pet-details-admin') }}"> Pet Details</a></li>
              <li class="breadcrumb-item active">Add Pet Details</li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Pet Details
                </h3>
      
            <form action="{{ route('save_pet_details') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
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
                <strong>Pet Name:</strong>
                  <input type="text" name="pet_name" class="form-control"  placeholder="Enter Pet Name">
              </div>
              <div class="col-md-5">
                <strong>Add image:</strong>
                <div class="custom-file">
                <input type="file" name="image_path" id="image_path"  class="custom-file-input">
                <label class="custom-file-label" for="image_path">Choose file</label>
                  </div>
                  <img src="{{ asset('images/preview.jpg') }}" id="previewImg" style="width: 100px;height:100px" alt="">
                           
            </div>
              <div class="col-md-5">
                <strong>Gender:</strong>
                <select name="gender" class="form-control" size="1">
                    <option  disabled selected>--Select Gender--</option>
                    <option  value="Male" >Male</option> 
                    <option  value="Female" >Female</option>  
                    
                  </select>
              </div>
              <div class="col-md-5">
                <strong>Select Animal-Type :</strong>
                <?php  $animalTypes  = App\Models\AnimalType::orderBy('animal_name','ASC')->get(); ?>
                      <select name="animal_type_id" id="animal_type_id" class="form-control" size="1">
                      <option  disabled selected>--Select Animal Type--</option>
                      @foreach ( $animalTypes as $animal)
                        
                        <option  value="{{ $animal->id }}" >{{ $animal->animal_name }} </option> 
                        
                      @endforeach
                    </select>
              </div>
              <div class="col-md-5">
                <strong>Select Animal-Breed :</strong>
                
                      <select name="animal_breed_id" id="animal_breed_id" class="form-control" size="1">
                      <option  disabled selected>--Select Animal Breed--</option>
                    </select>
              </div>
              <div class="col-md-5">
                <strong>Select Colour :</strong>
                <?php  $colours  = App\Models\Colour::orderBy('colour','ASC')->get(); ?>
                      <select name="colour_id" id="colour_id" class="form-control" size="1">
                      <option  disabled selected>--Select Colour--</option>
                      @foreach ( $colours as $colour)
                        <option  value="{{ $colour->id }}" >{{ $colour->colour }} </option> 
                      @endforeach
                    </select>
              </div>
              <div class="col-md-5">
                <strong>Size:</strong>
                <select name="size" class="form-control" size="1">
                    <option  disabled selected>--Select Size--</option>
                    <option  value="Small">Small</option> 
                    <option  value="Medium">Medium</option>  
                    <option  value="Large">Large</option>
                    <option  value="Extra-Large">Extra-Large</option>
                  </select>
              </div>
              <div class="col-md-5">
                <strong>Select Location :</strong>
                <?php  $locations  = App\Models\ServiceLocation::orderBy('id','DESC')->get(); ?>
                      <select name="servLocation_id" id="servLocation_id" class="form-control" size="1">
                      <option  disabled selected>--Select Location--</option>
                      @foreach($locations as $location)
                        <option  value="{{ $location->id }}" >{{ $location->address }} </option> 
                      @endforeach
                    </select>
              </div>
              <div class="col-md-5">
                <strong>Age:</strong>
                  <input type="text" name="age" class="form-control"  placeholder="Enter Age">
              </div>
              <div class="col-md-10">
                <strong>About Pet:</strong>
                  <textarea name="about_animal" id="summernoteAbout" class="form-control"  placeholder="Enter About Pet" style="resize: none;"></textarea>
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
        $("#animal_type_id").on('change', function(){
          $('#animal_breed_id').find('option').not(':first').remove();
           var selected_value= $('#animal_type_id').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "animal_type_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('animalBreed_dropdown') }}",
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
                           var id = response.data[i].animal_breed_id ;
                           var name = response.data[i].breed_name;

                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#animal_breed_id").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
        
        $('#summernoteAbout').summernote()
      });  // end of doc ready
</script>
@endsection
