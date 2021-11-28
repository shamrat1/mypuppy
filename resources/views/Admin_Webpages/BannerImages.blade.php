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
               <h1>Banner Images</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active"> Banner Images</li>
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
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-image" aria-hidden="true"></i> Banner Images</h3>
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
                        Page Name
                     </th>
                     <th>
                        Banner Image 
                     </th>
                     <th style="width: 40%">
                        Action
                     </th>
                  </tr>
               </thead>
               <?php $banners = App\Models\BannerImage::orderBy('id','ASC')->get(); ?>
               <tbody>
                  @foreach ($banners as $imgBnr )
                  <tr>
                     <td>
                        #
                     </td>
                     <td>
                        <a>
                        {{ $imgBnr->id }}
                        </a>
                        <br />
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> {{ $imgBnr->key }}</b>
                           </li>
                        </ul>
                     </td>
                     <td class="project_progress">
                        <img src="{{$imgBnr->image_path}}" style="width: 535px;;height: 75px;" alt="">
                     </td>
                     <td class="project-actions">
                        <ul style="list-style:none;">
                           
                           <li style="padding-top:5px"><a href="#banner_{{ $imgBnr->id }}" data-toggle="modal"
                              class="btn btn-sm rounded-pill btn-outline-success"  title="Banner Image" ><i class="far fa-edit" aria-hidden="true">Change Banner Image</i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <!-- Button trigger modal for all the button -->
                  
                  <form action="{{ route('update_banner_image') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <!-- Modal  2 #logo-->
                     <div class="modal fade" id="banner_{{ $imgBnr->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $imgBnr->key }} Banner</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="petGuide_id" value="{{$imgBnr->id}}" required>
                                 <input type="hidden" name="petGuide_name" value="{{ $imgBnr->key }}">
                                 <div class="form-group form-control-lg text-left">
                                    <b> Image: </b>  
                                    <input type="file" name="image_path" id="image_path" required>
                                 </div>
                                 <br>
                                 <div class="form-group form-control-lg text-left">
                                    @if($imgBnr->image_path!="")
                                    <img src="{{ asset($imgBnr->image_path) }}" id="previewImg" style="width: 400px;height:60px" alt="">
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