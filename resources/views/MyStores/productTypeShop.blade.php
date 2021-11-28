@extends('layouts.myAppStore')
@section('content')

<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ url('/shop') }}">My Store</a></li>
            <li>
               <a href="{{ route('shop_category',$selectCategory->slug) }}">
                        <span>{{ $selectCategory->category_name }}</span>
                </a>
            </li>
                <li>
                   <a href="{{ route('subcategory_shop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug]) }}">
                    <span>{{ $selectSubCategory->subcategoryname }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcategory_shop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug]) }}">
                        <span>{{ $selectSubcategorytype->subcategory_type }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcategory_shop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'producttypeSlug'=>$selectProducttype->slug]) }}">
                        <span>{{ $selectProducttype->product_type }}</span>  
                </a>
            </li>
        </ul>
</div>

<div id="product-category" class="container layer-category">
   
   <div class="row">
      <aside id="column-left" class="col-sm-3 col-xs-12">
         <div class="col-order-inner">
            <div class="panel panel-default pt-filter">
               <div class="layered">
                  <div class="list-group">
                  <div class="filter-attribute-container" style="padding: 10px!important;">
                        <label><i class="fa fa-filter" aria-hidden="true"></i> &nbsp;{{ $selectSubcategorytype->subcategory_type }}</label>
                        <div class="list-group-item">
                           <div id="filter-group2">
                           <?php $productTypes = App\Models\ProductType::query()->where('subcategoryType_id','LIKE',$selectSubcategorytype->id)->orderBy('product_type','ASC')->get() ?>
                            <!--{{$productTypes}}-->
                            @foreach ($productTypes as $plist)
                              <a href="{{ route('productTypeSelection_shop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug,'producttypeSlug'=>$plist->slug]) }}">
                                    <b><i class="fa fa-check-circle"></i>&nbsp; {{ $plist->product_type }}</b>
                              </a>
                            @endforeach
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            
            <div class="popular-tags">
               <div class="title">
                  <h3>Popular Categories</h3>
               </div>
               <ul>
               <?php $categories = App\Models\Category::orderBy('category_name','ASC')->get() ?>
                @foreach ($categories as $category) 
                  <li>                                                  			
                      <a  href="{{ route('shop_category',$category->slug) }}">{{ $category->category_name }}</span></a>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </aside>
      <div id="content" class="col-sm-9">
         <hr>
         <div class="custom-category">
            <div class="tool-bar">
               <div class="row">
                  <div class="col-md-3 col-xs-6">
                      <!--layoutBtn-->
                    @include('MyStores.prdLayoutBtnInclude')
                  </div>
                 
                  <div class="col-md-3 col-xs-6" style="float:right;">
                     <div class="form-group input-group input-group-sm">
                     <div class="d-flex sort-by-row justify-content-end">
                        <div class="products-sort-order dropdown">
                            <div class="ShopDropdown">
                                <button class="ShopDropbtn"> Sort By Order &nbsp;<i class="fa fa-chevron-down" aria-hidden="true" style="font-size:12px;"></i></button>
                                <div class="ShopDropdown-content">
                                    <a href="{{ route('productTypeSelection_Sortshop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug,'producttypeSlug'=>$selectProducttype->slug,'sort'=>"asc"]) }}">Name, A to Z</a>
                                    <a href="{{ route('productTypeSelection_Sortshop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug,'producttypeSlug'=>$selectProducttype->slug,'sort'=>"desc"]) }}">Name, Z to A</a>
                                    <a href="{{ route('productTypeSelection_Sortshop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug,'producttypeSlug'=>$selectProducttype->slug,'sort'=>"price:low-to-high"]) }}">Price, Low to High</a>
                                    <a href="{{ route('productTypeSelection_Sortshop',['categorySlug'=>$selectCategory->slug,'subcategorySlug'=>$selectSubCategory->slug,'subcategorytypeSlug'=>$selectSubcategorytype->slug,'producttypeSlug'=>$selectProducttype->slug,'sort'=>"price:high-to-low"]) }}">Price, High to Low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     </div>
                  </div>
                  
               </div>
            </div>
            <div class="hidden-sm-down total-products">
               <p>There are {{ $products->total() }} products.</p>
            </div>
            @if($products->total()==0)
               <img src="{{ asset('images/coming-soon.png') }}" class="img-thumbnail rounded mx-auto d-block p-5">
            @endif
            <div class="row" id="tab1">
            @foreach ($products as $product)
            <?php $selCategory=App\Models\Category::findOrFail($product->category); ?>
               <div class="product-layout product-grid grid-style col-lg-3 col-md-4 col-sm-4 col-xs-6 product-items">
                  <div class="product-thumb">
                     <div class="product-item">
                        <!--imageContainer -->
                        @include('MyStores.imageContainerInclude')
                        <div class="caption">
                           <div class="inner">
                              <!--prdDetails-->
                              @include('MyStores.prdDetailsInclude')
                            <div>
                                <p class="price"><span class="price-new">$ {{ $product->price1_weight }}</span></p> 
                        </div>
                              <!--PrdBtnGroup-->
                              @include('MyStores.prdBtnGroupInclude')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               @endforeach
               </div>
              <!--2layout design-->
              <div class="row  d-none" id="tab2">
              @foreach ($products as $product)
             <div class="product-layout product-grid grid-style col-lg-6 col-md-6 col-sm-6 col-xs-6 product-items">
                   <div class="product-thumb">
                      <div class="product-item">
                         <!--imageContainer -->
                        @include('MyStores.imageContainerInclude')
                        
                         <div class="caption">
                            <div class="inner">
                               <!--prdDetails-->
                              @include('MyStores.prdDetailsInclude')
                               <div>
                                <p class="price">  <span class="price-new">$ {{ $product->price1_weight }}</span></p> 
                            </div>
                             <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                              
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                </div>
                <!--end of 2layout design-->
                <div class="row d-none" id="tab3">
                <!--3 column layout design-->
                
                @foreach ($products as $product)
            <div class="product-layout product-grid grid-style col-lg-4 col-md-4 col-sm-4 col-xs-6 product-items">
                   <div class="product-thumb">
                      <div class="product-item">
                         <!--imageContainer -->
                        @include('MyStores.imageContainerInclude')
                         <div class="caption">
                            <div class="inner">
                               <!--prdDetails-->
                              @include('MyStores.prdDetailsInclude')
                              <div>
                                <p class="price">  <span class="price-new">$ {{ $product->price1_weight }}</span></p> 
                            </div>
                               <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                </div>
                <!--end of 3 layout design-->
                
                <div class="row d-none" id="tab4">
                <!--One Column Description-->
                
                @foreach ($products as $product)
                <div class="product-layout product-list col-xs-12 product-items">
                   <div class="product-thumb">
                      <div class="product-item">
                        <!--imageContainer -->
                        @include('MyStores.imageContainerInclude')
                         <div class="caption">
                            <div class="inner">
                               <!--prdDetails-->
                              @include('MyStores.prdDetailsInclude')
                               <div>
                                <p class="price">  <span class="price-new">$ {{ $product->price1_weight }}</span></p> 
                            </div>
                               <p class="product-description"> {!! \Illuminate\Support\Str::limit( $product->description,150, '...') !!}</p>
                               <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                <!--end of one column description-->
                </div>
                <!--mobile layout-->
                <div class="row d-none" id="tab5">
                @foreach ($products as $product)
                <div class="product-layout product-grid grid-style col-xs-12 product-items">
                   <div class="product-thumb">
                      <div class="product-item">
                          <!--imageContainer -->
                        @include('MyStores.imageContainerInclude')
                         <div class="caption">
                            <div class="inner">
                                <!--prdDetails-->
                              @include('MyStores.prdDetailsInclude')
                               <div>
                                <p class="price">  <span class="price-new">$ {{ $product->price1_weight }}</span></p>													 </p>
                                  <div class="box-label">
                                     <div><span class="pro-label sale">New</span></div>
                                  </div>
                               </div>
                               <p class="product-description"> {!! \Illuminate\Support\Str::limit( $product->description,150, '...') !!}</p>
                              <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                <!--end of Mobile layout-->
            </div>
            <div class="tool-bar-bottom">
               <div class="row  p-5">
                  <div class="col-sm-6 text-left ajax_pagination">
                     <ul class="pagination">
                     <span>{{ $products->links() }}</span>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
