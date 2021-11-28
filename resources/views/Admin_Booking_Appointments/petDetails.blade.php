@extends('layouts.app') @section('content')
<style>ul{list-style-type:none}ul .list-group{margin-bottom:10px;overflow:scroll;-webkit-overflow-scrolling:touch}</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Pet Details</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item active">Pet Details</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="bg-dark-gray border rounded border-dark mb-3 p-3"><a href="{{ url('pet-details-admin/create') }}" class="pull-right btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Pet Details</a></div>
      <div class="card">
         <div class="card-header">
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><b>𓃩</b> Pet Details</h3>
         </div>
         <div class="card-header">
            <span class="searchAlign">
               <div id="editor"></div>
               <div class="btn-group mb-3" role="group" aria-label="Basic example"><button type="button" class="btn btn-success" onclick="exportTableToExcel(&quot;myTable&quot;)">Excel</button> <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint">PDF</button></div>
            </span>
            <span style="float:right"><input style="padding:4px;padding-bottom:8px" name="myInput" id="myInput" class="search" placeholder="Search.."> <button type="button" class="btn btn-outline-secondary">Search</button></span>
         </div>
         @if ($message = Session::get('success'))
         <div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong></div>
         @endif
         <div class="card-body p-0" id="tab">
            <table id="myTable" class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width:1%">#</th>
                     <th style="width:10%">ID</th>
                     <th style="width:20%">Pet Name</th>
                     <th style="width:20%">Animal Type</th>
                     <th style="width:20%">Animal Breed</th>
                     <th style="width:30%">Location</th>
                     <th style="width:30%">Colour</th>
                     <th style="width:30%">Age</th>
                     <th style="width:40%;padding-top:5px">Action</th>
                  </tr>
               </thead>
               <?php $petdetails = App\Models\PetDetail::orderBy('id','DESC')->get(); ?>
               <tbody>
                  @foreach ($petdetails as $data )
                  <tr>
                     <td>#</td>
                     <td><a>{{ $data->id }}</a><br></td>
                     <td><b>{{ $data->pet_name }}</b></td>
                     <?php $animaltype=App\Models\AnimalType::findOrFail($data->animal_type_id); ?>
                     <td><b>{{ $animaltype->animal_name }}</b></td>
                     <?php $animalbreed=App\Models\AnimalBreed::findOrFail($data->animal_breed_id); ?>
                     <td><b>{{ $animalbreed->breed_name }}</b></td>
                     <td>
                        <?php $outputLocation =App\Models\ServiceLocation::findOrfail($data->servLocation_id); ?>
                        <b>{{ $outputLocation->address }}</b>
                     </td>
                     <td>
                        <?php $outputColour =App\Models\Colour::findOrfail($data->colour_id); ?>
                        <b>{{ $outputColour->colour }}</b>
                     </td>
                     <td><b>{{ $data->age }}</b></td>
                     <td class="project-actions"> 
                        <ul>
                           <li class="pb-3">
                           <a href="#logo_{{ $data->id }}" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success" title="Edit Service Location"><i class="far fa-edit" aria-hidden="true">Edit</i></a>
                        </li>
                        <li class="pb-3">
                           <a href="{{ route('pet.gallery',$data->id) }}" class="btn btn-sm rounded-pill btn-outline-primary" title="Image Gallery"><i class="far fa-image" aria-hidden="true"> Image Gallery</i></a>
                        </li>
                     </ul>  
                     </td>
                  </tr>
                  <form action="{{ url('/update-pet-details') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update Pet Details</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="pet_id" value="{{$data->id}}" required>
                                 <div class="row mb-5">
                                    <div class="col-md-6">
                                       <strong>Pet Name:</strong>
                                         <input type="text" name="pet_name" value="{{ $data->pet_name }}" class="form-control"  placeholder="Enter Pet Name">
                                     </div>
                                     
                                     <div class="col-md-6">
                                       <strong>Gender:</strong>
                                       <select name="gender" class="form-control" size="1">
                                          <option  value="{{ $data->gender }}" selected>{{ $data->gender }}</option>
                                           <option  disabled>--Select Gender--</option>
                                           <option  value="Male" >Male</option> 
                                           <option  value="Female" >Female</option>  
                                           
                                         </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Select Animal-Type :</strong>
                                             <select name="animal_type_id" id="animal_type_id" class="form-control" size="1">
                                                <option value="{{ $animaltype->id }}"  selected>{{ $animaltype->animal_name }}</option>
                                             <option  disabled>--Select Animal Type--</option>
                                             <?php  $animalTypes  = App\Models\AnimalType::orderBy('animal_name','ASC')->get(); ?>
                                             @foreach ( $animalTypes as $animal)
                                               
                                               <option  value="{{ $animal->id }}" >{{ $animal->animal_name }} </option> 
                                               
                                             @endforeach
                                           </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Select Animal-Breed :</strong>
                                       
                                             <select name="animal_breed_id" id="animal_breed_id" class="form-control" size="1">
                                                <option value="{{ $animalbreed->id }}"  selected>{{ $animalbreed->breed_name }}</option>
                                             <option  disabled>--Select Animal Breed--</option>
                                           </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Select Colour :</strong>
                                       <?php  $colours  = App\Models\Colour::orderBy('colour','ASC')->get(); ?>
                                             <select name="colour_id" id="colour_id" class="form-control" size="1">
                                                <option value="{{ $outputColour->id }}"  selected>{{ $outputColour->colour }}</option>
                                             <option  disabled>--Select Colour--</option>
                                             @foreach ( $colours as $colour)
                                               <option  value="{{ $colour->id }}" >{{ $colour->colour }} </option> 
                                             @endforeach
                                           </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Size:</strong>
                                       <select name="size" class="form-control" size="1">
                                          <option value="{{ $data->size }}"  selected>{{ $data->size }}</option>
                                           <option  disabled>--Select Size--</option>
                                           <option  value="Small">Small</option> 
                                           <option  value="Medium">Medium</option>  
                                           <option  value="Large">Large</option>
                                           <option  value="Extra-Large">Extra-Large</option>
                                         </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Select Location :</strong>
                                       <?php  $locations  = App\Models\ServiceLocation::orderBy('id','DESC')->get(); ?>
                                             <select name="servLocation_id" id="servLocation_id" class="form-control" size="1">
                                                <option value="{{ $outputLocation->id }}"  selected>{{ $outputLocation->address }}</option>
                                             <option  disabled>--Select Location--</option>
                                             @foreach($locations as $location)
                                               <option  value="{{ $location->id }}" >{{ $location->address }} </option> 
                                             @endforeach
                                           </select>
                                     </div>
                                     <div class="col-md-6">
                                       <strong>Age:</strong>
                                         <input type="text" name="age" value="{{ $data->age }}" class="form-control"  placeholder="Enter Age">
                                     </div>
                                     <div class="col-md-12">
                                       <strong>About Pet:</strong>
                                         <textarea name="about_animal" id="summernoteAbout" class="form-control"  placeholder="Enter About Pet" style="resize: none;">{{ $data->about_animal }}</textarea>
                                     </div>
                                 </div>
                                 <br><br>
                              </div>
                              <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save changes</button></div>
                           </div>
                        </div>
                     </div>
                  </form>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
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