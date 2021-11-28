@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Available Timing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              @if(Auth::user()->user_role === "admin")
                  <li class="breadcrumb-item">
                     <a href="{{ url('/service-locations-admin',$id) }}"><i class="zmdi zmdi-home"></i> Store details</a>
                  </li>
               @endif
              <li class="breadcrumb-item">
                  @if(Auth::user()->user_role === "admin")
                     <a href="{{ url('/service-timings',$data->servLocation_id) }}"><i class="zmdi zmdi-home"></i> Service Timings</a>
                  @else
                  <a href="{{ url('/our-service-timings') }}"><i class="zmdi zmdi-home"></i> Service Timings</a>
                  @endif
               </li>
              <li class="breadcrumb-item active">Edit Available Timing </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">

                <h3 class="text-center bg-info text-light text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Edit Available Time
                </h3>
            <form action="{{ route('update_availableTime',$data->id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
              {!! csrf_field() !!}


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


              <div class="row ml-5">
                <input type="hidden" name="id" value="{{$data->id}}">
                  <div class="lfqtablediv pl-3 col-md-8">
                <div class="lfqchosen"><a class="expandbutton" onclick="ShowHideLFQ('lang');"><span
                   id="lfqchosenlang" onclick="ShowHideLFQ('lang');">Available Timings</span><img
                   id="lfqimglang" src="{{asset('img/other/arrow-open.png')}}"></a></div>
                <div id="lfqlang" style="display:block;">
                   <textarea id="AvailTime" name="available_time" class="form-control" style="resize: none;" readonly>{{ $data->available_time }}</textarea>
                   <br>
                   <table id="tblAvailTime" class="table table-striped projects">
                      <tr>
                         <th>
                            <a href = "javascript:void(0);" onclick="checkAll()">Check All</a>
                         </th>
                         <th class="text-center">
                            <a  href = "javascript:void(0);" onclick="uncheckAll()">Clear All</a>
                         </th>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk01"> 10:00am </label>
                         </td>
                         <td>
                            <input id="chk01" type="checkbox" class="form-control" value="10:00 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk02"> 10:20am </label>
                         </td>
                         <td>
                            <input id="chk02" type="checkbox" class="form-control" value="10:20 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk03"> 10:40am </label>
                         </td>
                         <td>
                            <input id="chk03" type="checkbox" class="form-control" value="10:40 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk04"> 11:00am </label>
                         </td>
                          <td>
                            <input id="chk04" type="checkbox" class="form-control" value="11:00 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk05"> 11:20am </label>
                         </td>
                         <td>
                            <input id="chk05" type="checkbox" class="form-control" value="11:20 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk06"> 11:40am </label>
                         </td>
                         <td>
                            <input id="chk06" type="checkbox" class="form-control" value="11:40 am" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk07"> 12:00pm </label>
                         </td>
                          <td>
                            <input id="chk07" type="checkbox" class="form-control" value="12:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk08"> 12:20pm </label>
                         </td>
                         <td>
                            <input id="chk08" type="checkbox" class="form-control" value="12:20 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk09"> 12:40pm </label>
                         </td>
                         <td>
                            <input id="chk09" type="checkbox" class="form-control" value="12:40 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk10"> 1:00pm </label>
                         </td>
                         <td>
                            <input id="chk10" type="checkbox" class="form-control" value="1:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk11"> 1:20pm </label>
                         </td>
                         <td>
                            <input id="chk11" type="checkbox" class="form-control" value="1:20 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk12"> 2:00pm </label>
                         </td>
                          <td>
                            <input id="chk12" type="checkbox" class="form-control" value="2:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk14"> 2:20pm </label>
                         </td>
                         <td>
                            <input id="chk14" type="checkbox" class="form-control" value="2:20 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk15"> 2:40pm </label>
                         </td>
                         <td>
                            <input id="chk15" type="checkbox" class="form-control" value="2:40 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk16"> 3:00pm </label>
                         </td>
                          <td>
                            <input id="chk16" type="checkbox" class="form-control" value="3:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk17"> 3:20pm </label>
                         </td>
                         <td>
                            <input id="chk17" type="checkbox" class="form-control" value="3:20 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk18"> 3:40pm </label>
                         </td>
                          <td>
                            <input id="chk18" type="checkbox" class="form-control" value="3:40 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk19"> 4:00pm </label>
                         </td>
                         <td>
                            <input id="chk19" type="checkbox" class="form-control" value="4:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk20"> 4:20pm </label>
                         </td>
                          <td>
                            <input id="chk20" type="checkbox" class="form-control" value="4:20 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk21"> 4:40pm </label>
                         </td>
                         <td>
                            <input id="chk21" type="checkbox" class="form-control" value="4:40 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk22"> 5:00pm </label>
                         </td>
                          <td>
                            <input id="chk22" type="checkbox" class="form-control" value="5:00 pm" />
                         </td>
                      </tr>
                      <tr>
                         <td>
                            <label for="chk23"> 5:20pm </label>
                         </td>
                         <td>
                            <input id="chk23" type="checkbox" class="form-control" value="5:20 pm" />
                         </td>
                      </tr>
                   </table>
                   <br />
                   <a href = "javascript:void(0);"  onclick="GetSelected()" class="btn btn-primary btn-block"> Click me To Add Available Time</a>
                   <script src="{{ asset('js/availableTime.js') }}"></script>
                </div>

                  <div class="col-md-2">
                      <br/>
                      <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>



            </form>

    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->





    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
      $( document ).ready(function() {

        $("#subcategory").on('change', function(){
          $('#subCategoryType').find('option').not(':first').remove();
           var selected_value= $('#subcategory').val();
            data = {
                "_token": "{{ csrf_token() }}",
                "subcategory_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ route('subcategorytype_dropdown') }}",
                data: data,
                success: function(response) {
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                           var id = response.data[i].subcategory_type_id ;
                           var name = response.data[i].subcategory_type;

                           var option = "<option value='"+id+"'>"+name+"</option>";

                           $("#subCategoryType").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        });



         $("#subCategoryType").on('change', function(){
          $('#product_type').find('option').not(':first').remove();
           var selected_value= $('#subCategoryType').val();
            // alert(selected_value);
            data = {
                "_token": "{{ csrf_token() }}",
                "subcategoryType_id" : selected_value,
            };
        // console.log(data);
        $.ajax({
                type: 'POST',
                url: "{{ url('get-product-type-dropdown') }}",
                data: data,
                success: function(response) {
                  var len = 0;
                  if (response.data != null) {
                      len = response.data.length;
                  }

                  if (len>0) {
                      for (var i = 0; i<len; i++) {
                           var id = response.data[i].product_type_id ;
                           var name = response.data[i].product_type;

                           var option = "<option value='"+id+"'>"+name+"</option>";

                           $("#product_type").append(option);
                      }
                  }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
        });
        });
     });  // end of doc ready
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#previewImg').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#image_path").change(function() {
        readURL(this);
      });
      //Form Submission
      $(function () {
        // Summernote
        $('#summernoteDescription').summernote()

      })
</script>
@endsection
