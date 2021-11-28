@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/product') }}"><i class="zmdi zmdi-home"></i> Products</a></li>
              <li class="breadcrumb-item active">Add Product </li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Product
                </h3>
      
            
          
              <form action="{{ route('product_store') }}" id="productCreate" class="form-image-upload" method="POST" enctype="multipart/form-data">


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
        
              <div class="row ml-5" >
                <?php $categories = App\Models\Category::orderBy('category_name','ASC')->get(); ?>
                <div style="col-md-5">
                 
                      <strong >Select Category:</strong>
                      <select name="category" id="mySelect" class="form-control" size="1" >
                          <option  disabled selected>--Select Category--</option>
                            @foreach ($categories as $category)
                              <option  value="{{ $category->id }}">{{ $category->category_name }}</option>  
                            @endforeach
                        </select>
                    </div>
                <div class="col-md-5">
                  <strong>Select Sub-Category:</strong>
                  
                  <select name="subcategory" id="subcategory" class="form-control" size="1">
                      <option  disabled selected>--Select Sub-Category--</option>
                      <?php  $subcategories = App\Models\SubCategory::orderBy('subcategoryname','ASC')->get(); ?>
                      
                      @foreach ( $subcategories as $subcategory)
                        
                        <option  value="{{ $subcategory->id }}" >{{ $subcategory->subcategoryname }} </option> 
                        
                      @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <strong>Sub Category Type:</strong>
                          <select name="subcategory_type" id="subCategoryType" class="form-control" size="1">
                            <option  disabled selected>--Select Sub-Category-Type--</option>   
                           
                         </select>
                </div>
                <div class="col-md-5">
                    <strong>Product Type:</strong>
                          <select name="product_type" id="product_type" class="form-control" size="1">
                                
                           
                         </select>
                </div>
                <div class="col-md-5">
                  <strong>Product Name:</strong>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Product Name">
                </div>
                <div class="col-md-5">
                  <strong>Product Tag-Name:</strong>
                    <input type="text" name="tagname" class="form-control"  placeholder="Enter Product Tag-Name">
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
                  <strong>Product Weight-1 with their Units : </strong>
                  <input type="text" name="weightname1"   class="form-control" placeholder="For Example : 5 OZ or 15 LBS or 5KG">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-1 Price :</strong>
                    <input type="text" name="price1_weight"   class="form-control" placeholder="Enter Price ">
                </div>
                <div class="col-md-5">
                  <strong>Product Weight-2 with their Units :</strong>
                  <input type="text" name="weightname2"   class="form-control" placeholder="For Example : 5 OZ or 15 LBS or 5KG">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-2 Price :</strong>
                    <input type="text" name="price2_weight"   class="form-control" placeholder="Enter Product Price ">
                </div>
                <div class="col-md-5">
                  <strong>Product Weight-3 with their Units :</strong>
                  <input type="text" name="weightname3"   class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-3 Price :</strong>
                    <input type="text" name="price3_weight"   class="form-control" placeholder="Enter Product Price ">
                </div>
                <div class="col-md-5">
                  <strong>Product Weight-4 with their Units :</strong>
                  <input type="text" name="weightname4"   class="form-control" placeholder="For Example : 5 OZ or 15 LBS or 5KG">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-4 Price :</strong>
                    <input type="text" name="price4_weight"   class="form-control" placeholder="Enter Product Price ">
                </div> 
                <div class="col-md-5">
                  <strong>Product Weight-5 with their Units :</strong>
                  <input type="text" name="weightname5"   class="form-control" placeholder="For Example : 5 OZ or 15 LBS or 5KG">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-5 Price :</strong>
                    <input type="text" name="price5_weight"   class="form-control" placeholder="Enter Product Price ">
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-1 Stock Quantity :</strong>
                    <input type="text" name="stock1"   class="form-control" placeholder="Enter Product Weight-1 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-2 Stock Quantity :</strong>
                    <input type="text" name="stock2"   class="form-control" placeholder="Enter Product Weight-2 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-3 Stock Quantity :</strong>
                    <input type="text" name="stock3"   class="form-control" placeholder="Enter Product Weight-3 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-4 Stock Quantity :</strong>
                    <input type="text" name="stock4"   class="form-control" placeholder="Enter Product Weight-4 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Product Weight-5 Stock Quantity :</strong>
                    <input type="text" name="stock5"   class="form-control" placeholder="Enter Product Weight-5 Stock Quantity ">
                </div>
                <br>
                <div class="col-md-10 text-left">
                    <strong>Product Description :</strong>
                    <textarea name="description" id="summernoteDescription" class="form-control" placeholder="Enter Product Description :" style="resize: none;"></textarea>
                    
                </div>
                
                  
                  <div class="col-md-5">
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
      $( document ).ready(function() {
        $("#subcategory").on('change', function(){
          $('#subCategoryType').find('option').not(':first').remove();
           var selected_value= $('#subcategory').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "subcategory_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('subcategorytype_dropdown') }}",
                data: data,
                success: function(response) {
                    // console.log(response.dat );
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                        //   console.log(response.data)
                           var id = response.data[i].subcategory_type_id ;
                           var name = response.data[i].subcategory_type;

                           var option = "<option value='"+id+"'>"+name+"</option>"; 

                           $("#subCategoryType").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
        //productType
        $("#subCategoryType").on('change', function(){
          $('#product_type').find('option').not(':first').remove();
           var selected_value= $('#subCategoryType').val();
            // alert(selected_value);
            data = {
                "_token": "{{ csrf_token() }}",
                "subcategoryType_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ url('get-product-type-dropdown') }}",
                data: data,
                success: function(response) {
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                           var id = response.data[i].product_type_id ;
                           var name = response.data[i].product_type;

                           var option = "<option value='"+id+"'>"+name+"</option>"; 
                            
                           $("#product_type").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        }); 
      });  // end of doc ready
      
      
      
      
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
        $('#summernoteDescription').summernote()
                  
      })
      //Form Submission
      
      

</script>
@endsection