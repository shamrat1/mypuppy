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


                        <h1>Blogs </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>


                            <li class="breadcrumb-item active"> Blogs</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('blog/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Blog
                </a>
                </div>

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fab fa-blogger"></i> Blog Categories</h3>
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


                                    Blog Name


                                </th>


                                <th>


                                    Image 


                                </th>

                                <th style="width: 40%">


                                    Description 


                                </th>



                                <th style="width: 40%">
                                    Action

                                </th>


                            </tr>


                        </thead>

        <?php $blogs = App\Models\Blog::orderBy('id','ASC')->get();
                       
        ?>

                        <tbody>

                @foreach ($blogs as $blog )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                       

                                        {{ $blog->id }}


                                    </a>


                                    <br />





                                </td>


                                <td>


                                    <ul class="list-inline">


                                        <li class="list-inline-item">


                                            <b> {{ $blog->blog_name }}</b>




                                        </li>





                                    </ul>


                                </td>


                                <td class="project_progress">
                                 
                                        
                                    <img src="{{$blog->image_path}}" style="width: 100px;height: 100px;" alt="">

                                    
                                </td>
                                <td  style="width: 40%"  class="project_progress">
                                 
                                        
                                   {{ $blog->blog_description }}

                                    
                                </td>
                                <td class="project-actions">
                                    <ul style="list-style:none;">                 
                                         <li style="padding-top:5px"><a href="#update_{{ $blog->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></li>  
                                            <li style="padding-top:5px"><a href="#logo_{{ $blog->id }}" data-toggle="modal"
                                                class="btn btn-sm rounded-pill btn-outline-success"  title="Thumnail" ><i class="far fa-edit" aria-hidden="true">Thumnail Image</i></a></li>
                                                <li style="padding-top:5px"><a href="#banner_{{ $blog->id }}" data-toggle="modal"
                                                    class="btn btn-sm rounded-pill btn-outline-success"  title="Thumnail" ><i class="far fa-edit" aria-hidden="true">Banner Image</i></a></li>    
                                    </ul>
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ route('blog_category_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="update_{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $blog->blog_name }} </h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body">
                                <input type="hidden" name="blog_id" value="{{$blog->id}}" required>
                                <div class="form-group form-control-lg text-left">
                                    <b> Blog Name: </b>    <input type="text" name="blog_name" value="{{ $blog->blog_name }}">
                                </div>
                                <div class="form-group form-control-lg text-left">
                                    <b> Blog Short Description : </b>    
                                    <textarea class="form-control" name="blog_description" style="resize: none;">{{ $blog->blog_description }}</textarea>
                                </div>
                            </div>
                            <br><br>

                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>


                            </div>


                        </div>


                    </div>


                </div>


            </form>
            <form action="{{ route('blog_category_update') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <!-- Modal  2 #logo-->


            <div class="modal fade" id="banner_{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">


                <div class="modal-dialog modal-dialog-centered" role="document">


                    <div class="modal-content">


                        <div class="modal-header">


                            <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $blog->blog_name }} Banner</h5>


                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                <span aria-hidden="true">&times;</span>


                            </button>


                        </div>


                        <div class="modal-body">


                            <input type="hidden" name="blog_id" value="{{$blog->id}}" required>
                            <input type="hidden" name="blog_name" value="{{ $blog->blog_name }}">
                            <input type="hidden" class="form-control" name="blog_description" value="{{ $blog->blog_description }}">
                            <div class="form-group form-control-lg text-left">
                                    
                                <b> Image: </b>  
                                <input type="file" name="image_path1" id="image_path1" required>
                                  
                              </div>
                              <br>
                              <div class="form-group form-control-lg text-left">
                                  @if($blog->image_path1!="")
                                    <img src="{{ asset($blog->image_path1) }}" id="previewImg" style="width: 100px;height:100px" alt="">
                                @endif
                              </div>
                            
                        </div>
                        <br><br>

                        <div class="modal-footer">


                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                            <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>


                        </div>


                    </div>


                </div>


            </div>


        </form>
        <form action="{{ route('blog_category_update') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <!-- Modal  2 #logo-->


        <div class="modal fade" id="logo_{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">


            <div class="modal-dialog modal-dialog-centered" role="document">


                <div class="modal-content">


                    <div class="modal-header">


                        <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $blog->blog_name }} Thumbnail</h5>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                            <span aria-hidden="true">&times;</span>


                        </button>


                    </div>


                    <div class="modal-body">


                        <input type="hidden" name="blog_id" value="{{$blog->id}}" required>
                        <input type="hidden" name="blog_name" value="{{ $blog->blog_name }}">
                        <input type="hidden" class="form-control" name="blog_description" value="{{ $blog->blog_description }}">
                        <div class="form-group form-control-lg text-left">
                                
                            <b> Image: </b>  
                            <input type="file" name="image_path" id="image_path" required>
                              
                          </div>
                          <br>
                          <div class="form-group form-control-lg text-left">
                              <img src="{{ $blog->image_path }}" id="previewImg" style="width: 100px;height:100px" alt="">
                          </div>
                        
                    </div>
                    <br><br>

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
