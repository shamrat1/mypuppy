@extends('layouts.myApp')

@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }
    
    .table > tbody > tr > .no-line {
        border-top: none;
    }
    
    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    
    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style>
<?php
				$profile = App\Models\Profile::find($order->user_id);
				$user = App\Models\User::find($order->user_id);  ?>

				<div class="breadcrumbs">
					<ul class="breadcrumb">
					   <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
					   <li>
						  <a href="javascript:void(0)">
						  <span>Invoice Copy</span>
						  </a>
					   </li>
					</ul>
		   </div>

<div class="container" style="margin-top: 128px;">
	
    <div class="row mt-3">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			
               <?php $companyInfo =App\Models\CompanyInfo::findOrFail(1); ?>
                 <img src="{{ URL::asset("{$companyInfo->company_logo}") }}" style="width: 272px;height: 55px;margin-left: -15px;" alt="">
        
                 
                <h3 class="pull-right">Order # 
                    {{ $order->id }}
                    
                    
                </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					
                {{$user->name}}<br>
                
                    {{$profile->address}}<br>
    					{{$profile->addrOpt}}

                        <br>
						{{ $profile->phone }}
						<br>
{{$profile->city }}, {{$profile->state}} - {{$profile->zip}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{Auth::user()->name}}<br>
                
                    {{$profile->address}}<br>
    					{{$profile->addrOpt}}

                        <br>
						{{ $profile->phone }}
						<br>
{{$profile->city }}, {{$profile->state}} - {{$profile->zip}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Paypal<br>
    					
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
						{{date('F j, Y', strtotime($order->created_at))}}
						at {{date('H: i', strtotime($order->created_at))}}
                       <br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                @foreach ($orderitems as $orderitem )

<p></p>



    							<tr>
    								<td>{{ $orderitem->name}}</td>
    								<td class="text-center">{{ $orderitem->price}}</td>
    								<td class="text-center">{{ $orderitem->quantity}}</td>
    								<td class="text-right">{{ $orderitem->price*$orderitem->quantity}}</td>
    							</tr>
                                @endforeach
                                
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$ {{ $order->total_amount - $order->shipping - $order->tax }} </td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$ {{ $order->shipping }}</td>
    							</tr>
                                <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax</strong></td>
    								<td class="no-line text-right">$ {{ $order->tax }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$ {{ $order->total_amount }}</td>
    							</tr>
                                
    						</tbody>
    					</table>
    				</div>
                    
    			</div>
                
    		</div>
    	</div>
    </div>
</div>




@endsection