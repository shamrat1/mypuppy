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
               <h1>Repair Service</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/my-company-services') }}">Our Services</a></li>
                  <li class="breadcrumb-item active">Repair Service </li>
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
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fab fa-blogger"></i>Repair Service </h3>
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
                        1.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Heading : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData = App\Models\ServiceContent::findOrFail(1);   ?>
                     <td class="project_progress">
                         {!! \Illuminate\Support\Str::limit( $myData->topic, 150, ' [...]') !!}
                       
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
                        2.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Row-1 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                          {!! \Illuminate\Support\Str::limit( $myData->information, 150, ' [...]') !!}
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
                        3.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Row-1 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData->image_path }}" width="100" height="100"  alt="image"/>
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
                        4.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Row-2 Information: </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData1 = App\Models\ServiceContent::findOrFail(2);   ?>
                     <td class="project_progress">
                          {!! \Illuminate\Support\Str::limit( $myData1->information, 150, ' [...]') !!}
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
                        5.
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> image Row-2 : </b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{ $myData1->image_path }}" width="100" height="100"  alt="image"/>
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_image2" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Change Image" ><i class="far fa-edit" aria-hidden="true">Change Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <!-- Button trigger modal for all the button -->
                  <form action="{{ route('update_heading_repair_service') }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="topic" id="summernoteTopic1" required>{{ $myData->topic }}</textarea>
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
                  <form action="{{ route('update_info1_repair_service') }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="information1" id="summernoteInformation1" required>{{ $myData->information }}</textarea>
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
                  <form action="{{ route('update_img1_repair_service') }}" method="POST" enctype="multipart/form-data">
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
                                 <input type="hidden" name="service_id" value="{{$myData->id}}" required>
                                 <div class="form-group form-control-lg text-left">
                                    <b> Image Row-1: </b>    
                                    <input type="file" name="image_path">
                                    <br><br>
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                                    <img src="{{ $myData->image_path }}" width="100" height="100" alt="image">
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
                  <form action="{{ route('update_info2_repair_service') }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="information2" id="summernoteInformation2" required>{{ $myData1->information }}</textarea>
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
                  <form action="{{ route('update_img2_repair_service') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" name="image_path1">
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
               </tbody>
            </table>
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
         $('#summernoteTopic1').summernote()
        $('#summernoteInformation1').summernote()
         $('#summernoteInformation2').summernote()          
      })
</script>
@endsection