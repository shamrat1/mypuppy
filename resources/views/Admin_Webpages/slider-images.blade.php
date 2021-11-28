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
     
     
              <h1>HomePage Slider Images </h1>
     
     
            </div>
     
     
            <div class="col-sm-6">
     
     
              <ol class="breadcrumb float-sm-right">
     
     
                <li class="breadcrumb-item"><a href="#">Home</a></li>
     
     
                <li class="breadcrumb-item active"> HomePage Slider Images</li>
     
     
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
     
     
            <h3 class="card-title">HomePage Slider Images</h3>
     
     
     
          </div>
         @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
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
     
     
                            Slider Image
     
     
                        </th>
     
     
                      <th>
     
     
                            Caption
     
     
                        </th>
     
     
                     
     
     
                        <th style="width: 40%">
     
     
                        </th>
     
     
                    </tr>
     
     
                </thead>
     
     
                <?php $sliders = App\Models\Slider::orderBy('id','ASC')->get();
                $i=0;
?>

                <tbody>

        @foreach ($sliders as $slide )


                    <tr>


                        <td>


                            #


                        </td>


                        <td>


                            <a>
                                <?php $i=$i+1; ?>

                               Slide - {{ $i }}


                            </a>


                            <br />





                        </td>


                        <td>


                            <ul class="list-inline">


                                <li class="list-inline-item">

                                  <img src="{{$slide->image_path}}" style="width: 100px;height: 100px;" alt="">
                                    




                                </li>





                            </ul>


                        </td>


                        <td class="project_progress">
                         
                                
                          <b> {!! $slide->caption !!}</b>

                            
                        </td> 



                        <td class="project-actions text-right">

                            <a class="btn btn-info btn-sm" href="#logo_{{ $slide->id }}" data-toggle="modal">


                                <i class="fas fa-pencil-alt">


                                </i>


                                Edit Image


                            </a>

                            <a class="btn btn-info btn-sm" href="#caption_{{ $slide->id }}" data-toggle="modal">


                                <i class="fas fa-pencil-alt">


                                </i>


                                Edit Caption


                            </a>
                            


                        </td>


                    </tr>

                    <!-- Button trigger modal for all the button -->
        <form action="{{ url('/update-slides') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <!-- Modal  2 #logo-->


        <div class="modal fade" id="logo_{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">


            <div class="modal-dialog modal-dialog-centered" role="document">


                <div class="modal-content">


                    <div class="modal-header">


                        <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $slide->category_name }} slide</h5>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                            <span aria-hidden="true">&times;</span>


                        </button>


                    </div>


                    <div class="modal-body">


                            
                        <input type="hidden" name="thumb_id" value="{{$slide->id}}" required>
                        <b>Change Slide : </b>
                        <div class="form-group form-control-lg text-left">
                            
                            <input type="file" name="image_path" id="image_path">
                        </div>
                        <br>
                        <div class="form-group form-control-lg text-left">
                                    

                            <img src="{{ $slide->image_path }}" id="previewImg" style="width: 100px;height:100px" alt="">
                        </div>
                        <br>
                        <br>
                    </div>


                    <div class="modal-footer">


                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                        <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>


                    </div>


                </div>


            </div>


        </div>


    </form>

    <form action="{{ url('/update-caption') }}" method="POST">
        @csrf

    <!-- Modal  2 #logo-->


    <div class="modal fade" id="caption_{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $slide->category_name }} slide</h5>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                        <span aria-hidden="true">&times;</span>


                    </button>


                </div>


                <div class="modal-body">


                        
                    <input type="hidden" name="caption_id" value="{{$slide->id}}" required>
                    
                    <br>
                    <b>Caption : </b>
                    <div class="form-group form-control-lg text-left">
                          <textarea name="caption" class="summernoteCaption" placeholder="Caption" required>{{ $slide->caption }}</textarea>
                    </div>
                    <br>
                    <br>
                </div>


                <div class="modal-footer">


                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                    <button type="submit" class="btn btn-primary" name="logo-update-btn">Save changes</button>


                </div>


            </div>


        </div>


    </div>


</form>



                    @endforeach

     <!-- **************************************************************** -->
    </tbody>


  </table>


</div>


<!-- /.card-body -->


</div>


<!-- /.card -->

<!-- /.content-wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('.summernoteCaption').summernote()
        
      })
</script>



     
      </section>
     
     
      <!-- /.content -->
     
     
    
</div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection


