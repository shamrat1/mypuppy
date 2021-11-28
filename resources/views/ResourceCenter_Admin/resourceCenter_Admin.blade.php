@extends('layouts.app')

@section('content')

    <style>
        ul {
            list-style-type: none;
        }
        @media (min-width: 992px) {
            .modal-dialog {
              max-width: 80%;
            }
            .modal-body {
                max-height: calc(100vh - 210px);
                overflow-y: auto;
            }
          }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <div class="container-fluid">


                <div class="row mb-2">


                    <div class="col-sm-6">


                        <h1>Resource Center Blogs</h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>


                            <li class="breadcrumb-item active"> Resource Center Blogs</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('resource-center-admin/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Resource Center Blogs
                </a>
                </div>

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fab fa-blogger"></i> Resource Center Blogs</h3>
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


                                    Blog Category


                                </th>


                                <th>


                                  
                                  Blog Type

                                </th>

                                <th style="width: 40%">

                                    Blog Title
                                 


                                </th>



                                <th style="width: 40%">
                                    Action

                                </th>


                            </tr>


                        </thead>

        <?php $rc_blogs = App\Models\ResourceCenter::orderBy('id','DESC')->get();
                       
        ?>

                        <tbody>

                @foreach ($rc_blogs as $myBlog )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                       

                                        {{ $myBlog->id }}


                                    </a>


                                    <br />





                                </td>


                                <td>


                                    <ul class="list-inline">


                                        <li class="list-inline-item">

                                        <?php $blog=App\Models\Blog::findOrfail($myBlog->blog_id); ?>
                                            <b> {{ $blog->blog_name }}</b>
                                        </li>





                                    </ul>


                                </td>


                                <td class="project_progress">
                                 
                                    
                                    <?php $blogType=App\Models\BlogType::findOrfail($myBlog->blogtype_id); ?>
                                    <b> {{ $blogType->blogtype_name }}</b>
                                </td>
                                <td  style="width: 40%"  class="project_progress">
                                 
                                        
                                   {{ $myBlog->title }}

                                    
                                </td>
                                <td class="project-actions">
                                    <ul style="list-style:none;">
                                        <li style="padding-top:5px"><a href="#update_{{ $myBlog->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Blog Thumnail" ><i class="far fa-edit" aria-hidden="true"> Edit Blog Thumnail</i></a></li>    
                                        <li style="padding-top:5px">
                                            <a href="{{ route('add_blog_content',$myBlog->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Add Blog Content" ><i class="fa fa-plus-circle" aria-hidden="true"> Add Blog Content</i></a></li> 
                                            <li style="padding-top:5px">
                                                <a href="{{ route('show_blog_content',$myBlog->id) }}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Show Blog Content" ><i class="fa fa-plus-circle" aria-hidden="true"> Show Blog Content</i></a></li>                                         
                                         
                                    </ul>
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                            <form action="{{ route('rcAdmin_update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
            
                            <!-- Modal  2 #logo-->
            
            
                            <div class="modal fade" id="update_{{ $myBlog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                aria-hidden="true">
            
            
                                <div class="modal-dialog modal-dialog-centered" role="document">
            
            
                                    <div class="modal-content">
            
            
                                        <div class="modal-header">
            
            
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Id : {{ $myBlog->id }}  </h5>
            
            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
            
                                                <span aria-hidden="true">&times;</span>
            
            
                                            </button>
            
            
                                        </div>
            
            
                                        <div class="modal-body">
                                            <input type="hidden" name="myBlog_id" value="{{$myBlog->id}}" required>
                                            <div class="col-md-5">
                <strong>Blog Title:</strong>
                <input type="text" name="title" class="form-control" value="{{ $myBlog->title }}"  placeholder="Enter Blog Title">
              </div>
                
                 <div class="col-md-5">
                  <strong>Select Blog Category:</strong>
                  
                  <select name="blog_id" class="form-control" size="1">

                    <?php $selBlog=App\Models\Blog::findOrFail($myBlog->blog_id); ?>
                      <option  value="{{ $myBlog->blog_id }}" selected>{{ $selBlog->blog_name }}</option>
                      
                      <?php $blogs=App\Models\Blog::orderBy('blog_name','ASC')->get(); ?>
                      @foreach ( $blogs as $blog)
                        
                        <option  value="{{ $blog->id }}" >{{ $blog->blog_name }} </option> 
                        
                      @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <strong>Select Blog Type:</strong>
                    
                    <select name="blogtype_id" id="blogtype_id" class="form-control" size="1">
                        <?php $selBlogType=App\Models\BlogType::findOrFail($myBlog->blogtype_id); ?>
                        <option  value="{{ $myBlog->blogtype_id }}" selected>{{ $selBlogType->blogtype_name }}</option>
                        
                        <?php $blogTypes=App\Models\BlogType::orderBy('blogtype_name','ASC')->get(); ?>
                        @foreach ( $blogTypes as $blogType)
                          
                          <option  value="{{ $blogType->id }}" >{{ $blogType->blogtype_name }} </option> 
                          
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-12">
                    <strong>Blog Short Description:</strong>
                    <textarea name="shortDescription" class="form-control"  placeholder="Enter Blog Short Description" style="resize:none;">{{ $myBlog->shortDescription }}</textarea>
                  </div>
                  <div class="col-md-12">
                    <strong>Blog Header:</strong>
                    <textarea name="heading" class="form-control" id="summernoteHeading"  placeholder="Blog Header" style="resize:none;">{{ $myBlog->heading }}</textarea>
                  </div>
                  <div class="col-md-12">
                    <strong>Blog Banner Image:</strong>
                    <input type="file" name="image_path" value="{{ $myBlog->image_path }}">
                    <img src="{{ asset($myBlog->image_path) }}" style="width:200px;height:85px">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('#summernoteHeading').summernote()
                  
      })
</script>
@endsection
