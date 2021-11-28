@extends('layouts.app') 
@section('content')
<style>ul{list-style-type:none}ul .list-group{margin-bottom:10px;overflow:scroll;-webkit-overflow-scrolling:touch}</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Our Service Timings</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item active">Our Service Timings</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      
      <div class="card">
         <div class="card-header">
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-clock"></i>Our Service Timings</h3>
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
                     <th style="width:20%">Store Name</th>
                     <th style="width:30%">Day</th>
                     <th style="width:30%">Timings</th>
                     <th style="width:40%;padding-top:5px">Action</th>
                  </tr>
               </thead>
               <?php $servTimings = App\Models\ServiceTime::where('servLocation_id',$partner->id)->orderBy('id','DESC')->get(); ?>
               <tbody>
                  @foreach ($servTimings as $data )
                  <tr>
                     <td>#</td>
                     <td><a>{{ $data->id }}</a><br></td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                            <?php $outputStore =App\Models\ServiceLocation::findOrfail($data->servLocation_id); ?>   
                            <b>{{ $outputStore->store_name }}</b></li>
                        </ul>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><b>{{ $data->day }}</b></li>
                        </ul>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><b>{{ $data->timing  }}</b></li>
                        </ul>
                     </td>
                     <td class="project-actions">
                         <ul class="list-inline">
                           <li class="list-inline-item"><b>
                         <a href="#logo_{{ $data->id }}" data-toggle="modal" class="btn rounded-pill btn-outline-success " title="Edit Service Time"><i class="far fa-edit" aria-hidden="true">Edit Time</i></a>
                         </b></li>
                         <li class="list-inline-item"><b>
                         <a href="{{ route('edit_availableTime',$data->id) }}" class="btn rounded-pill btn-outline-success " title="Change Available Time"><i class="fa fa-bell" aria-hidden="true"> Available Time</i></a>
                         </b></li>
                        </ul>
                         </td>
                  </tr>
                  <form action="{{ url('/update-service-timings') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update Service Time</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="timing_id" value="{{$data->id}}" required>
                                 <div class="row mb-5">
                                    <div class="col-md-8">
                                      <strong>Service Timing:</strong>
                                      <input type="text" name="timing" value="{{ $data->timing }}" class="form-control"  placeholder="Enter Timing">
                                    </div>
                                  <div class="col-md-10">
                                      <strong>Select Store:</strong>
                                          <select name="servLocation_id"  class="form-control" size="1">
                                          <option  value="{{ $outputStore->id }}" selected>{{ $outputStore->store_name }}</option>
                                       </select>
                                  </div>        
                          
                                  <div class="col-md-8">
                                      <strong>Select Day:</strong>
                                      
                                            <select name="day"  class="form-control" size="1">
                                                <option value="{{$data->day}}" selected>{{$data->day}}</option>
                                                <option  disabled>--Select Day--</option>
                                              <option value="Monday">Monday</option>
                                              <option value="Tueday">Tueday</option>
                                              <option value="Wednesday">Wednesday</option>
                                              <option value="Thursday">Thursday</option>
                                              <option value="Friday">Friday</option>
                                              <option value="Saturday">Saturday</option>
                                              <option value="Sunday">Sunday</option>
                                            
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