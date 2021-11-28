@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Blog FAQ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog-faq') }}"> Blog FAQ</a></li>
              <li class="breadcrumb-item active">Add Blog FAQ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">          
            <div class="bg-dark-gray border rounded border-dark mb-5 pb-5" style="height: 450px;">
                
                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Blog FAQ
                </h3>
      
            <form action="{{ route('blog_faq_store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

             

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
                <b> Select Blog Name: </b>    
                <select name="blog_id" class="form-control" size="1" required>
                <option  disabled selected>--Select Blog Name--</option>
                <?php  $blogs = App\Models\Blog::orderBy('blog_name','ASC')->get(); ?>
                
                @foreach ( $blogs as $data)
                    
                    <option  value="{{ $data->id }}" >{{ $data->blog_name }} </option> 
                    
                @endforeach
                </select>
            </div>
            
            <div class="form-group form-control-lg text-left">
                <b> FAQ Question : </b>    
                <textarea class="form-control" name="ques" style="resize: none;" required></textarea>
            </div>
        <br><br>

            <div class="form-group form-control-lg text-left">
                <b> FAQ Answer : </b>    
                <textarea class="form-control" id="summernoteFaqAns" name="ans" style="resize: none;" required></textarea>
            </div>
                
                

                
              <div class="col-md-2" style="float: right;">
                  <br/> <br/> <br/> <br/> <br />
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
    $(function () {
        // Summernote
        $('#summernoteFaqAns').summernote()
                  
      })
</script>
@endsection