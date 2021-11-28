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


                        <h1>Store Details </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>


                            <li class="breadcrumb-item active"> Store Details</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">

                <a href="{{ url('service-locations-admin/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Store Details
                </a>
                </div>

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-map-marker"></i> Store Details</h3>
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


                                    Store Name


                                </th>
                                <th style="width: 20%">


                                    User Account


                                </th>
                                <th style="width: 30%">


                                    Address


                                </th>
                                <th style="width: 30%">


                                    Contact Number


                                </th>
                                <th style="width: 30%">
                                    City
                                </th>
                                <th style="width: 30%">
                                    Suburb
                                </th>
                                <th style="width: 40%;padding-top:5px">
                                    Action
                                </th>
                            </tr>


                        </thead>

            <?php $locations = App\Models\ServiceLocation::orderBy('id','DESC')->get();

            ?>

                        <tbody>

                @foreach ($locations as $data )


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

                                <td>
                                    <b> {{ $data->store_name }}</b>
                                </td>
                                <td>
                                    <?php $user=App\Models\User::findOrFail($data->user_id); ?>
                                    <b> {{ $user->email }}</b></td>
                                <td><b> {{ $data->address }}</b></td>
                                <td>
                                    <b> {{ $data->phone }}</b>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php $outputCity =App\Models\City::findOrfail($data->city_id); ?>
                                            <b> {{ $outputCity->city }}</b>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php $outputSuburb =App\Models\Suburb::findOrfail($data->suburb_id); ?>
                                            <b> {{ $outputSuburb->suburb }}</b>
                                        </li>
                                    </ul>
                                </td>
                                <td class="project-actions">
                                    <ul>
                                        <li>
                                            <a href="#logo_{{ $data->id }}" data-toggle="modal"
                                                class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Store Details" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('service-timings',$data->id)}}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Store Role"> Store Timings </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('service-list',$user->id)}}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Service Role"> Service List </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <!-- Button trigger modal for all the button -->
                            <form action="{{ url('/update-service-location') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <!-- Modal  2 #logo-->
                            <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                aria-hidden="true">


                                <div class="modal-dialog modal-dialog-centered" role="document">


                                    <div class="modal-content">


                                        <div class="modal-header">


                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Service Location</h5>


                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                                <span aria-hidden="true">&times;</span>


                                            </button>


                                        </div>

                                        <div class="modal-body">
                                            <input type="hidden" name="location_id" value="{{$data->id}}" required>
                                            <div class="row ml-5" >
                                                <div class="col-md-10">
                                                <strong>Store Name:</strong>
                                                    <input type="text" name="store_name" value="{{ $data->store_name }}" class="form-control"  placeholder="Enter Store Name">
                                                </div>
                                                <div class="col-md-5">
                                                    <strong>Select User :</strong>
                                                    <?php  $users  = App\Models\User::where('user_role','booking')->orderBy('name','ASC')->get(); ?>
                                                        <select name="user_id" class="form-control" size="1">
                                                            <option value="{{$data->user_id}}" selected>{{ $user->name }}</option>
                                                            <option disabled>--Select User Account--</option>
                                                        @foreach ( $users as $user)

                                                            <option  value="{{ $user->id }}" >{{ $user->email }} </option>

                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-md-5">
                                                <strong>Contact Number:</strong>
                                                    <input type="number" name="phone" value="{{ $data->phone }}" class="form-control"  placeholder="Enter Contact Number">
                                                </div>

                                                <div class="col-md-10">
                                                <strong>Address:</strong>
                                                    <textarea name="address" class="form-control"  placeholder="Enter Address" style="resize: none;">{{ $data->address }}</textarea>
                                                </div>
                                                <div class="col-md-5">
                                                <strong>Postcode:</strong>
                                                    <input type="number" name="pincode" value="{{ $data->pincode }}" class="form-control"  placeholder="Enter Postcode">
                                                </div>
                                                <div class="col-md-5">
                                                <strong>Select State :</strong>
                                                <?php  $states  = App\Models\State::orderBy('state','ASC')->get(); ?>
                                                        <select name="state_id" id="state_id" class="form-control" size="1">
                                                        <?php $stateoutput=App\Models\State::findOrFail($data->state_id); ?>
                                                        <option value="{{ $stateoutput->id }}" selected> {{ $stateoutput->state }}</option>
                                                        <option  disabled>--Select State--</option>
                                                        @foreach ( $states as $state)

                                                        <option  value="{{ $state->id }}" >{{ $state->state }} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            <div class="col-md-5">
                                                <strong>Select City:</strong>
                                                        <select name="city_id" id="city_id" class="form-control" size="1">

                                                            <option  value="{{ $outputCity->id }}" selected>{{ $outputCity->city }}</option>

                                                    </select>
                                            </div>
                                            <div class="col-md-5">
                                                <strong>Select Suburbs :</strong>
                                                    <select name="suburb_id" id="suburb_id" class="form-control" size="1">
                                                    <option value="{{ $outputSuburb->id }}" selected>{{ $outputSuburb->suburb }}</option>
                                                    </select>
                                            </div>
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
