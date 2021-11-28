
<div class="products-container nav-style-2" id="deskProdsGrid04">
   <div class="block-title">
      
      <div class="title"><a href="{{ url('new') }}"><span>New Arrivals</span></a></div>
   </div>
   <div class="pt-content">
      <div class="swiper-viewport">
         <div class="swiper-container single-slides-403">
            <div class="swiper-wrapper">
               <?php $newProducts= App\Models\NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->get(); ?>
               @foreach($newProducts as $newList)
               @if($newList->id!="")
               <div class="product-thumb transition swiper-slide">
                  <div class="list-style">
                     <div class="product-item">
                        <div class="image ">
                           <a href="{{url('/product-details/'.$newList->slug)}}">
                           <img  data-src="/storage/{{ $newList->image_path }}" width="200" height="200"  alt="{{ $newList->name }}" title="{{ $newList->name }}" class=" swiper-lazy  img-responsive img-mod-403-32" />
                           </a>
                           <div class="swiper-lazy-preloader"></div>
                        </div>
                        <div class="caption">
                           <div class="inner">
                              <p class="manufacture-product">
                                  
                                 <?php 
                                    
                                    
                                    $newCategory=App\Models\Category::findOrFail($newList->category); ?>
                                 <a href="{{url('/product-details/'.$newList->slug)}}">{{ $newCategory->category_name }}</a>
                              </p>
                              <h4><a href="{{url('/product-details/'.$newList->slug)}}">{{ $newList->name }} </a></h4>
                              <div class="rating">
                                 <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                 <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                 <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                                 <span class="icon-ratings"><i class="icon-rating icon-rating-"></i></span>
                                 <span class="icon-ratings"><i class="icon-rating icon-rating-o"></i></span>
                              </div>
                              <div>
                                 <p class="price">
                                    {{ $newList->price1_weight }}
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
               @endif
             @endforeach
              
            </div>
         </div>
         <div class="swiper-pager">
            <div class="swiper-button-next swiper-button-next-403"></div>
            <div class="swiper-button-prev swiper-button-prev-403"></div>
         </div>
      </div>
      <script>
         var product_slides_403 = $(".single-slides-403").swiper({
             spaceBetween:0,
                                                             nextButton: '.swiper-button-next-403',
             prevButton: '.swiper-button-prev-403',
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