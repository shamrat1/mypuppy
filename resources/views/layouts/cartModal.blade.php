<style>
         .btn-refresh{
         color: #fff;
         background-image: linear-gradient(#feee,green);
         border-radius: 25px;
         padding: 5px 10px;
         box-shadow: 1px 2px 1px 1px grey;
         }
         .quantityMuh {
         padding: 5px;
         margin-right: 60px;
         border-radius: 15px;
         }
         .quantityMuh input {
         -webkit-appearance: none;
         border: none;
         text-align: center;
         width: 32px;
         font-size: 16px;
         color: #43484D;
         background-color:#ECEEEF;
         font-weight: 300;
         }
         .plus-btn, .minus-btn 
         {  
         width: 30px;
         height: 30px;
         background-color: #E1E8EE;
         border-radius: 6px;
         border: none;
         cursor: pointer;
         }
         td, th {
         padding: 2px!important;
         }
         
         .modal.right .modal-dialog {
         position: fixed;
         margin: auto;
         width: 440px;
         height: 100%;
         -webkit-transform: translate3d(0%, 0, 0);
         -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
         transform: translate3d(0%, 0, 0);
         z-index:999999999999999!important;
         }
         .modal.right .modal-content {
         height: 100%;
         overflow-y: auto;
         }
         .modal.right .modal-body {
         padding: 15px 15px 80px;
         }
         /*Right*/
         .modal.right.fade .modal-dialog {
         right: -320px;
         -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
         -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
         transition: opacity 0.3s linear, right 0.3s ease-out;
         }
         .modal.right.fade.in .modal-dialog {
         right: 0;
         }
         /* ----- MODAL STYLE ----- */
         .modal-content {
         border-radius: 0;
         border: none;
         }
         .modal-header {
         border-bottom-color: #eeeeee;
         background-color: #fafafa;
         }
      </style>
<!-- shopping cart modal -->
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="z-index: 99999999999999!important;">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel2">My Cart 
                     @if(session('cart'))
                     <?php $total = 0 ?>
                     <small class="badge badge-warning mystyle">{{count(session('cart')) }} </small><small class="text-muted"> &nbsp;items</small>
                     @endif
                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                  <div class="cart-content" style="border 1px solid grey;">
                     <table>
                        <tbody>
                           @if(session('cart'))
                           <?php $i=0; ?>
                           @foreach(session('cart') as $id => $details)
                           <?php $total += $details['price'] * $details['quantity'] ?>
                           <tr class="m-2 p-3">
                              <td class="product-image">
                                 <a href="{{url('/cart')}}">
                                 <img src="{{ asset('storage/'.$details['image_path']) }}" style="width:100px;height:100px;border:2px solid #fff;" alt="Product">
                                 </a>
                              </td>
                              <td>
                                 <div class="product-name">
                                    <a href="{{url('/cart')}}">{{ $details['name'] }}</a>
                                 </div>
                                 <div class="quantityMuh">
                                    <form action="{{route('change_qty', $id)}}" class="d-flex">
                                       <button
                                          type="submit"
                                          value="down"
                                          name="change_to"
                                          class="minus-btn"
                                          >
                                       @if($details['quantity'] === 1) x @else 
                                       <i class="fa fa-minus" aria-hidden="true"></i>
                                       @endif
                                       </button>
                                       <input
                                          type="number"
                                          value="{{$details['quantity']}}"
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
                                 </div>
                              </td>
                              <td class="action">
                                 <button class="remove-from-cart" data-id="{{ $id }}" style="margin-right: 15px;padding:5px 10px;color:#fff;  background-image: linear-gradient(red, pink);background-color:red;border-radius:25px;border:none;box-shadow: 1px 2px 1px 1px grey;"><i class="fa fa-trash" aria-hidden="true"></i> </th></button>
                              </td>
                           </tr>
                           @endforeach
                           <tr class="total">
                              <td colspan="2">Total:</td>
                              <td style="text-align:right;">$ </td>
                              <td>{{ $total }}</td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="d-flex justify-content-center"> 
                        <a href="{{ url('/checkout') }}" class="btn btn-primary btn-lg btn-block" title="Checkout"><i class="fa fa-lock"></i>&nbsp Checkout</a>
                     </div>
                     @else
                        <h3>Shopping Cart is Empty!</h3>
                     @endif
                  </div>
               </div>
            </div>
            <!-- modal-content -->
         </div>
         <!-- modal-dialog -->
      </div>
      <!-- modal -->