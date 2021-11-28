@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Edit Inventory </li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Edit Inventory
                </h3>
                
            <form action="{{ url('inventory_update',$product->id) }}"  method="POST">
               
             

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

              
              <div class="col-md-5">
                <strong>Product Name:</strong> 
                    <p class="bg-info p-2">{{ $product->name }}</p>
                </div>
      
           
                 
                <div class="col-md-5">
                    <strong>Select Category:</strong> 
                    <?php $category= App\Models\Category::findOrFail($product->category); ?>
                    <p class="bg-info p-2">{{ $category->category_name }}</p>
                    
                </div>
    
                @if($product->weightname1!= "")
                    <div class="col-md-5">
                        <strong>Product {{ $product->weightname1 }} Weight-1 Stock Quantity :</strong>
                        <input type="text" name="stock1"   class="form-control" value="{{$product->stock1}}" placeholder="Enter Product Weight-1 Stock Quantity ">
                        
                    </div>
                    <div class="col-md-5">
                        <strong>Select Status of {{ $product->weightname1 }}:</strong>
                        <select name="status1" class="form-control">
                            <option value="{{ $product->status1 }}" selected >{{ $product->status1 }}</option>
                              <option  value="Available">Available</option>
                              <option  value="Out of Stock">Out of Stock</option>
                          </select>
                    </div>
                     @else
                     <input type="hidden" name="stock1" value="0"  class="form-control">
                    <input type="hidden" name="status1" value="Out of Stock"  class="form-control">
                @endif
                
                @if($product->weightname2!= "")
                    <div class="col-md-5">
                        <strong>Product {{ $product->weightname2 }} Weight-2 Stock Quantity :</strong>
                        <input type="text" name="stock2"  value="{{$product->stock2}}" class="form-control" placeholder="Enter Product Weight-2 Stock Quantity ">
                        
                    </div>
                    <div class="col-md-5">
                        <strong>Select Status of {{ $product->weightname2 }}:</strong>
                        <select name="status2" class="form-control">
                            <option value="{{ $product->status2 }}" selected >{{ $product->status2 }}</option>
                              <option  value="Available">Available</option>
                              <option  value="Out of Stock">Out of Stock</option>
                          </select>
                    </div>
                @else
                     <input type="hidden" name="stock2" value="0"  class="form-control">
                    <input type="hidden" name="status2" value="Out of Stock"  class="form-control">
                @endif
                @if($product->weightname3!= "")
                <div class="col-md-5">
                    <strong>Product {{ $product->weightname3 }} Weight-3 Stock Quantity :</strong>
                    <input type="text" name="stock3" value="{{$product->stock3}}"  class="form-control" placeholder="Enter Product Weight-3 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Select Status of {{ $product->weightname3 }}:</strong>
                    <select name="status3" class="form-control">
                        <option value="{{ $product->status3 }}" selected >{{ $product->status3 }}</option>
                          <option  value="Available">Available</option>
                          <option  value="Out of Stock">Out of Stock</option>
                      </select>
                </div>
                @else
                  <input type="hidden" name="stock3" value="0"  class="form-control">
                  <input type="hidden" name="status3" value="Out of Stock"  class="form-control">
                @endif
                @if($product->weightname4!= "")
                <div class="col-md-5">
                    <strong>Product {{ $product->weightname4 }} Weight-4 Stock Quantity :</strong>
                    <input type="text" name="stock4" value="{{$product->stock4}}"  class="form-control" placeholder="Enter Product Weight-4 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Select Status of {{ $product->weightname4 }}:</strong>
                    <select name="status4" class="form-control">
                        <option value="{{ $product->status4 }}" selected >{{ $product->status4 }}</option>
                          <option  value="Available">Available</option>
                          <option  value="Out of Stock">Out of Stock</option>
                      </select>
                </div>
                @else
                  <input type="hidden" name="stock4" value="0"  class="form-control">
                  <input type="hidden" name="status4" value="Out of Stock"  class="form-control">
                @endif
                @if($product->weightname5!= "")
                <div class="col-md-5">
                    <strong>Product {{ $product->weightname5 }} Weight-5 Stock Quantity :</strong>
                    <input type="text" name="stock5" value="{{$product->stock5}}"  class="form-control" placeholder="Enter Product Weight-5 Stock Quantity ">
                    
                </div>
                <div class="col-md-5">
                    <strong>Select Status of {{ $product->weightname5 }}:</strong>
                    <select name="status5" class="form-control">
                        <option value="{{ $product->status5 }}" selected >{{ $product->status5 }}</option>
                          <option  value="Available">Available</option>
                          <option  value="Out of Stock">Out of Stock</option>
                      </select>
                </div>
                @else
                    <input type="hidden" name="stock5" value="0"  class="form-control">
                    <input type="hidden" name="status5" value="Out of Stock"  class="form-control">
                @endif
                  <div class="col-md-2">
                      <br/>
                      <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>
      
      </div>
        
            </form> 
        
    </div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection