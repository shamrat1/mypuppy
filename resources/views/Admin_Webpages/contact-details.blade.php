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
     
     
              <h1>Contact Details </h1>
     
     
            </div>
     
     
            <div class="col-sm-6">
     
     
              <ol class="breadcrumb float-sm-right">
     
     
                <li class="breadcrumb-item"><a href="#">Home</a></li>
     
     
                <li class="breadcrumb-item active"> Contact Details</li>
     
     
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
     
     
            <h3 class="card-title">Contact Details</h3>
     
     
     
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
     
     <?php $contact = App\Models\ContactInfo::find(1) ?>
                <tbody>
     
     
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
     
     
                                    <b>Mobile Number</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
                        
                             <b>
                                {{ $contact->phone }}    
                            </b>
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#phone" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit 
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
     
     
     
     
     
     
                    <!-- ************************************************************* -->
     
     
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
     
     
                                   <b>Email</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                            <b> {{ $contact->email }}
                            </b>
     
     
                            
     
     
                        </td>
     
     
                        
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#email" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
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
     
     
                                    <b>Office Address</b>
     
     
                                </li>
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                            
                            {{ $contact->address }}
                        </b>
                       
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#addr" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
     
     
     
                    <!-- **************************************************************** -->
     
     
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
     
     
                                    <b>Facebook Link</b>
     
     
                                </li>
     
     
                                
     
     
                            
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                            {{ $contact->fb_link }}
                        </b>
                           
     
     
                        </td>
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#fb_link" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
     
     
     
                    <!-- ************************************************ -->
     
     
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
     
     
                                    <b>Twitter Link</b>
     
     
                                </li>
     
     
                               
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                          {{ $contact->twitter_link }}
                         </b>
                         
     
     
                        </td>
     
     
                        <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#twitter_link" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
                    <tr>
     
     
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
     
     
                                   <b> Youtube Link</b>
     
     
                                </li>
     
     
                                
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                          {{ $contact->youtube_link }}
                         </b>
                
     
     
                        </td>
     
     
     
     
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#youtube_link" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
                        </td>
     
     
                    </tr>
     
     
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
     
     
                                  <b>Instagram Link</b>
     
     
                                </li>
     
     
                                
     
     
                            </ul>
     
     
                        </td>
     
     
                        <td class="project_progress">
     
     
                        <b>
                          {{ $contact->insta_link }}
                        </b>
                          
     
     
                        </td>
     
     
     
     
                        <td class="project-actions text-right">
     
     
                           
     
     
                            <a class="btn btn-info btn-sm" href="#insta_link" data-toggle="modal">
     
     
                                <i class="fas fa-pencil-alt">
     
     
                                </i>
     
     
                                Edit
     
     
                            </a>
     
     
                            
     
     
                        </td>
     
     
                    </tr>
     
     
     
                    
     
     
                </tbody>
     
     
            </table>
     
     
          </div>
     
     
          <!-- /.card-body -->
     
     
        </div>
     
     
        <!-- /.card -->
     
     
     
     
     
     
     
     
     
     
     
     <!-- Button trigger modal for all the button -->
     
     
     
     
     
     
     
     
     <form action="{{ url('upd-contact-details') }}" method="POST">
     
     @csrf
     
     <!-- Modal  1 #phone-->
     
     
     <div class="modal fade" id="phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Mobile Number</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
           
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
          <input type="hidden" name="phone_id" value="{{ $contact->id }}">
          <input type="text" name="phone" value= "{{ $contact->phone }}" style="width:100%;" required>
            
         </div>
         
        </div>
     
     
        <div class="modal-footer">
     
     
          
     
     
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
     
          <button type="submit" class="btn btn-primary" name="content-update-btn">Save changes</button>
     
     
       
     
     
        </div>
     
     
      </div>
     
     
     </div>
     
     
     </div>
     
     
     
     
     
     </form>
     
     
     
     
     
     
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     
     @csrf
     
     
     
     <!-- Modal  2 #email-->
     
     
     <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Email</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="email_id" value="{{ $contact->id }}">
            <input type="email" name="email" value="{{ $contact->email }}"  required>
        
     
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
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     @csrf
     
     <!-- Modal  3 #addr-->
     
     
     <div class="modal fade" id="addr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Office Address</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="address_id" value="{{ $contact->id }}">
          <textarea  name="address" style="width:100%;resize:none;" required>{{ $contact->address }}</textarea>
     
     
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
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     
     @csrf
     <!-- Modal  4 #fb_link-->
     
     
     <div class="modal fade" id="fb_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Facebook Link</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="fb_id" value="{{ $contact->id }}">
          <input type="text" name="fb_link" value="{{ $contact->fb_link }}" placeholder="Facebook Link" style="width:100%;"  required>
              
       
     
     
      </div>
     
     
        </div>
     
     
        <div class="modal-footer">
     
     
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
     
          <button type="submit" class="btn btn-primary" name="why_choose_us-update-btn">Save changes</button>
     
     
        </div>
     
     
      </div>
     
     
     </div>
     
     
     </div>
     
     
     
     
     
     </form>
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     
     @csrf
     <!-- Modal  5 #twitter_link-->
     
     
     <div class="modal fade" id="twitter_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Twitter Link</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="twitter_id" value="{{ $contact->id }}">
           <input type="text" name="twitter_link" value="{{ $contact->twitter_link }}" placeholder="Twitter Link" style="width:100%;" required>
              
            
          
     
     
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
     
     
     
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     
     
     @csrf
     
     
     <!-- Modal  6 #youtube_link-->
     
     
     <div class="modal fade" id="youtube_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Youtube Link</h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="youtube_id" value="{{ $contact->id }}">
          <input type="text" name="youtube_link" value="{{ $contact->youtube_link }}" placeholder="Youtube Link" style="width:100%;" required>

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
     
     
     
     
     
     <form action="{{ url('/upd-contact-details') }}" method="POST">
     
     @csrf

     <!-- Modal  7 #insta_link-->
     
     
     <div class="modal fade" id="insta_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update Instagram Link </h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
            <input type="hidden" name="insta_id" value="{{ $contact->id }}">
          
          <input type="text" name="insta_link" value="{{ $contact->insta_link }}" placeholder="Instagram Link"  style="width:100%;" required>
              
            
     
     
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
     
     
     
     
     
     
     
     
     
     
     
     <form action="../company/company-process.php" method="POST">
     
     
     <!-- Modal  8 #vision-->
     
     
     <div class="modal fade" id="vision" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update vision </h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
     
           <textarea name="vision"  style="resize:none;width:100%;" required>
               {{--  <?php echo $row['vision'] ?>  --}}
            </textarea>
      
     
     
      </div>
     
     
        </div>
     
     
        <div class="modal-footer">
     
     
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
     
          <button type="submit" class="btn btn-primary" name="vision-update-btn">Save changes</button>
     
     
        </div>
     
     
      </div>
     
     
     </div>
     
     
     </div>
     
     
     </form>
     
     
     
     <!-- technology-->
     
     <form action="../company/company-process.php" method="POST">
     
     
     <!-- Modal  8 #vision-->
     
     
     <div class="modal fade" id="technology" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     
     
     <div class="modal-dialog modal-dialog-centered" role="document">
     
     
      <div class="modal-content">
     
     
        <div class="modal-header">
     
     
          <h5 class="modal-title" id="exampleModalLongTitle">Update technology </h5>
     
     
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
     
            <span aria-hidden="true">&times;</span>
     
     
          </button>
     
     
        </div>
     
     
        <div class="modal-body">
     
     
           <div class="form-group form-control-lg text-center">
     
     
          <textarea name="technology"  style="resize:none;width:100%;" required>
              {{--  <?php echo $row['technology'] ?>  --}}
            </textarea>
     
     
      </div>
     
     
        </div>
     
     
        <div class="modal-footer">
     
     
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
     
          <button type="submit" class="btn btn-primary" name="technology-update-btn">Save changes</button>
     
     
        </div>
     
     
      </div>
     
     
     </div>
     
     
     </div>
     
     
     </form>
     
     
     
     
     <form action="../company/company-process.php" method="POST" enctype="multipart/form-data">
     
     
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
     
     
           <div class="form-group form-control-lg text-center">
     
     
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
     
     <!-- **************************************************************** -->
     
     
      </section>
     
     
      <!-- /.content -->
     
     
    
</div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection


