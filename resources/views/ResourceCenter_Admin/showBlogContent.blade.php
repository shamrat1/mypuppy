@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Show Blog Information</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i>Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/resource-center-admin') }}"> Resource Center Blogs </a></li>
               <li class="breadcrumb-item active">Show Blog Information </li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<style>
   .imgbanner {
    width: 100%!important;
    height: 360px;
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
   </style
</style>
<section class="content" style="height: 100%!important;">
   <div class="container-fluid">
   <a href="{{ url('/resource-center-admin') }}" class=" ml-5 btn btn-danger "><i class="fas fa-chevron-left"></i> Back</a>        
   <div class="bg-dark-gray border rounded border-dark mt-3 mb-3 p-3" style="height: auto;">
      <h3 class="text-center bg-info text-light text-uppercase">
         <i class="fa fa-plus-circle" aria-hidden="true"></i>  Show Show Blog Information
      </h3>
      <h4 class="text-center bg-primary shadow"> {{ $resourceCenter->title }}</h4>
      <div class="container">
         <div class="row ">
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
            
            @foreach ($resourceCenter->blogInformations as $blogInfo)
            <div class="col-sm" style="border: 2px solid gray;">
            
              @if($blogInfo->image_path!="")
               <div class="card" class="imgbanner" >
                  <div class="card-header">
                    <p class="bg-info p-1"> {{ $blogInfo->id }}</p>
                  </div>
                  <div class="card-body">
                  <img src="{{asset( $blogInfo->image_path )}}" class="imgbanner"   alt="">
               </div>
               <div class="card-footer">
                 <a href="#image_{{ $blogInfo->id }}"  data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success" style="float: right;" title="Change Image" ><i class="fa fa-pencil" aria-hidden="true"> Change Image</i></a>
               </div>
               @endif
            </div>
            <div class="card">
            <div class="card-body border p-3">
            <a href="#content_{{ $blogInfo->id }}"  data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success" style="float: right;" title="Edit" ><i class="fa fa-pencil" aria-hidden="true"> Edit Content</i></a></li> 
            {!! $blogInfo->content !!}

            
         </div>
         <div class="card-footer">
            <a id="{{$blogInfo->id}}" style="float:right;" href="{{ route('blogInfo_delete',$blogInfo->id) }} " class="btn btn-sm rounded-pill btn-outline-danger delete_blogInfo"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a>
         </div>

      </div>
      <!-- Button trigger modal for all the button -->
      <form action="{{ route('update_blog_content') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <!-- Modal  2 #logo-->
         <div class="modal fade" id="image_{{ $blogInfo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Update Id : {{ $blogInfo->id }}  </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" name="information_id" value="{{ $blogInfo->id }}">
                     <input type="hidden" name="resource_center_id" value="{{ $blogInfo->resource_center_id }}">
                     <strong>Content : </strong>
                     <input type="file" name="image_path">
                     <img src="{{ asset($blogInfo->image_path) }}" alt=" {{ $blogInfo->image_path }}">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
      </form>

      <!-- Button trigger modal for all the button -->
      <form action="{{ route('update_blog_content') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <!-- Modal  2 #logo-->
         <div class="modal fade" id="content_{{ $blogInfo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Update Id : {{ $blogInfo->id }}  </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" name="information_id" value="{{ $blogInfo->id }}">
                     <input type="hidden" name="resource_center_id" value="{{ $blogInfo->resource_center_id }}">
                     <strong>Content : </strong>
                     <textarea name="content" id="summernoteContent_{{ $blogInfo->id }}" class="form-control"  placeholder="Enter Blog Information" style="resize:none;height:500px;">{!! $blogInfo->content !!}</textarea>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
        $(".delete_blogInfo").click(function(){
            var blogInfo_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                route: "blogInfo_delete",
                data: {'blogInfo_id' : blogInfo_id},
                success: function(data) {
                    
                   $('.delete_success_div').removeClass('d-none');
                   $('.delete_success_html').html('Blog Information Deleted Successfully');
                    
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
          });
    });
   $(function () {
     // Summernote
     $('#summernoteContent_{{ $blogInfo->id }}').summernote()

     
               
   })
   //Form Submission
</script>   
@endforeach
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection