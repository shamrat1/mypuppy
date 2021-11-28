@extends('layouts.app')

@section('content')

    <style>
        ul {
            list-style-type: none;
        }
              ul  .list-group{
            margin-bottom: 10px;
            overflow:scroll;
            -webkit-overflow-scrolling: touch;
        }

    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <div class="container-fluid">


                <div class="row mb-2">


                    <div class="col-sm-6">


                        <h1>Suburbs </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>


                            <li class="breadcrumb-item active"> Suburbs</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('suburbs/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Suburb
                </a>
                </div>

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-map-marker"></i> Suburbs</h3>
                </div>
                
  
                <div class="card-header">
                <span class="searchAlign">  
                    <div id="editor"></div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable')">Excel</button>
                        <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint" > PDF</button>
                    
                    </div></span>
                <span style="float: right">
                <input type="text" style="padding: 4px;padding-bottom: 8px;" name="myInput" id="myInput" class="search"  placeholder="Search..">
                <button type="button"  class="btn btn-outline-secondary ">Search</button>
                
                </span>
            </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-body p-0" id="tab">
                    

                    <table id="myTable" class="table table-striped projects">


                        <thead>


                            <tr>


                                <th style="width: 1%">


                                    #


                                </th>


                                <th style="width: 10%">


                                    ID


                                </th>
                                <th style="width: 20%">


                                    Suburb


                                </th>
                                <th style="width: 20%">


                                    City


                                </th>
                                <th style="width: 30%">


                                    State


                                </th>
                                <th style="width: 40%;padding-top:5px">

                                    Action
                                </th>


                            </tr>


                        </thead>

            <?php $suburbs = App\Models\Suburb::orderBy('id','DESC')->get();
                            
            ?>

                        <tbody>

                @foreach ($suburbs as $data )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                        

                                        {{ $data->id }}


                                    </a>


                                    <br />

                                </td>

                                <td><b> {{ $data->suburb }}</b></td>
                                <td>
                                    <?php $outputCity =App\Models\City::findOrfail($data->city_id); ?>
                                    <b> {{ $outputCity->city }}</b></td>
                                <td>
                                     <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php $outputState =App\Models\State::findOrfail($data->state_id); ?>
                                            <b> {{ $outputState->state }}</b>
                                        </li>
                                    </ul>
                                </td>
                                <td class="project-actions">
                                    <a href="#logo_{{ $data->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Suburb" ><i class="far fa-edit" aria-hidden="true"> Edit Suburb</i></a></li>  
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ url('/update-suburb') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->
                <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $data->suburb }} Suburb</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="suburb_id" value="{{$data->id}}" required>
                                <div class="row">
                                <div class="col-md-5">
                                    <strong>Suburb :</strong>
                                    <input type="text" name="suburb" value="{{ $data->suburb }}" class="form-control"  placeholder="Enter Suburb">
                                  </div>
                                    <div class="col-md-5">
                                        <strong>Select State:</strong>
                                        <?php  $states  = App\Models\State::orderBy('state','ASC')->get(); ?>
                                            <select name="state_id" id="state_id" class="form-control" size="1">
                                                
                                            <option selected>{{ $outputState->state }}</option>
                                            <option  disabled>--Select State--</option>
                                            @foreach ( $states as $state)
                                                
                                                <option  value="{{ $state->id }}" >{{ $state->state }} </option> 
                                                
                                            @endforeach
                                            </select>
                                    </div> 
                                    <div class="col-md-5">
                                        <strong>Select City:</strong>
                                              <select name="city_id" id="city_id" class="form-control" size="1">
                                                <option selected>{{ $outputCity->city }}</option>  
                                                
                                            </select>
                                    </div> 
                                <br>
                                <br>
                            </div>


                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-primary">Save changes</button>


                            </div>


                        </div>


                    </div>


                </div>


            </form>
            @endforeach
            </tbody>
        </table>
        </div>


        <!-- /.card-body -->


    </div>


    <!-- /.card -->


    
    

    <!-- **************************************************************** -->


</section>


<!-- /.content -->



</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>  
    $( document ).ready(function() {
        $("#state_id").on('change', function(){
          $('#city_id').find('option').not(':first').remove();
           var selected_value= $('#state_id').val();
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
        
      });  // end of doc ready
</script>
@endsection
