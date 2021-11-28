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