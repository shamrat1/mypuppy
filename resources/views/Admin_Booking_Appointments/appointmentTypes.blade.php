@extends('layouts.app') 
@section('content')
<style>ul{list-style-type:none}ul .list-group{margin-bottom:10px;overflow:scroll;-webkit-overflow-scrolling:touch}</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Appointment Types</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item active">Appointment Types</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="bg-dark-gray border rounded border-dark mb-3 p-3"><a href="{{ url('appointment-types/create') }}" class="pull-right btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Appointment Type</a></div>
      <div class="card">
         <div class="card-header">
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-clock"></i> Appointment Types</h3>
         </div>
         <div class="card-header">
            <span class="searchAlign">
               <div id="editor"></div>
               <div class="btn-group mb-3" role="group" aria-label="Basic example"><button type="button" class="btn btn-success" onclick="exportTableToExcel(&quot;myTable&quot;)">Excel</button> <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint">PDF</button></div>
            </span>
            <span style="float:right"><input style="padding:4px;padding-bottom:8px" name="myInput" id="myInput" class="search" placeholder="Search.."> <button type="button" class="btn btn-outline-secondary">Search</button></span>
         </div>
         @if ($message = Session::get('success'))
         <div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong></div>
         @endif
         <div class="card-body p-0" id="tab">
            <table id="myTable" class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width:1%">#</th>
                     <th style="width:10%">ID</th>
                     <th style="width:30%">Service</th>
                     <th style="width:20%">Appointment Name</th>
                     <th style="width:30%">Animal</th>
                     <th style="width:40%;padding-top:5px">Action</th>
                  </tr>
               </thead>
               <?php $appointmentTypes = App\Models\AppointmentType::orderBy('id','DESC')->get(); ?>
               <tbody>
                  @foreach ($appointmentTypes as $data )
                  <tr>
                     <td>#</td>
                     <td><a>{{ $data->id }}</a><br></td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                            <?php $outputService =App\Models\BookService::findOrfail($data->service_id); ?>   
                            <b>{{ $outputService->service_name }}</b></li>
                        </ul>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><b>{{ $data->appointment_for }}</b></li>
                        </ul>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><b>{{ $data->animal  }}</b></li>
                        </ul>
                     </td>
                     <td class="project-actions"><a href="#logo_{{ $data->id }}" data-toggle="modal" class="btn rounded-pill btn-outline-success " title="Edit Service Time"><i class="far fa-edit" aria-hidden="true">Edit Time</i></a></td>
                  </tr>
                  <form action="{{ url('/update-appointment-types') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update Service Time</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="appointment_type_id" value="{{$data->id}}" required>
                                 <div class="row mb-5">
                                    <div class="col-md-10">
                                        <strong>Select Service:</strong>
                                        
                                              <select name="service_id"  class="form-control" size="1">
                                              <option  value="{{ $outputService->id }}" selected>{{ $outputService->service_name }}</option>
                                              <?php  $services  = App\Models\BookService::orderBy('service_name','ASC')->get(); ?>
                                              <option  disabled >--Select Store--</option>
                                              @foreach ( $services as $service)
                                                
                                                <option  value="{{ $service->id }}" >{{ $service->service_name }} </option> 
                                                
                                              @endforeach
                                            </select>
                                    </div>  
                                    <div class="col-md-8">
                                      <strong>Appointment Name:</strong>
                                      <input type="text" name="appointment_for" value="{{ $data->appointment_for }}" class="form-control"  placeholder="Enter Appointment Name">
                                    </div>
                                        
                          
                                  <div class="col-md-8">
                                      <strong>Select Animal:</strong>
                                      
                                            <select name="animal"  class="form-control" size="1">
                                                <option value="{{$data->animal}}" selected>{{$data->animal}}</option>
                                                <option  disabled>--Select Day--</option>
                                              <option value="Dog">Dog</option>
                                              <option value="Cat">Cat</option>
                                              <option value="Bird">Bird</option>
                                              <option value="Rabbit">Rabbit</option>
                                              <option value="Reptile">Reptile</option>
                                              <option value="Small Animal">Small Animal</option>
                                          </select>
                                  </div>
                              </div>
                              <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save changes</button></div>
                           </div>
                        </div>
                     </div>
                  </form>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
@endsection