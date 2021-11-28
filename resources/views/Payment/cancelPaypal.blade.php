@extends('layouts.myApp')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<div class="container p-5 text-center border mt-5" style="background-color: #F5F5F5">
   <h1>You have cancelled your Payment</h1> 
 <h3><a href="{{ url('/cart') }}" class="c-form__button c-cart-empty__backward"> Return to Cart </a></h3>  
</div>
 @include('mobilemenu')
@endsection