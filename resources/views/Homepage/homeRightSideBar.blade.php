
<div class="sub-col col-sm-12 col-md-3" id="homeRightSideBar">
   <div class="products-container countdown-module nav-style-2">
      <div class="block-title">
         <div class="title">
             <a href="{{ url('monthly-sales') }}"><span>Monthly Deals</span></a></div>
      </div>
      <div class="pt-content">
         <div class="swiper-viewport">
            <div class="swiper-container single-slides-396">
               <div class="swiper-wrapper">
               <?php $monthlySales= App\Models\MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')->get();  ?>
               @foreach($monthlySales as $monthlySale)
                  <div class="product-thumb transition swiper-slide">
                     <div class="grid-style">
                        
                        <div class="product-item" data-countdown="countdown-title-box-396-42">
                           <div class="image ">
                              <a href="{{ url('monthly-sales') }}">
                              <img  data-src="/storage/{{ $monthlySale->image_path }}" width="370" height="370"  alt="{{ $monthlySale->name }}" title="{{ $monthlySale->name }}" class=" swiper-lazy  img-responsive img-mod-396-42" />
                              </a>
                              <div class="swiper-lazy-preloader"></div>
                              <div class="quickview">
                                 <a href="{{url('/product-details/'.$monthlySale->id)}}" type="button" title="Quick View" class="button-quickview"><span>Quick View</span></a>
                              </div>
                           </div>
                           <div class="caption">
                              <div class="inner">
                                 <p class="manufacture-product">
                                    {{--  <?php $categoryName=App\Models\Category::findOrFail($monthlySale->category); ?>
                                    <a href="{{url('/product-details/'.$monthlySale->id)}}">{{ $categoryName->category_name }}</a>  --}}
                                 </p>
                                 <h4><a href="{{url('/product-details/'.$monthlySale->id)}}">{{ $monthlySale->name }}</a></h4>
                                 <div class="rating">
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-o"></i></span>
                                 </div>
                                 <div class="box-price">
                                    <input type="hidden" id="regular_{{$monthlySale->id}}" value="{{ $monthlySale->price1_weight }}">
                                    <p class="price">
                                       <span class="price-new" id="amount_{{$monthlySale->id}}"></span> <span class="price-old">$ {{ $monthlySale->price1_weight }}</span>
                                    </p>
                                    <input type="hidden" id="discount_{{$monthlySale->id}}" value="{{ $monthlySale->discount }}">
                                    <div class="box-label">
                                       <div><span class="pro-label sale">-{{ $monthlySale->discount }}%</span></div>
                                    </div>
                                    <div class="button-group">
                                       <div class="inner">
                                          <a href="{{url('/product-details/'.$monthlySale->id)}}" type="button" class="button-cart" title="Add to Cart"><span>Add to Cart</span></a>
                                          @if (Route::has('login'))
                                          @auth
                                          <?php
                                             $check = DB::table('wishlists')
                                                     ->where('user_id', '=',  Auth::user()->id )
                                                     ->where('product_id', '=', $monthlySale->id)
                                                     ->first();
                                             
                                             if($check ==''){
                                             ?>
                                          <a href=" {{url('/add-to-wishlist/'.$monthlySale->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                          <?php } else {?>
                                          <a href=" {{ url('/remove-from-wishlist/'.$monthlySale->id) }}" class="button-wishlist-fas"  title="Remove From Wishlist"><span>Remove From Wish List</span></a>
                                          <?php }?>
                                          @else
                                          <a href=" {{url('/add-to-wishlist/'.$monthlySale->id)}}" role="button"  title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></a>
                                          @endauth
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="quantity-progress" >
                                    <div class="bar-percent" >
                                       <div class="available-percent" style="width: 98.666666666667%;"></div>
                                    </div>
                                    <p class="product-available">availabe:<span>296</span></p>
                                    <p class="product-sold">Sold:<span>4</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        $(document).ready(function(){
                            var regular=document.getElementById("regular_{{$monthlySale->id}}").value;
                            var discount=document.getElementById("discount_{{$monthlySale->id}}").value;
                            var amount=document.getElementById("amount_{{$monthlySale->id}}");
                            
                            regular=parseFloat(regular);
                            console.log("Price : "+regular);
                            discount=parseFloat(discount);
                            console.log("Discount : "+discount);
                            var calcPerc= (regular*discount)/100;
                            
                           
                            console.log("Percentage"+calcPerc);
                            calcPerc=regular-calcPerc;
                            console.log("Afer Deducting Sale Percentage"+calcPerc)
                            amount.innerHTML="$"+calcPerc.toFixed(2);
                            
                        });
                        
                     </script>
                  </div>

                 @endforeach
                 
              
                  
               </div>
            </div>
         </div>
         <script>
            var product_slides_396 = $(".single-slides-396").swiper({
                spaceBetween:0,
                                                                speed:  500 ,
            preloadImages: false,
            lazyLoading: true,
            watchSlidesVisibility: true,
                slidesPerView: 1,
                slidesPerColumn: 1,
                breakpoints: {
            1699: {
            slidesPerView: 1,
            slidesPerColumn: 1
            },
            1199: {
            slidesPerView: 3,
            slidesPerColumn: 1
            },
            991: {
            slidesPerView: 3,
            slidesPerColumn: 1
            },
            767: {
            slidesPerView: 2,
            slidesPerColumn: 1
            },
            567: {
            slidesPerView: 1,
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
   <div class="pt-block static-sidebar-home-store3">
      <div class="image">
         <a href="{{ url('sale') }}">
         <img src="{{ asset('images/saleNow.png') }}" style="padding:8px;border:1px solid #245;border-radius:5px;box-shadow:2px #000" alt="img-sidebar">
         </a>
      </div>
   </div>
   <div class="products-container list-module nav-style-2  ">
      <div class="block-title">
         <div class="title">
        <a href="{{ url('best-selling-products') }}"><span>Best sellers</span></a></div>
      </div>
      <div class="pt-content">
         <div class="swiper-viewport">
            <div class="swiper-container single-slides-398">
               <div class="swiper-wrapper">
               <?php $bestSeller= App\Models\Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->get();  ?>
               @foreach($bestSeller as $fav)
                  <div class="product-thumb transition swiper-slide">
                     <div class="list-style">
                        <div class="product-item">
                           <div class="image ">
                              <a href="{{url('/product-details/'.$fav->id)}}">
                              <img  data-src="/storage/{{ $fav->image_path }}" width="200" height="200"  alt="{{ $fav->name }}" title="{{ $fav->name }}" class=" swiper-lazy  img-responsive img-mod-398-41" />
                              </a>
                              <div class="swiper-lazy-preloader"></div>
                           </div>
                           <div class="caption">
                              <div class="inner">
                                 <p class="manufacture-product">
                                    {{--  <?php $favCategory=App\Models\Category::findOrFail($fav->category) ?>
                                    <a href="{{ route('shop_category',$favCategory->id) }}">{{ $favCategory->category_name }}</a>  --}}
                                 </p>
                                 <h4><a href="{{url('/product-details/'.$fav->id)}}">{{ $fav->name }}</a></h4>
                                 <div class="rating">
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                 </div>
                                 <div>
                                    <p class="price">
                                       <span class="price-new">$ {{ $fav->price1_weight }}</span> 
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        // move title occountdown_module 
                        var winInnW = window.innerWidth;
                        if (winInnW >= 768) {
                        	$(document).ready(function() {
                        		$('.countdown-module.move-title .countdown-box-flex').appendTo('.countdown-module.move-title .block-title');
                        		$('.countdown-module.move-title .block-title .countdown-box-flex:first').show();
                        		$('.countdown-module.move-title .product-item').hover(
                        			function() {
                        				var countdown = $(this).data('countdown');
                        				$('.countdown-box-flex').hide();
                        				$('.' + countdown).closest('.countdown-box-flex').show();
                        			},
                        			function() {}
                        		);
                        	});
                        }
                     </script>
                  </div>
               @endforeach
               </div>
            </div>
         </div>
         <script>
            var product_slides_398 = $(".single-slides-398").swiper({
                spaceBetween:0,
                                                                speed:  500 ,
            preloadImages: false,
            lazyLoading: true,
            watchSlidesVisibility: true,
                slidesPerView: 1,
                slidesPerColumn: 4,
                breakpoints: {
            1699: {
            slidesPerView: 1,
            slidesPerColumn: 4
            },
            1199: {
            slidesPerView: 3,
            slidesPerColumn: 2
            },
            991: {
            slidesPerView: 2,
            slidesPerColumn: 2
            },
            767: {
            slidesPerView: 2,
            slidesPerColumn: 2
            },
            567: {
            slidesPerView: 1,
            slidesPerColumn: 2
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
   <div class="testimonial-module nav-style-2">
      <div class="block-title">
         <div class="title"><span>Testimonials</span></div>
      </div>
      <div class="swiper-viewport">
         <div class="swiper-container testimonial-slides ">
            <div class="swiper-wrapper">
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/testimonial1-100x100.png') }}" alt="Kett Perru"></a>
                        <span class="testimonial-author">Kett Perru</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever!Very fast responding and experts on their fields! Thank you very much! Are to be congratulated.</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/testimonial2-100x100.png') }}" alt="Stefano Colombarolli"></a>
                        <span class="testimonial-author">Stefano Colombarolli</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/testimonial3-100x100.png') }}" alt="Marcosinacioluz"></a>
                        <span class="testimonial-author">Marcosinacioluz</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever!Very fast responding and experts on their fields! Thank you very much! Are to be congratulated.</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/testimonial1-100x100.png') }}" alt="Sandy Wilcke"></a>
                        <span class="testimonial-author">Sandy Wilcke</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding and experts on their fields! Thank you very much! Are to be congratulated.</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/ttm4-100x100.png') }}" alt="Juss Muray"></a>
                        <span class="testimonial-author">Juss Muray</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/ttm5-100x100.png') }}" alt="Cristiano Romeo"></a>
                        <span class="testimonial-author">Cristiano Romeo</span>
                     </div>
                  </div>
               </div>
               <div class="testimonial-content swiper-slide">
                  <div class="inner">
                     <div class="testimonial-box">
                        <p>Code, template and others are very good. The support has served me immediately and solved my problems when I need help. Are to be congratulated. Att Renan Andrade</p>
                     </div>
                     <div class="testimonial-images testimonial-images-">
                        <a href="javascript:void(0);" onclick="testimonialGoToSlide()"><img src="{{ asset('image/cache/catalog/testimonials/ttm6-100x100.png') }}" alt="Brian Hoop"></a>
                        <span class="testimonial-author">Brian Hoop</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      var testimonial_slides = $(".testimonial-slides").swiper({
          spaceBetween: 0,
                          speed:  500 ,
          slidesPerView: 1,
          slidesPerColumn: 1,
          autoplay:  false ,
          loop: true,
      breakpoints: {
      1199: {
      slidesPerView: 3,
      
      },
      991: {
      slidesPerView: 2
      },
      767: {
      slidesPerView: 2
      
      },
      479: {
      slidesPerView: 1
      
      },
      374: {
      slidesPerView: 1
      
      }
      }
      });
      
      
   </script>
   
   <div class="products-container list-module nav-style-2 pt-5 ">
      <div class="block-title">
         <div class="title">
            <a href="{{ url('sale') }}">
             <span>On-Sale Products</span></a></div>
      </div>
      <div class="pt-content">
         <div class="swiper-viewport">
            <div class="swiper-container single-slides-398">
               <div class="swiper-wrapper">
               <?php $sales= App\Models\Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->get();  ?>
               	@foreach($sales as $sale)
                  <div class="product-thumb transition swiper-slide">
                     <div class="list-style">
                        <div class="product-item">
                           <div class="image ">
                              <a href="{{url('/product-details/'.$sale->id)}}">
                              <img  data-src="/storage/{{ $sale->image_path }}" width="200" height="200"  alt="{{ $sale->name }}" title="{{ $sale->name }}" class=" swiper-lazy  img-responsive img-mod-398-41" />
                              </a>
                              <div class="swiper-lazy-preloader"></div>
                           </div>
                           <div class="caption">
                              <div class="inner">
                                 <p class="manufacture-product">
                                    {{--  <?php $saleCategory=App\Models\Category::findOrFail($sale->category) ?>
                                    <a href="{{ route('shop_category',$saleCategory->id) }}">{{ $saleCategory->category_name }}</a>  --}}
                                 </p>
                                 <h4><a href="{{url('/product-details/'.$sale->id)}}">{{ $sale->name }}</a></h4>
                                 <div class="rating">
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                    <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                 </div>
                                <div class="box-price">
                                    <input type="hidden" id="regular_{{$sale->id}}" value="{{ $sale->price1_weight }}">
                                    <p class="price">
                                       <span class="price-new" id="amount_{{$sale->id}}"></span> <span class="price-old">$ {{ $sale->price1_weight }}</span>
                                    </p>
                                    <input type="hidden" id="discount_{{$sale->id}}" value="{{ $sale->discount }}">
                                    <div class="box-label">
                                       <div><span class="pro-label sale">-{{ $sale->discount }}%</span></div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        // move title occountdown_module 
                        var winInnW = window.innerWidth;
                        if (winInnW >= 768) {
                        	$(document).ready(function() {
                        		$('.countdown-module.move-title .countdown-box-flex').appendTo('.countdown-module.move-title .block-title');
                        		$('.countdown-module.move-title .block-title .countdown-box-flex:first').show();
                        		$('.countdown-module.move-title .product-item').hover(
                        			function() {
                        				var countdown = $(this).data('countdown');
                        				$('.countdown-box-flex').hide();
                        				$('.' + countdown).closest('.countdown-box-flex').show();
                        			},
                        			function() {}
                        		);
                        	});
                        }
                     </script>
                  </div>
               @endforeach
               </div>
            </div>
         </div>
         <script>
            var product_slides_398 = $(".single-slides-398").swiper({
                spaceBetween:0,
                                                                speed:  500 ,
            preloadImages: false,
            lazyLoading: true,
            watchSlidesVisibility: true,
                slidesPerView: 1,
                slidesPerColumn: 4,
                breakpoints: {
            1699: {
            slidesPerView: 1,
            slidesPerColumn: 4
            },
            1199: {
            slidesPerView: 3,
            slidesPerColumn: 2
            },
            991: {
            slidesPerView: 2,
            slidesPerColumn: 2
            },
            767: {
            slidesPerView: 2,
            slidesPerColumn: 2
            },
            567: {
            slidesPerView: 1,
            slidesPerColumn: 2
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
</div>