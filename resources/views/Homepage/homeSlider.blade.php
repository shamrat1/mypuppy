

<div class="slider-container">
   <div class="slide-loading"></div>
   <div id="plaza-slider" class="plaza-slider">
   <?php $slider = App\Models\Slider::orderBy('id','ASC')->get(); ?>
   @foreach($slider as $slide)
      <a href="{{ url('shop') }}"><img style="display: none;" src="{{ $slide->image_path }}" alt="" title="#slide-caption_{{ $slide->id }}"  /></a>
    @endforeach  
      
   </div>
   @foreach($slider as $slide)
   <div id="slide-caption_{{ $slide->id }}" class="slide-caption nivo-html-caption nivo-caption">
      <div class="slider-content slider-1">
         <div>
            <div class="inner">
               <div class="content">
                  <div class="slide-title">
                  </div>
                  <div class="sub-title">
                  </div>
                  <div class="slide-description">
                     {!! $slide->caption !!}
                     
                  </div>
                  <div class="slide-readmore">
                     <a href="{{ 'shop' }}" title="Shop Now">Shop Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach
</div>

<script >
   $(window).load(function() {
       $('#plaza-slider').nivoSlider({
           slices: 15,
           boxCols: 8,
           boxRows: 4,
           animSpeed: 500,
           manualAdvance:  false  ,
           pauseTime:  5000  ,
           controlNav:  true  ,
           directionNav:  false  ,
           pauseOnHover:  true  ,
           controlNavThumbs: false,
           effect: 'random',
           startSlide: 0,
           prevText: 'Prev',
           nextText: 'Next'
       });
   });
</script>