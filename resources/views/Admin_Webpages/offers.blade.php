@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Offers </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
               <li class="breadcrumb-item active">Offers  </li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="container">
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
<!-- Button trigger modal -->
<input type="button" value="Add Offer" class="btn btn-success mb-3 mt-3" id="addOffer"/>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD OFFER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('offer_store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
               {!! csrf_field() !!}
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Name...">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="code">Code</label>
                     <input type="text" class="form-control" name="code" id="code" placeholder="Code...">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="min">Minimum Amount</label>
                     <input type="text" class="form-control" name="min_amt" placeholder="Minimum Amount...">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="discountPercent">Discount Percent</label>
                     <input type="text" class="form-control" name="discount" placeholder="Discount Percent...">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select  class="form-control"  name="status" required>
                      <option disabled selected>--Select Status--</option>
                      <option value="1">Activate</option>
                      <option value="0">De-Activate</option>
                    </select>
               </div>
               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" rows="3" style="resize: none"></textarea>
               </div>
               <button type="submit" class="btn btn-primary btn-lg btn-block">Add Offer</button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="card">
   <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-gift"></i> Offers</h3>
</div>
<div class="card-header">
<div id="tab">
   <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $offers->count()}} Offers </h5>
   <table id="myTable" class="table table-striped">
      <thead>
         <tr>
            <th class="th-sm">Name
            </th>
            <th class="th-sm">Code
            </th>
            <th class="th-sm">Min Amount
            </th>
            <th class="th-sm">Discount
            </th>
            <th class="th-sm">Expiry
            </th>
            <th class="th-sm">Action
            </th>
         </tr>
      </thead>
      <tbody id="tableBody">
         @foreach($offers as $offer)
         <tr>
         <td>{{ $offer->name }}</td>
         <td>{{ $offer->code }}</td>
         <td>{{ $offer->min_amt }}</td>
         <td>{{ $offer->discount }} %</td>
         <td>@if($offer->status==1)
                            Activated
                          @else
                            De-Activated
                        @endif
        </td>
         <td>
            <ul style="list-style:none;">
               
               <li style="padding-top:5px"><a href=" {{ route('offer.edit',$offer->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></li>
               <li style="padding-top:5px"><a id="{{$offer->id}}" href="{{ route('offer_delete',$offer->id) }} " class="btn btn-sm rounded-pill btn-outline-danger delete_offer"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a></li>
            </ul>
         </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<div></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   function randomString(length, chars) {
     var result = '';
     for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
     return result.toUpperCase();
   }
   
   jQuery(document).ready(function(){
    
        $(".delete_offer").click(function(){
            var offer_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "offer_delete",
                data: {'offer_id' : offer_id},
                success: function(data) {
                    window.location.href = "{{ url('offers')}}";
                   $('.delete_success_div').removeClass('d-none');
                   $('.delete_success_html').html('Offer Deleted Successfully');
                    
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
            
          });
    var modal = document.getElementById("exampleModal");
   jQuery('#addOffer').on('click',function(){
   console.log('hi');
   $('#exampleModal').modal();
   
   $('#exampleModal').on('shown.bs.modal', function (event) {
   
   $('#code').val(randomString(7, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'));
   
   });
   });
   
   });
   
   
</script>
@endsection