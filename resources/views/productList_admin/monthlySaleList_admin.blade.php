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
            <h1 class="m-0">Monthly Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Monthly Sales</li>
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
        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-star" aria-hidden="true"></i> Monthly Sales</h3>
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
            <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $monthlysales->count()}} Records </h5> 
      
        
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Month Name</th>
                  <th scope="col">Discount (%)</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
     
            
            @if($monthlysales->count())
                @foreach($monthlysales as $monthlysale)
                <tbody>
                    <tr>
                    <td>{{$monthlysale->id }}</td>
                    <td>{{$monthlysale->name}}</td>
                    <td>
                      <img src="/storage/{{ $monthlysale->image_path }}" style="width: 120px;height:120px;"  alt="">
                    </td>
                    <td>
                      <?php $selectCategory=App\Models\Category::findOrFail($monthlysale->category); ?>
                      {{ $selectCategory->category_name }}</td>
                      <td>{{ $monthlysale->month_name }}</td>
                    <td>{{ $monthlysale->discount }} %</td>

                    <td>
                      <ul>
                        <li style="padding-top:5px"><a href="#edit_{{ $monthlysale->id }}"  data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit Discount %</i></a></li>
                        <li style="padding-top:5px"><a href=" {{ route('product.remove_monthlySale',$monthlysale->sale_id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From Sales" ><i class="fas fa-star-half-alt"></i> Remove From Sales</a></li>
                      </ul>
                    </td>
            </tr>
            <form action="{{ url('/update-monthly-sales-discount') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <!-- Modal  1 #edit-->
              <div class="modal fade" id="edit_{{ $monthlysale->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Update discount on {{ $monthlysale->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
                       <div class="modal-body">
                          <div class="form-group form-control-lg">

                            <?php 
                              $mysale=App\Models\MonthlySale::query()->where('sale_id','LIKE',$monthlysale->id )->first(); ?>
                             <input type="hidden" name="saleId" value="{{ $mysale->id }}">
                             <input type="text" name="discount" value="{{ $monthlysale->discount }}" placeholder="Discount" required>
                          </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                       </div>
                    </div>
                 </div>
              </div>
           </form> 
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


