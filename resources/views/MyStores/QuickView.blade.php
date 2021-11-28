<style>
   #price2_weight,#price3_weight,#price4_weight,#price5_weight  {
   display: none; 
   }
</style>
<!-- The Modal -->
@foreach ($products as $product)
@if($product!="")
<style> 
   #myModal_QuickView_{{ $product->id }} .modal-dialog{
   width:1250px!important;
   padding:20px;
   }
   @media only screen and (max-width: 600px) {
   #myModal_QuickView_{{ $product->id }} .modal-dialog{
   width:350px!important;
   padding:10px;
   }
   }
</style>
<div id="myModal_QuickView_{{ $product->id }}"  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <!-- Modal content -->
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">{{ $product->name }} Quick View</h4>
            <button type="button" class="close" style="float:right!important;" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="product-details">
               <div class="row">
                  <div class="col-sm-6 product-image-details">
                     <input type="hidden" id="check-use-zoom" value="1">
                     <input type="hidden" id="light-box-position" value="1">
                     <input type="hidden" id="product-identify" value="42">
                     <div class="lightbox-container"></div>
                     <div class="product-zoom-image">
                        <div id="wrap" style="top:0px;z-index:9999;position:relative;">
                           <a href="/storage/{{ $product->image_path }}" class="cloud-zoom main-image" id="product-cloud-zoom" style="width: 365px; height: 350px; padding:15px; position: relative; display: block;" rel=" showTitle: false ,
                              zoomWidth:800,zoomHeight:800,
                              position:'inside', adjustX: 0 ">
                           <img src="/storage/{{ $product->image_path }}" title="{{ $product->name }}" alt="{{ $product->name }}" style="display: block;">
                           </a>
                           <div class="mousetrap" style="background-image:url(&quot;.&quot;);z-index:999;position:absolute;width:438px;height:438px;left:0px;top:0px;"></div>
                           <div class="mousetrap" style="background-image:url(&quot;.&quot;);z-index:999;position:absolute;width:438px;height:438px;left:0px;top:0px;"></div>
                        </div>
                     </div>
                     <div class="additional-container">
                        <div class="swiper-viewport">
                           <div class="additional-images swiper-container swiper-container-horizontal">
                              <div class="swiper-wrapper">
                                 @if($product->image_path!="")
                                 <div class="item swiper-slide swiper-slide-active" style="width: 99.5px;">
                                    <a class="cloud-zoom-gallery sub-image" id="product-image-options-" href="/storage/{{ $product->image_path }}" title="{{ $product->name }}" rel="useZoom: 'product-cloud-zoom', smallImage: '/storage/{{ $product->image_path }}'" data-pos="2">
                                    <img src="/storage/{{ $product->image_path }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                 </div>
                                 @endif
                                 @if($product->image_path1!="")
                                 <div class="item swiper-slide swiper-slide-next" style="width: 99.5px;">
                                    <a class="cloud-zoom-gallery sub-image" id="product-image-options-" href="/storage/{{ $product->image_path1 }}" title="{{ $product->name }}" rel="useZoom: 'product-cloud-zoom', smallImage: '/storage/{{ $product->image_path1 }}'" data-pos="3">
                                    <img src="/storage/{{ $product->image_path1 }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                 </div>
                                 @endif
                                 @if($product->image_path2!="")
                                 <div class="item swiper-slide" style="width: 99.5px;">
                                    <a class="cloud-zoom-gallery sub-image" id="product-image-options-" href="/storage/{{ $product->image_path2 }}" title="{{ $product->name }}" rel="useZoom: 'product-cloud-zoom', smallImage: '/storage/{{ $product->image_path2 }}'" data-pos="4">
                                    <img src="/storage/{{ $product->image_path2 }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                 </div>
                                 @endif
                                 @if($product->image_path3!="")
                                 <div class="item swiper-slide" style="width: 99.5px;">
                                    <a class="cloud-zoom-gallery sub-image" id="product-image-options-" href="/storage/{{ $product->image_path3 }}" title="{{ $product->name }}" rel="useZoom: 'product-cloud-zoom', smallImage: '/storage/{{ $product->image_path3 }}'" data-pos="5">
                                    <img src="/storage/{{ $product->image_path3 }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                 </div>
                                 @endif
                              </div>
                           </div>
                           <div class="swiper-pager">
                              <div class="swiper-button-next additional-button-next"></div>
                              <div class="swiper-button-prev additional-button-prev swiper-button-disabled"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 product-info-details">
                     <div class="inner">
                        <h1><a href="{{url('/product-details/'.$product->id)}}">{{ $product->name }}</a></h1>
                        <div class="rating">
                           <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                           <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                           <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                           <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                           <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                        </div>
                        <!--prices-->
                        @if($product->category!="")
                        <ul class="list-unstyled">
                           <?php $mySelCategory=App\Models\Category::findOrFail($product->category); ?>
                           <li class="manufacture-product">Category: <a href="{{ route('shop_category',$category->id) }}">{{ $mySelCategory->category_name }}</a></li>
                        </ul>
                        @endif
                        <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                         @csrf
                        <div class="product-info">
                           <div class="detail-description">
                              <h4 class="description" >{{ $product->tagname }}</h4>
                              <div class="price">
                                 <span class="price" id="priceVal_{{ $product->id }}"></span>
                              </div>
                              <div class="option has-border d-lg-flex" >
                                 <div class="size">
                                    <p class="size">Available size :</p>
                                      <select name="price" id="myPrice_{{ $product->id }}"  onchange="selectSize_{{ $product->id }}()">
                                           @if($product->weightname1!="" and $product->status1 == "Available") 
                                        <option value="{{ $product->price1_weight }}">{{ $product->weightname1 }}</option>
                                         @endif
                                          @if($product->weightname2!="" and $product->status2 == "Available")
                                        <option value="{{ $product->price2_weight }}">{{ $product->weightname2 }}</option>
                                         @endif
                                          @if($product->weightname3!="" and $product->status3 == "Available")
                                        <option value="{{ $product->price3_weight }}">{{ $product->weightname3 }}</option>
                                        @endif
                                          @if($product->weightname4!="" and $product->status4 == "Available")
                                        <option value="{{ $product->price4_weight }}">{{ $product->weightname4 }}</option>
                                        @endif
                                          @if($product->weightname5!="" and $product->status5 == "Available")
                                           <option value="{{ $product->price5_weight }}">{{ $product->weightname5 }}</option>
                                        @endif
                                      </select>
                                    
                                 </div>
                              </div>
                              <div class="has-border cart-area">
                                 <div class="product-quantity">
                                    <div class="qty">
                                       <div class="input-group">
                                          <div class="quantity">
                                             
                                                      
                                                         <span class="control-label mb-5">QTY : 
                                                            <table>
                                                                <tr>
                                                                <td>
                                                                <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" style="color: #fff" onclick="increaseNumber_{{ $product->id }}('quantity1_{{ $product->id }}','itemval1')" type="button">
                                                                +
                                                                </button>
                                                                </td>
                                                                <td>
                                                                <input type="text" name="quantity" id="quantity1_{{ $product->id }}" value="1" class="input-group" style="padding: 10px;width: 40px;z-index:999!important" readonly>
                                                                
                                                                </td>
                                                                <td>
                                                                <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" style="color: #fff" onclick="decreaseNumber_{{ $product->id }}('quantity1_{{ $product->id }}','itemval1')" type="button">
                                                                -
                                                                </button>
                                                                </td>
                                                                </tr>
                                                                </table>
                                                         </span>
                                                         <br>
                                                         
                                                         <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                         <span>Add to cart</span>
                                                         </button>
                                                      
                                                  
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function selectSize_{{ $product->id }}()
   {
       var x = document.getElementById("myPrice_{{ $product->id }}").value;
        document.getElementById("priceVal_{{ $product->id }}").innerHTML = "AUD : $ " + x;
   }
   const decreaseNumber_{{ $product->id }} = (incdec, itemprice) => {
      var itemval = document.getElementById(incdec);
      console.log(itemval.value);
      
      if (itemval.value <= 1) {
          itemval.value = 1;
          alert("Cannot be less than One");
      
      } else {
          itemval.value = parseInt(itemval.value) - 1;
          itemval.style.background = '#fff';
          itemval.style.color = '#000';
      }
      
      }
   
   const increaseNumber_{{ $product->id }} = (incdec, itemval) => {
   var itemval = document.getElementById(incdec);
   
   console.log(itemval.value);
   
   
   if (itemval.value >= 10 ) {
       itemval.value = 10;
       alert("Quantity Limit is 10");
       itemval.style.background = 'red';
       itemval.style.color = '#fff';
   } else {
       itemval.value = parseInt(itemval.value) + 1;
       itemval.style.background = '#fff';
       itemval.style.color = '#000';
       
   }
   
   }
</script>
@endif
@endforeach
