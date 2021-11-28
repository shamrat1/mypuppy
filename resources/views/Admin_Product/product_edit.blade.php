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
              <li class="breadcrumb-item active">Products </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">  
          <a href="{{ url('/product') }}" class="m-3 btn btn-danger "><i class="fas fa-chevron-left"></i> Back</a>  
                 
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Edit Product
                </h3>
      
            <form action="{{ url('product_update',$product->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

             

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
      
      
              <div class="row ml-5">
                      <input type="hidden" name="id" value="{{$product->id}}">
                  <div class="col-md-5">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter Product Name">
                </div>
                <div class="col-md-5">
                  <strong>Product Tag-Name:</strong>
                    <input type="text" name="tagname" class="form-control" value="{{ $product->tagname }}"   placeholder="Enter Product Tag-Name">
                </div>
                <?php $categories = App\Models\Category::orderBy('category_name','ASC')->get(); 
                      $selectedCategory = App\Models\Category::findOrFail($product->category);
                ?>
                <div class="col-md-5">
                    <strong>Select Category:</strong>
                    <select name="category" class="form-control"  id="category">
                        <option value="{{ $product->category }}"  selected>{{ $selectedCategory->category_name }}</option>
                          @foreach ($categories as $category)
                          <option  value="{{ $category->id }}">{{ $category->category_name }}</option>  
                          @endforeach
                      </select>
                    </div>
                    <?php $subcategories = App\Models\SubCategory::orderBy('subcategoryname','ASC')->get(); 
                      $output = App\Models\SubCategory::findOrFail($product->subcategory);
                    ?>
                    <div class="col-md-5">
                      
                      <strong>Select Sub-Category:</strong>
                      <input type="text" class="form-control" value="{{ $output->subcategoryname }}"   readonly>
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
                        @if($product->subcategory_type!="")
                        <?php
                              $mySubcategorytype=App\Models\SubCategoryType::findOrFail($product->subcategory_type ); 
                          ?>
                        <input type="text" class="form-control" value="{{ $mySubcategorytype->subcategory_type }}"   readonly>
                        @endif  
                        <select name="subcategory_type" id="subCategoryType" class="form-control" size="1">
                            <option  disabled selected>--Please Select Sub-Category First--</option>
                       </select>
                    </div>
                    <div class="col-md-5">
                    <strong>Product Type:</strong>
                    @if($product->product_type!="")
                        <?php
                              $myProductType=App\Models\ProductType::findOrFail($product->product_type ); 
                          ?>
                        <input type="text" class="form-control" value="{{ $myProductType->product_type }}"   readonly>
                        @endif  
                          <select name="product_type" id="product_type" class="form-control" size="1">
                               <option  disabled selected>--Please Select Sub-CategoryType First--</option> 
                         </select>
                </div>
                  <div class="col-md-5">
                    <strong>Product Weight-1 with their Units :</strong>
                    <input type="text" name="weightname1" value="{{ $product->weightname1 }}"  class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                  </div>
                  <div class="col-md-5">
                      <strong>Product Weight-1 Price :</strong>
                      <input type="text" name="price1_weight" value="{{ $product->price1_weight }}"  class="form-control" placeholder="Enter Product Price ">
                  </div>
                  <div class="col-md-5">
                    <strong>Product Weight-2 with their Units :</strong>
                    <input type="text" name="weightname2" value="{{ $product->weightname2 }}"  class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                  </div>
                  <div class="col-md-5">
                      <strong>Product Weight-2 Price :</strong>
                      <input type="text" name="price2_weight" value="{{ $product->price2_weight }}"  class="form-control" placeholder="Enter Product Price ">
                  </div>
                  <div class="col-md-5">
                    <strong>Product Weight-3 with their Units :</strong>
                    <input type="text" name="weightname3" value="{{ $product->weightname3 }}"  class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                  </div>
                  <div class="col-md-5">
                      <strong>Product Weight-3 Price :</strong>
                      <input type="text" name="price3_weight" value="{{ $product->price3_weight }}"  class="form-control" placeholder="Enter Product Price ">
                  </div>
                  <div class="col-md-5">
                    <strong>Product Weight-4 with their Units :</strong>
                    <input type="text" name="weightname4" value="{{ $product->weightname4 }}"  class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                  </div>
                  <div class="col-md-5">
                      <strong>Product Weight-4 Price :</strong>
                      <input type="text" name="price4_weight" value="{{ $product->price4_weight }}"  class="form-control" placeholder="Enter Product Price ">
                  </div> 
                  <div class="col-md-5">
                    <strong>Product Weight-5 with their Units :</strong>
                    <input type="text" name="weightname5" value="{{ $product->weightname5 }}"  class="form-control" placeholder="For Example : 5 OZ or 15 LBS ">
                  </div>
                  <div class="col-md-5">
                      <strong>Product Weight-5 Price :</strong>
                      <input type="text" name="price5_weight" value="{{ $product->price5_weight }}"  class="form-control" placeholder="Enter Product Price ">
                  </div> 
             <br>
                <div class="col-md-10 text-left">
                    <strong>Product Description :</strong>
                    <textarea name="description" id="summernoteDescription" class="form-control" placeholder="Enter Product Description :" style="resize: none;">{{ $product->description }}</textarea>
                    
                </div>
                
                  <div class="col-md-2">
                      <br/>
                      <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>
      
      
        
            </form> 
        
    </div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->





    <script src="{{ asset('js/jquery.min.js') }}"></script>
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
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
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
      //Form Submission
      $(function () {
        // Summernote
        $('#summernoteDescription').summernote()
                  
      })
</script>
@endsection