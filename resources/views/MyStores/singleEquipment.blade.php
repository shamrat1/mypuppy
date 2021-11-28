@extends('layouts.myApp')
@section('content')
<style>
   #price2_weight,#price3_weight,#price4_weight,#price5_weight  {
   display: none; 
   }
   .description {
   width: 680px;
   }
   .arham li {
   padding: 2px!important;
   color: black;
   }
   .arham li::before {
   content : "● ";
   }
   .saleStyle {
   width: 70px;
   height:70px;
   padding: 22px;
   text-align: center;
   text-decoration: none;
   margin: 5px 2px; 
   border-radius: 50%;
   box-shadow: 1px 2px 1px 1px grey;
   }
   @media only screen and (max-width: 600px) {
   .description {
   width: 100%!important;
   }
   }
</style>
<!-- breadcrumb -->
<div class="breadcrumbs">
   <ul class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="{{ url('shop') }}">Shop</a></li>
      <li>
         <?php $selcategory = App\Models\Category::findOrFail($product->category); ?>
         <a href="{{ route('shop_category',$selcategory->slug) }}">
         <span>{{ $selcategory->category_name }}</span>
         </a>
      </li>
      <li>
         <a href="javascript:void(0)">
         <span>{{ $product->name }}</span>
         </a>
      </li>
   </ul>
</div>
<div class="container">
   <div class="content">
      <div class="main-product-detail">
         <h3>{{$product->name}}</h3>
         <div class="product-single row">
            <div class="product-detail col-xs-12 col-md-5 col-sm-5">
               <div class="page-content" id="content">
                  <div class="images-container">
                     <div class="js-qv-mask mask tab-content border">
                        <div class="saleStyle" style="float: right;">
                           <p>
                              @if (Route::has('login'))
                              @auth
                              <?php
                                 $check = DB::table('wishlists')
                                         ->where('user_id', '=',  Auth::user()->id )
                                         ->where('product_id', '=', $product->id)
                                         ->first();
                                 
                                 if($check ==''){
                                 ?>
                              <a href=" {{url('/add-to-wishlist/'.$product->id)}}" class="addToWishlist"  title="Add to Wishlist" ><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
                              <?php } else {?>
                              <a href=" {{ url('/remove-from-wishlist/'.$product->id) }}" class="addToWishlist"  title="Remove From Wishlist" ><i class="fa fa-heart  fa-2x" style="color:red;" aria-hidden="true"></i></a>
                              <?php }?>
                              @else
                              <a href=" {{url('/add-to-wishlist/'.$product->id)}}" class="addToWishlist"  title="Add to Wishlist" ><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
                              @endauth
                              @endif
                           </p>
                        </div>
                        <div id="item1" class="tab-pane fade active in show">
                           <img src="/storage/{{ $product->image_path }}" style="width:330px;heigh:240px;"  alt="img">
                        </div>
                        <div id="item2" class="tab-pane fade">
                           <img src="/storage/{{ $product->image_path1 }}" style="width:330px;heigh:240px;" alt="img">
                        </div>
                        <div id="item3" class="tab-pane fade">
                           <img src="/storage/{{ $product->image_path2 }}" style="width:330px;heigh:240px;" alt="img">
                        </div>
                        <div id="item4" class="tab-pane fade">
                           <img src="/storage/{{ $product->image_path3 }}" style="width:330px;heigh:240px;" alt="img">
                        </div>
                        <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                           <i class="fa fa-expand"></i>
                        </div>
                     </div>
                     <ul class="product-tab nav nav-tabs d-flex">
                        <li class="active col">
                           <a href="#item1" data-toggle="tab" aria-expanded="true" class="active show">
                           <img src="/storage/{{ $product->image_path }}" style="width:65px;height:55px" alt="img">
                           </a>
                        </li>
                        @if($product->image_path1!="")
                        <li class="col">
                           <a href="#item2" data-toggle="tab">
                           <img src="/storage/{{ $product->image_path1 }}" style="width:65px;height:55px" alt="img">
                           </a>
                        </li>
                        @endif
                        @if($product->image_path2!="")
                        <li class="col">
                           <a href="#item3" data-toggle="tab">
                           <img src="/storage/{{ $product->image_path2 }}" style="width:65px;height:55px" alt="img">
                           </a>
                        </li>
                        @endif
                        @if($product->image_path3!="")
                        <li class="col">
                           <a href="#item4" data-toggle="tab">
                           <img src="/storage/{{ $product->image_path3 }}" style="width:65px;height:55px" alt="img">
                           </a>
                        </li>
                        @endif
                     </ul>
                     <div class="modal fade" id="product-modal" role="dialog">
                        <div class="modal-dialog">
                           <!-- Modal content-->
                           <div class="modal-content">
                              <div class="modal-header">
                                 <div class="modal-body">
                                    <div class="product-detail">
                                       <div>
                                          <div class="images-container">
                                             <div class="js-qv-mask mask tab-content">
                                                <div id="modal-item1" class="tab-pane fade active in show">
                                                   <img src="/storage/{{ $product->image_path }}"  alt="img">
                                                </div>
                                                @if($product->image_path1!="")
                                                <div id="modal-item2" class="tab-pane fade">
                                                   <img src="/storage/{{ $product->image_path1 }}" alt="img">
                                                </div>
                                                @endif
                                                @if($product->image_path2!="")
                                                <div id="modal-item3" class="tab-pane fade">
                                                   <img src="/storage/{{ $product->image_path2 }}"  alt="img">
                                                </div>
                                                @endif
                                                @if($product->image_path3!="")
                                                <div id="modal-item4" class="tab-pane fade">
                                                   <img src="/storage/{{ $product->image_path3 }}" alt="img">
                                                </div>
                                                @endif
                                             </div>
                                             <ul class="product-tab nav nav-tabs">
                                                <li class="active">
                                                   <a href="#modal-item1" data-toggle="tab" class=" active show">
                                                   <img src="/storage/{{ $product->image_path }}" alt="img">
                                                   </a>
                                                </li>
                                                @if($product->image_path1!="")
                                                <li>
                                                   <a href="#modal-item2" data-toggle="tab">
                                                   <img src="/storage/{{ $product->image_path1 }}" alt="img">
                                                   </a>
                                                </li>
                                                @endif
                                                @if($product->image_path2!="")
                                                <li>
                                                   <a href="#modal-item3" data-toggle="tab">
                                                   <img src="/storage/{{ $product->image_path2 }}" alt="img">
                                                   </a>
                                                </li>
                                                @endif
                                                @if($product->image_path3!="")
                                                <li>
                                                   <a href="#modal-item4" data-toggle="tab">
                                                   <img src="/storage/{{ $product->image_path3 }}" alt="img">
                                                   </a>
                                                </li>
                                                @endif
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-info">
               <div class="detail-description">
                  <h4 class="description" >{{ $product->tagname }}</h4>
                  <div class="price-del">
                     @if($product->price1_weight)
                     <span class="price"  id="price1_weight">
                        <h2> AUD : $ {{ $product->price1_weight }}</h2>
                     </span>
                     @endif
                     @if($product->price2_weight)
                     <span class="price" id="price2_weight">
                        <h2> AUD : $ {{ $product->price2_weight }} </h2>
                     </span>
                     @endif
                     @if($product->price3_weight)
                     <span class="price" id="price3_weight">
                        <h2> AUD : $ {{ $product->price3_weight }} </h2>
                     </span>
                     @endif
                     @if($product->price4_weight)
                     <span class="price"  id="price4_weight">
                        <h2>
                           AUD : $ {{ $product->price4_weight }}
                     </span>
                     </h2></span>
                     @endif
                     @if($product->price5_weight)
                     <span class="price" id="price5_weight">
                        <h2>
                           AUD : $ {{ $product->price5_weight }}
                        </h2>
                     </span>
                     @endif
                  </div>
                  <div class="option has-border d-lg-flex" >
                     <div class="size">
                        <p class="size">Available size :</p>
                        <table>
                           <tr>
                              @if($product->weightname1!="" and $product->status1 == "Available")   
                              <td class="p-3">
                                 <button type="button" class="btn btn-primary" onclick="selectSize1()">{{ $product->weightname1 }}</button>
                              </td>
                              @endif
                              @if($product->weightname2!="" and $product->status2 == "Available")
                              <td class="p-3">
                                 <button  type="button" class="btn btn-primary" onclick="selectSize2()">{{ $product->weightname2 }}</button>
                              </td>
                              @endif
                              </tr>
                              <tr>
                              @if($product->weightname3!="" and $product->status3 == "Available")
                              <td class="p-3">
                                 <button  type="button" class="btn btn-primary" onclick="selectSize3()">{{ $product->weightname3 }}</button>
                              </td>
                              @endif
                              
                              @if($product->weightname4!="" and $product->status4 == "Available")
                              <td class="p-3">
                                 <button  type="button" class="btn btn-primary" onclick="selectSize4()">{{ $product->weightname4 }}</button>
                              </td>
                              @endif
                              </tr>
                              <tr>
                              @if($product->weightname5!="" and $product->status5 == "Available")
                              <td class="p-3">
                                 <button  type="button" class="btn btn-primary" onclick="selectSize5()">{{ $product->weightname5 }}</button>
                              </td>
                              @endif
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="has-border cart-area">
                     <div class="product-quantity">
                        <div class="qty">
                           <div class="input-group">
                              <div class="quantity">
                                 <table>
                                    <tr>
                                       @if($product->price1_weight!="")
                                       <td  class="add" id="myCart1">
                                          <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                                             @csrf
                                             <span class="control-label mb-5">QTY : 
                                             @include('MyStores.includeQty1')
                                             </span>
                                             <br>
                                             <input type="hidden" name="price" value="{{ $product->price1_weight }}">
                                             <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span>Add to cart</span>
                                             </button>
                                          </form>
                                       </td>
                                       @endif
                                       @if($product->price2_weight!="")
                                       <td  class="add d-none" id="myCart2">
                                          <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                                             @csrf
                                             <span class="control-label mb-5">QTY : 
                                             @include('MyStores.includeQty2')
                                             </span>
                                             <br>
                                             <input type="hidden" name="price" value="{{ $product->price2_weight }}">
                                             <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span>Add to cart</span>
                                             </button>
                                          </form>
                                       </td>
                                       @endif
                                       @if($product->price3_weight!="")
                                       <td  class="add d-none" id="myCart3">
                                          <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                                             @csrf
                                             <span class="control-label mb-5">QTY : 
                                             @include('MyStores.includeQty3')
                                             </span>
                                             <br>
                                             <input type="hidden" name="price" value="{{ $product->price3_weight }}">
                                             <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span>Add to cart</span>
                                             </button>
                                          </form>
                                       </td>
                                       @endif
                                    
                                       @if($product->price4_weight!="")
                                       <td  class="add d-none" id="myCart4">
                                          <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                                             @csrf
                                             <span class="control-label mb-5">QTY : 
                                             @include('MyStores.includeQty4')
                                             </span>
                                             <br>
                                             <input type="hidden" name="price" value="{{ $product->price4_weight }}">
                                             <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span>Add to cart</span>
                                             </button>
                                          </form>
                                       </td>
                                       @endif
                                       @if($product->price5_weight!="")
                                       <td  class="add d-none" id="myCart5">
                                          <form action="{{url('/add-to-cart/'.$product->id)}}" method="get" >
                                             @csrf
                                             <span class="control-label mb-5">QTY : 
                                             @include('MyStores.includeQty5')
                                             </span>
                                             <br>
                                             <input type="hidden" name="price" value="{{ $product->price5_weight }}">
                                             <button type="submit" class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span>Add to cart</span>
                                             </button>
                                          </form>
                                       </td>
                                       @endif
                                    </tr>
                                    </span>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <p class="product-minimal-quantity">
                     </p>
                  </div>
                  <div class="content">
                     <p>Categories :
                        <span class="content2">
                        <a href="javascript:void(0)">
                        <?php $mySelCategory=App\Models\Category::findOrFail($product->category); ?>
                        {{ $mySelCategory->category_name }}</a>
                        </span>
                     </p>
                     <?php $myproducts= App\Models\Product::query()->where('category','LIKE', $product->category)
                        ->where('subcategory','LIKE', $product->subcategory) 
                        ->where('subcategory_type','LIKE', $product->subcategory_type)
                        ->where('product_type','LIKE', $product->product_type)
                        ->orderBy('product_type','ASC')
                        ->where('id','!=',$product->id)->get(); 
                        $i=0;
                        ?>
                     <table>
                        <tr>
                           @foreach ($myproducts as $myproduct)
                           <?php $i++; ?>
                           <td style="padding:2px;">
                              <a href={{url('/product-details/'.$myproduct->id) }}" title="{{ $myproduct->name }}">
                              @if($myproduct->image_path1!="")
                              <img src="/storage/{{ $myproduct->image_path1 }}" style="width: 50px;height:50px;border-radius:100%;border:1px solid gray;"  alt=""> 
                              @else
                              <img src="/storage/{{ $myproduct->image_path }}" style="width: 50px;height:50px;border-radius:100%;border:1px solid gray;"  alt=""> 
                              @endif
                              </a>
                              @if($i==10)
                              @break
                              @endif
                              @endforeach
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="review">
               <ul class="nav nav-tabs">
                  <li class="active">
                     <a data-toggle="tab" href="#description" class="active show">Description</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div id="description" class="tab-pane fade in active show">
                     <h3>{{$product->name}}</h3>
                     <p>
                        {!! $product->description !!}
                     </p>
                     <div class="row">
                        <div class="column">
                           @if($product->size_measure!="")
                           <h4>Sizing :</h4>
                           <p> {{ $product->size_measure }}
                           </p>
                           @endif
                           <table>
                              <thead>
                                 <tr  class="table table-bordered p-2">
                                    <th scope="col">Dimention</th>
                                    @if($product->one_size=="Small")
                                    <th scope="col">S</th>
                                    @else
                                    <th scope="col">One Size</th>
                                    @endif
                                     @if($product->dimension_name1Medium!="" and $product->medium=="true")
                                    <th scope="col">M</th>
                                    @endif
                                    @if($product->dimension_name1Large!="" and $product->large=="true")
                                    <th scope="col">L</th>
                                    @endif
                                    @if($product->dimension_name1XLarge!="" and $product->extra_large=="true")
                                    <th scope="col">XL</th>
                                    @endif
                                    @if($product->dimension_name1XXLarge!="" and $product->double_x_large=="true")
                                    <th scope="col">XXL</th>
                                    @endif
                                 </tr>
                              </thead>
                              <tbody>
                                 @if($product->dimension_name1!="")
                                 <tr>
                                    <th scope="col" class="table table-bordered p-2">
                                       <p>{{ $product->dimension_name1 }}</p>
                                    </th>
                                    @if($product->dimension_name1Small!="")
                                    <td  class="table table-bordered p-2 text-center"> {{ $product->dimension_name1Small }} </td>
                                    @endif
                                    @if($product->dimension_name1Medium!="" and $product->medium=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name1Medium }}</td>
                                    @endif
                                    @if($product->dimension_name1Large!="" and $product->large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name1Large }}</td>
                                    @endif
                                    @if($product->dimension_name1XLarge!="" and $product->extra_large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name1XLarge }}</td>
                                    @endif
                                    @if($product->dimension_name1XXLarge!="" and $product->double_x_large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name1XXLarge }}</td>
                                    @endif
                                 </tr>
                                 @endif
                                 @if($product->dimension_name2!="")
                                 <tr>
                                    <th scope="col"  class="table table-bordered p-2">
                                       {{ $product->dimension_name2 }}
                                    </th>
                                    @if($product->dimension_name2Small!="")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name2Small }}</td>
                                    @endif
                                    @if($product->dimension_name2Medium!="" and $product->medium=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name2Medium }}</td>
                                    @endif
                                    @if($product->dimension_name2Large!="" and $product->large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name2Large }}</td>
                                    @endif
                                    @if($product->dimension_name2XLarge!="" and $product->extra_large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name2XLarge }}</td>
                                    @endif
                                    @if($product->dimension_name2XXLarge!="" and $product->double_x_large=="true")
                                    <td  class="table table-bordered p-2 text-center">{{ $product->dimension_name2XXLarge }}</td>
                                    @endif
                                 </tr>
                                 @endif
                                 @if($product->dimension_name3!="")
                                 <tr>
                                    <th scope="col"  class="table table-bordered p-2">
                                       {{ $product->dimension_name3 }}
                                    </th>
                                    @if($product->dimension_name3Small!="")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name3Small }}</td>
                                    @endif
                                    @if($product->dimension_name3Medium!="" and $product->medium=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name3Medium }}</td>
                                    @endif
                                    @if($product->dimension_name3Large!="" and $product->large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name3Large }}</td>
                                    @endif
                                    @if($product->dimension_name3XLarge!="" and $product->extra_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name3XLarge }}</td>
                                    @endif
                                    @if($product->dimension_name3XXLarge!="" and $product->double_x_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name3XXLarge }}</td>
                                    @endif
                                 </tr>
                                 @endif
                                 @if($product->dimension_name4!="")
                                 <tr>
                                    <th scope="col" class="table table-bordered p-2">{{ $product->dimension_name4 }}</th>
                                    @if($product->dimension_name4Small!="")
                                    <td>{{ $product->dimension_name4Small }}</td>
                                    @endif
                                    @if($product->dimension_name4Medium!="" and $product->medium=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name4Medium }}</td>
                                    @endif
                                    @if($product->dimension_name4Large!="" and $product->large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name4Large }}</td>
                                    @endif
                                    @if($product->dimension_name4XLarge!="" and $product->extra_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name4XLarge }}</td>
                                    @endif
                                    @if($product->dimension_name4XXLarge!="" and $product->double_x_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name4XXLarge }}</td>
                                    @endif
                                 </tr>
                                 @endif
                                 @if($product->dimension_name5!="")
                                 <tr>
                                    <th scope="col" class="table table-bordered p-2">{{ $product->dimension_name5 }}</th>
                                    @if($product->dimension_name5Small!="")
                                    <td>{{ $product->dimension_name5Small }}</td>
                                    @endif
                                    @if($product->dimension_name5Medium!="" and $product->medium=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name5Medium }}</td>
                                    @endif
                                    @if($product->dimension_name5Large!="" and $product->large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name5Large }}</td>
                                    @endif
                                    @if($product->dimension_name5XLarge!="" and $product->extra_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name5XLarge }}</td>
                                    @endif
                                    @if($product->dimension_name5XXLarge!="" and $product->double_x_large=="true")
                                    <td class="table table-bordered p-2 text-center">{{ $product->dimension_name5XXLarge }}</td>
                                    @endif
                                 </tr>
                                 @endif
                              </tbody>
                           </table>
                           @if($product->size_desc!="")
                           <p>{!! $product->size_desc !!}
                           </p>
                           @endif
                        </div>
                        <div class="column">
                           @if($product->material!="")
                           <h4>Materials</h4>
                           {!! $product->material !!}
                           @endif
                           @if($product->instructions!="")
                           <h4>Product Care</h4>
                           <p>{!! $product->instructions !!}</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Start of related product-->
            <div class="related-products nav-style-2">
               <div class="related-module products-container">
                  <div class="block-title">
                     <h3><span>Related Products</span></h3>
                  </div>
                  <div class="pt-content">
                     <div class="swiper-viewport">
                        <div class="swiper-container related-slides swiper-container-horizontal">
                           <div class="swiper-wrapper">
                              <!--loop products-->
                              <?php $products= App\Models\Product::query()->where('category','LIKE', $product->category)
                                                ->where('subcategory','LIKE', $product->subcategory) 
                                                ->where('subcategory_type','LIKE', $product->subcategory_type)
                                                ->orderBy('product_type','ASC')
                                                ->where('id','!=',$product->id)->get(); ?>
                            @foreach ($products as $myProduct)
                                @if($myProduct->id!="")
                              <div class="product-thumb transition swiper-slide swiper-slide-visible swiper-slide-active" style="width: 269.8px;">
                                 <div class="grid-style">
                                    <div class="product-item">
                                       <div class="image">
                                          <a href="{{url('/product-details/'.$myProduct->id)}}">
                                              <img src="/storage/{{ $myProduct->image_path }}" alt="{{ $myProduct->name}}" title="{{ $myProduct->name}}" class="img-responsive"></a>
                                       </div>
                                       <div class="caption">
                                          <div class="inner">
                                             <p class="manufacture-product">
                                                 <?php $selMyPrdCategory= App\Models\Category::findOrFail($myProduct->category); ?>
                                                <a href="http://marketplace3.demo2.towerthemes.com/htc">{{ $selMyPrdCategory->category_name  }}</a>
                                             </p>
                                             <h4><a href="{{url('/product-details/'.$myProduct->id)}}">{{ $myProduct->name}}</a></h4>
                                             <div class="rating"> 																 
                                                <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                                <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                                <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                                <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                                <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                             </div>
                                             <p class="price">AUD $ {{ $myProduct->price1_weight }} 
                                             </p>
                                             <!--p>HTC Touch - in High Definition. Watch music videos and streaming content in awe-inspiring high definition clarity for a mobile experience you never thought possible. Seductively sl..</p-->
                                             <div class="button-group">
                                                <div class="inner">
                                                   <a href="{{url('/product-details/'.$myProduct->id)}}" class="button-cart" type="button" title="Add to Cart"><span>Add to Cart</span></a>
                                                   @if (Route::has('login'))
                                                   @auth
                                                   <?php
                                                      $check = DB::table('wishlists')
                                                              ->where('user_id', '=',  Auth::user()->id )
                                                              ->where('product_id', '=', $myProduct->id)
                                                              ->first();
                                                      
                                                      if($check ==''){
                                                      ?>
                                                  <a href=" {{url('/add-to-wishlist/'.$myProduct->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                                      <?php } else {?>
                                                      <a href=" {{ url('/remove-from-wishlist/'.$myProduct->id) }}" class="button-wishlist-fas"  title="Remove From Wishlist"><span>Remove From Wish List</span></a>
                                                      <?php }?>
                                                      @else
                                                      <a href=" {{url('/add-to-wishlist/'.$myProduct->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                                      @endauth
                                                      @endif
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              <!--End Product loop-->
                           </div>
                        </div>
                        <div class="swiper-pager">
                           <div class="swiper-button-next related-button-next"></div>
                           <div class="swiper-button-prev related-button-prev swiper-button-disabled"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Related product-->
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
   @if($product->price1_weight!='')
            var myCart1 = document.getElementById("myCart1");
   @endif
   @if($product->price2_weight!='')
            var myCart2 = document.getElementById("myCart2");
   @endif
   @if($product->price3_weight!='')
            var myCart3 = document.getElementById("myCart3");
   @endif
   @if($product->price4_weight!='')
            var myCart4 = document.getElementById("myCart4");
   @endif
   @if($product->price5_weight!='')
            var myCart5 = document.getElementById("myCart5");
   @endif
   
   function selectSize1()
   {
      
       @if($product->price1_weight!='')
        
   
         
         document.getElementById('price1_weight').style.display = "block";
         
         
        
         
         
   
         myCart1.classList.remove("d-none");
         @if($product->price2_weight!='')
            myCart2.classList.add("d-none");
   
            document.getElementById('price2_weight').style.display = "none";
         @endif
         @if($product->price3_weight!='')
            myCart3.classList.add("d-none");
   
            document.getElementById('price3_weight').style.display = "none";
         @endif
         @if($product->price4_weight!='')
            myCart4.classList.add("d-none");
   
         document.getElementById('price4_weight').style.display = "none";
         @endif
         @if($product->price5_weight!='')
            myCart5.classList.add("d-none");
   
         document.getElementById('price5_weight').style.display = "none";
         @endif
   
         
       @endif
       
       
   }
   function selectSize2()
   {
      @if($product->price2_weight!='')
         
   
         document.getElementById('price2_weight').style.display = "block";
         
         
         
         
         myCart2.classList.remove("d-none");
   
         @if($product->price1_weight!='')
            myCart1.classList.add("d-none");
   
         document.getElementById('price1_weight').style.display = "none";
         @endif
         @if($product->price3_weight!='')
            myCart3.classList.add("d-none");
   
         document.getElementById('price3_weight').style.display = "none";
         @endif
         @if($product->price4_weight!='')
            myCart4.classList.add("d-none");
   
         document.getElementById('price4_weight').style.display = "none";
         @endif
         @if($product->price5_weight!='')
            myCart5.classList.add("d-none");
   
         document.getElementById('price5_weight').style.display = "none";
         @endif
         
       @endif
       
   }
   function selectSize3()
   {
       @if($product->price3_weight!=='')
         
   
         document.getElementById('price3_weight').style.display = "block";
         
         
         
         
         myCart3.classList.remove("d-none");
         @if($product->price1_weight!='')
            myCart1.classList.add("d-none");
   
         document.getElementById('price1_weight').style.display = "none";
         @endif
         @if($product->price2_weight!='')
            myCart2.classList.add("d-none");
   
         document.getElementById('price2_weight').style.display = "none";
         @endif
         @if($product->price4_weight!='')
            myCart4.classList.add("d-none");
   
         document.getElementById('price4_weight').style.display = "none";
         @endif
         @if($product->price5_weight!='')
            myCart5.classList.add("d-none");
   
         document.getElementById('price5_weight').style.display = "none";
         @endif
         
       @endif
       
   }
   function selectSize4()
   {
      @if($product->price4_weight != '')
   
         document.getElementById('price4_weight').style.display = "block";
         
         
         
         
         myCart4.classList.remove("d-none");
         @if($product->price1_weight!='')
            myCart1.classList.add("d-none");
   
         document.getElementById('price1_weight').style.display = "none";
         @endif
         @if($product->price2_weight!='')
            myCart2.classList.add("d-none");
   
            document.getElementById('price2_weight').style.display = "none";
         @endif
         @if($product->price3_weight!='')
            myCart3.classList.add("d-none");
   
         document.getElementById('price3_weight').style.display = "none";
         @endif
         @if($product->price5_weight!='')
            myCart5.classList.add("d-none");
   
         document.getElementById('price5_weight').style.display = "none";
         @endif
         
      @endif 
   }
   function selectSize5()
   {
       
       @if($product->price5_weight!=='')
   
         document.getElementById('price5_weight').style.display = "block";
         
         myCart4.classList.remove("d-none");
         @if($product->price1_weight!='')
            myCart1.classList.add("d-none");
   
            document.getElementById('price1_weight').style.display = "none";
         @endif
         @if($product->price2_weight!='')
            myCart2.classList.add("d-none");
   
         document.getElementById('price2_weight').style.display = "none";
         @endif
         @if($product->price3_weight!='')
            myCart3.classList.add("d-none");
   
         document.getElementById('price3_weight').style.display = "none";
         @endif
         @if($product->price4_weight!='')
            myCart4.classList.add("d-none");
   
         document.getElementById('price4_weight').style.display = "none";
         @endif
         
       @endif
   }
   const decreaseNumber = (incdec, itemprice) => {
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
   
   const increaseNumber = (incdec, itemval) => {
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
@endsection