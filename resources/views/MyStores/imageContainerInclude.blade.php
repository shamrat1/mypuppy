<div class="image rotate-image-container">
   <div class="inner">
      <a href="{{url('/product-details/'.$product->slug)}}">
      <img src="/storage/{{ $product->image_path }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive img-default-image">
      </a>
      <div class="quickview">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_QuickView_{{ $product->id }}" id="myBtn-quickview"  class="button-quickview" type="button" title="Quick View" ><span>Quick View</span></a>
      </div>
   </div>
</div>
