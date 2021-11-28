@extends('layouts.app')

@section('content')

<style>
    ul {
        list-style-type: none;
        
    }
    
</style>
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
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
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
 

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif

<div class="card bg-dark-gray border rounded border-dark">
    <div class="card-header">
        <h3 class="p-1 m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-inventory"></i> Inventory</h3>
    </div>
    
   
  
    <div class="card-header">
                

        <span class="searchAlign">  
            <div id="editor"></div>
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable')">Excel</button>
                <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint" > PDF</button>
               
              </div></span>
        <span style="float: right">
          <input type="text" style="padding: 4px;padding-bottom: 8px;" name="myInput" id="myInput" class="search"  placeholder="Search..">
          <button type="button"  class="btn btn-outline-secondary ">Search</button>
        
        </span>
        </div>
        <div id="tab">
            <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $products->total()}} Products </h5> 
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
              @endif
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
     
            
            @if($products->count())
                @foreach($products as $product)
             
                
           
                <tbody>
                    <tr>
                    <td>
                       {{ $product->id }}
                    </td>
                    <td>{{$product->name}}</td>
                    <td>
                        <?php $selCategory= App\Models\Category::findOrFail($product->category); ?>
                        {{$selCategory->category_name}}
                    </td>
                      
                    <td>
                        <ul>
                          @if($product->weightname1!= "")  
                            @if($product->stock1 != "0")
                              <li class="alert-success p-1"> {{$product->weightname1}} : {{$product->stock1}}</li>
                            @else
                                <li class="alert-danger p-1">{{$product->weightname1}} : {{$product->stock1}}</li>
                            @endif
                          @endif
                          @if($product->weightname2!= "")
                            @if($product->stock2 != "0")
                              <li class="alert-success p-1"> {{$product->weightname2}} : {{$product->stock2}}</li>
                            @else
                                <li class="alert-danger p-1">{{$product->weightname2}} : {{$product->stock2}}</li>
                            @endif
                          @endif
                          @if($product->weightname3!= "")
                            @if($product->stock3  != "0")
                              <li class="alert-success p-1"> {{$product->weightname3}} : {{$product->stock3}}</li>
                            @else
                                <li class="alert-danger p-1">{{$product->weightname3}} : {{$product->stock3}}</li>
                            @endif
                          @endif
                          @if($product->weightname4!= "")
                            @if($product->stock4  != "0")
                              <li class="alert-success p-1"> {{$product->weightname4}} : {{$product->stock4}}</li>
                            @else
                                <li class="alert-danger p-1">{{$product->weightname4}} : {{$product->stock4}}</li>
                            @endif
                          @endif
                          @if($product->weightname5!= "")
                            @if($product->stock5  != "0")
                              <li class="alert-success p-1"> {{$product->weightname5}} : {{$product->stock5}}</li>
                            @else
                                <li class="alert-danger p-1">{{$product->weightname5}} : {{$product->stock5}}</li>
                            @endif
                          @endif
                        </ul>
                    </td>
                    <td>
                      <ul>
                        @if($product->weightname1!= "")  
                          @if($product->status1 == "Out of Stock")
                            <li class="alert-danger p-1"> {{$product->weightname1}} : {{$product->status1}}</li>
                          @else
                              <li class="alert-success p-1">{{$product->weightname1}} : {{$product->status1}}</li>
                          @endif
                        @endif
                        @if($product->weightname2!= "")
                          @if($product->status2 == "Out of Stock")
                            <li class="alert-danger p-1"> {{$product->weightname2}} : {{$product->status2}}</li>
                          @else
                              <li class="alert-success p-1">{{$product->weightname2}} : {{$product->status2}}</li>
                          @endif
                        @endif
                        @if($product->weightname3!= "")
                          @if($product->status3 == "Out of Stock")
                            <li class="alert-danger p-1"> {{$product->weightname3}} : {{$product->status3}}</li>
                          @else
                              <li class="alert-success p-1">{{$product->weightname3}} : {{$product->status3}}</li>
                          @endif
                        @endif
                        @if($product->weightname4!= "")
                          @if($product->status4 == "Out of Stock")
                            <li class="alert-danger p-1"> {{$product->weightname4}} : {{$product->status4}}</li>
                          @else
                              <li class="alert-success p-1">{{$product->weightname4}} : {{$product->status4}}</li>
                          @endif
                        @endif
                        @if($product->weightname5!= "")
                          @if($product->status5 == "Out of Stock")
                            <li class="alert-danger p-1"> {{$product->weightname5}} : {{$product->status5}}</li>
                          @else
                              <li class="alert-success p-1">{{$product->weightname5}} : {{$product->status5}}</li>
                          @endif
                        @endif
                      </ul>
                  </td>
                  <td>
                    <a href=" {{ route('inventory.edit',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></td>
            </tr>
                </div> <!-- col-6 / end -->
               
                @endforeach
            @endif
        </table>

</div>
 
    
</div>  
<div class="row" >
  <div class="col-3 h4">{{ $products->links() }}</p>
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

