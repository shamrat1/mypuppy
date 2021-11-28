<div class="products-container nav-style-2" id="deskProdsGrid01">
   <?php $showCategory=App\Models\Category::findOrFail(1); ?>
   <div class="block-title">
      <div class="title"><a href="{{ route('shop_category',$showCategory->slug) }}"><span>{{ $showCategory->category_name }}</span></a></div>
   </div>
   <div class="pt-content">
      <div class="box-large-image">
         <div class="col col-large-image">
            <div class="image-content">
               <div class="pt-block">
                  <div class="image">
                     <a href="{{ route('shop_category',$showCategory->slug) }}">
                     <img src="{{$showCategory->image_path}}" class="myImageSize" alt="{{ $showCategory->category_name }}"  title="{{ $showCategory->category_name }}" />
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col col-muti-items">
            <div class="swiper-viewport">
               <div class="swiper-container single-slides-404">
                  <div class="swiper-wrapper">

                  <?php
                       $products = App\Models\Product::query()->where('category','LIKE', 1)
                                   ->orderBy('name','ASC')
                                   ->get();
                       ?>
                        @foreach($products as $product)
                     <div class="product-thumb transition swiper-slide">
                        <div class="grid-style">
                           <div class="product-item" data-countdown="countdown-title-box-404-32">
                           <div class="image ">
                                    <a href="{{url('/product-details/'.$product->slug)}}">
                                        
                                    <img  data-src="/storage/{{ $product->image_path }}" width="370" height="370"  alt="{{ $product->name }}" title="{{ $product->name }}" class=" swiper-lazy  img-responsive img-mod-400-0-42" />
                                    </a>
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="quickview">
                                       <a href="{{url('/product-details/'.$product->id)}}" role="button" title="Quick View" class="button-quickview"><span>Quick View</span></a>
                                    </div>
                                 </div>
                                 <div class="caption">
                                    <div class="inner">
                                       

                                       <p class="manufacture-product">
                                          <a href="{{ route('shop_category',$showCategory->id) }}">{{ $showCategory->category_name }}</a>
                                       </p>
                                       <h4><a href="{{url('/product-details/'.$product->slug)}}">{{ $product->name }}</a></h4>
                                       <div class="rating">
                                          <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                          <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                          <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                          <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                          <span class="icon-ratings"><i class="icon-rating icon-rating-o"></i></span>
                                       </div>
                                       <div class="box-price">
                                          <p class="price">
                                             <span class="price-new">$ {{ $product->price1_weight }}</span>
                                          </p>
                                          <div class="button-group">
                                       <div class="inner">
                                          <a href="{{url('/product-details/'.$product->slug)}}" type="button" class="button-cart" title="Add to Cart"><span>Add to Cart</span></a>
                                          @if (Route::has('login'))
                                          @auth
                                          <?php
                                             $check = DB::table('wishlists')
                                                     ->where('user_id', '=',  Auth::user()->id )
                                                     ->where('product_id', '=', $product->id)
                                                     ->first();
                                             
                                             if($check ==''){
                                             ?>
                                          <a href=" {{url('/add-to-wishlist/'.$product->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                          <?php } else {?>
                                          <a href=" {{ url('/remove-from-wishlist/'.$product->id) }}" class="button-wishlist-fas"  title="Remove From Wishlist"><span>Remove From Wish List</span></a>
                                          <?php }?>
                                          @else
                                          <a href=" {{url('/add-to-wishlist/'.$product->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                          @endauth
                                          @endif
                                       </div>
                                    </div>
                                       </div>
                                       <div class="quantity-progress" >
                                          <div class="bar-percent" >
                                             <div class="available-percent" style="width: 98.666666666667%;"></div>
                                          </div>
                                          <p class="product-available">availabe:<span> </span></p>
                                          <p class="product-sold">Sold:<span>4</span></p>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                        </div>

                        
                     </div>
                     @endforeach

                  </div>
               </div>
               <div class="swiper-pager">
                  <div class="swiper-button-next swiper-button-next-404"></div>
                  <div class="swiper-button-prev swiper-button-prev-404"></div>
               </div>
            </div>
         </div>
      </div>
      

      <script>
         var product_slides_404 = $(".single-slides-404").swiper({
             spaceBetween:0,
                                                             nextButton: '.swiper-button-next-404',
             prevButton: '.swiper-button-prev-404',
                                     speed:  500 ,
         preloadImages: false,
         lazyLoading: true,
         watchSlidesVisibility: true,
             slidesPerView: 4,
             slidesPerColumn: 1,
             breakpoints: {
         1699: {
         slidesPerView: 3,
         slidesPerColumn: 1
         },
         1199: {
         slidesPerView: 3,
         slidesPerColumn: 1
         },
         991: {
         slidesPerView: 2,
         slidesPerColumn: 1
         },
         767: {
         slidesPerView: 2,
         slidesPerColumn: 1
         },
         567: {
         slidesPerView: 2,
         slidesPerColumn: 1
         },
         359: {
         slidesPerView: 1
         }
         },
             autoplay:  false ,
             loop: false
         });
         
      </script>
   </div>
</div>