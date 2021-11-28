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
        
                   
                <p>Today New Appointments</p>
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
                  
                <p>Total Services</p>
                <h3>  {{App\Models\BookService::count()}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
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
             <th scope="col">ID</th>
             <th scope="col">Appointment Date</th>
             <th scope="col">Schedule Time</th>
             <th scope="col">Customer Name</th>
             <th scope="col">Status</th>
             <th scope="col">Actions</th>
           </tr>
            </thead>
            <h1>Work In progress</h1>
          </table>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection