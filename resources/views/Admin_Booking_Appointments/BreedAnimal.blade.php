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


                        <h1>Animal Breeds</h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>


                            <li class="breadcrumb-item active">Animal Breeds</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                <a href="{{ url('animal-breeds/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Animal Breed
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><b>𓃩</b> Animal Breeds</h3>
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
                                    Animal Breed
                                </th>
                                <th style="width: 20%">
                                    Animal Name
                                </th>
                                <th style="width: 40%;padding-top:5px">
                                    Action
                                </th>
                            </tr>
                        </thead>
            <?php $animalBreeds = App\Models\AnimalBreed::orderBy('id','DESC')->get(); ?>
                        <tbody>
                @foreach ($animalBreeds as $data )
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>{{ $data->id }}</a>
                                    <br />
                                </td>
                                <td><b> {{ $data->breed_name }}</b></td>
                                <td>

                                    <?php $animalType = App\Models\AnimalType::findOrFail($data->animal_id); ?>
                                    
                                            <b> {{ $animalType->animal_name }}</b>

                                </td>
                                
                                <td class="project-actions">
                                    <a href="#logo_{{ $data->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Animal Name" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></li>  
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ url('/update-animal-breed') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update Animal Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="breed_id" value="{{$data->id}}" required>
                                <div class="row ml-5" >
                                    
                                        <div class="col-md-5">
                                          <strong>Animal Breed :</strong>
                                          <input type="text" name="breed_name" value="{{ $data->breed_name }}" class="form-control"  placeholder="Enter Animal Breed">
                                        </div>
                                        <div class="col-md-5">
                                          <strong>Animal Type :</strong>
                                         
                                                <select name="animal_id" class="form-control" size="1">
                                                    <option value="{{ $animalType->id }}" selected>{{ $animalType->animal_name }}</option>
                                                    <?php  $animals  = App\Models\AnimalType::orderBy('animal_name','ASC')->get(); ?>
                                                    <option  disabled>--Select Animal Type--</option>
                                                @foreach ( $animals as $info)
                                                  
                                                  <option  value="{{ $info->id }}" >{{ $info->animal_name }} </option> 
                                                  
                                                @endforeach
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
    
@endsection
