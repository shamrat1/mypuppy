@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Sub-Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Add Sub-Category </li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Sub-Category
                </h3>
      
            <form action="{{ route('subcategory_store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

             

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
                <strong>Sub-Category Name:</strong>
                <input type="text" name="subcategoryname" class="form-control"  placeholder="Enter Sub-Category Name">
              </div>
                
                 <div class="col-md-5">
                  <strong>Select Category:</strong>
                  
                  <select name="category_id" id="category" class="form-control" size="1">
                      <option  disabled selected>--Select Sub-Category--</option>
                      <?php  $categories = App\Models\Category::orderBy('category_name','ASC')->get(); ?>
                      
                      @foreach ( $categories as $category)
                        
                        <option  value="{{ $category->id }}" >{{ $category->category_name }} </option> 
                        
                      @endforeach
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

@endsection