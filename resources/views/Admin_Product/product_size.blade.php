@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Size,measurement & Description</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/product') }}"><i class="zmdi zmdi-home"></i> Products</a></li>
              <li class="breadcrumb-item active">Product Size,measurement & Description</li>
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
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>   {{ $product->name }}
                </h3>
      
            <form action="{{ url('size_update',$product->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

             

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
                    <strong>Product Size Measurment :</strong>
                   <textarea name="size_measure"  class="form-control" placeholder="Enter Product Size Measurment :" style="resize: none;">{{ $product->size_measure }}</textarea>
                    
                </div>
                
                
                
                
                <div class="col-md-10">
                    
                   <table class="table table-striped">
                          <thead>
                           <tr>
                               <th scope="col">Dimention</th>
                               <th scope="col">
                                <select name="one_size" >
                                  @if($product->one_size!="")
                                  <option value="{{ $product->one_size }}" selected>{{ $product->one_size }}</option>
                              @else
                                 <option disabled selected>--select-one--</option>
                               @endif
                               <option value="One Size">One Size</option>
                               <option value="Small">Small</option>
                                </select> 
                                </th>
                               <th scope="col">
                                       <select name="medium" >
                                      @if($product->medium=="true")
                                      <option value="{{ $product->medium }}" selected>Medium</option>
                                      @else
                                         <option disabled selected>--select-one--</option>
                                       @endif
                                   <option value="true">Medium</option>
                                    </select>
                                   </th>
                               <th scope="col">
                                   <select name="large" >
                                      @if($product->large=="true")
                                        <option value="{{ $product->large }}" selected>Large</option>
                                      @else
                                         <option disabled selected>--select-one--</option>
                                       @endif
                                   <option value="true">Large</option>
                                    </select>
                                   </th>
                               <th scope="col">
                                   <select name="extra_large" >
                                      @if($product->extra_large=="true")
                                      <option value="{{ $product->extra_large }}" selected>X-Large</option>
                                      @else
                                         <option disabled selected>--select-one--</option>
                                       @endif
                                   <option value="true">X-Large</option>
                                    </select>
                                   
                                 </th>
                               <th scope="col">
                                   <select name="double_x_large" >
                                      @if($product->double_x_large=="true")
                                      <option value="{{ $product->double_x_large }}" selected>XX-Large</option>
                                      @else
                                         <option disabled selected>--select-one--</option>
                                       @endif
                                   <option value="true">XX-Large</option>
                                    </select>
                                   </th>
                           </tr>
                       </thead>
                       <tbody>
                        <th scope="col">
                                    <select name="dimension_name1" >
                                        @if($product->dimension_name1!="")
                                            <option value="{{ $product->dimension_name1 }}" selected>{{ $product->dimension_name1 }}</option>
                                        @else
                                           <option disabled selected>--select-one--</option>
                                         @endif
                                              <option value="Crate Size">Crate Size</option>
                                              <option value="Depth">Depth</option>
                                             <option value="Diameter">Diameter</option>
                                             <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                             <option value="Diameter of outside edge">Diameter of outside edge</option>
                                            <option value="Gusset Height">Gusset Height</option>
                                            <option value="Height">Height</option>
                                             <option value="Hood Opening">Hood Opening</option>
                                             <option value="Highest Point">Highest Point</option>
                                            <option value="Lowest Point">Lowest Point</option>
                                            <option value="Length">Length</option>
                                            <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                             <option value="Length of sleeping area">Length of sleeping area</option>
                                            <option value="Length to the outside edge">Length to the outside edge</option>
                                            <option value="Overall Height">Overall Height</option>
                                            <option value="Width">Width</option>
                                            <option value="Width of outside edge">Width of outside edge</option>
                                            <option value="Width of sleeping area">Width of sleeping area</option>
                                            <option value="Snooza Raised Bed Size">Snooza Raised Bed Size</option>
                                           
                               </th>
                                    </select>
                               <td><input type="text" name="dimension_name1Small" value="{{ $product->dimension_name1Small }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name1Medium" value="{{ $product->dimension_name1Medium }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name1Large"  value="{{ $product->dimension_name1Large }}" class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name1XLarge" value="{{ $product->dimension_name1XLarge }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name1XXLarge" value="{{ $product->dimension_name1XXLarge }}"  class="form-control" placeholder="Enter Value"></td>
                        </tr>
                         <tr>
                               <th scope="col">
                                    <select name="dimension_name2" >
                                            @if($product->dimension_name2!="")
                                            <option value="{{ $product->dimension_name2 }}" selected>{{ $product->dimension_name2 }}</option>
                                        @else
                                           <option disabled selected>--select-one--</option>
                                         @endif
                                     <option value="Crate Size">Crate Size</option>
                                      <option value="Depth">Depth</option>
                                     <option value="Diameter">Diameter</option>
                                     <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                     <option value="Diameter of outside edge">Diameter of outside edge</option>
                                    <option value="Gusset Height">Gusset Height</option>
                                    <option value="Height">Height</option>
                                     <option value="Hood Opening">Hood Opening</option>
                                     <option value="Highest Point">Highest Point</option>
                                    <option value="Lowest Point">Lowest Point</option>
                                    <option value="Length">Length</option>
                                    <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                     <option value="Length of sleeping area">Length of sleeping area</option>
                                    <option value="Length to the outside edge">Length to the outside edge</option>
                                    <option value="Overall Height">Overall Height</option>
                                    <option value="Width">Width</option>
                                    <option value="Width of outside edge">Width of outside edge</option>
                                    <option value="Width of sleeping area">Width of sleeping area</option>
                                    <option value="Snooza Raised Bed Size">Snooza Raised Bed Size</option>
                                            
                                    </select>
                                   </th>
                               <td><input type="text" name="dimension_name2Small" value="{{ $product->dimension_name2Small }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name2Medium" value="{{ $product->dimension_name2Medium }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name2Large" value="{{ $product->dimension_name2Large }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name2XLarge"  value="{{ $product->dimension_name2XLarge }}" class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name2XXLarge"  value="{{ $product->dimension_name2XXLarge }}" class="form-control" placeholder="Enter Value"></td>
                        </tr>
                        <tr>
                               <th scope="col">
                                    <select name="dimension_name3" >
                                        @if($product->dimension_name3!="")
                                            <option value="{{ $product->dimension_name3 }}" selected>{{ $product->dimension_name3 }}</option>
                                        @else
                                           <option disabled selected>--select-one--</option>
                                         @endif
                                         <option value="Crate Size">Crate Size</option>
                                         <option value="Depth">Depth</option>
                                        <option value="Diameter">Diameter</option>
                                        <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                        <option value="Diameter of outside edge">Diameter of outside edge</option>
                                       <option value="Gusset Height">Gusset Height</option>
                                       <option value="Height">Height</option>
                                        <option value="Hood Opening">Hood Opening</option>
                                        <option value="Highest Point">Highest Point</option>
                                            <option value="Lowest Point">Lowest Point</option>
                                       <option value="Length">Length</option>
                                       <option value="Length to the outside edge">Length to the outside edge</option>
                                       <option value="Overall Height">Overall Height</option>
                                       <option value="Width of outside edge">Width of outside edge</option>
                                       <option value="Width">Width</option>
                                       <option value="Snooza Raised Bed Size">Snooza Raised Bed Size</option>
                                            
                                    </select>
                                   </th>
                               <td><input type="text" name="dimension_name3Small" value="{{ $product->dimension_name3Small }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name3Medium" value="{{ $product->dimension_name3Medium }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name3Large" value="{{ $product->dimension_name3Large }}"  class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name3XLarge"  value="{{ $product->dimension_name3XLarge }}" class="form-control" placeholder="Enter Value"></td>
                               <td><input type="text" name="dimension_name3XXLarge"  value="{{ $product->dimension_name3XXLarge }}" class="form-control" placeholder="Enter Value"></td>
                        </tr>
                        <tr>
                          <th scope="col">
                               <select name="dimension_name4" >
                                   @if($product->dimension_name4!="")
                                       <option value="{{ $product->dimension_name4 }}" selected>{{ $product->dimension_name4 }}</option>
                                   @else
                                      <option disabled selected>--select-one--</option>
                                    @endif
                                    <option value="Crate Size">Crate Size</option>
                                  <option value="Depth">Depth</option>
                                 <option value="Diameter">Diameter</option>
                                 <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                 <option value="Diameter of outside edge">Diameter of outside edge</option>
                                <option value="Gusset Height">Gusset Height</option>
                                <option value="Height">Height</option>
                                 <option value="Hood Opening">Hood Opening</option>
                                 <option value="Highest Point">Highest Point</option>
                                <option value="Lowest Point">Lowest Point</option>
                                <option value="Length">Length</option>
                                <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                 <option value="Length of sleeping area">Length of sleeping area</option>
                                <option value="Length to the outside edge">Length to the outside edge</option>
                                <option value="Overall Height">Overall Height</option>
                                <option value="Width">Width</option>
                                <option value="Width of outside edge">Width of outside edge</option>
                                <option value="Width of sleeping area">Width of sleeping area</option>
                                <option value="Snooza Raised Bed Size">Snooza Raised Bed Size</option>
                               </select>
                              </th>
                          <td><input type="text" name="dimension_name4Small" value="{{ $product->dimension_name4Small }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name4Medium" value="{{ $product->dimension_name4Medium }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name4Large" value="{{ $product->dimension_name4Large }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name4XLarge"  value="{{ $product->dimension_name4XLarge }}" class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name4XXLarge"  value="{{ $product->dimension_name4XXLarge }}" class="form-control" placeholder="Enter Value"></td>
                   </tr>
                   <tr>
                          <th scope="col">
                               <select name="dimension_name5" >
                                   @if($product->dimension_name5!="")
                                       <option value="{{ $product->dimension_name5 }}" selected>{{ $product->dimension_name5 }}</option>
                                   @else
                                      <option disabled selected>--select-one--</option>
                                    @endif
                                    <option value="Crate Size">Crate Size</option>
                                  <option value="Depth">Depth</option>
                                 <option value="Diameter">Diameter</option>
                                 <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                 <option value="Diameter of outside edge">Diameter of outside edge</option>
                                <option value="Gusset Height">Gusset Height</option>
                                <option value="Height">Height</option>
                                 <option value="Hood Opening">Hood Opening</option>
                                 <option value="Highest Point">Highest Point</option>
                                <option value="Lowest Point">Lowest Point</option>
                                <option value="Length">Length</option>
                                <option value="Diameter of sleeping area">Diameter of sleeping area</option>
                                 <option value="Length of sleeping area">Length of sleeping area</option>
                                <option value="Length to the outside edge">Length to the outside edge</option>
                                <option value="Overall Height">Overall Height</option>
                                <option value="Width">Width</option>
                                <option value="Width of outside edge">Width of outside edge</option>
                                <option value="Width of sleeping area">Width of sleeping area</option>
                                <option value="Snooza Raised Bed Size">Snooza Raised Bed Size</option>
                               </select>
                              </th>
                          <td><input type="text" name="dimension_name5Small" value="{{ $product->dimension_name5Small }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name5Medium" value="{{ $product->dimension_name5Medium }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name5Large" value="{{ $product->dimension_name5Large }}"  class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name5XLarge"  value="{{ $product->dimension_name5XLarge }}" class="form-control" placeholder="Enter Value"></td>
                          <td><input type="text" name="dimension_name5XXLarge"  value="{{ $product->dimension_name5XXLarge }}" class="form-control" placeholder="Enter Value"></td>
                   </tr>
                        </tbody>
                   </table>
                    
                </div>
                 <div class="col-md-10">
                    <strong>Product Size Description :</strong>
                   <textarea name="size_desc"  class="form-control" id="summernoteSizeDesc"  rows="10" cols="10" placeholder="Enter Product Size Description :" style="resize: none;">{{ $product->size_desc }}</textarea>
                    
                </div>
                <br>
                <div class="col-md-10">
                     <strong>Product Materials :</strong>
                    <textarea name = "material" id="summernoteMaterial"  rows="15" cols="15" class="form-control" placeholder="Enter Material Name" >{{$product->material }}</textarea> 
      
                <div class="col-md-12">
                    <strong>Product Care :</strong>
                   <textarea name="instructions" id="summernoteCare" class="form-control" rows="10" cols="10" placeholder="Instructions..." style="resize: none;">{{ $product->instructions }}</textarea>
                
                </div>
                <br>
                   <br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>  
$(function () {
    // Summernote
    $('#summernoteCare').summernote()
    $('#summernoteMaterial').summernote()  
      $('#summernoteSizeDesc').summernote()  
  })
      
</script>




@endsection