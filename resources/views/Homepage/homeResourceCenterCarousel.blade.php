
<div class="blog-module nav-style-2 p-5" id="homeResourceCenter">
   <div class="block-title">
      <div class="title">
          <a href="{{ url('resource-center') }}">Resource Center </a></div>
   </div>
   <div class="pt-content">
      <div class="swiper-viewport">
         <div class="swiper-container posts-container">
            <div class="swiper-wrapper">
            <?php $blogs=App\Models\Blog::OrderBy('blog_name','ASC')->get(); 
                $i=0;
            ?>

            @foreach($blogs as $blog)
                <?php 
                        $blogType= App\Models\BlogType::findOrFail(1); 
                         $ResourceCenter = App\Models\ResourceCenter::where('blog_id',$blog->id)->orderBy('id','desc')->get();
                         $j = 0; 
                     ?>

                    @foreach($ResourceCenter as $myResourceCenter)
               <div class="post-content swiper-slide product-thumb">
                  <div class="post-list">
                     <div class="post-item ">
                     

                        <?php 
                            $j=$j+1;
                        ?>
                        <div class="post-image">
                           <a title="{{ $myResourceCenter->title }}" href="{{ route('resource_center_blog',$blog->slug) }}"><img src="{{ asset($myResourceCenter->image_path) }}" width="300" height="150" alt="{{ $blog->blog_name }}" /></a>
                           
                        </div>
                        <div class="post-cation">
                           <h4 class="post-name"><a  href="{{ route('resource_center_display',['blogSlug'=>$blog->slug,'blogTypeSlug'=>$blogType->slug,'resourceCenterSlug'=>$myResourceCenter->slug]) }}">{{ $blog->blog_name }}</a></h4>
                           <div class="post-intro">
                              <p>{{ $myResourceCenter->shortDescription }}</p>
                           </div>
                           <div class="btn-more"><a href="{{ route('resource_center_display',['blogSlug'=>$blog->slug,'blogTypeSlug'=>$blogType->slug,'resourceCenterSlug'=>$myResourceCenter->slug]) }}">Read More</a></div>
                        </div>
                     </div>
                  </div>
               </div>
                @if($j==2)
                    @break;
                @endif
               @endforeach
               
               @endforeach
               
            </div>
         </div>
         <div class="swiper-pager">
            <div class="swiper-button-next blog-button-next"></div>
            <div class="swiper-button-prev blog-button-prev"></div>
         </div>
      </div>
   </div>
</div>
<script >
   $(".posts-container").swiper({
       spaceBetween: 0,
                               nextButton: '.blog-button-next',
       prevButton: '.blog-button-prev',
                   speed:  500 ,
       slidesPerView: 2,
       slidesPerColumn: 2,
   watchSlidesVisibility: true,
       autoplay:  false ,
       loop: false,
   // Responsive breakpoints
   breakpoints: {
   359: {
   slidesPerView: 1
   },
   479: {
   slidesPerView: 1
   },
   767: {
   slidesPerView: 1
   },
   991: {
   slidesPerView: 1
   
   },
   1199: {
   slidesPerView: 2
   }
   }
   });
</script>
<style>
.w3-white, .w3-hover-white:hover {
    color: #000!important;
    background-color: #fff!important;
}
.w3-ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.w3-ul li {
    padding: 8px 16px;
    border-bottom: 1px solid #ddd;
}
.w3-padding-16 {
    padding-top: 16px!important;
    padding-bottom: 16px!important;
}
</style>
<div id="mobResourceCenter">
    <div class="block-title">
      <div class="title">
          <a href="{{ url('resource-center') }}">Resource Center </a></div>
   </div>
   <div class="w3-row">
            <!-- Introduction menu -->
            <div class="w3-col l4">
               <!-- About Card -->
               <!-- Posts -->
               <div class="w3-card w3-margin">
                  
                  <ul class="w3-ul w3-hoverable w3-white">
                     <?php $blogs=App\Models\Blog::OrderBy('blog_name','ASC')->get(); ?>
                     @foreach($blogs as $blog)
                     <li class="w3-padding-16">
                        <a href="{{ route('resource_center_blog',$blog->id) }}">
                        <img src="{{ asset($blog->image_path) }}" alt="Image" class="w3-left w3-margin-right" style="width:50px;height:30px;">
                        <span class="w3-large">{{ $blog->blog_name }}</span>
                        </a>
                     </li>
                     
                     @endforeach 
                  </ul>
               </div>
              
               <!-- END Introduction Menu -->
            </div>
        </div>
<div>