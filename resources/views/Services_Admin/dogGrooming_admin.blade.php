@extends('layouts.app')
@section('content')
<style>
   ul {
   list-style-type: none;
   }
   @media (min-width: 992px) {
   .modal-dialog {
   max-width: 80%;
   }
   .modal-body {
   max-height: calc(100vh - 210px);
   overflow-y: auto;
   }
   }
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Dog Grooming</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/my-company-services') }}">Our Services</a></li>
                  <li class="breadcrumb-item active">Dog Grooming</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-info-circle"></i> Dog Grooming</h3>
         </div>
         <div class="card-header">
            <span class="searchAlign">
               <div id="editor"></div>
               <div class="btn-group mb-3" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable')">Excel</button>
                  <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint" > PDF</button>
               </div>
            </span>
            <span style="float: right">
            <input type="text" style="padding: 4px;padding-bottom: 8px;" name="myInput" id="myInput" class="search"  placeholder="Search..">
            <button type="button"  class="btn btn-outline-secondary ">Search</button>
            </span>
         </div>
         @if ($message = Session::get('success'))
         <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
         </div>
         @endif
         <div class="card-body p-0" id="tab">
            <table id="myTable" class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width: 1%">
                        #
                     </th>
                     <th style="width: 10%">
                        S No.
                     </th>
                     <th style="width: 20%">
                        Topic 
                     </th>
                     <th style="width: 40%">
                        Action
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        I.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Section - 1 : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $mySection1 = App\Models\ServiceContent::findOrFail(27);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $mySection1->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_section-1" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Section" ><i class="far fa-edit" aria-hidden="true"> Edit Section</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        1.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-1 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData1 = App\Models\ServiceContent::findOrFail(7);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData1->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        1.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-1 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData1->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        1.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Tab-1 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData1->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image1" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        2.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Tab-2 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData2 = App\Models\ServiceContent::findOrFail(8);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData2->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_topic-2" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        2.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-2 Information: </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData2->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information-2" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        2.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Tab-2 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData2->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image2" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        3.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-3 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData3 = App\Models\ServiceContent::findOrFail(9);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData3->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_topic-3" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        3.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-3 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData3->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information-3" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        3.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Tab-3 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData3->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image3" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        4.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Tab-4 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData4 = App\Models\ServiceContent::findOrFail(10);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData4->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading-4" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        4.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-4 Information: </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData4->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information-4" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        4.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Tab-4 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData4->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image4" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        5.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Row-2 Tab-1 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData5 = App\Models\ServiceContent::findOrFail(11);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData5->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading-5" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        5.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Row-2 Tab-1 Information: </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData5->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information-5" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        5.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Row-2 Tab-1 image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData5->image_path }}" width="200" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image5" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        6.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Row-2 Tab-2 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData6 = App\Models\ServiceContent::findOrFail(12);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData6->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading-6" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        6.1 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Row-2 Tab-2 Information: </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData6->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information-6" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        6.2 .
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Row-2 Tab-2 image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData6->image_path }}" width="200" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image6" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  {{--  23-08-2021  --}}
                  <tr>
                     <td>#</td>
                     <td>7.</td>
                     <?php $myData7 = App\Models\ServiceContent::findOrFail(13);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Row-2 Tab-3 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! $myData7->topic !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading-7" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 1.a</td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.a Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7a" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.1 .a
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.a Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7->image_path }}" width="70" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7a" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 2.b</td>
                     <?php $myData7b = App\Models\ServiceContent::findOrFail(14);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.b Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7b->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7b" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.2.b
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.b Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7b->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7b" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 2.c</td>
                     <?php $myData7c = App\Models\ServiceContent::findOrFail(15);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.c Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7c->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7c" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.2.c
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.c Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7c->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7c" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 2.d</td>
                     <?php $myData7d = App\Models\ServiceContent::findOrFail(16);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.d Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7d->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7d" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.2.d
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.d Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7d->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7d" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 2.e</td>
                     <?php $myData7e = App\Models\ServiceContent::findOrFail(17);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.e Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7e->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7e" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.2.e
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.e Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7e->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7e" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>7 2.f</td>
                     <?php $myData7f = App\Models\ServiceContent::findOrFail(18);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.f Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData7f->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information7f" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        7.2.f
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-3.f Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData7f->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image7f" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        8.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-4 Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData8 = App\Models\ServiceContent::findOrFail(19);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $myData8->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_heading-8" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.a</td>
                     <?php $myData8a = App\Models\ServiceContent::findOrFail(19);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.a Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8a->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8a" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.b</td>
                     <?php $myData8b = App\Models\ServiceContent::findOrFail(20);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.b Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8b->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8b" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.c</td>
                     <?php $myData8c = App\Models\ServiceContent::findOrFail(21);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.c Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8c->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8c" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.d</td>
                     <?php $myData8d = App\Models\ServiceContent::findOrFail(22);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.d Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8d->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8d" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.e</td>
                     <?php $myData8e = App\Models\ServiceContent::findOrFail(23);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.e Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8e->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8e" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.f</td>
                     <?php $myData8f = App\Models\ServiceContent::findOrFail(24);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.f Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8f->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8f" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.g</td>
                     <?php $myData8g = App\Models\ServiceContent::findOrFail(25);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.g Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8g->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8g" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>8.1.h</td>
                     <?php $myData8h = App\Models\ServiceContent::findOrFail(26);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-2 Tab-4.h Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData8h->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information8h" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        II.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Section - 2 : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $mySection2 = App\Models\ServiceContent::findOrFail(28);   ?>
                     <td class="project_progress">
                        {!! \Illuminate\Support\Str::limit( $mySection2->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_section-2" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Section" ><i class="far fa-edit" aria-hidden="true"> Edit Section</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>9.</td>
                     <?php $myData9 = App\Models\ServiceContent::findOrFail(29);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-3 Tab-1 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData9->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information9" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        9.1
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-3 Tab-1 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData9->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image9" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>10.</td>
                     <?php $myData10 = App\Models\ServiceContent::findOrFail(30);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-3 Tab-2 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData10->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information10" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        10.1
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-3 Tab-2 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData10->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image10" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>III.</td>
                     <?php $mySection3 = App\Models\ServiceContent::findOrFail(31);   ?>
                     <?php $myData11 = App\Models\ServiceContent::findOrFail(31);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Section-3 : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($mySection3->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_section-3" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        11
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData11->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image11" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>11.</td>
                     <?php $myData11 = App\Models\ServiceContent::findOrFail(32);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-1 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData11->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information11" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>12.</td>
                     <?php $myData12 = App\Models\ServiceContent::findOrFail(33);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-2 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData12->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information12" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>13.</td>
                     <?php $myData13 = App\Models\ServiceContent::findOrFail(34);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-3 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData13->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information13" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>14.</td>
                     <?php $myData14 = App\Models\ServiceContent::findOrFail(35);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-4 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData14->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information14" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>15.</td>
                     <?php $myData15 = App\Models\ServiceContent::findOrFail(36);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-5 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData15->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information15" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>16.</td>
                     <?php $myData16 = App\Models\ServiceContent::findOrFail(37);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-4 Col-6 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData16->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information16" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>17.</td>
                     <?php $myData17 = App\Models\ServiceContent::findOrFail(38);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Note : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData17->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information17" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>18.</td>
                     <?php $myData18 = App\Models\ServiceContent::findOrFail(39);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>Section - 4 : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData18->topic, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_section4" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>18.a</td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 col-1 : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData18->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information18" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        18.a 
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 Col-1 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData18->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image12" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>19</td>
                     <?php $myData19 = App\Models\ServiceContent::findOrFail(40);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 col-2 : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData19->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information19" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        19.a 
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 Col-2 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData19->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image13" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>#</td>
                     <td>20</td>
                     <?php $myData20 = App\Models\ServiceContent::findOrFail(41);   ?>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 col-3 : </b>
                           </li>
                        </ul>
                     </td>
                     <td>
                        {!! \Illuminate\Support\Str::limit($myData20->information, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_information20" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Heading" ><i class="far fa-edit" aria-hidden="true"> Edit Heading</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        20.a 
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>R-5 Col-3 Image : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData20->image_path }}" width="210" height="80"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image14" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <?php $myPoint = App\Models\Point::where('service_id',"3")->orderBy('id','asc')->get();  
                   $i= 20;
                  ?>
                  @foreach($myPoint as $element)
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                            
                        {{ $i=$i+1 }}.
                        </a>
                        <br />
                     </td>
                     <td>
                        
                        
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-{{ $i }} Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                          {!! \Illuminate\Support\Str::limit( $element->point, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_{{ $element->id  }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  
                  <form action="{{ route('update_point_instoreTraining') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="update_{{ $element->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update Information-{{ $i }} </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                    <input type="hidden" name="pointId" value="{{ $element->id  }}">
                                 <div class="form-group form-control-lg text-left">
                                    <b> Information-{{ $i }} : </b>    
                                    <textarea name="point" class="summernoteInformation" required>{{ $element->point }}</textarea>
                                 </div>
                              </div>
                              <br><br>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  
                  @endforeach
                  </tr>
                  <?php $cards = App\Models\ImgInfoCard::where('service_id',"3")->orderBy('id','asc')->get();  
                  $i=22;
                  ?>
                  @foreach($cards as $card)
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                            
                        {{ $i=$i+1 }}.
                        </a>
                        <br />
                     </td>
                     <td>
                        
                        
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-{{ $i }} Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                          {!! \Illuminate\Support\Str::limit( $card->info, 150, ' [...]') !!}
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_{{ $card->id  }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit Information" ><i class="far fa-edit" aria-hidden="true"> Edit Information</i></a></li>
                        </ul>
                     </td>
                  </tr>
                   <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        {{ $i }} b.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Image {{ $i }}: </b>
                           </li>
                        </ul>
                     </td>
                     <td class="video-holder">
                         
                                    <img src="{{ $card->image_path }}" style="width:100px;height:100px;" >
                         
                        
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#updateImg_{{ $card->id  }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <form action="{{ route('update_infoCard_instoreTraining') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="update_{{ $card->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update Information-{{ $i }} </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                    <input type="hidden" name="cardId" value="{{ $card->id  }}">
                                 <div class="form-group form-control-lg text-left">
                                    <b> Information-{{ $i }} : </b>    
                                    <textarea name="info" class="summernoteInfo" required>{{ $card->info }}</textarea>
                                 </div>
                              </div>
                              <br><br>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  
                  <form action="{{ route('update_imgCard_instoreTraining') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="updateImg_{{ $card->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Change Image {{ $i }} </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="form-group form-control-lg text-left">
                                    <b> image_path {{ $i }}: </b>    
                                    <input type="hidden" name="cardId" value="{{ $card->id  }}">
                                    <input type="file" name="image_path" value="{{ $card->image_path }}">
                                    <br><br>
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                                   <img src="{{ $card->image_path }}" style="width:100px;height:100px;">
                                 </div>
                              </div>
                              <br><br>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  
                  @endforeach
                  </tr>
               </tbody>
            </table>
            <!-- Button trigger modal for all the button -->
            <form action="{{ route('update_heading1_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Heading </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Heading : </b>    
                              <input type="text" name="topic1"  class="form-control" value="{{$myData1->topic}}" required>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info1_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Information : </b>    
                              <textarea name="information1" class="form-control" required style="resize: none;">{{ $myData1->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img1_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-1 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-1: </b>    
                              <input type="file" name="image_path"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData1->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading2_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_topic-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-2 Information : </b>    
                              <input type="text" name="topic2" class="form-control" value="{{ $myData2->topic }}" required>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info2_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-2 Information : </b>    
                              <textarea name="information2" class="form-control" required style="resize: none;">{{ $myData2->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img2_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-2 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-2: </b>    
                              <input type="file" name="image_path1" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData2->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading3_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_topic-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-3 Information : </b>    
                              <input type="text" name="topic3" class="form-control" value="{{ $myData3->topic }}" required>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info3_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-3 Information : </b>    
                              <textarea name="information3"  class="form-control" style="resize: none;" required>{{ $myData3->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img3_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-3 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-3: </b>    
                              <input type="file" name="image_path2" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData3->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading4_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Information : </b>    
                              <input type="text" name="topic4" class="form-control" value="{{ $myData4->topic }}" required>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info4_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information 4</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Information : </b>    
                              <textarea name="information4" class="form-control" required style="resize: none;">{{ $myData4->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img4_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-4 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-4: </b>    
                              <input type="file" name="image_path3" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData4->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading5_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-2 Tab-1 Heading  </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Row-2 Tab-1 Heading : </b>    
                              <textarea name="topic5"  class="summernoteInformation" required>{{$myData5->topic}}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info5_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Information : </b>    
                              <textarea name="information5" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData5->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img5_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-1 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-1: </b>    
                              <input type="file" name="image_path4"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData5->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading6_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading-6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-2 Tab-2 Heading  </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Row-2 Tab-2 Heading : </b>    
                              <textarea name="topic6"  class="summernoteInformation" required>{{$myData6->topic}}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info6_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information-6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Information : </b>    
                              <textarea name="information6" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData5->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img6_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-1 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-1: </b>    
                              <input type="file" name="image_path5"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData6->image_path }}" width="200" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            {{--  heading-7  --}}
            <form action="{{ route('update_heading7_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading-7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-2 Tab-3 Heading : </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Row-2 Tab-3 Heading : </b>    
                              <textarea name="topic7"  class="summernoteInformation" required>{{$myData7->topic}}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7a_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information7a" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.a Information : </b>    
                              <textarea name="information7a" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7a_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7a" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-3 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.a Image : </b>    
                              <input type="file" name="image_path6a" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7->image_path }}" width="60" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7b_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information7b" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.b Information : </b>    
                              <textarea name="information7b" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7b->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7b_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7b" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image7b </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.b Image : </b>    
                              <input type="file" name="image_path6b" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7b->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7c_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information7c" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.c Information : </b>    
                              <textarea name="information7c" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7c->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7c_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7c" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image7c </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.c Image : </b>    
                              <input type="file" name="image_path6c" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7c->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7d_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information7d" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.d Information : </b>    
                              <textarea name="information7d" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7d->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7d_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7d" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image7d </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.d Image : </b>    
                              <input type="file" name="image_path6d" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7d->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7e_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information7e" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.e Information : </b>    
                              <textarea name="information7e" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7e->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7e_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7e" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image7e </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.e Image : </b>    
                              <input type="file" name="image_path6e" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7e->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info7f_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information7f" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.f Information : </b>    
                              <textarea name="information7f" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData7f->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img7f_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image7f" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image7f </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-2 Tab-3.f Image : </b>    
                              <input type="file" name="image_path6f" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData7f->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_heading8_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_heading-8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-2 Tab-3 Heading</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Row-2 Tab-3 Heading : </b>    
                              <textarea name="topic8"  class="summernoteInformation" required>{{$myData8->topic}}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8a_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8a" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.a Information : </b>    
                              <textarea name="information8a" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8a->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8b_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8b" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.b Information : </b>    
                              <textarea name="information8b" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8b->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8c_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8c" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.c Information : </b>    
                              <textarea name="information8c" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8c->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8d_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8d" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.d Information : </b>    
                              <textarea name="information8d" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8d->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8e_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8e" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.e Information : </b>    
                              <textarea name="information8e" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8e->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8f_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8f" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.f Information : </b>    
                              <textarea name="information8f" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8f->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8g_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8g" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.g Information : </b>    
                              <textarea name="information8g" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8g->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info8h_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_information8h" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-4.h Information : </b>    
                              <textarea name="information8h" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $myData8h->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_section-1_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_section-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Section-1 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Section 1 : </b>    
                              <textarea name="section1" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $mySection1->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_section-2_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_section-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Section-2 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Section 2 : </b>    
                              <textarea name="section2" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $mySection2->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info9_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-3 Tab-1 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-3 Tab-1 Information : </b>    
                              <textarea name="information9" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData9->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img9_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image9 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-1 Image : </b>    
                              <input type="file" name="image_path9" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData9->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info10_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-3 Tab-2 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-3 Tab-2 Information : </b>    
                              <textarea name="information10" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData10->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img10_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image10 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-3 Tab-2 Image : </b>    
                              <input type="file" name="image_path10" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData10->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_section-3_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #info7b-->
               <div class="modal fade" id="update_section-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Section-3 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Section 3 : </b>    
                              <textarea name="section3" class="summernoteInformation" class="form-control" required style="resize: none;">{{ $mySection3->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img11_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image11 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> R-4 Image : </b>    
                              <input type="file" name="image_path11" required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData11->image_path }}" width="90" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info11_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-1 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-1 Information : </b>    
                              <textarea name="information11" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData11->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info12_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information12" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-2 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-2 Information : </b>    
                              <textarea name="information12" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData12->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info13_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information13" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-3 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-3 Information : </b>    
                              <textarea name="information13" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData13->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info14_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information14" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-4 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-4 Information : </b>    
                              <textarea name="information14" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData14->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info15_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information15" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-5 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-5 Information : </b>    
                              <textarea name="information15" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData15->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info16_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information16" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Row-4 Col-6 Information </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Row-4 Col-6 Information : </b>    
                              <textarea name="information16" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData16->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info17_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_information17" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Note </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Note : </b>    
                              <textarea name="information17" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData17->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_section4_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #section4-->
               <div class="modal fade" id="update_section4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Section 4 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  Section 4 : </b>    
                              <textarea name="section4" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData18->topic }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info18_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #section4-->
               <div class="modal fade" id="update_information18" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update R-5 col-1 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  R-5 col-1 : </b>    
                              <textarea name="information18" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData18->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img12_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image12" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-12 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-4 Col-1 : </b>    
                              <input type="file" name="image_path12"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData18->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info19_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #section4-->
               <div class="modal fade" id="update_information19" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update R-5 col-2 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  R-5 col-2 : </b>    
                              <textarea name="information19" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData19->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img13_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image13" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-13 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-4 Col-2 : </b>    
                              <input type="file" name="image_path13"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData19->image_path }}" width="100" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_info20_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #section4-->
               <div class="modal fade" id="update_information20" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Update R-5 col-3 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b>  R-5 col-3 : </b>    
                              <textarea name="information20" class="summernoteInformation" class="form-control" style="resize: none;" required>{{ $myData20->information }}</textarea>
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <form action="{{ route('update_img14_dog_grooming') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Modal  2 #logo-->
               <div class="modal fade" id="update_image14" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Change Image-14 </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                              <b> Image Row-4 Col-3 : </b>    
                              <input type="file" name="image_path14"  required>
                              <br><br>
                           </div>
                           <div class="form-group form-control-lg text-left">
                              <img src="{{ $myData20->image_path }}" width="210" height="100" alt="image">
                           </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- **************************************************************** -->
   </section>
   <!-- /.content -->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(function () {
       // Summernote
        $('.summernoteInformation').summernote()          
        
     })
</script>
@endsection