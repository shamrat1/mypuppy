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
     
     
              <h1>COMPANY DETAILS </h1>
     
     
            </div>
     
     
            <div class="col-sm-6">
     
     
              <ol class="breadcrumb float-sm-right">
     
     
                <li class="breadcrumb-item"><a href="#">Home</a></li>
     
     
                <li class="breadcrumb-item active"> Company Details</li>
     
     
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
     
     
            <h3 class="card-title">All Company Details</h3>
     
     
     
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
     
                    <?php $companyInfo = App\Models\CompanyInfo::orderBy('id','ASC')->get(); ?>
                    
                    @foreach ($companyInfo as $data)
                      
                    
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
     
     
                                   <b>Our Company Logo</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
                         
                           <img src="{{ $data->company_logo }}" style="width: 250px;height:100px" alt="">
                          
                        </td>
     
     
                        
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#logo" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
                    <form action="{{ url('/update-companyinfo') }}" method="POST" enctype="multipart/form-data">
     
     
     
                      @csrf
                      
                      <!-- Modal  2 #logo-->
                      
                      
                      <div class="modal fade" id="logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Company Logo</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                             <input type="hidden" name="comp_id" value="{{ $data->id }}" value="">
                      
                           <input type="file" name="company_logo"  required>
                         
                      
                       </div>
                      
                      
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>
                      
                      
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
     
     
                                    <b>Who we are?</b>
     
     
                                </li>
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                         
                        <b>
                            {{ \Illuminate\Support\Str::limit($data->who_we_are, 200, '...') }}
                            
                          
                            
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
     
                    <form action="{{ url('/update-companyinfo') }}" method="POST">
     
                      @csrf
                     
                     <!-- Modal  3 #who_we_are-->
                     
                     
                     <div class="modal fade" id="who_we_are" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     
                     
                     <div class="modal-dialog modal-dialog-centered" role="document">
                     
                     
                      <div class="modal-content">
                     
                     
                        <div class="modal-header">
                     
                     
                          <h5 class="modal-title" id="exampleModalLongTitle">Update Who we are</h5>
                     
                     
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     
                     
                            <span aria-hidden="true">&times;</span>
                     
                     
                          </button>
                     
                     
                        </div>
                     
                     
                        <div class="modal-body">
                     
                     
                           <div class="form-group form-control-lg">
                     
                            <input type="hidden" name="who_id" value="{{ $data->id }}">
                     
                          <textarea  name="who_we_are" id="summernote" rows="6" style="width:100%;resize:none;" required>{{ $data->who_we_are }} </textarea>
                           
                     
                     
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
     
                                 
                                    <b>Why Choose Us?</b>
     
     
                                </li>
     
     
                                
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                          
                        <b>
                          {{ $data->why_choose_us }} 
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

                    <form action="{{ url('/update-companyinfo') }}" method="POST">
     
                      @csrf
                      <!-- Modal  4 #why_choose_us-->
                      
                      
                      <div class="modal fade" id="why_choose_us" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Why Choose Us</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                              <input type="hidden" name="whychooseus_id" value="{{ $data->id }}">
                           <textarea name="why_choose_us" rows="6" style="resize:none;width:100%;"  required>{{ $data->why_choose_us }}</textarea>
                
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
                      
                      

                    @endforeach
     
     
     
     
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
<?php $points = App\Models\WhyChooseUsPoint::orderBy('id','ASC')->get();  ?>                        
     
     @foreach ( $points as $data)
       
    
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>What We DO? 6 points</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                          <ol>
                            <li>{{ $data->point1 }}</li>
                            <li>{{ $data->point2 }}</li>
                            <li>{{ $data->point3 }}</li>
                            <li>{{ $data->point4 }}</li>
                            <li>{{ $data->point5 }}</li>
                            <li>{{ $data->point6 }}</li>
                          </ol>
                
                         </b>
                         
     
     
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
     

     
                    <form action="{{ url('/update-companySixPoints') }}" method="POST">
                    
                    @csrf
                    <!-- Modal  5 #history-->
                    
                    
                    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    
                    
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    
                    
                     <div class="modal-content">
                    
                    
                       <div class="modal-header">
                    
                    
                         <h5 class="modal-title" id="exampleModalLongTitle">Update Why Choose Us? 6 points</h5>
                    
                    
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                    
                           <span aria-hidden="true">&times;</span>
                    
                    
                         </button>
                    
                    
                       </div>
                    
                    
                       <div class="modal-body">
                    
                    
                          <div class="form-group form-control-lg">
                    
                          <input type="hidden" name="point_id" value="{{ $data->id }}">
                          <b>Point-1 : </b><input type="text" name="point1" value="{{ $data->point1 }}"  style="resize:none;width:80%;" required>
                          
                         
                    
                    
                         </div>
                         <div class="form-group form-control-lg">
                       
                       
                           
                           <b>Point-2 : </b><input type="text" name="point2" value="{{ $data->point2 }}"   style="resize:none;width:80%;" required> 
                         
                     
                     
                         </div>
                         <div class="form-group form-control-lg">
                       
                       
                           
                           <b>Point-3 : </b><input type="text" name="point3" value="{{ $data->point3 }}"   style="resize:none;width:80%;" required> 
                         
                     
                     
                         </div>
                         <div class="form-group form-control-lg">
                       
                       
                           
                           <b>Point-4 : </b><input type="text" name="point4" value="{{ $data->point4 }}"   style="resize:none;width:80%;" required> 
                         
                     
                     
                         </div>
                         <div class="form-group form-control-lg">
                       
                       
                           
                           <b>Point-5 : </b><input type="text" name="point5" value="{{ $data->point5 }}"   style="resize:none;width:80%;" required> 
                         
                     
                     
                         </div>
                         <div class="form-group form-control-lg">
                       
                       
                           
                           <b>Point-6 : </b><input type="text" name="point6" value="{{ $data->point6 }}"   style="resize:none;width:80%;" required> 
                         
                     
                     
                         </div>
                    
                       </div>
                    
                    
                       <div class="modal-footer">
                    
                    
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    
                         <button type="submit" class="btn btn-primary" name="history-update-btn">Save changes</button>
                    
                    
                       </div>
                    
                    
                     </div>
                    
                    
                    </div>
                    
                    
                    </div>
                    
                    
                    
                    
                    
                    </form> 
            @endforeach
            <?php $testimonial1 = App\Models\Testimonial::findOrFail(1); ?>
                    
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
     
     
                                   <b>Testimonial Content 1</b>
     
     
                                </li>
     
     
                                
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                          
                        <ol>
                          <b><li>Customer Name :  {{ $testimonial1->custumer }}</li>
                          <li>Customer Photo : <img src="{{ $testimonial1->photo }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                          <li>Review : {{ $testimonial1->review }}</li><b>
                           
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
 
                    <form action="{{ url('update-testimonial') }}" method="POST" enctype="multipart/form-data">
     
     
                      @csrf
     
     
                      <!-- Modal  6 #mission-->
                      
                      
                      <div class="modal fade" id="mission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Testimonial Content 1</h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                           <div class="form-group form-control-lg text-left">
                            <input type="hidden" name="testimonial_id1" value="{{ $testimonial1->id }}">
                             <b>Customer Name :</b>
                              <input type="text" name="custumer1" value="{{ $testimonial1->custumer}}" style="resize:none;width:100%;" required>
                           
                          </div>
                          <div class="form-group form-control-lg text-left">
                      
                           <b>Customer Photo :</b>
                            <input type="file" name="photo1"  style="resize:none;width:100%;" required>
                         
                        </div>
                      
                            <div class="form-group form-control-lg text-left">
                      
                            <b>Review :</b>
                             <textarea name="review1" cols="6" style="resize:none;width:100%;" required>{{ $testimonial1->review}}</textarea>
                               
                             
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
     
                    <tr>
                      <?php $testimonial2 = App\Models\Testimonial::findOrFail(2); ?>
     
                        <td>
     
     
                            #
     
     
                        </td>
     
     
                        <td>
     
     
                            <a>
     
     
                                6
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                  <b>Testimonial Content 2</b>
     
     
                                </li>
     
     
                                
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                          <ol>
                            <b><li>Customer Name :  {{ $testimonial2->custumer }}</li>
                            <li>Customer Photo : <img src="{{ $testimonial2->photo }}" style="width: 100px;height:100px;border-radius:25px;" alt=""> </li>
                            <li>Review : {{ $testimonial2->review }}</li><b>
                             
                           </ol>
                          
     
     
                        </td>
     
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#focus" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
  
     
     
                    <form action="{{ url('/update-testimonial') }}" method="POST" enctype="multipart/form-data">
     
                      @csrf
                      <!-- Modal  7 #focus-->
                      
                      
                      <div class="modal fade" id="focus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Testimonial Content 2 </h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                           <div class="form-group form-control-lg text-left">
                            <input type="hidden" name="testimonial_id2" value="{{ $testimonial2->id }}">
                             <b>Customer Name :</b>
                              <input type="text" name="custumer2" value="{{ $testimonial2->custumer }}" style="resize:none;width:100%;" >
                           
                          </div>
                          <div class="form-group form-control-lg text-left">
                      
                           <b>Customer Photo :</b>
                            <input type="file" name="photo2"  style="resize:none;width:100%;" required>
                         
                        </div>
                      
                            <div class="form-group form-control-lg text-left">
                      
                            <b>Review :</b>
                             <textarea name="review2"  style="resize:none;width:100%;" required>{{ $testimonial2->review }}</textarea>  
                            
                             
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
                         
     
                    @foreach ($companyInfo as $data)
                    <tr>
     
     
                        <td>
     
     
                            #
     
     
                        </td>
     
     
                        <td>
     
     
                            <a>
     
     
                                7
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>Our Strategy</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                            {{ $data->strategy}}
                        </b>
                         
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#vision" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
                    <form action="{{ url('/update-companyinfo') }}" method="POST">
     
                      @csrf

                      <!-- Modal  8 #vision-->
                      
                      
                      <div class="modal fade" id="vision" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      
                      
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      
                      
                       <div class="modal-content">
                      
                      
                         <div class="modal-header">
                      
                      
                           <h5 class="modal-title" id="exampleModalLongTitle">Update Our Strategy </h5>
                      
                      
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      
                      
                             <span aria-hidden="true">&times;</span>
                      
                      
                           </button>
                      
                      
                         </div>
                      
                      
                         <div class="modal-body">
                      
                      
                            <div class="form-group form-control-lg">
                      
                              <input type="hidden" name="strategy_id" value="{{ $data->id }}">
                            <textarea name="strategy" rows="6" style="resize:none;width:100%;" required>{{ $data->strategy }}</textarea>
                       
                           
                      
                       </div>
                       <br>
                       <br>
                       <br><br>
                       <br>
                       <br>
                      
                         </div>
                      
                      
                         <div class="modal-footer">
                      
                      
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                      
                           <button type="submit" class="btn btn-primary" name="vision-update-btn">Save changes</button>
                      
                      
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
     
     
                                8
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>Culture and Values</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                        
                        <b> 
                          {{ $data->culture_values}}
                        </b>
                       
     
     
                        </td>
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#technology" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
                    <!-- technology-->
     
                    <form action="{{ url('/update-companyinfo') }}" method="POST">
                    
                    @csrf
                    <!-- Modal  8 #vision-->
                    
                    
                    <div class="modal fade" id="technology" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    
                    
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    
                    
                     <div class="modal-content">
                    
                    
                       <div class="modal-header">
                    
                    
                         <h5 class="modal-title" id="exampleModalLongTitle">Update Culture and Values
                         </h5>
                    
                    
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                    
                           <span aria-hidden="true">&times;</span>
                    
                    
                         </button>
                    
                    
                       </div>
                    
                    
                       <div class="modal-body">
                    
                    
                          <div class="form-group form-control-lg">
                    
                            <input type="hidden" name="cul_id" value="{{ $data->id }}">
                         <textarea name="culture_values" rows="6" style="resize:none;width:100%;" required>{{ $data->culture_values }}</textarea>
                    
                    
                     </div>
                    
                     <br>
                     <br>
                     <br><br>
                     <br>
                     <br>
                       </div>
                    
                    
                       <div class="modal-footer">
                    
                    
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    
                         <button type="submit" class="btn btn-primary" name="technology-update-btn">Save changes</button>
                    
                    
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
     
     
                               9
     
     
                            </a>
     
     
                            <br/>
     
     
                            
     
     
                        </td>
     
     
                        <td>
     
     
                            <ul class="list-inline">
     
     
                                <li class="list-inline-item">
     
     
                                    <b>Company photo</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                            
                      
                        
                           <img src="{{ $data->company_photo }}" style="width: 150px;height:170px;" />
     
     
                        </td>
     
     
                  
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#image" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
     
     
                    </tr>
                    
     
     <form action="{{ url('/update-companyinfo') }}" method="POST" enctype="multipart/form-data">
     
     @csrf
      <!-- Modal  9 #image-->
      
      
      <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      
      
      <div class="modal-dialog modal-dialog-centered" role="document">
      
      
       <div class="modal-content">
      
      
         <div class="modal-header">
      
      
           <h5 class="modal-title" id="exampleModalLongTitle">Update Company Photo</h5>
      
      
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      
      
             <span aria-hidden="true">&times;</span>
      
      
           </button>
      
      
         </div>
      
      
         <div class="modal-body">
      
      
            <div class="form-group form-control-lg">
      
            <input type="hidden" name="photo_id" value="{{ $data->id }}">
           <input type="file" name="company_photo" required>
      
      
       </div>
      
      
         </div>
      
      
         <div class="modal-footer">
      
      
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      
           <button type="submit" class="btn btn-primary" name="image-update-btn">Save changes</button>
      
      
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
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>


    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
  
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
  
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  
  </script>
@endsection


