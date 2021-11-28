@extends('layouts.myApp')
@section('content')
<style>
    .datalist{
        padding: 6px;
        width: 215px;
        outline: #000;
    }
    .advDiv{
        display: none;
    }
</style>
<div class="breadcrumbs">
    <ul class="breadcrumb">
       <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
       <li>
             <a href="{{ url('/services') }}">
             <span>Services</span>
             </a>
          </li>
            <li>
                <a href="{{ url('adoptions') }}">
                    <span>Adoptions</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <span>Adopt A Pet</span>
                </a>
            </li>
    </ul>
</div>

<div class="container m-2 p-5 alert alert-info">
    
        <div class="row p-3">
                <div class="col-md-3">
                <strong>Select Animal-Type :</strong>
                <?php  $animalTypes  = App\Models\AnimalType::orderBy('animal_name','ASC')->get(); ?>
                        <select name="animal_type_id" id="animal_type_id" class="form-control" size="1">
                        <option  disabled selected>--Select Animal Type--</option>
                        @foreach ( $animalTypes as $animal)
                            <option  value="{{ $animal->id }}" >{{ $animal->animal_name }} </option> 
                        @endforeach
                    </select>
                  </div>
                <div class="col-md-3">
                    <strong>Select State :</strong>
                    <?php  $states  = App\Models\State::orderBy('state','ASC')->get(); ?>
                          <select name="state_id" id="state_id" class="form-control" size="1">
                          <option  disabled selected>--Select State--</option>
                          @foreach ( $states as $state)
                            <option  value="{{ $state->id }}" >{{ $state->state }} </option> 
                          @endforeach
                        </select>
                  </div>
                
                  <div class="col-md-3">
                    <strong>Select Location:</strong>
                          <select name="servLocation_id" id="servLocation_id" class="form-control" size="1">
                          <option  disabled selected>--Select Location--</option>
                        </select>
                </div>
                <div class="col-md-3 pt-5">
                    <button type="button" class="alert alert-success" onclick="advanceSearch()">Advanced Search</button>
                    <button type="button" class="alert alert-primary" id="ajaxSubmit">Find Your Pet</button>
                    
                </div>
            </div>
            
            <div class="row p-2 advDiv" id="advance">
                
                <div class="col-md-3">
                    <strong>Select Colour :</strong>
                    <select name="colour_id" id="colour_id" class="form-control" size="1">
                        <option  disabled selected>--Select Colour --</option>
                        <?php $colours=App\Models\Colour::OrderBy('colour','ASC')->get(); ?>
                        @foreach ($colours as $colour)
                            <option  value="{{ $colour->colour }}">{{ $colour->colour }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <strong>Select Gender :</strong>
                    <select name="gender" id="gender" class="form-control" size="1">
                        <option  disabled selected>--Select Gender --</option>
                        <option  value="Male">Male</option>
                        <option  value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <strong>Select Pet Name :</strong>
                    <select name="pet_name" id="pet_name" class="form-control" size="1">
                        <option  disabled selected>--Select Pet Name --</option>
                        <?php $petnames=App\Models\PetDetail::OrderBy('pet_name','ASC')->get(); ?>
                        @foreach ($petnames as $name)
                            <option  value="{{ $name->id }}">{{ $name->pet_name }}</option>
                        @endforeach
                    </select>
                </div>
            
        </div>
</div>

<div class="container text-center p-5">
    <h3>Welcome to MPMP <span class="text-info">Pet Adoption</span></h3>
    <div id="result">
        <div class="search-result p-3">
            <h4 class="text-white">Your Search Results</h4>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function advanceSearch()
    {
        var element = document.getElementById("advance");
        element.classList.toggle("advDiv");
    }
    $( document ).ready(function() {
        $("#state").on('change', function(){
          $('#servLocation_id').find('option').not(':first').remove();
           var selected_value= $('#state').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "state_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('location_dropdown') }}",
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
                           var id = response.data[i].location_type_id ;
                           var name = response.data[i].store_name;
                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#servLocation_id").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
        //ajaxSubmit
        $('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajax({
               url: "{{ route('search.adoptions') }}",
               method: 'post',
               data: {
                "_token": "{{ csrf_token() }}",
                animal_type_id: $('#animal_type_id').val(),
                state_id: $('#state_id').val(),
                servLocation_id: $('#servLocation_id').val(),
               },
               success: function(response) {
                    // console.log(response.dat );
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                        //   console.log(response.data)
                           var id = response.data[i].location_type_id ;
                           var name = response.data[i].store_name;
                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#servLocation_id").append(option);
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