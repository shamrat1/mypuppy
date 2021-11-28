@extends('layouts.myApp')
@section('content')
<style>
.mapouter{
    position:relative;
    text-align:right;
    height:300px;
    width:480px;
    margin: 5rem;
}
.gmap_canvas {
    overflow:hidden;
    background:none!important;
    height:300px;
    width:480px;
    margin:10px;
}
@media only screen and (max-width: 600px) {
  .mapouter{
    margin: 0px!important;
    height:300px;
    width:300px;
}
.gmap_canvas {
    height:300px;
    width:300px;
}
}
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="javascript:void(0)">
                    <span>Contact Us</span>
                </a>
            </li>
         </ul>
        
</div>

 <img src="{{ asset('images/contactBanner.png') }}" alt="Nature" style="width:100%;height:100%">
<div class="container">

    <br />
     <?php $contactinfo = App\Models\ContactInfo::findOrFail(1); ?>
    <div class="row text-center">
        <div class="column">
           <h4> 
            <a href="javascript:void(0)"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></a>
            <br> <br>
            {{ $contactinfo->address }} </h4> 
        </div>
        <div class="column">
            <h4> 
             <a href="javascript:void(0)"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
              <br> <br>
             {{ $contactinfo->email }} </h4>
        </div>
        <div class="column">
            <h4>
                <a href="javascript:void(0)"> <i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>
                 <br> <br>
                   {{ $contactinfo->phone }} </h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="480" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Melbourne,%20VIC%203000%20Australia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-a.com"></a><br></div></div>
        </div>
        <br />
        <div class="col-md-6">
            <form class="my-form p-3">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="email" class="form-control" id="form-name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Address</label>
                    <input type="email" class="form-control" id="form-email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="form-subject">Subject</label>
                    <input type="text" class="form-control" id="form-subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="form-message">Email your Message</label>
                    <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-default" type="submit">Contact Us</button>                
            </form>
        </div>
    </div>
</div>
<br>
<br>

<style>
    .my-form {
        color: #305896;
    }
    .my-form .btn-default {
        background-color: #305896;
        color: #fff;
        border-radius: 0;
    }
    .my-form .btn-default:hover {
        background-color: #4498C6;
        color: #fff;
    }
    .my-form .form-control {
        border-radius: 0;
    }
</style>



@endsection