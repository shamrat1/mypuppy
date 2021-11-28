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
            <h1 class="m-0">Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Customers </li>
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
        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-users" aria-hidden="true"></i> Customers</h3>
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
            <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $users->count() }} Customers </h5> 
      
        
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Mob No.</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Pincode</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @forelse($users as $user)
                <tbody>
                    <tr>
                    <td>{{$user->id }} </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                   
                    <td>{{$user->city}}</td>
                    <td>{{$user->state}}</td>
                    <td>{{$user->zip}}</td>
                    <td>
                      <ul>
                        <li>
                          <a href="{{ url('customers',$user->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a>
                        </li>
                        <li>
                          <a href="{{ url('set-as-service-partners',$user->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Add As Service Partner" ><i class="fa fa-user" aria-hidden="true"> Add   As   Service Partner</i></a>
                        </li>
                      </ul>
                    </td>
            </tr>
                </div> <!-- col-6 / end -->
                @empty
               <tr>
                  <td colspan="9">
                    <h3 class="text-center p-3 alert-danger"><i class="fas fa-exclamation-triangle"></i> No Customer Registration Found </h1>  
                  </td>
                </tr>
                @endforelse  
        </table>
</div>
 
    
</div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
@endsection


