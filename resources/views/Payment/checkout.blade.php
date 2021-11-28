@extends('layouts.myApp')

@section('content')
<?php $profile = App\Models\Profile::where("user_id",Auth::user()->id)->first(); ?>
<style>
    #coupon_code_msg{
    	color:red;
    }
    #edit_address{
        display: block;
    }
    #checkout_form {
        display: none;
    }
    .payment-btn {
        width:125px;
        height:25px;
    }
    .coupon-btn {
        padding:5px;
        color:#000;
        border-radius:10%;
        background-color:#fff;
    }
    .myFinalAmt {
        color:#000!important;
        border-top:1px solid #000;
        border-bottom:1px solid #000;
    }
    .myBackground  {
  background-image: url('images/bgCheckout.png')!important;

   background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}
    .pay-btn{
    padding: 5px;
    border-radius: 25px;
    background-color: transparent!important;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal.right.fade .modal-dialog {
    right: -70px!important;
}
.modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 520px!important;
    height: 100%;
}
/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Checkout</a></li>
         </ul>
</div>
<div class="product-checkout checkout-cart">

    <!-- main content -->
    <div id="checkout" class="main-content">
        <div class="wrap-banner">
            <!-- breadcrumb -->
          
            <!-- main -->
            <div id="wrapper-site">
                <div class="container">
                    @if(session('cart'))
                    <div class="row">
                        <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                            <div id="main">
                                <div class="cart-grid row">
                                    <div class="column check-info" style="background-color: #fff!important;">
                                        <div class="checkout-personal-step">
                                            <h4 class="step-title h3 info" style="background-color: transparent!important;">
                                                Express Checkout
                                            </h4>
                                        </div>
                                        <div class="content p-5 myBackground">

                                            <div class="tab-content"  >
                                                <div class="tab-pane fade in active show"  role="tabpanel">
                                                    <div class="d-block my-3" >

                                                        <div class="row">
                                                             
                                                        <div class="col mt-5" style="background-color: transparent!important;">

    
                                                            <form action="{{ route('polipay') }}" method="POST" class="needs-validation" novalidate>
                                                              @csrf
                                                              
                                                              @if(session('cart'))
                                                                  @if(session('cart') != null)
                                                                    @foreach(session('cart') as $id => $details)
                                                                      <input type="hidden" name="name[]" value="{{ $details['name'] }}">
                                                                      <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}">
                                                                      <input type="hidden" name="price[]" value="{{ $details['price'] }}">
                                                                            <input type="hidden" name="ship[]" value="">
                                                                            <input type="hidden" name="tax[]" value="">
    
                                                                    @endforeach
                                                                  @endif
                                                              @endif
                                                                @php
                                                                    $total1=0;
                                                                @endphp
                                                                 @if(session('cart'))
                                                                    @foreach(session('cart') as $id => $details)
    
                                                                        <?php
    
                                                                        $shipping = 5;$tax=0;
                                                                        $total1 += $details['price'] * $details['quantity']
                                                                          
                                                                        ?>
                                                                    @endforeach
                                                                @endif
                                                                <?php 
                                                                 $gst=($total1*10)/100;
                                                                 $supertotal1=$total1+$gst; 
                                                                ?>
                                                                
                                                              <input type="hidden" name="token" value="{{ csrf_token() }}">
                                                              <input type="hidden" name="total" value="{{ $supertotal1 }}">
                                                              <input type="hidden" name="tax" value="{{ $tax }}">
                                                              <input type="hidden" name="shipping" value="{{ $shipping ?? '' }}">

                                                              
                                                                 <button type="submit" class="pay-btn"  name="Polipay">
                                                                      <img src="{{ asset('images/myPolypay-btn.png') }}" class="payment-btn">
                                                                  </button> 
                                                            </form>
                                                            </div>

                                                            <div class="col mt-5" style="background-color: transparent!important;">


                                                                <form action="{{ route('paypal') }}" method="POST" class="needs-validation" novalidate>
                                                                  @csrf
                                                                  @if(session('cart'))
                                                                    @foreach(session('cart') as $id => $details)
                                                                      <input type="hidden" name="name[]" value="{{ $details['name'] }}">
                                                                      <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}">
                                                                      <input type="hidden" name="price[]" value="{{ $details['price'] }}">
                                                                            <input type="hidden" name="ship[]" value="">
                                                                            <input type="hidden" name="tax[]" value="">

                                                                    @endforeach
                                                                  @endif
                                                                    @php
                                                                    $total2=0;
                                                                    @endphp
                                                                    @foreach(session('cart') as $id => $details)

                                                                        <?php
                                                                        $shipping = 5;$tax=2;
                                                                        $total2 += $details['price'] * $details['quantity']

                                                                        ?>
                                                                    @endforeach
                                                                  <input type="hidden" name="total" value="{{ $total=$total2+$shipping+$tax }}">
                                                                  <input type="hidden" name="tax" value="{{ $tax }}">
                                                                  <input type="hidden" name="shipping" value="{{ $shipping }}">

                                                                  <button type="submit" class="pay-btn"  name="paypal">
                                                                      <img src="{{ asset('images/myPaypalbtn.png') }}" class="payment-btn">
                                                                  </button> 

                                                                </form>
                                                                </div>
                                                                <div class="col mt-5" style="background-color: transparent!important;">
                                                                    <div type="" class="Gpay"  id="Gpay" name="Gpay">
                                                                      <!--<img src="{{ asset('images/MyG-pay.png') }}" class="payment-btn">-->
                                                                    </div> 
                                                                </div>
                                                                 <div class="col mt-5" style="background-color: transparent!important;">
                                                                      <button type="button" class="pay-btn" id="afterpay-button"  name="afterPay">
                                                                      <img src="{{ asset('images/myAfterpay.png') }}" class="payment-btn">
                                                                  </button> 
                                                                </div>
                                                                <div class="col mt-5" style="background-color: transparent!important;">
                                                                      <button type="button" class="pay-btn" id="myBtnairwalex"  name="Airwallex">
                                                                      <img src="{{ asset('images/Airwallex-logoBG.png') }}" class="payment-btn">
                                                                  </button> 
                                                                </div>
                                                                <div class="col mt-5" style="background-color: transparent!important;">
                                                                      <button type="button" class="pay-btn" id="myBtn"  name="SplitItPayment">
                                                                      <img src="{{ asset('images/SplitItPayment.png ') }}" class="payment-btn">
                                                                  </button> 
                                                                  <!-- Trigger/Open The Modal -->
<!--<button id="myBtn">Open Modal</button>-->
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="splititform">

        <input type="hidden" name="FullName" value="{{ Auth::user()->name }}">
        <input type="hidden" name="session_id" value="<?php echo \Session::getId() ?>">
        <input type="hidden" name="Email" value="{{ Auth::user()->email }}">
        <input type="hidden" name="PhoneNumber" value="{{ $profile->phone }}">
        <input type="hidden" name="City" value="{{ $profile->city }}">
        <input type="hidden" name="State" value="{{ $profile->state }}">
        <input type="hidden" name="ZipCode" value="{{ $profile->zip }}">
        <input type="hidden" name="AddressLine1" value="{{ $profile->address }}">
        <input type="hidden" name="AddressLine2" value="{{ $profile->addrOpt }}">

        <table>
            <tr>
                <td>
                    <label for="country">Country</label><br/>
                </td>
                <td>
                    <input type="text" name="Country" value="">
                </td>
                <td>
                    <label for="CultureName">Culture Name</label><br/>
                </td>
                <td>
                    <select id="CultureName" class="form-select" name="CultureName" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="en-us">en-us</option>
                        <option value="en-au">en-au</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="CardHolderFullName">Card Holders Name</label>
                </td>
                <td>
                    <input type="text" name="CardHolderFullName">
                </td>
                <td>
                    <label for="CardNumber">Card Number</label>
                </td>
                <td>
                    <input type="number" name="CardNumber">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="CardExpyear">Card Exp year</label>
                </td>
                <td>
                    <input type="number" name="CardExpyear">
                </td>
                <td>
                    <label for="CardExpmonth">Card Exp month</label>
                </td>
                <td>
                    <input type="number" name="CardExpmonth">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="CardCvv">CardCvv</label>
                </td>
                <td>
                    <input type="number" name="CardCvv">
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</div>
<!-- The Modal -->
<div id="myModalairwalex" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close spanairwalexclose">&times;</span>
    <form id="airwallexform">

        <input type="hidden" name="FullName" value="{{ Auth::user()->name }}">
        <input type="hidden" name="session_id" value="<?php echo \Session::getId() ?>">
        <input type="hidden" name="Email" value="{{ Auth::user()->email }}">
        <input type="hidden" name="PhoneNumber" value="{{ $profile->phone }}">
        <input type="hidden" name="City" value="{{ $profile->city }}">
        <input type="hidden" name="State" value="{{ $profile->state }}">
        <input type="hidden" name="ZipCode" value="{{ $profile->zip }}">
        <input type="hidden" name="AddressLine1" value="{{ $profile->address }}">
        <input type="hidden" name="AddressLine2" value="{{ $profile->addrOpt }}">

        <table>
            
            <tr>
                <td><label for="first_name">First Name</label></td>
                <td><input type="text" id="first_name" name="first_name"></td>
                <td><label for="last_name">Last Name</label></td>
                <td><input type="text" id="last_name" name="last_name"></td>
            </tr>
            <tr>
                <td><label for="postcode">Post Code</label></td>
                <td><input type="number" id="postcode" name="postcode"></td>
                <td><label for="country_code">Country Code</label></td>
                <td><input type="number" id="country_code" name="country_code"></td>
            </tr>
            <tr>
                <td><label for="street_address">Street Address</label></td>
                <td><input type="text" id="street_address" name="street_address"></td>
                <td><label for="date_of_birth">Date Of Birth</label></td>
                <td><input type="date" name="date_of_birth"></td>
            </tr>
            <tr>
                <td><label for="payment_currency">Payment Currency</label></td>
                <td><input type="payment_currency" name="payment_currency"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</div>
                                                                </div>
                                                            </div>
                                                      </div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                         <br><br>
                                        <div class="checkout-personal-step" >
                                            <h4 class="step-title h3 info" style="background-color: transparent!important;">
                                                <span class="step-number">1</span>PERSONAL INFORMATION
                                            </h4>
                                        </div>
                                        <div class="content">

                                            <div class="tab-content">
                                                <div class="tab-pane fade in active show" role="tabpanel">

                                                        <div>

                                                            <div class="form-group row">
                                                                <input class="form-control" name="firstname" type="text" value="{{ Auth::user()->name }}" placeholder="Full name" readonly>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" placeholder="Email" readonly>
                                                            </div>

                                                        </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="checkout-personal-step" style="background-color: transparent!important;">
                                            <h4 class="step-title h3 info">
                                                <span class="step-number">2</span>Addresses
                                            </h4>
                                            <div class="content" id="edit_address">

                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active show"  role="tabpanel">


                                                            <div>
                                                                
                                                                <div class="form-group row">
                                                                    <strong>Address : </strong> <input class="form-control" name="address" type="text" value="{{ $profile->address }}" placeholder="Address "  readonly>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <strong>Address (optional) : </strong> <input class="form-control" name="addrOpt" type="text" value="{{ $profile->addrOpt }}" placeholder="Address Opt"  readonly>
                                                                </div>
                                                                <div class="form-group row">
                                                                   <strong>Mobile Number : </strong> <input class="form-control" name="phone" type="text" value="{{ $profile->phone }}" placeholder="Phone" readonly>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <strong>States</strong>

                                                                    <input class="form-control" type="text" value="{{ $profile->state }}"  readonly>

                                                                      <div class="invalid-feedback">
                                                                        Please select a valid country.
                                                                      </div>

                                                                  </div>
                                                                  <div class="form-group row">
                                                                    <strong>Suburb</strong>

                                                                    <input class="form-control" type="text" value="{{ $profile->city }}"  readonly>
                                                                      <div class="invalid-feedback">
                                                                        Please provide a valid state.
                                                                      </div>

                                                                  </div>
                                                                  <div class="form-group row">
                                                                    <strong>Zip</strong>


                                                                  <input type="text" class="form-control" id="zip"  name="zip" value="{{ $profile->zip }}" placeholder="Zipcode" readonly>
                                                                  <div class="invalid-feedback">
                                                                    Zip code required.
                                                                  </div>
                                                                </div>

                                                            </div>
                                                            <div class="clearfix">
                                                                <div class="row">

                                                                    <button class="continue btn btn-primary pull-xs-right" name="Address" onclick="EditProfile()">
                                                                        Edit Address
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="content" id="checkout_form">

                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active show"  role="tabpanel">
                                                            <form method="POST" action="{{route("profile.update")}}">
                                                                @csrf

                                                            <div>
                                                                <?php $profile =  App\Models\Profile::where("user_id",Auth::user()->id)->first() ?>
                                                                <div class="form-group row">
                                                                    <strong>Address : </strong> <input class="form-control" name="address" type="text" value="{{ $profile->address }}" placeholder="Address " >
                                                                </div>
                                                                <div class="form-group row">
                                                                    <strong>Address (optional) : </strong> <input class="form-control" name="addrOpt" type="text" value="{{ $profile->addrOpt }}" placeholder="Address Opt" >
                                                                </div>
                                                                <div class="form-group row">
                                                                   <strong>Mobile Number : </strong> <input class="form-control" name="phone" type="text" value="{{ $profile->phone }}" placeholder="Phone" >
                                                                </div>

                                                                <div class="form-group row">
                                                                    <strong>States</strong>

                                                                      <select class="custom-select d-block w-100" id="countrySelect" name="countrySelect" onchange="makeSubmenu(this.value)" >
                                                                        
                                                                        <option value="" disabled >Choose State...</option>

                                                                        <option value="New South Wales">New South Wales</option>
                                                                        <option value="Northern Territory">Northern Territory</option>
                                                                        <option value="Queensland">Queensland</option>
                                                                        <option value="South Australia">South Australia</option>
                                                                        <option value="Tasmania">Tasmania</option>
                                                                        <option value="Victoria">Victoria</option>
                                                                        <option value="Western Australia">Western Australia</option>

                                                                      </select>
                                                                      <div class="invalid-feedback">
                                                                        Please select a valid country.
                                                                      </div>

                                                                  </div>
                                                                  <div class="form-group row">
                                                                    <strong>Suburb</strong>

                                                                      <select class="custom-select d-block w-100" id="citySelect" name="citySelect" >
                                                                        
                                                                        <option value=""  disabled>Choose City...</option>
                                                                        <option></option>

                                                                      </select>
                                                                      <div class="invalid-feedback">
                                                                        Please provide a valid state.
                                                                      </div>

                                                                  </div>
                                                                  <div class="form-group row">
                                                                    <strong>Zip</strong>


                                                                  <input type="text" class="form-control" id="zip"  name="zip" value="{{ $profile->zip }}" placeholder="Zipcode">
                                                                  <div class="invalid-feedback">
                                                                    Zip code required.
                                                                  </div>
                                                                </div>

                                                            </div>
                                                            <div class="clearfix">
                                                                <div class="row">
                                                                            <button type="submit" class="continue btn btn-primary pull-xs-right d-block" id="edit-post-btn">
                                                                                {{ __('Update Address') }}
                                                                            </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <div class="cart-grid-right column" style="background-color:#ECEEEF!important;">
                                        <h2 style="padding:10px 5px!important;background-color:#005080!important; color:#fff!important; border-radius:10px;">
                                            &nbsp;<i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;
                                            Cart Summary
                                        @if(session('cart'))
                                        <span class="cart-products-count badge  bg-secondary"> {{count(session('cart')) }}</span>
                                        @endif</h2>
                                       
                                        <div class="cart-summary" style="margin-top:-15px;">
                                           <table class="p-3">
                                               <tbody>
                                               @if(session('cart'))
                                               <?php $i=0; ?>
                                               @foreach(session('cart') as $id => $details)
                                             
                                               <tr>
                                               <td class="product-image">
                                               <a href="{{url('/cart')}}">
                                               <img src="{{ asset('storage/'.$details['image_path']) }}" style="width:100px;height:100px;border:2px solid #005080;" alt="Product">
                                               </a>
                                               </td>
                                               <td>
                                               <div class="product-name" style="padding:5px 8px;color:#000!important;">
                                                <strong><a href="{{url('/cart')}}"> {{ $details['name'] }}</a></strong>
                                               </div>
                                               <div style="padding:5px 8px;color:#000!important;">
                                                {{ $details['quantity'] }} x
                                               <span class="product-price"> AUD $  {{ $details['price'] }}</span>
                                               </div>
                                               
                                                
                                               </td>
                                               
                                               </tr>
                                               
                                               @endforeach
                                              </tbody>
                                               </table>
                                               <table class="p-3 m-3">
                                               <tbody>
                                                   <form>
                                                       {!! csrf_field() !!}
                                                  <tr class="m-3">
                                                    <td colspan="2">
                                                        <input type="hidden" name="mytotal" value="{{ $total1 }}">
                                                      <input type="text" name="code" id="code" placeholder="Gift card or discount code" style="width:240px;padding:5px;color:#000;" autocomplete="off" aria-required="true"   >
                                                      </td>
                                                      <td><button type="button" class="coupon-btn" id="coupon-btn">Apply</button>
                                                      <td>
                                                    </tr>
                                                    <tr class="m-3">
                                                    <td colspan="3">
                                                      <div id="coupon_code_msg">
</div>                                                </div>
                                                      </td>
                                                      
                                                    </tr>
                                                    </form>
                                                   <tr class="total" style="color:#000!important;border-top:1px solid #000">
                                                       <td>SubTotal:</td>
                                                       <td style="text-align:right;">$</td>
                                                       <td id="total">{{ $total1 }}</td>
                                                   </tr>
                                                 
                                                    <tr class="total myFinalAmt m-3">
                                                       <td width="40%" >Total:(inc 10% GST)</td>
                                                     
                                                       <td style="text-align:right;">$</td>
                                                       <td colspan="2" id="subtotal">{{ $supertotal1 }}</td>
                                                   </tr>
                                                  @endif
                                               </tbody>
                                               </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <h1 class="text-center alert alert-danger m-3 p-3">Your Shopping Cart is Empty!</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- footer -->
    <script src="{{ asset('js/statesCity.js') }}"></script>
    <script src="{{ asset('js/gpay.js') }}"></script>
    <script src="{{ asset('js/splitit.js') }}"></script>
    <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://portal.sandbox.afterpay.com/afterpay.js"></script>
    <script src="{{ asset('js/afterpay.js') }}"></script>
    <script>
        $('#coupon-btn').on('click',function(){
               
            $('#coupon_code_msg').html('');
          var code=$('#code').val();
           if(code!='')
            {
                data = {
                "_token": "{{ csrf_token() }}",
                "code" : code,
                };
                $.ajax({
                type: 'POST',
                url: "{{ url('/apply_coupon_code') }}",
                data: data,
                success: function(result) {
                 
                },
        });
        
            }
            else
            {
                $('#coupon_code_msg').html('Please Enter Coupon Code.');
            }
        });
        
           
        
        function EditProfile()
        {
            var form= document.getElementById('checkout_form');
            var edit= document.getElementById('edit_address');
            form.style.display="block";
            edit.style.display="none";
        }
        


    </script>
@endsection
