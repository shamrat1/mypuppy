@extends('layouts.app')

@section('content')

    <style>
        ul {
            list-style-type: none;
        }

    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <div class="container-fluid">


                <div class="row mb-2">


                    <div class="col-sm-6">


                        <h1>Categories </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>


                            <li class="breadcrumb-item active"> Categories</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('category/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Category
                </a>
                </div>

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-mobile-alt"></i> Categories</h3>
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


                                    S No.


                                </th>


                                <th style="width: 20%">


                                    Category Name


                                </th>


                                <th>


                                    Image


                                </th>





                                <th style="width: 40%">

                                    Actions
                                </th>


                            </tr>


                        </thead>

        <?php $categories = App\Models\Category::orderBy('id','ASC')->get();
                        
        ?>

                        <tbody>

                @foreach ($categories as $category )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                        

                                        {{ $category->id }}


                                    </a>


                                    <br />





                                </td>


                                <td>


                                    <ul class="list-inline">


                                        <li class="list-inline-item">


                                            <b> {{ $category->category_name }}</b>




                                        </li>





                                    </ul>


                                </td>


                                <td class="project_progress">
                                 
                                        
                                    <img src="{{$category->image_path}}" style="width: 100px;height: 100px;" alt="">

                                    
                                </td>



                                <td class="project-actions">
                                    <ul style="list-style:none;">
                                        
                                         <li style="padding-top:5px"><a href="#logo_{{ $category->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></li>  
                                        <!--<li style="padding-top:5px">-->
                                            
                                        <!--    <a id="{{$category->id}}" href="{{ route('category_delete',$category->id) }} " class="btn btn-sm rounded-pill btn-outline-danger delete_category"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a>-->
                                        <!--    </li>-->
                                    </ul>
                                    {{--  <a class="btn btn-info btn-sm" href="#logo_{{ $category->id }}" data-toggle="modal">


                                        <i class="fas fa-pencil-alt">


                                        </i>


                                        Edit


                                    </a>  --}}





                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ url('/update-categories') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="logo_{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $category->category_name }} Thumbnail</h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body">


                                    
                                <input type="hidden" name="cat_id" value="{{$category->id}}" required>
                                <div class="form-group form-control-lg text-left">
                                    <b> Category Name: </b>    <input type="text" name="category_name" value="{{ $category->category_name }}">
                                </div>

                                <div class="form-group form-control-lg text-left">
                                    
                                  <b> Thumbnail: </b>  
                                  <input type="file" name="image_path" id="image_path" required>
                                    
                                </div>
                                <br>
                                <div class="form-group form-control-lg text-left">
                                    

                                    <img src="{{ $category->image_path }}" id="previewImg" style="width: 100px;height:100px" alt="">
                                </div>
                                <br><br>
                            </div>


                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>


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
