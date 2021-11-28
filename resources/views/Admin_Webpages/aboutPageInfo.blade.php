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
     
     
              <h1>ABOUT PAGE CONTENTS </h1>
     
     
            </div>
     
     
            <div class="col-sm-6">
     
     
              <ol class="breadcrumb float-sm-right">
     
     
                <li class="breadcrumb-item"><a href="#">Home</a></li>
     
     
                <li class="breadcrumb-item active"> About Page Contents</li>
     
     
              </ol>
     
     
            </div>
     
     
          </div>
     
     
        </div><!-- /.container-fluid -->
     
     
      </section>
     
     
     
     
     
      <!-- Main content -->
     
     
      <section class="content">
     
     
     
     
     
        <!-- Default box -->
     
     
        <div class="card">
     
     
          <div class="card-header">
     
     
            <h3 class="card-title">About Page Details</h3>
     
     
     
          </div>
     
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
          </div>
          @endif
     
          <div class="card-body p-0">
     
     
            <table class="table table-striped projects">
     
     
                <thead>
     
     
                    <tr>
     
     
                        <th style="width: 1%">
     
     
                            #
     
     
                        </th>
     
     
                        <th style="width: 10%">
     
     
                            S No.
     
     
                        </th>
     
     
                        <th style="width: 20%">
     
     
                            Item Name
     
     
                        </th>
     
     
                        <th>
     
     
                            Item Details
     
     
                        </th>
     
     
                     
     
     
                        <th style="width: 40%">
     
     
                        </th>
     
     
                    </tr>
     
     
                </thead>
     
     
                <tbody>
     
     
                   
     
                  
                  
                    <!-- ************************************************************* -->
     
                    <?php $data = App\Models\About::findOrFail(1); ?>
                    
                    
                      
                    
                    <tr>
     
     

     
                        <td>
     
     
                            #
     
     
                        </td>
     
     
                        <td>
     
     
                            <a>
     
     
                                1
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                   <b>Banner Image :</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
                         
                           <img src="{{ $data->bannerimage }}" style="width: 100px;height:100px" alt="">
                          
                        </td>
     
     
                        
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#logo" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
                    <form action="{{ url('/update-page-content') }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  2 #logo-->
                      
                      
                      <div class="modal fade" id="logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Banner Image</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="hidden" name="banner_id" value="{{ $data->id }}" value="">
                      
                           <input type="file" name="bannerimage"  required>
                         
                      
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
     
     
                            <a>
     
     
                                2
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>Paragraph One</b>
     
     
                                </li>
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                         
                        <b>
                         
                          {{ \Illuminate\Support\Str::limit($data->paragraph_1, 150, '...') }} 
                        </b>
                       
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#who_we_are" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
                    <form action="{{ url('/update-page-content') }}" method="POST">
     
                      @csrf
                     
                     <!-- Modal  3 #who_we_are-->
                     
                     
                     <div class="modal fade" id="who_we_are" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     
                     
                     <div class="modal-dialog modal-dialog-centered" role="document">
                     
                     
                      <div class="modal-content">
                     
                     
                        <div class="modal-header">
                     
                     
                          <h5 class="modal-title" id="exampleModalLongTitle">Update paragraph_1</h5>
                     
                     
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     
                     
                            <span aria-hidden="true">&times;</span>
                     
                     
                          </button>
                     
                     
                        </div>
                     
                     
                        <div class="modal-body">
                     
                     
                           <div class="form-group form-control-lg">
                     
                            <input type="hidden" name="paragraph_1_id" value="{{ $data->id }}">
                     
                          <textarea  name="paragraph_1" rows="6" style="width:100%;resize:none;" required>{{ $data->paragraph_1 }} </textarea>
                           
                     
                     
                      </div>
                      <br>
                      <br>
                      <br><br>
                      <br>
                      <br>
                     
                        </div>
                     
                     
                        <div class="modal-footer">
                     
                     
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                     
                          <button type="submit" class="btn btn-primary">Save changes</button>
                     
                     
                        </div>
                     
                     
                      </div>
                     
                     
                     </div>
                     
                     
                     </div>
                     
                     
                     </form>
                     
                      
     
     
     
                    <!-- **************************************************************** -->
     
     
                    <tr>
     
     
                        <td>
     
     
                            #
     
     
                        </td>
     
     
                        <td>
     
     
                            <a>
     
     
                                3
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
                                 
                                    <b>Paragraph Two</b>
     
     
                                </li>
     
     
                                
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                          
                        <b>
                          {{ \Illuminate\Support\Str::limit($data->paragraph_2, 150, '...') }} 
                        </b>
                           
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#why_choose_us" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>

                    <form action="{{ url('/update-page-content') }}" method="POST">
     
                      @csrf
                      <!-- Modal  4 #why_choose_us-->
                      
                      
                      <div class="modal fade" id="why_choose_us" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Paragraph-2</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                              <input type="hidden" name="paragraph_2_id" value="{{ $data->id }}">
                     
                              <textarea  name="paragraph_2" rows="6" style="width:100%;resize:none;" required>{{ $data->paragraph_2 }} </textarea>
                               
                         
                         
                          </div>
                          <br>
                          <br>
                          <br><br>
                          <br>
                          <br>
                         
                            </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary" name="why_choose_us-update-btn">Save changes</button>
                      
                      
                         </div>
                      
                      
                       </div>
                      
                      
                      </div>
                      
                      
                      </div>
                      
                      
                      
                      
                      
                      </form>
                      
                      

                    
     
     
     
     
                    <!-- ************************************************ -->
     
     
                    <tr>
     
     
                        <td>
     
     
                            #
     
     
                        </td>
     
     
                        <td>
     
     
                            <a>
     
     
                                4
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>

       
    
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>Paragraph Three</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b> {{ \Illuminate\Support\Str::limit($data->paragraph_3, 150, '...') }}</b>
                         
     
     
                        </td>
     
     
                        <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#history" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
    
                    <!-- Button trigger modal for all the button -->
     

     
                    <form action="{{ url('/update-page-content') }}" method="POST">
                    
                    @csrf
                    <!-- Modal  5 #history-->
                    
                    
                    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    
                    
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    
                    
                     <div class="modal-content">
                    
                    
                       <div class="modal-header">
                    
                    
                         <h5 class="modal-title" id="exampleModalLongTitle">Update Paragraph-3</h5>
                    
                    
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                    
                           <span aria-hidden="true">&times;</span>
                    
                    
                         </button>
                    
                    
                       </div>
                    
                    
                       <div class="modal-body">
                    
                    
                          <div class="form-group form-control-lg">
                    
                          <input type="hidden" name="paragraph_3_id" value="{{ $data->id }}">
                     
                          <textarea  name="paragraph_3" rows="6" style="width:100%;resize:none;" required>{{ $data->paragraph_3 }} </textarea>
                           
                     
                     
                      </div>
                      <br>
                      <br>
                      <br><br>
                      <br>
                      <br>
                     
                        </div>
                    
                    
                       <div class="modal-footer">
                    
                    
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    
                         <button type="submit" class="btn btn-primary" name="history-update-btn">Save changes</button>
                    
                    
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
     
     
                            <a>
     
     
                               5
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                   <b>Sidebar </b>
     
     
                                </li>
     
     
                                
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                          
                        <ol>
                          <b>
                            <li>Sidebar Image : <img src="{{ $data->sidebannerimage }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                            <li>Sidebar Point1 : {{ $data->sidebarpoint1 }}</li>
                            <li>Sidebar Point2 : {{ $data->sidebarpoint2 }}</li>
                            <li>Sidebar Point3 : {{ $data->sidebarpoint3 }}</li>
                          <b>
                           
                         </ol>
                
     
     
                        </td>
     
     
     
     
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#mission" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
                        </td>
     
     
                    </tr>
 
                    <form action="{{ url('update-page-content') }}" method="POST" enctype="multipart/form-data">
     
     
                      @csrf
     
     
                      <!-- Modal  6 #mission-->
                      
                      
                      <div class="modal fade" id="mission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Sidebar Content</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                            <input type="hidden" name="sidebannerimage_id" value="{{ $data->id }}">
                             <b>Sidebar Image :</b>
                             <input type="file" name="sidebannerimage"  style="resize:none;width:100%;" required>
                             
                           
                          </div>
                          <div class="form-group form-control-lg text-left">
                      
                           <b>Sidebar Point1 :</b>
                           <input type="text" name="sidebarpoint1" value="{{ $data->point1}}" style="resize:none;width:100%;" required>
                         
                        </div>
                      
                            <div class="form-group form-control-lg text-left">
                      
                              <b>Sidebar Point2 :</b>
                              <input type="text" name="sidebarpoint2" value="{{ $data->point2}}" style="resize:none;width:100%;" required>
                            
                             
                         </div>
                         <div class="form-group form-control-lg text-left">
                      
                          <b>Sidebar Point3 :</b>
                          <input type="text" name="sidebarpoint3" value="{{ $data->point3}}" style="resize:none;width:100%;" required>
                        
                         
                     </div>
                      
                         <div class="form-group form-control-lg text-left">
                         </div>
                 
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary" name="mission-update-btn">Save changes</button>
                      
                      
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
  
@endsection


