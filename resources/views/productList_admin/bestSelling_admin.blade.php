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
            <h1 class="m-0">Best Selling Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Best Selling Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">          


        

<div class="card bg-dark-gray border rounded border-dark">
    <div class="card-header">
        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-star" aria-hidden="true"></i> Best Selling Products</h3>
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
            <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $favourites->count()}} Records </h5> 
      
        
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
     
            
            @if($favourites->count())
                @foreach($favourites as $favourite)
                <tbody>
                    <tr>
                    <td>{{$favourite->id }}</td>
                    <td>{{$favourite->name}}</td>
                    <td>
                      <img src="/storage/{{ $favourite->image_path }}" style="width: 120px;height:120px;"  alt="">
                    </td>
                    <td>
                      <?php $selectCategory=App\Models\Category::findOrFail($favourite->category); ?>
                      {{ $selectCategory->category_name }}</td>
                      
                     <td>
                    <a href=" {{ route('product.remove_favourite',$favourite->fav_id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From Best Selling" ><i class="fas fa-star-half-alt"></i> Remove From Best Selling</a>
                    </td>

            </tr>
                @endforeach
            @endif
        </table>
</div>
 
    
</div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection


