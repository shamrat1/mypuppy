@extends('layouts.myApp')
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

@section('content')
@php 
	$user = Auth::user();
@endphp
<div class="breadcrumbs">
    <ul class="breadcrumb">
       <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
       <li>
          <a href="javascript:void(0)">
          <span>Affliate Dashboard</span>
          </a>
       </li>
    </ul>
 </div>
 <br>
<div class="page-content" style="margin-top:10px">
<div class="container-fluid">
<div class="row">
<div class="myaccount container page-content-body">
<div class="panel">
<div class="page-header">
<h2 class="leftheading-main">Affiliate Dashboard</h2>
<div style="clear: both;"></div>
</div>
<hr style="border-top: 2px solid #0073DD; margin-top: -20px;">
<div class="panel-body">
<div class="warningalert alert alert-warning alert-dismissable hidden" style="margin-top:10px">
<button type="button" class="close closebtn" aria-hidden="true">×</button>
<div class="alertmessage"><strong></strong></div>
</div>
<div class="successalert alert alert-success alert-dismissable hidden" style="margin-top:10px">
<button type="button" class="close closebtn" aria-hidden="true">×</button>
<div class="successmessage"><strong></strong></div>
</div>
<div>
<h3 class="leftheading">My Affiliate Link</h3>

<div class="col-xs-12 col-md-12 results-row hidden-xs">
<br>
<div class="col-xs-3 col-md-4 columnheadings ">
<h3 style="color:#95989A">Code and Link:
</h3></div>
<div class="col-xs-10 col-md-8 columnheadings ">
<form class="form-inline copy-link">
<div class="form-group" style="width: 55%;padding-right: 12px">
<input type="text" readonly="" class="form-control" style="width:100%" value="{{route('register')}}?ref={{ $user->referalCode }}">
</div>
<div class="form-group" style="width: 35%">
<button type="button" class="btn btn-primary copy-address" style="width:100%" data-value="{{route('register')}}?ref={{ $user->referalCode }}"><i class="flaticon-copy-1"></i> Copy Link</button>
</div>
<div class="form-group" style="width: 55%; padding-right: 12px; margin-top: 5px;">
<input type="text" readonly="" class="form-control" style="width:100%" value="{{$myreferal}}">
</div>
<div class="form-group" style="width: 35%; margin-top: 5px;">
<button type="button" class="btn btn-primary copy-address" style="width:100%" data-value="{{$myreferal}}"><i class="flaticon-copy-1"></i> Copy Code</button>
</div>
<br><br>
</form>
</div>
</div>
<div class="col-xs-12 col-md-12 visible-xs">
<div class="row">
<form class="form-inline copy-link">
<div class="form-group" style="width: 100%;">
<input type="text" readonly="" class="form-control" style="width:100%" value="https://www.coinspot.com.au?affiliate=GQ2TVA">
</div>
<div class="form-group" style="width: 100%">
<button type="button" class="btn btn-primary copy-address" style="width:100%" data-value="https://www.coinspot.com.au?affiliate=GQ2TVA"><i class="flaticon-copy-1"></i> Copy Link</button>
</div>
<div class="form-group" style="width: 100%; margin-top: 5px;">
<input type="text" readonly="" class="form-control" style="width:100%" value="GQ2TVA">
</div>
<div class="form-group" style="width: 100%; margin-top: 5px;">
<button type="button" class="btn btn-primary copy-address" style="width:100%" data-value="GQ2TVA"><i class="flaticon-copy-1"></i> Copy Code</button>
</div>
</form>
</div>
</div>
</div>
<h3 class="headings">Affiliate Summary</h3>
<div class="col-xs-12 col-md-12 results-row">
<div class="col-xs-4 col-md-4 columnheadings headerdivider lessleftpadding">
<br>
<h3>Total Affiliates</h3>
<span class="results-main">0</span>
</div>
<div class="col-xs-4 col-md-4 columnheadings headerdivider">
<br>
<h3 class="heading-space">Verified Affiliates</h3>
<span class="results">{{ $verifiedCount }}</span>
</div>
<div class="col-xs-4 col-md-4 columnheadings lessrightpadding">
<br>
<h3 class="heading-space">Active Affiliates</h3>
<span class="results">{{ $activeCount }}</span>
</div>
</div>
<div class="hidden-xs">
<h3 class="headings leftheading">Earnings Summary</h3>
<h3 class="headings rightheading">Total Paid Out
<span style="color:#3E5169"> ${{$paidOut}}</span>
</h3>
</div>
<div class="visible-xs">
<h3 class="headings heading">Earnings Summary</h3>
<div style="clear: both;"></div>
<h3 class="payout">Total Paid Out
<span style="color:#3E5169"> ${{$paidOut}}</span>
</h3>
</div>
<div style="clear: both;"></div>
<div class="col-xs-12 col-md-12 results-row">
<div class="col-xs-12 col-md-12 columnheadings lessleftpadding">
<br>
<h3>Next Approx. Affiliate Payout</h3>
<label>This payment is due on December 15th based on November trading.</label><br>
<span class="results-main">${{$pendingAmount}}<span class="centsvalue"></span></span>
</div>
</div>
<h3 class="headings">Affiliate Resources</h3>
<div class="row">
<div class="col-xs-12 col-md-12 hidden-xs">
<div class="btn btn-primary mobfullwidth  requestmediabutton">
&nbsp;&nbsp;Request Media Resources
<i class="flaticon-briefcase pull-left coinlink" style="font-size: 16px;"></i>
</div>
</div>
</div>
<div class="visible-xs">
<div class="btn btn-primary mobfullwidth requestmediabutton">
&nbsp;&nbsp;Request Media Resources
<i class="flaticon-briefcase pull-left coinlink" style="font-size: 16px;"></i>
</div>
</div>
<h3 class="headings leftheading">Payment Schedule</h3>
<h3 class="headings rightheading" style="font-size: 14px">
<a href="/my/affiliate/exportpayments">
Export CSV
<img src="/public/img/export.png" style="margin-top: -8px">
</a>
</h3>

<div class="col-xs-12 col-md-12 ">
<div class="row results-table payments">
<div class="table-responsive">
<table class="table table-striped" id="payments">
<tbody><tr>
<th></th>
<th>Status</th>
<th class="text-right">Amount</th>
</tr>
<tr>
<td>TBA</td>
<td>Pending</td>
<td class="text-right"></td>
</tr>
</tbody></table>
</div>
</div>
</div>
<div class="col-xs-12 col-md-12 viewmorepayments hidden">
<h3 class="headings rightheading morepaymentsbtn" style="font-size: 14px; padding-bottom: 0px">
View More
<img src="/public/img/dropdown.png">
</h3>
</div>
<h3 class="headings leftheading"> Statements</h3>
<div class="col-xs-12 col-md-12 ">
<div class="row results-table">
<div class="table-responsive">
<table class="table table-striped">
<tbody><tr>
<th>Status</th>
<th>Amount</th>
<th>By User</th>
<th>Listed At</th>
{{-- <th class="text-right">Action</th> --}}
</tr>
@forelse ($transactions as $item)
	<tr>
		<td>{{ $item->status }}</td>
		<td>${{ $item->amount }}</td>
		<td>{{ $item->user->name }}</td>
		<td>{{ $item->created_at != null ? $item->created_at->format("d-M-y h:i A") : $item->created_at }}</td>
		{{-- <td class="text-right"></td> --}}
	</tr>
@empty
	<tr>
		<td colspan="5"></td>
	</tr>
@endforelse
</tbody></table>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
<br><br>
<div class="modal fade" id="confirmRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="max-width:400px; margin-left: auto; margin-right: auto">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body" style="color: #0073DD">
<div style="text-align: center">
<img src="/public/img/marketing-color.png" style="height: 120px">
</div>
<br>
<h3 style="text-align: center">
Thank you for supporting CoinSpot &amp; requesting official marketing material!
</h3>
<br>
<p>To ensure CoinSpot marketing material will be used appropriately we require some additional information before the files can be provided.</p>
<p>
</p><div class="form-group ">
<label>Please provide a brief description of the website(s) where you are intending to display CoinSpot marketing material:</label>
<textarea class="form-control mediadescription" type="text" maxlength="200" placeholder="Max 200 characters" style="height: 100px"></textarea>
</div>
<p></p>
<p>
</p><div class="form-group ">
<label>Please provide links to the website(s) where you intend to display CoinSpot marketing material:</label>
<textarea class="form-control medialink" type="text" maxlength="200" placeholder="Max 200 characters" style="height: 100px"></textarea>
</div>
<p></p>
<p>
</p><div class="form-group ">
<textarea class="form-control" readonly="readonly" style="height: 100px">MARKETING MATERIAL TERMS &amp; CONDITIONS
CoinSpot reserves the right to request any marketing material to be discontinued or removed entirely at any time. No content provided to affiliate members is to be shared with anyone or used for any other purpose than to promote CoinSpot via the use of your Affiliate ID. 
No content provided to affiliate members is to be edited in any way. CoinSpot may also request that content and banners are updated in accordance with brand guidelines. Users must utilise the most recently provided marketing material as shared with you from CoinSpot. 
Any users that do not abide by these terms will result in members being instantly removed from the Affiliate Program. Affiliates that use CoinSpot marketing materials are bound by our Affiliate Terms &amp; Conditions.
						</textarea>
<input type="checkbox" name="terms" id="terms" autocomplete="off">&nbsp;I Agree with Terms &amp; Conditions
</div>
<p></p>
<p class="reqwarning plsprovide hidden" style="color: red">Please provide a descripton and link(s) </p>
<p class="reqwarning texttoolong hidden" style="color: red">The maximum length for each response is 200 chars </p>
<p class="reqwarning notagreed hidden" style="color: red">Please agree to Terms &amp; Conditions</p>
</div>
<div class="modal-footer">
<button type="button" class="pull-left cancel btn btn-sm btn-default" style="min-width: 40%;" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary confirmedrequestbtn" style="min-width: 40%;" data-id="">Request Resources</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="viewmedia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="max-width:600px; margin-left: auto; margin-right: auto">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body" style="color: #0073DD">
<div style="text-align: center">
<img src="/public/img/marketing-color.png" style="height: 120px">
</div>
<br>
<div style="text-align: center">
<h3 style="text-align: center">
Thank you for request of official CoinSpot marketing material!
</h3>
<br>
<h3>You will find the links below to the currently available resources:</h3>
<label>All images / banners reside at the below directory:</label>
<p style="color: blue">https://www.coinspot.com.au/public/marketing/</p>
<label>Files can be downloaded as required or embedded within your page using the link paths. i.e. </label>
<p style="color: blue; overflow-wrap: break-word">https://www.coinspot.com.au/public/marketing/image1.gif</p>
</div>
<table class="table table-striped">
<thead>
<tr>
<th></th>
</tr>
</thead>
<tbody><tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/LeaderBoard_728x90.gif">LeaderBoard_728x90.gif</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/LeaderBoard_728x90.gif" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/Logo_Horizontal.png">Logo_Horizontal.png</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/Logo_Horizontal.png" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
 <td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/Logo_Vertical.png">Logo_Vertical.png</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/Logo_Vertical.png" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/MREC_300x250.gif">MREC_300x250.gif</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/MREC_300x250.gif" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/Side_Banner_300x600.gif">Side_Banner_300x600.gif</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/Side_Banner_300x600.gif" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/Top_Banner_970x250.gif">Top_Banner_970x250.gif</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/Top_Banner_970x250.gif" style="max-width: 200px;max-height:50px;">
</td>
</tr>
<tr style="text-align:center">
<td><a target="_blank" href="https://www.coinspot.com.au/public/marketing/WideSkyscraper_160x600.gif">WideSkyscraper_160x600.gif</a>
<br>&nbsp;
<img src="https://www.coinspot.com.au/public/marketing/WideSkyscraper_160x600.gif" style="max-width: 200px;max-height:50px;">
</td>
</tr>
</tbody></table>
<p></p>
</div>
<div class="modal-footer" style="text-align: center">
<button type="button" class="cancel btn btn-sm btn-default" style="min-width: 40%;" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<style>
	.rightheading--plain {
		float: right;
		width: 50%;
		text-align: right;
	}

	/* Extra small devices (phones, up to 480px) */
	@media screen and (max-width: 767px) {

		a {
			color: #0073DD;
			font-size: 14px;
			padding-top: 4px;
		}

		.mobfullwidth {
			width: 100%;
		}

		.reducetopmargin {
			margin-top: -20px;
		}

		.headings {
			font-size: 18px;
			padding-bottom: 8px;
			padding-top: 30px;
			float: left;
		}

		.payout {
			float: left;
		}

		.leftheading-main {
			float: left;
			width: 50%;
			font-size: 22px;
		}

		.rightheading-main {
			float: right;
			width: 50%;
			text-align: right;
			padding-top: 20px;
			font-size: 18px;
		}

		.leftheading {
			float: left;
			width: 50%;
			font-size: 18px;
		}

		.rightheading {
			float: right;
			width: 50%;
			text-align: right;
			padding-top: 40px;
			font-size: 16px;
		}

		.headerdivider {
			box-shadow: 3px 0px 3px -3px #ccc;
			height: 120px;
		}

		.results-row {
			border-top: #0073DD;
			border-top-width: 1px;
			border-top-style: solid;
			border-bottom: #0073DD;
			border-bottom-width: 1px;
			border-bottom-style: solid;
			min-height: 30px;
		}

		.results-main {
			color: #3E5169;
			font-size: 17px;
		}

		.results-link {
			color: #3E5169;
			font-size: 13px;
		}

		.results {
			color: #3E5169;
			font-size: 17px;
		}

		.centsvalue {
			font-size: 14px;
		}

	}

	@media screen and (min-width: 768px) {

		a {
			color: #0073DD;
			padding-top: -6px;
			font-size: 14px text-decoration: underline;
			padding-top: 10px;
		}

		.headings {
			font-size: 24px;
			padding-bottom: 8px;
			padding-top: 30px;
			float: left;
		}

		.leftheading-main {
			float: left;
			width: 50%;
			font-size: 44px;
		}

		.rightheading-main {
			float: right;
			width: 50%;
			text-align: right;
			padding-top: 20px;
			font-size: 24px;
		}

		.leftheading {
			float: left;
			width: 50%;
			font-size: 24px;
		}

		.rightheading {
			float: right;
			width: 50%;
			text-align: right;
			padding-top: 30px;
			font-size: 18px;
		}

		.headerdivider {
			box-shadow: 3px 0px 3px -3px #ccc;
			height: 150px;
		}

		.heading-space {
			padding-bottom: 8px;
		}

		.results-row {
			border-top: #0073DD;
			border-top-width: 1px;
			border-top-style: solid;
			border-bottom: #0073DD;
			border-bottom-width: 1px;
			border-bottom-style: solid;
			min-height: 80px;
		}

		.results-main {
			color: #3E5169;
			font-size: 48px;
		}

		.results {
			color: #3E5169;
			font-size: 34px;
		}

		.results-link {
			color: #3E5169;
			font-size: 12px;
		}

		.centsvalue {
			font-size: 32px;
		}

		.coinspot-link {
			padding: 8px;
			border: 1px solid:blue;
			background-color: white;
			border-color: #0073DD;
			border-style: solid;
			border-width: 1px;
			margin-top: -8px;
		}

		.results-table {
			border-top: #0073DD;
			border-top-width: 1px;
			border-top-style: solid;
			border-bottom: #0073DD;
			border-bottom-width: 1px;
			border-bottom-style: solid;
		}
	}

	.lessleftpadding {
		padding-left: 0px;
	}

	.lessrightpadding {
		padding-right: 0px;
	}

	.copytext {
		color: #1996D3;
		font-size: 12px;
	}

	.side-menu a.selected {
		border-color: #3E5169;
		background-color: #3E5169;
	}

	.affiliate-resources {
		color: #2F7FBA;
		font-size: 24px;
	}

	.columnheadings {
		color: #FFFFFF;
		text-align: center;
	}

	.toprowsonly {
		height: 192px;
		overflow: hidden;
	}
</style>
<script nonce="">
	$(function () {
		hideAlerts();
		var payments = document.getElementById('payments');
		if (payments && payments.rows) {
			if (payments.rows.length > 3) {
				$('.payments').addClass('toprowsonly');
				$('.viewmorepayments').removeClass('hidden');
			}
		}
	});

	$('.copy-address').click(function() {
		Clipboard.copy($(this).attr('data-value'));
	});

	var token = "k2NgERdR-isA5vhaAM2HT9wKK1-rxbMuNMlk";
	var summary = '1,2,3';

	$('.closebtn').click(function () {
		hideAlerts();
	});

	function hideAlerts() {
		$('.warningalert').addClass('hidden');
		$('.successalert').addClass('hidden');
	}

	function showError() {
		$('.warningalert').removeClass('hidden');
		$('.alertmessage').text('A problem occurred. Please try again and contact support if it persists');
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0;
	}

	function showSuccess(msg) {
		$('.successalert').removeClass('hidden');
		$('.successmessage').text(msg);
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0;
	}

	$('.morepaymentsbtn').click(function () {
		$('.payments').removeClass('toprowsonly');
		$('.viewmorepayments').addClass('hidden');
	});

	$('.copybutton').click(function () {
		var value = $('.coinlink').attr('data-id');
		Clipboard.copy(value);
	});

	$('.requestmediabutton').click(function () {
		$('#confirmRequest').modal('show');
	});

	$('.viewmediabutton').click(function () {
		$('#viewmedia').modal('show');
	});

	$('.confirmedrequestbtn').click(function (e) {
		$('.reqwarning').addClass('hidden');
	
		var mediadescription = $('.mediadescription').val();
		var medialink = $('.medialink').val();
		var agreed = $('input[name="terms"]:checked').val();

		if (!mediadescription || !medialink) {
			$('.plsprovide').removeClass('hidden');
			return false;
		}

		if (mediadescription.length > 200 || medialink.length > 200) {
			$('.texttoolong').removeClass('hidden');
			return false;
		}

		if (!agreed) {
			$('.notagreed').removeClass('hidden');
			return false;
		}

		$('#confirmRequest').modal('hide');
		requestMediaKit(mediadescription, medialink);
	});

	var requestMediaKit = function (mediadescription, medialink) {
		$('.warningalert').addClass('hidden');
		$('.successalert').addClass('hidden');

		var data = {
			_csrf: token, mediadescription, medialink
		}

		$.ajax({
			method: "POST",
			url: "/my/affiliate/mediarequest",
			data: data
		}).error(function (msg) {
			showError();
		}).done(function (msg) {
			if (msg && msg.success) {
				window.location.reload();
			} else {
				showError();
			}
		})
	}

	var Clipboard = function () {
		var text = null;
		var bound = false;

		var copy = function (e) {
			var isIe = (navigator.userAgent.toLowerCase().indexOf("msie") != -1
				|| navigator.userAgent.toLowerCase().indexOf("trident") != -1);

			if (isIe) {
				window.clipboardData.setData('Text', text);
			} else {
				e.clipboardData.setData('text/plain', text);
			}

			document.removeEventListener('copy', copy);
			bound = false;
			e.preventDefault();
		}

		var bind = function () {
			if (bound) return;
			document.addEventListener('copy', copy);
		};

		return {
			copy: function (textToCopy) {
				bind();
				text = textToCopy;
				document.execCommand('copy');
			}
		}

	}();

</script>
</div>
</div>
</div>
@endsection