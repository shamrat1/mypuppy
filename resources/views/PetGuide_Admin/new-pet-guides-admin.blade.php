@extends('layouts.app')
@section('content')
<style>
   ul {
   list-style-type: none;
   }
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>New Pet Guides</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active"> New Pet Guides</li>
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
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-book" aria-hidden="true"></i> New Pet Guides</h3>
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
                        New Pet Guides 
                     </th>
                     <th>
                        Thumbnail Image 
                     </th>
                     <th style="width: 40%">
                        Action
                     </th>
                  </tr>
               </thead>
               <?php $petGuides = App\Models\PetGuide::orderBy('id','ASC')->get(); ?>
               <tbody>
                  @foreach ($petGuides as $petGuide )
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        {{ $petGuide->id }}
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> {{ $petGuide->petGuide_name }}</b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{$petGuide->image_path}}" style="width: 100px;height: 100px;" alt="">
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           <li style="padding-top:5px"><a href="#update_{{ $petGuide->id }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Edit petGuide Name" ><i class="far fa-edit" aria-hidden="true"> Edit petGuide Name</i></a></li>
                           <li style="padding-top:5px"><a href="#banner_{{ $petGuide->id }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Thumnail" ><i class="far fa-edit" aria-hidden="true">change Thumnail Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <!-- Button trigger modal for all the button -->
                  <form action="{{ route('update_petGuide_details') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="update_{{ $petGuide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $petGuide->petGuide_name }} </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="petGuide_id" value="{{$petGuide->id}}" required>
                                 <div class="form-group form-control-lg text-left">
                                    <b> petGuide Name: </b>    <input type="text" name="petGuide_name" value="{{ $petGuide->petGuide_name }}" required>
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
                  <form action="{{ route('update_petGuide_details') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="banner_{{ $petGuide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $petGuide->petGuide_name }} Banner</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="petGuide_id" value="{{$petGuide->id}}" required>
                                 <input type="hidden" name="petGuide_name" value="{{ $petGuide->petGuide_name }}">
                                 <div class="form-group form-control-lg text-left">
                                    <b> Image: </b>  
                                    <input type="file" name="image_path" id="image_path" required>
                                 </div>
                                 <br>
                                 <div class="form-group form-control-lg text-left">
                                    @if($petGuide->image_path!="")
                                    <img src="{{ asset($petGuide->image_path) }}" id="previewImg" style="width: 100px;height:100px" alt="">
                                    @endif
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
@endsection