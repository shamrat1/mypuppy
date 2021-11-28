@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
        
                   
                <p>Today New Orders</p>
                <h3>{{App\Models\Order::whereDate('created_at', Carbon\Carbon::today())->count()}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-basket"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  
                <p>Total Sales</p>
                <h3>$ : {{App\Models\Order::sum('total_amount')}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
               
                <p>Customers Registrations</p>
                <h3>{{App\Models\User::where('user_role', 'customer')
                  
                  ->count()}}</h3>
 
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                

                <p>Total Products</p>
                <h3>{{App\Models\Product::count()}}</h3>
              </div>
              <div class="icon">
               <i class="fab fa-first-order"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="container">
          <h3 class="bg-primary border shadow p-3"><i class="fas fa-shopping-basket"></i> Orders</h3>
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

          <table  id="myTable" class="table table-striped">
            <thead>
           <tr>
             <th scope="col">Order ID</th>
             <th scope="col">Date</th>
             <th scope="col">Customer Name</th>
             <th scope="col">Total Amount</th>
             <th scope="col">Order Status</th>
             <th scope="col">Actions</th>
           </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($orders as $order)
        
                <tbody>
                    <tr>
    
                   
                    
                    <td>{{$order->id}}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><?php $user = App\Models\User::find($order->user_id);  ?>
                         {{$user->name}} 
                     
                      </td>
                    <td>AUD : {{$order->total_amount}} </td>
                    <td>
                      @if($order->delivery_status == "processing")
                      <p class="alert-danger text-center p-2">{{ $order->delivery_status }}</p>
                      @endif
                      @if($order->delivery_status == "Shipping")
                      <p class="alert-warning text-center p-2">{{ $order->delivery_status }}</p>
                      @endif
                     
                      @if($order->delivery_status == "Delivered")
                      <p class="alert-success text-center p-2">{{ $order->delivery_status }}</p>
                      @endif
                      </td>
                    <td>
                        <ul style="list-style:none;">
                            <li style="padding-top:2px"><a href=" {{ route('order.show',$order->id) }}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Show" ><i class="fa fa-eye" aria-hidden="true"> Show</i></a></li>
                            <li  style="padding-top:2px"><a href="{{ route('order.edit',$order->id) }}" class="btn btn-sm rounded-pill btn-outline-info"><i class="fas fa-edit">Edit Status</i> </a></li>
                     
                        </ul>
                        
                            
                        
                    
                </td>
            
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection