@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Blog Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/resource-center-admin') }}"> Resource Center Blogs </a></li>
              <li class="breadcrumb-item active">Add Blog Information </li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Blog Information
                </h3>
      
            <form action="{{ route('store_blog_content') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

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
                <input type="hidden" name="resource_center_id" value="{{$id}}">
                <?php $resourceCenter = App\Models\ResourceCenter::findOrfail($id); ?> 
                
                <p class="bg-info p-3">{{ $resourceCenter->title }} </p>
              </div>
                
                 
                
                  <div class="col-md-12">
                    <strong>Blog Information:</strong>
                    <textarea name="content" id="summernoteContent" class="form-control"  placeholder="Enter Blog Information" style="resize:none;height:500px;"></textarea>
                  </div>
                  <div class="col-md-5">
                    <strong>Add image:</strong>
                    <div class="custom-file">
                    <input type="file" name="image_path" id="image_path"  class="custom-file-input">
                    <label class="custom-file-label" for="image_path">Choose file</label>
                      </div>
                      <img src="{{ asset('images/preview.jpg') }}" id="previewImg" style="width: 100px;height:100px" alt="">
                               
                </div>
              <div class="col-md-5">
                  <strong>Select Image Type (Size) :</strong>
                    <select name="imgCssClass" class="form-control" size="1">
                      <option disabled selected>--Select Image Type--</option>  
                        <option  value="imgbanner">Banner Image (795 x 300)</option> 
                        <option value="imgAdds">Banner Image (795 x 110)</option>
                        <option  value="imgProduct">Banner Image (150 x 120)</option> 
                        <option value="imgSquare">Banner Image (500 x 500)</option>
                    </select>
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
        $('#summernoteContent').summernote()
                  
      })
      //Form Submission
</script>   
@endsection