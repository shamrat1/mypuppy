@extends('layouts.app')
@section('content')
<style>
.imgStyle{
    width: 100%;
    height:100%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Gallery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i>Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/product') }}"><i class="zmdi zmdi-home"></i> Products</a></li>
              <li class="breadcrumb-item active">Product Gallery</li>
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
                      <div class="col">
                        <div class="card text-center" style="width: 170px;height:220px;border: 2px solid gray;">
                    
                            <div class="card-header">
                                <strong>Image:</strong>
                            </div>
                            
                             <div class="card-body">
                                <img src="/storage/{{ $product->image_path }}" class="imgStyle"  alt="">
                            </div>
                                <div class="card-footer">
                                <a href="#image" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i> </a>
                            </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card text-center" style="width: 170px;height:220px;border: 2px solid gray;">
                    
                            <div class="card-header">
                                <strong>Image-1:</strong>
                            </div>
                            <div class="card-body">
                             @if($product->image_path1!="")
                        
                               <img src="/storage/{{ $product->image_path1 }}"  class="imgStyle"  alt="">
                               @else
                                  <small class="alert-danger p-3">No Image-1</small>
                               @endif
                              </div>
                            <div class="card-footer">
                                <a href="#image1" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i> </a>
                            </div>
                           
                            
                           
                        </div>
                      </div>
                        
                      <div class="col">
                        <div class="card text-center" style="width: 170px;height:220px;border: 2px solid gray;">
                    
                            <div class="card-header">
                                <strong>Image-2:</strong>
                            </div>
                            <div class="card-body">
                             @if($product->image_path2!="")
                        
                               <img src="/storage/{{ $product->image_path2 }}" class="imgStyle"   alt="">
                               @else
                                  <small class="alert-danger p-3">No Image-2</small>
                               @endif
                           </div>
                            <div class="card-footer">
                                <a href="#image2" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i> </a>
                            </div>
                           
                        </div>
                      </div>  
                
                        <div class="col">
                        <div class="card text-center" style="width: 170px;height:220px;border: 2px solid gray;">
                    
                            <div class="card-header">
                                <strong>Image-3:</strong>
                            </div>
                              <div class="card-body">
                             @if($product->image_path3!="")
                        
                               <img src="/storage/{{ $product->image_path3 }}" class="imgStyle"   alt="">
                               @else
                                  <small class="alert-danger p-3">No Image-3</small>
                               @endif
                            </div>
                            <div class="card-footer">
                                <a href="#image3" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i> </a>
                            </div>
                           
                        </div>
                      </div>    
                    </div>
            </div>
    </div>  
</section>
                <form action="{{ route('gallery_update',$product->id) }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  1 #image-->
                      
                      
                      <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $product->name }} Image</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="file" name="image_path" value="asset('storage/'{{ $product->image_path }})"  class="form-control">
                                  <img src="asset('storage/'{{ $product->image_path }})" id="previewImg" alt="">
                                  <input type="hidden" name="id" value="{{$product->id}}">
                       </div>
                      
                      
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary">Save changes</button>
                      
                      
                         </div>
                      
                      
                       </div>
                      
                      
                      </div>
                      
                      
                      </div>
                      </form>
                      
                      
                      <form action="{{ route('gallery_update',$product->id) }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  2 #image-->
                      
                      
                      <div class="modal fade" id="image1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $product->name }} Gallery Image-1</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="hidden" name="id" value="{{$product->id}}">
                      
                            <strong>Add Gallery image1:</strong>
                            <input type="file" name="image_path1"   class="form-control">
                     
                         
                      
                       </div>
                      
                      
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary">Save changes</button>
                      
                      
                         </div>
                      
                      
                       </div>
                      
                      
                      </div>
                      
                      
                      </div>
                      </form>
                      
                      
                      <form action="{{ route('gallery_update',$product->id) }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  3 #image2-->
                      
                      
                      <div class="modal fade" id="image2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $product->name }} Gallery Image-2</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="hidden" name="id" value="{{$product->id}}">
                      
                                                 <strong>Add Gallery image2:</strong>
                                    <input type="file" name="image_path2"   class="form-control">
                         
                      
                       </div>
                      
                      
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary">Save changes</button>
                      
                      
                         </div>
                      
                      
                       </div>
                      
                      
                      </div>
                      
                      
                      </div>
                      </form>
                      <form action="{{ route('gallery_update',$product->id) }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  4 #image3-->
                      
                      
                      <div class="modal fade" id="image3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $product->name }} Gallery Image-3</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="hidden" name="id" value="{{$product->id}}">
                      
                                                 <strong>Add Gallery image3:</strong>
                            <input type="file" name="image_path3"   class="form-control">
                         
                      
                       </div>
                      
                      
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary">Save changes</button>
                      
                      
                         </div>
                      
                      
                       </div>
                      
                      
                      </div>
                      
                      
                      </div>
                      </form>
                      
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection