@extends('layouts.myApp')
@section('content')
<div class="breadcrumbs">
    <ul class="breadcrumb">
       <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
       <li>
             <a href="{{ url('/services') }}">
             <span>Services</span>
             </a>
          </li>
       <li>
                   <a href="javascript:void(0)">
                   <span>Pet Insurance</span>
                   </a>
                </li>
    </ul>
</div>
<div class="text-center">
    <img src="{{ asset('images/coming-soon.png') }}" class="img-thumbnail rounded mx-auto d-block p-5">
</div>

@endsection
