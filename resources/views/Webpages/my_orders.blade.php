@extends('layouts.myApp')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="breadcrumbs">
   <ul class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
      <li>
         <a href="javascript:void(0)">
         <span>My Orders</span>
         </a>
      </li>
   </ul>
</div>

  
<div class="container p-5  border mt-5" style="background-color: #F5F5F5">
   <h3 class="p-3 alert-secondary">My Orders</h3> 
   <table class="table table-striped border">
    <thead>
   <tr>
     <th scope="col">Order ID</th>
     <th scope="col">Date</th>
    
     <th scope="col">Total Amount</th>
     <th scope="col">Order Status</th>
     <th scope="col">Actions</th>
   </tr>
    </thead>
    <tbody>
     
   @forelse ($orders as $order )
   @if($order->delivery_status == "processing")

   <tr>
      <td class="alert-danger text-center p-2">{{$order->id}} </td>
      <td class="alert-danger text-center p-2">{{ $order->created_at }}</td>
      <td class="alert-danger text-center p-2">{{ $order->total_amount }}</td>
      
      <td class="alert-danger text-center p-2">{{ $order->delivery_status }}</td>
      <td class="alert-danger text-center p-2"><a href="{{ route('invoice',$order->id) }}" class="btn btn-danger btn-block text-dark">View Invoice</a></td>
  </tr>
  @elseif ($order->delivery_status == "Shipping")
  <tr>
    <td class="alert-warning text-center p-2">{{$order->id}} </td>
    <td class="alert-warning text-center p-2">{{ $order->created_at }}</td>
    <td class="alert-warning text-center p-2">{{ $order->total_amount }}</td>
    
    <td class="alert-warning text-center p-2">{{ $order->delivery_status }}</td>
    <td class="alert-warning text-center p-2"><a href="{{ route('invoice',$order->id) }}" class="btn btn-warning btn-block text-dark">View Invoice</a></td>
</tr>
@elseif ($order->delivery_status == "Delivered")
<tr>
  <td class="alert-success text-center p-2">{{$order->id}} </td>
  <td class="alert-success text-center p-2">{{ $order->created_at }}</td>
  <td class="alert-success text-center p-2">{{ $order->total_amount }}</td>
  
  <td class="alert-success text-center p-2">{{ $order->delivery_status }}</td>
  <td class="alert-success text-center p-2"><a href="{{ route('invoice',$order->id) }}" class="btn btn-success btn-block text-dark">View Invoice</a></td>
</tr>
@endif
  @empty
  <tr>
    <td colspan="6"><h3 class="alert-danger text-center p-3">
    Your Orders List is Empty
    </h3>
    </td>
  </tr>
   @endforelse
      
      </table>
   
 
</div>
@endsection

