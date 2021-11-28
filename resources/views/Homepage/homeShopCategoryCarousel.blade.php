
<section id="desktopCategory">
<div class="brand-logo">
   <div class="pt-content">
      <div class="swiper-viewport">
         <div id="carousel0" class="swiper-container">
            <div class="swiper-wrapper">
               <?php $categories = App\Models\Category::orderBy('id','ASC')->get(); ?>
               @foreach ($categories as $category )
               <div class="swiper-slide text-center"><a href="{{ route('shop_category',$category->slug) }}"><img src="{{$category->image_path}}" alt="{{$category->category_name}}"  title="{{ $category->category_name }}" class="myImageSize" /></a></div>
               @endforeach
            </div>
         </div>
         <!--div class="swiper-pagination carousel0"></div-->
         <div class="swiper-pager">
            <div class="swiper-button-next brand-logo-next"></div>
            <div class="swiper-button-prev brand-logo-prev"></div>
         </div>
      </div>
   </div>
</div>
<script >
   $('#carousel0').swiper({
   	mode: 'horizontal',
   	slidesPerView: 7,
   	pagination: false,
   	paginationClickable: true,
   	nextButton: '.brand-logo-next',
       prevButton: '.brand-logo-prev',
   	watchSlidesVisibility: true,
   	autoplay: false,
   	loop: true,
   	// Responsive breakpoints
   	breakpoints: {
   		479: {
   		  slidesPerView: 2
   		},
   		767: {
   		  slidesPerView: 3
   		},
   		991: {
   		  slidesPerView: 3
   		  
   		},
   		1199: {
   		  slidesPerView: 4
   		  
   		},
   		1599: {
   		  slidesPerView: 6
   		  
   		}
   	}
   });
   
</script>
</section>
<section id="mobileCategory">
 <div class="block-title p-3">
      <div class="title"><span>Shop By Category</span></div>
   </div>
   @foreach ($categories as $category )
   <div class="card text-center p-3">
       <a href="{{ route('shop_category',$category->id) }}">
           <img src="{{$category->image_path}}" alt="{{$category->category_name}}" title="{{ $category->category_name }}" class="imgFirstRow" /></a>
           <br class="pt-5">
           <a href="{{ route('shop_category',$category->id) }}" class="btn-Custom">{{ $category->category_name }}</a>
           <br>
    </div>
           
   @endforeach
</section>