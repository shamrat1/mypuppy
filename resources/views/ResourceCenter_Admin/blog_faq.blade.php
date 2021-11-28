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


                        <h1>Blog Frequently Asked Questions</h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>


                            <li class="breadcrumb-item active"> Blog Frequently Asked Questions</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('blog-faq/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Blog FAQ
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


                                    FAQ Question


                                </th>

                                <th style="width: 40%">


                                    FAQ Answer


                                </th>



                                <th style="width: 40%">
                                    Action

                                </th>


                            </tr>


                        </thead>

        <?php $blogFaqs = App\Models\BlogFAQ::orderBy('id','ASC')->get();
                       
        ?>

                        <tbody>

                @foreach ($blogFaqs as $faq )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                       

                                        {{ $faq->id }}


                                    </a>


                                    <br />





                                </td>


                                <td>


                                    <ul class="list-inline">


                                        <li class="list-inline-item">

                                        <?php $blog=App\Models\Blog::findOrfail($faq->blog_id); ?>
                                            <b> {{ $blog->blog_name }}</b>
                                        </li>





                                    </ul>


                                </td>


                                <td class="project_progress">
                                 
                                    {{ $faq->ques }}
                                    

                                    
                                </td>
                                <td  style="width: 40%"  class="project_progress">
                                 
                                        
                                   {!! $faq->ans !!}

                                    
                                </td>
                                <td class="project-actions">
                                    <ul style="list-style:none;">                 
                                         <li style="padding-top:5px"><a href="#update_{{ $faq->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></li>    
                                    </ul>
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ route('blog_faq_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="update_{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Update Id : {{ $faq->id }}  </h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body">
                                <input type="hidden" name="faq_id" value="{{$faq->id}}" required>
                                <div class="col-md-5">
                                    <b> Select Blog Name: </b>    
                                    <select name="blog_id" class="form-control" size="1">
                                    <option  value="{{ $faq->blog_id }}" selected>{{ $blog->blog_name }}</option>
                                    <?php  $blogs = App\Models\Blog::orderBy('blog_name','ASC')->get(); ?>
                                    
                                    @foreach ( $blogs as $data)
                                        
                                        <option  value="{{ $data->id }}" >{{ $data->blog_name }} </option> 
                                        
                                    @endforeach
                                </div>
                                <br><br> 
                                <div class="col-md-5">
                                    <strong> FAQ Question : </strong>    
                                    <textarea class="form-control" name="ques" style="resize: none;">{{ $faq->ques }}</textarea>
                                </div>
    
                                <div class="form-group form-control-lg text-left">
                                    <b> FAQ Answer : </b>    
                                    <textarea class="form-control" id="summernoteFaqAns" name="ans" style="resize: none;">{{ $faq->ans }}</textarea>
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
        $('#summernoteFaqAns').summernote()
                  
      })
</script>
@endsection
