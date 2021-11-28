@extends('layouts.myApp')
@section('content')
<div class="product-cart checkout-cart blog">
<div id="product-sidebar-left">
   <!-- main content -->
   <div class="main-content" id="cart">
      <!-- main -->
      <div id="wrapper-site">
         <!-- breadcrumb -->
         <nav class="breadcrumb-bg">
            <div class="container no-index">
               <div class="breadcrumb">
                  <ol>
                     <li>
                        <a href="{{ url('/') }}">
                        <span>Home</span>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <span>Shopping Cart</span>
                        </a>
                     </li>
                  </ol>
               </div>
            </div>
         </nav>
         <div class="container">
            <div class="row">
               <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                  <section id="main">
                     <div class="cart-grid row">
                        <div class="col-md-9 col-xs-12 check-info">
                           <h1 class="title-page">Shopping Cart</h1>
                           <div class="cart-container">
                              <div class="cart-overview js-cart">
                                 <ul class="cart-items">
                                    <?php $total = 0 ?>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <li class="cart-item">
                                       <div class="product-line-grid row justify-content-between">
                                          <!--  product left content: image-->
                                          <div class="product-line-grid-left col-md-2">
                                             <span class="product-image media-middle">
                                             <a href="javascript:void(0)">
                                             <img class="img-fluid" src="{{ asset('storage/'.$details['image_path']) }}" alt="{{ $details['name'] }}">
                                             </a>
                                             </span>
                                          </div>
                                          <div class="product-line-grid-body col-md-6">
                                             <div class="product-line-info">
                                                <a class="label" style="color:#000!important;" href="javascript:void(0)" data-id_customization="0">
                                                {{ \Illuminate\Support\Str::limit(  $details['name'], 50, '...') }}
                                                </a>
                                             </div>
                                             <div class="product-line-info product-price">
                                                <span class="value" style="color:#000!important;">AUD $  {{ $details['price'] }}</span>
                                             </div>
                                          </div>
                                          <div class="product-line-grid-right text-center product-line-actions col-md-4">
                                             <table>
                                                <tr>
                                                   <td class="col-md-5 col p-3 qty">
                                                      <form action="{{route('change_qty', $id)}}" class="d-flex">
                                                         <button
                                                            type="submit"
                                                            value="down"
                                                            name="change_to"
                                                            class="minus-btn">
                                                         @if($details['quantity'] === 1) x @else 
                                                         <i class="fa fa-minus" aria-hidden="true"></i>
                                                         @endif
                                                         </button>
                                                         <input
                                                            type="number"
                                                            value="{{$details['quantity']}}"
                                                            class="input-group form-control"
                                                            disabled>
                                                         <button
                                                            type="submit"
                                                            value="up"
                                                            name="change_to"
                                                            class="plus-btn"
                                                            >
                                                         <i class="fa fa-plus" aria-hidden="true"></i>
                                                         </button>
                                                      </form>
                                                   </td>
                                                   <td class="col-md-2 col text-xs-right align-self-end">
                                                      <div class="cart-line-product-actions">
                                                         <button class="remove-from-cart" data-id="{{ $id }}" style="padding:5px 15px;color:#fff;  background-image: linear-gradient( pink,red);background-color:red;border-radius:25px;border:none;box-shadow: 1px 2px 1px 1px grey;"><i class="fa fa-trash" aria-hidden="true"></i> </th></button>
                                                      </div>
                                                   </td>
                                          </div>
                                          </table>
                                       </div>
                              </div>
                              </li>
                              @endforeach
                              @else
                              <li class="cart-item mb-3">
                              <div class="product-line-grid row justify-content-between">
                              <div class="product-line-grid-body col-md-6">
                              <span style="padding:5px 15px;color:#fff;  background-image: linear-gradient( pink,red);background-color:red;border-radius:25px;border:none;"> Shopping Cart is Empty
                              </div>
                              <div class="product-line-grid-body col-md-6">
                              <a href="{{ url('/shop') }}" style="padding:5px 15px; color:#fff;  background-image: linear-gradient( green,orange);background-color:green;border-radius:25px;border:none;box-shadow: 1px 2px 1px 1px grey; ">
                              Go To Shop	</a>
                              </div>
                              </div>
                              </li>
                              @endif
                              </ul>
                           </div>
                        </div>
                        @if(session('cart'))
                        <a href="{{ url('/checkout') }}" class="continue btn btn-primary pull-xs-right">
                        Checkout
                        </a>
                        @endif
                     </div>
               </div>
               </section>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(".update-cart").click(function (e) {
      e.preventDefault();
   
      var ele = $(this);
   
       $.ajax({
           url: '{{ url('update-cart') }}',
           method: "patch",
           data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents(".quantity").find("#quantity").val()},
           success: function (response) {
               
               alert('updated item Quantity');
               window.location.reload();
           }
          
       });
       
   });
   
   $(".remove-from-cart").click(function (e) {
       e.preventDefault();
   
       var ele = $(this);
   
       if(confirm("Are you sure")) {
           $.ajax({
               url: '{{ url('remove-from-cart') }}',
               method: "DELETE",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
               success: function (response) {
                   
                   window.location.reload();
               }
           });
       }
   });
   
   
   
</script>
@endsection