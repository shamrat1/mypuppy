

    @extends('layouts.myApp')

    @section('content')
  <div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Wishlists</a></li>
         </ul>
</div>                                <div id="mywishlist">
                                    <h1 class="title-page">My Wishlists</h1>
                                    
                                    <div id="block-history" class="block-center">
                                        <table class="std table">
                                            <thead>
                                                <tr>
                                                    <th class="first_item">Product Name</th>
                                                    <th class="item mywishlist_first">Image</th>
                                                    <th class="item mywishlist_first">Price</th>
                                                    
                                                    <th class="item mywishlist_second">Direct Link</th>
                                                    
                                                    <th class="last_item mywishlist_first">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishlists as $product)
                                                    
                                                
                                                <tr id="wishlist_1">
                                                    <td class="p-5 m-5">
                                                        <a href="{{url('/product-details/'.$product->slug)}}">{{ $product->name }}</a>
                                                    </td>
                                                    <td class="bold align_center">
                                                        <a href="{{url('/product-details/'.$product->slug)}}">
                                                            <img class="img-fluid image-cover" src="/storage/{{ $product->image_path }}" style="width: 150px;height:80px;" alt="img"> 
                                                        </a>
                                                    </td>
                                                    <td class="p-5 m-5">
                                                        Starts from AUD {{ $product->price1_weight }}
                                                    </td>
                                                    <td class="p-5 m-5">
                                                        <a class="btn btn-default" href="{{url('/product-details/'.$product->slug)}}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            <span>View</span>
                                                        </a>
                                                            
                                                        
                                                    </td>
                                                   
                                                    <td class="wishlist_delete p-5 m-5">
                                                        <a href="{{ url('/remove-from-wishlist/'.$product->id) }}"  style="padding:5px 15px;color:#fff;  background-image: linear-gradient( pink,red);background-color:red;border-radius:25px;border:none;box-shadow: 1px 2px 1px 1px grey;"><i class="fa fa-trash" aria-hidden="true"></i> </th></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="page-home text-center mb-3">
                                        <a class="btn btn-default" href="{{ url('/shop') }}">
                                           <i class="fa fa-shopping-cart"></i>
                                            <span>My Shop</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection