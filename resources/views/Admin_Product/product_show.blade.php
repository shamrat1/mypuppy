@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i>Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/product') }}"><i class="zmdi zmdi-home"></i> Products</a></li>
              <li class="breadcrumb-item active">Show Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">  
            <a href="{{ url('/product') }}" class=" ml-5 btn btn-danger "><i class="fas fa-chevron-left"></i> Back</a>        
            <div class="bg-dark-gray border rounded border-dark mt-3 mb-3 p-3">
                
                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Show Product
                </h3>
      
           
                <div class="container">
                    
                    <div class="row ">
                      <div class="col-sm">
                        <div class="card text-center" style="width: 220px;border: 2px solid gray;">
                    
                            <div class="card-header">
                                <strong>Image:</strong>
                            </div>
                            
                            
                           
                            <img src="/storage/{{ $product->image_path }}" style="width: 216px;height:220px;margin-bottom: 10px;"  alt="">
                           
                        </div>
                      </div>
                      <div class="col-sm">
                        
                        <?php 
                              $selectedCategory = App\Models\Category::findOrFail($product->category);
                              $output = App\Models\SubCategory::findOrFail($product->subcategory);
                              $mySubcategorytype=App\Models\SubCategoryType::findOrFail($product->subcategory_type ); 
                              if($product->product_type!="")
                               $selectedProdType = App\Models\ProductType::findOrFail($product->product_type);
                               
                         ?>
                            
                              <strong>Product Name:</strong>
                              <p class="bg-info p-2">{{ $product->name }}</p>
                          
                              <strong>Category:</strong>
                              <p class="bg-info p-2">{{ $selectedCategory->category_name }}</p>
                              <strong>Sub Category:</strong>
                              <p class="bg-info p-2">{{ $output->subcategoryname }}  </p>
                              <strong>Sub Category Type:</strong>
                              <p class="bg-info p-2">{{ $mySubcategorytype->subcategory_type }}</p>
                              <strong>Product Type:</strong>
                              @if($product->product_type!="")
                                <p class="bg-info p-2">{{ $selectedProdType->product_type }}</p>
                              @else
                                <p class="bg-danger p-2">Please Update The Product Type </p>
                              @endif
                              <strong>Product Price {{ $product->weightname1 }}:</strong>
                              <p class="bg-info p-2">{{ $product->price1_weight }}</p>
                               
                              @if($product->weightname2!="")
                                <strong>Product Price {{ $product->weightname2 }}:</strong>
                                <p class="bg-info p-2">{{ $product->price2_weight }}</p>
                              @endif

                              @if($product->weightname3!="")
                                <strong>Product Price {{ $product->weightname3 }}:</strong>
                                <p class="bg-info p-2">{{ $product->price3_weight }}</p>
                              @endif

                              @if($product->weightname4!="")
                                <strong>Product Price {{ $product->weightname4 }}:</strong>
                                <p class="bg-info p-2">{{ $product->price4_weight }}</p>
                               @endif

                                <strong>Product Stock Quantity  :</strong>
                              <p class="bg-info p-2">{{ $product->stock }}</p>
                          

                         
                        </div>
                      
                
                      </div>
                      @if($product->image_path1!="")
                        
                       <img src="/storage/{{ $product->image_path1 }}" style="width: 100px;height:100px;margin-bottom: 10px;"  alt="">
                       @else
                          <small class="alert-danger p-3">No Image-1</small>
                       @endif
            
                   @if($product->image_path2!="")
 
                       <img src="/storage/{{ $product->image_path2 }}" style="width: 100px;height:100px;margin-bottom: 10px;"  alt="">
                       @else
                       <small class="alert-danger p-3">No Image-2</small>
                       @endif
            
                      @if($product->image_path3!="")
              
                       <img src="/storage/{{ $product->image_path3 }}" style="width: 100px;height:100px;margin-bottom: 10px;"  alt="">
                       @else
                       <small class="alert-danger p-3">No Image-3</small>
                      @endif
                      @if($product->image_path4!="")
              
                      <img src="/storage/{{ $product->image_path4 }}" style="width: 100px;height:100px;margin-bottom: 10px;"  alt="">
                      @else
                      <small class="alert-danger p-3">No Image-4</small>
                     @endif
                    </div>
                    

                    <div class="card p-3 m-2 mt-3">
                      <strong>Product Description :</strong>
                      <p>{!! $product->description !!}</p>
                    </div>
            </div>
             

      
           
                
              
        
           
        
    </div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->






@endsection