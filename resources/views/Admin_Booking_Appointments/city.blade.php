@extends('layouts.app') @section('content')
<style>ul{list-style-type:none}ul .list-group{margin-bottom:10px;overflow:scroll;-webkit-overflow-scrolling:touch}</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Cities</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item active">Cities</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="bg-dark-gray border rounded border-dark mb-3 p-3"><a href="{{ url('cities/create') }}" class="pull-right btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add City</a></div>
      <div class="card">
         <div class="card-header">
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-map-marker"></i> Cities</h3>
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
                     <th style="width:20%">City</th>
                     <th style="width:30%">State</th>
                     <th style="width:40%;padding-top:5px">Action</th>
                  </tr>
               </thead>
               <?php $cities = App\Models\City::orderBy('id','DESC')->get(); ?>
               <tbody>
                  @foreach ($cities as $data )
                  <tr>
                     <td>#</td>
                     <td><a>{{ $data->id }}</a><br></td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><b>{{ $data->city }}</b></li>
                        </ul>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item"><?php $output =App\Models\State::findOrfail($data->state_id); ?><b>{{ $output->state }}</b></li>
                        </ul>
                     </td>
                     <td class="project-actions"><a href="#logo_{{ $data->id }}" data-toggle="modal" class="btn btn-sm rounded-pill btn-outline-success" title="Edit City"><i class="far fa-edit" aria-hidden="true">Edit City</i></a></td>
                  </tr>
                  <form action="{{ url('/update-city') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $data->city }} City</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="city_id" value="{{$data->id}}" required>
                                 <div class="form-group form-control-lg text-left"><b>City :</b> <input style="float:right" name="city" value="{{ $data->city }}"></div>
                                 <div class="form-group form-control-lg text-left">
                                    <strong>Select State:</strong>
                                    <select name="state_id" id="state_id" class="form-control" size="1">
                                       <option value="{{ $output->id }}" selected>{{ $output->state }}</option>
                                       <option disabled>--Select State--</option>
                                       <?php $states = App\Models\State::orderBy('state','ASC')->get(); ?>@foreach ( $states as $state)
                                       <option value="{{ $state->id }}">{{ $state->state }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <br><br>
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