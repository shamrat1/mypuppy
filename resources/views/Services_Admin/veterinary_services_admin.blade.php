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
               <h1>Veterinary Services</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/my-company-services') }}">Our Services</a></li>
                  <li class="breadcrumb-item active">Veterinary Services</li>
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
            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-info-circle"></i> Veterinary Services</h3>
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
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b> Tab-1 Information : </b>
                           </li>
                        </ul>
                     </td>
                     <?php $myData1 = App\Models\ServiceContent::findOrFail(42);   ?>
                     
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
                     
                     
                     
                     <?php $myData2 = App\Models\ServiceContent::findOrFail(43);   ?>
                     
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
                  
                     <?php $aboutInfo = App\Models\About::orderBy('id','ASC')->get(); ?>
                    
                    @foreach ($aboutInfo as $data)
         <tr>
                  
            
                                 <td>
            
            
                                    #
            
            
                                 </td>
            
            
                                 
            
            
                                 <td>
            
            
                                    <ul class="list-inline">
            
            
                                       <li class="list-inline-item">
            
            
                                          <b>Collection One</b>
            
            
                                       </li>
            
            
                                       
            
            
                                    </ul>
            
            
                                 </td>
            
            
                                 <td class="project_progress">
            
            
                                 <ol>
                                    <b>
                                       <li>Image-1 : <img src="{{ $data->collectionimg_1 }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                                       <li>Caption-1  :  {{ $data->collectiondata_1 }}</li>
                                    <b>
                                    
                                    </ol>
                                 
            
                                 </td>
            
            
            
            
                                 <td class="project-actions text-right">
            
            
                                    <a class="btn btn-info btn-sm" href="#edit_{{ $data->id }}" data-toggle="modal">
            
            
                                       <i class="fas fa-pencil-alt">
            
            
                                       </i>
            
            
                                       Edit
            
            
                                    </a>
            
            
                                    
            
            
                                 </td>
            
            
                           </tr>
         
            
            
                           <form action="{{ url('/update-page-content') }}" method="POST" enctype="multipart/form-data">
            
                              @csrf
                              <!-- Modal  7 #focus-->
                              
                              
                              <div class="modal fade" id="edit_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              
                              
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              
                              
                              <div class="modal-content">
                              
                              
                                 <div class="modal-header">
                              
                              
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Collection One </h5>
                              
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                              
                                    <span aria-hidden="true">&times;</span>
                              
                              
                                    </button>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-body">
                              
                              
                                    <div class="form-group form-control-lg text-left">
                                    <input type="hidden" name="collectionimg_1_id" value="{{ $data->id }}" >
                                    <b>Collection image-1 :</b>
                                    <input type="file" name="collectionimg_1"  style="resize:none;width:100%;" >
                                    
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                              
                                    <b>Collection Caption-1 :</b>
                                    <input type="text" name="collectiondata_1" value="{{ $data->collectiondata_1 }}" style="resize:none;width:100%;" >
                                 
                                 
                                 </div>
                              
                                    <div class="form-group form-control-lg text-left">
                              
                                    
                                    
                                 </div>
                              
                                 <div class="form-group form-control-lg text-left">
                                 </div>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-footer">
                              
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              
                              
                                 </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </form>
                                 
                              <tr>
                  
            
                                 <td>
            
            
                                    #
            
            
                                 </td>
            
            
                                 
            
            
                                 <td>
            
            
                                    <ul class="list-inline">
            
            
                                       <li class="list-inline-item">
            
            
                                          <b>Collection Two</b>
            
            
                                       </li>
            
            
                                       
            
            
                                    </ul>
            
            
                                 </td>
            
            
                                 <td class="project_progress">
            
            
                                 <ol>
                                    <b>
                                       <li>Image-2 : <img src="{{ $data->collectionimg_2 }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                                       <li>Caption-2  :  {{ $data->collectiondata_2 }}</li>
                                    <b>
                                    
                                    </ol>
                                 
            
                                 </td>
            
            
            
            
                                 <td class="project-actions text-right">
            
            
                                    <a class="btn btn-info btn-sm" href="#edit2_{{$data->id}}" data-toggle="modal">
            
            
                                       <i class="fas fa-pencil-alt">
            
            
                                       </i>
            
            
                                       Edit
            
            
                                    </a>
            
            
                                    
            
            
                                 </td>
            
            
                           </tr>
         
            
            
                           <form action="{{ url('/update-page-content') }}" method="POST" enctype="multipart/form-data">
            
                              @csrf
                              <!-- Modal  7 #focus-->
                              
                              
                              <div class="modal fade" id="edit2_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              
                              
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              
                              
                              <div class="modal-content">
                              
                              
                                 <div class="modal-header">
                              
                              
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Collection Two </h5>
                              
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                              
                                    <span aria-hidden="true">&times;</span>
                              
                              
                                    </button>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-body">
                              
                              
                                    <div class="form-group form-control-lg text-left">
                                    <input type="hidden" name="collectionimg_2_id" value="{{ $data->id }}" >
                                    <b>Collection image-2 :</b>
                                    <input type="file" name="collectionimg_2"  style="resize:none;width:100%;" >
                                    
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                              
                                    <b>Collection Caption-2 :</b>
                                    <input type="text" name="collectiondata_2" value="{{ $data->collectiondata_2 }}" style="resize:none;width:100%;" >
                                 
                                 
                                 </div>
                              
                                    <div class="form-group form-control-lg text-left">
                              
                                    
                                    
                                 </div>
                              
                                 <div class="form-group form-control-lg text-left">
                                 </div>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-footer">
                              
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              
                              
                                 </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </form>
            
                  
                              <tr>
                  
            
                                 <td> 
                                    # 

                                 </td>
            
            
                                 <td>
            
            
                                    <ul class="list-inline">
            
            
                                       <li class="list-inline-item">
            
            
                                          <b>Collection Three</b>
            
            
                                       </li>
            
            
                                       
            
            
                                    </ul>
            
            
                                 </td>
            
            
                                 <td class="project_progress">
            
            
                                 <ol>
                                    <b>
                                       <li>Image-3 : <img src="{{ $data->collectionimg_3 }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                                       <li>Caption-3  :  {{ $data->collectiondata_3 }}</li>
                                    <b>
                                    
                                    </ol>
                                 
            
                                 </td>
            
            
            
            
                                 <td class="project-actions text-right">
            
            
                                    <a class="btn btn-info btn-sm" href="#edit3_{{ $data->id }}" data-toggle="modal">
            
            
                                       <i class="fas fa-pencil-alt">
            
            
                                       </i>
            
            
                                       Edit
            
            
                                    </a>
            
            
                                    
            
            
                                 </td>
            
            
                           </tr>
         
            
            
                           <form action="{{ url('/update-page-content') }}" method="POST" enctype="multipart/form-data">
            
                              @csrf
                              <!-- Modal  7 #focus-->
                              
                              
                              <div class="modal fade" id="edit3_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              
                              
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              
                              
                              <div class="modal-content">
                              
                              
                                 <div class="modal-header">
                              
                              
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Collection Three </h5>
                              
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                              
                                    <span aria-hidden="true">&times;</span>
                              
                              
                                    </button>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-body">
                              
                              
                                    <div class="form-group form-control-lg text-left">
                                    <input type="hidden" name="collectionimg_3_id" value="{{ $data->id }}" >
                                    <b>Collection image-3 :</b>
                                    <input type="file" name="collectionimg_3"  style="resize:none;width:100%;" >
                                    
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                              
                                    <b>Collection Caption-3 :</b>
                                    <input type="text" name="collectiondata_3" value="{{ $data->collectiondata_3 }}" style="resize:none;width:100%;" >
                                 
                                 
                                 </div>
                              
                                    <div class="form-group form-control-lg text-left">
                              
                                    
                                    
                                 </div>
                              
                                 <div class="form-group form-control-lg text-left">
                                 </div>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-footer">
                              
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              
                              
                                 </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </form>
            @if($data->collectiondata_4!="")
                              <tr>
                  
            
                                 <td>
            
            
                                    #
            
            
                                 </td>
            
            
                                 
            
            
                                 <td>
            
            
                                    <ul class="list-inline">
            
            
                                       <li class="list-inline-item">
            
            
                                          <b>Collection Four</b>
            
            
                                       </li>
            
            
                                       
            
            
                                    </ul>
            
            
                                 </td>
            
            
                                 <td class="project_progress">
            
            
                                 <ol>
                                    <b>
                                       <li>Image-4 : <img src="{{ $data->collectionimg_4 }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                                       <li>Caption-4  :  {{ $data->collectiondata_4 }}</li>
                                    <b>
                                    
                                    </ol>
                                 
            
                                 </td>
            
            
            
            
                                 <td class="project-actions text-right">
            
            
                                    <a class="btn btn-info btn-sm" href="#focus_{{ $data->collectionimg_4 }}" data-toggle="modal">
            
            
                                       <i class="fas fa-pencil-alt">
            
            
                                       </i>
            
            
                                       Edit
            
            
                                    </a>
            
            
                                    
            
            
                                 </td>
            
            
                           </tr>
         @endif
            
            
                           <form action="{{ url('/update-page-content') }}" method="POST" enctype="multipart/form-data">
            
                              @csrf
                              <!-- Modal  7 #focus-->
                              
                              
                              <div class="modal fade" id="focus_{{ $data->collectionimg_4 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              
                              
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              
                              
                              <div class="modal-content">
                              
                              
                                 <div class="modal-header">
                              
                              
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Collection Four </h5>
                              
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                              
                                    <span aria-hidden="true">&times;</span>
                              
                              
                                    </button>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-body">
                              
                              
                                    <div class="form-group form-control-lg text-left">
                                    <input type="hidden" name="collectionimg_4_id" value="{{ $data->id }}" >
                                    <b>Collection image-4 :</b>
                                    <input type="file" name="collectionimg_4"  style="resize:none;width:100%;" >
                                    
                                 </div>
                                 <div class="form-group form-control-lg text-left">
                              
                                    <b>Collection Caption-4 :</b>
                                    <input type="text" name="collectiondata_4" value="{{ $data->collectiondata_4 }}" style="resize:none;width:100%;" >
                                 
                                 
                                 </div>
                              
                                    <div class="form-group form-control-lg text-left">
                              
                                    
                                    
                                 </div>
                              
                                 <div class="form-group form-control-lg text-left">
                                 </div>
                              
                              
                                 </div>
                              
                              
                                 <div class="modal-footer">
                              
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              
                              
                                 </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </div>
                              
                              
                              </form>
                           @endforeach
                  
               </tbody>
            </table>
            <!-- Button trigger modal for all the button -->
                  
                  <form action="{{ route('update_info1_veterinary_care') }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="information1" id="summernoteInformation1" >{{ $myData1->information }}</textarea>
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
                  <form action="{{ route('update_img1_veterinary_care') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" name="image_path">
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
                  
                  <form action="{{ route('update_info2_veterinary_care') }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="information2" id="summernoteInformation2" >{{ $myData2->information }}</textarea>
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
                  <form action="{{ route('update_img2_veterinary_care') }}" method="POST" enctype="multipart/form-data">
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
        $('#summernoteInformation1').summernote()
         $('#summernoteInformation2').summernote()
      })
</script>
@endsection