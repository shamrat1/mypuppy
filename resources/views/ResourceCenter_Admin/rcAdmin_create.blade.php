@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Resource Center Blogs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/resource-center-admin') }}"> Resource Center Blogs </a></li>
              <li class="breadcrumb-item active">Add Resource Center Blogs </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">          
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Resource Center Blogs
                </h3>
      
            <form action="{{ route('rcAdmin_store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

              {!! csrf_field() !!}

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
      
      
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
              @endif
                
              <div class="col-md-5">
                <strong>Blog Title:</strong>
                <input type="text" name="title" class="form-control"  placeholder="Enter Blog Title">
              </div>
                
                 <div class="col-md-5">
                  <strong>Select Blog Category:</strong>
                  
                  <select name="blog_id" class="form-control" size="1">
                      <option  disabled selected>--Select Blog Category--</option>
                      
                      <?php $blogs=App\Models\Blog::orderBy('blog_name','ASC')->get(); ?>
                      @foreach ( $blogs as $blog)
                        
                        <option  value="{{ $blog->id }}" >{{ $blog->blog_name }} </option> 
                        
                      @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <strong>Select Blog Type:</strong>
                    
                    <select name="blogtype_id" id="blogtype_id" class="form-control" size="1">
                        <option  disabled selected>--Select BlogType--</option>
                        
                        <?php $blogTypes=App\Models\BlogType::orderBy('blogtype_name','ASC')->get(); ?>
                        @foreach ( $blogTypes as $blogType)
                          
                          <option  value="{{ $blogType->id }}" >{{ $blogType->blogtype_name }} </option> 
                          
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-12">
                    <strong>Blog Short Description:</strong>
                    <textarea name="shortDescription" class="form-control"  placeholder="Enter Blog Short Description" style="resize:none;"></textarea>
                  </div>
                  <div class="col-md-12">
                    <strong>Blog Header:</strong>
                    <textarea name="heading" class="form-control" id="summernoteHeader"  placeholder="Blog Header" style="resize:none;"></textarea>
                  </div>
                  
                  <div class="col-md-12">
                    <strong>Blog Banner Image:</strong>
                    <div class="custom-file">
                    <input type="file" name="image_path" id="image_path"  class="custom-file-input">
                    <label class="custom-file-label" for="image_path">Choose file</label>
                      </div>
                      <img src="{{ asset('images/preview.jpg') }}" id="previewImg" style="width: 200px;height:85px" alt="">
                </div>
              <div class="col-md-2">
                  <br/>
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
            </div>
      
      
        
            </form> 
        
    </div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#previewImg').attr('src', e.target.result);

          }
          
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      
      $("#image_path").change(function() {
        readURL(this);
      });
$(function () {
  // Summernote
  $('#summernoteHeader').summernote()
            
})
//Form Submission
</script>
@endsection