@extends('layouts.myApp')
@section('content')

<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Sale</a></li>
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
                        <label>Categories</label>
                        <div class="list-group-item">
                           <div id="filter-group2">
                           <?php $categories = App\Models\Category::orderBy('category_name','ASC')->get() ?>
                            @foreach ($categories as $category) 
                              <a  href="{{ route('shop_category',$category->id) }}">{{ $category->category_name }}</span></a>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            
            <div class="popular-tags">
               <div class="title">
                  <h3>Popular Tags</h3>
               </div>
               <ul>
                  <li>                                                  			
                     <a href="{{ url('new') }}">New Arrivals</a>
                  </li>
                  <li>                                                  			
                     <a href="{{ url('monthly-sales') }}">Monthly Sale</a>
                  </li>
                  <li>                                                  			
                     <a href="{{ url('best-selling-products') }}">Best Selling Products</a>
                  </li>
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
                                    
                                        <a href="{{ url('/sale',['sort'=>"asc"]) }}">Name, A to Z</a>
                                        <a href="{{ url('/sale',['sort'=>"desc"]) }}">Name, Z to A</a>
                                        <a href="{{ url('/sale',['sort'=>"price:low-to-high"]) }}">Price, Low to High</a>
                                        <a href="{{ url('/sale',['sort'=>"price:high-to-low"]) }}">Price, High to Low</a>
                                    
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
                              <?php
                                 $check = DB::table('sales')
                                         ->where('sale_id', '=', $product->id)
                                         ->first();
                                 
                                 if($check ==''){
                                 ?>
                     <div>
                                                      <p class="price">  <span class="price-new">$ {{ $product->price1_weight }}</span></p> 														 </p>
                                                      
                                                   </div>
                              	
                              <?php } else {?>
                             <div>
                                                     <p class="price">  <span class="price-new"  id="amount1_{{$product->id}}"></span> 
                                                     <span class="price-old">
                                                     <input type="hidden" id="regular1_{{$product->id}}" value="{{ $product->price1_weight }}">    
                                                        $ {{ $product->price1_weight }}</span> 
                                                        </p>
                                                     <div class="box-label">
                                                         
                                                        <div><span class="pro-label sale">
                                                        <input type="hidden" id="discount1_{{$product->id}}" value="{{ $product->discount }}">
                                                                                         - {{ $product->discount }}%</span></div>
                                                     </div>
                                                  </div>
                              <?php }?>
                              <!--PrdBtnGroup-->
                              @include('MyStores.prdBtnGroupInclude')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <script>
                      
                    var regular=document.getElementById("regular_{{$product->id}}").value;
                    var discount=document.getElementById("discount_{{$product->id}}").value;
                    var amount=document.getElementById("amount_{{$product->id}}");
                   
                    
                    regular=parseFloat(regular);
                    console.log("Price : "+regular);
                    discount=parseFloat(discount);
                    console.log("Discount : "+discount);
                    var calcPerc= (regular*discount)/100;
                    
                    
                    console.log("Percentage"+calcPerc);
                    calcPerc=regular-calcPerc;
                    console.log("Afer Deducting Sale Percentage"+calcPerc)
                    amount.innerHTML="$"+calcPerc.toFixed(2);
                   
                    
              
                
                </script>
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
                                 <p class="price">  <span class="price-new"  id="amount1_{{$product->id}}"></span> 
                                 <span class="price-old">
                                 <input type="hidden" id="regular1_{{$product->id}}" value="{{ $product->price1_weight }}">    
                                    $ {{ $product->price1_weight }}</span> 
                                    </p>
                                 <div class="box-label">
                                     
                                    <div><span class="pro-label sale">
                                    <input type="hidden" id="discount1_{{$product->id}}" value="{{ $product->discount }}">
                                                                     - {{ $product->discount }}%</span></div>
                                 </div>
                              </div>
                             <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                              
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                 <script>
                      
                    var regular1=document.getElementById("regular1_{{$product->id}}").value;
                    var discount1=document.getElementById("discount1_{{$product->id}}").value;
                    var amount1=document.getElementById("amount1_{{$product->id}}");
                   
                    
                    regular1=parseFloat(regular1);
                    console.log("Price : "+regular1);
                    discount1=parseFloat(discount1);
                    console.log("Discount : "+discount1);
                    var calcPerc1= (regular1*discount1)/100;
                    
                    
                    console.log("Percentage"+calcPerc1);
                    calcPerc1=regular1-calcPerc1;
                    console.log("Afer Deducting Sale Percentage"+calcPerc1)
                    amount1.innerHTML="$"+calcPerc1.toFixed(2);
                   
                    
              
                
                </script>
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
                                 <p class="price">  <span class="price-new"  id="amount2_{{$product->id}}"></span> 
                                 <span class="price-old">
                                 <input type="hidden" id="regular2_{{$product->id}}" value="{{ $product->price1_weight }}">    
                                    $ {{ $product->price1_weight }}</span> 
                                    </p>
                                 <div class="box-label">
                                     
                                    <div><span class="pro-label sale">
                                    <input type="hidden" id="discount2_{{$product->id}}" value="{{ $product->discount }}">
                                                                     - {{ $product->discount }}%</span></div>
                                 </div>
                              </div>
                               <!--PrdBtnGroup-->
                             @include('MyStores.prdBtnGroupInclude')
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <script>
                      
                    var regular2=document.getElementById("regular2_{{$product->id}}").value;
                    var discount2=document.getElementById("discount2_{{$product->id}}").value;
                    var amount2=document.getElementById("amount2_{{$product->id}}");
                   
                    
                    regular2=parseFloat(regular2);
                    console.log("Price : "+regular2);
                    discount2=parseFloat(discount2);
                    console.log("Discount : "+discount2);
                    var calcPerc2= (regular2*discount2)/100;
                    
                    
                    console.log("Percentage"+calcPerc2);
                    calcPerc2=regular2-calcPerc2;
                    console.log("Afer Deducting Sale Percentage"+calcPerc2)
                    amount2.innerHTML="$"+calcPerc2.toFixed(2);
                   
                </script>
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
                                 <p class="price">  <span class="price-new"  id="amount3_{{$product->id}}"></span> 
                                 <span class="price-old">
                                 <input type="hidden" id="regular3_{{$product->id}}" value="{{ $product->price1_weight }}">    
                                    $ {{ $product->price1_weight }}</span> 
                                    </p>
                                 <div class="box-label">
                                     
                                    <div><span class="pro-label sale">
                                    <input type="hidden" id="discount3_{{$product->id}}" value="{{ $product->discount }}">
                                                                     - {{ $product->discount }}%</span></div>
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
                 <script>
                      
                    var regular3=document.getElementById("regular3_{{$product->id}}").value;
                    var discount3=document.getElementById("discount3_{{$product->id}}").value;
                    var amount3=document.getElementById("amount3_{{$product->id}}");
                   
                    
                    regular3=parseFloat(regular3);
                    console.log("Price : "+regular3);
                    discount3=parseFloat(discount3);
                    console.log("Discount : "+discount3);
                    var calcPerc3= (regular3*discount3)/100;
                    
                    
                    console.log("Percentage"+calcPerc3);
                    calcPerc3=regular3-calcPerc3;
                    console.log("Afer Deducting Sale Percentage"+calcPerc3)
                    amount3.innerHTML="$"+calcPerc3.toFixed(2);
                   
                </script>
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
                                 <p class="price">  <span class="price-new"  id="amount4_{{$product->id}}"></span> 
                                 <span class="price-old">
                                 <input type="hidden" id="regular4_{{$product->id}}" value="{{ $product->price1_weight }}">    
                                    $ {{ $product->price1_weight }}</span> 
                                    </p>
                                 <div class="box-label">
                                     
                                    <div><span class="pro-label sale">
                                    <input type="hidden" id="discount4_{{$product->id}}" value="{{ $product->discount }}">
                                                                     - {{ $product->discount }}%</span></div>
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
                 <script>
                      
                    var regular4=document.getElementById("regular4_{{$product->id}}").value;
                    var discount4=document.getElementById("discount4_{{$product->id}}").value;
                    var amount4=document.getElementById("amount4_{{$product->id}}");
                   
                    
                    regular4=parseFloat(regular4);
                    console.log("Price : "+regular4);
                    discount3=parseFloat(discount4);
                    console.log("Discount : "+discount4);
                    var calcPerc4= (regular4*discount4)/100;
                    
                    
                    console.log("Percentage"+calcPerc4);
                    calcPerc4=regular4-calcPerc4;
                    console.log("Afer Deducting Sale Percentage"+calcPerc4)
                    amount4.innerHTML="$"+calcPerc4.toFixed(2);
                   
                </script>
                @endforeach
                <!--end of Mobile layout-->
            </div>
            <div class="tool-bar-bottom">
               <div class="row p-5">
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