
<div class="header-bottom fluid-width">
                        <div class="container">
                           <div class="container-inner">
                              <div class="col-ver">
                                 
                                 <div class="pt-menu vertical-menu visible-lg " id="pt-menu-6167" >
                                     <input type="hidden" id="menu-effect-6163" class="menu-effect" value="none">
                                    <div class="pt-menu-bar open" style="color:#fff;">
                                       <div class="text-vertical-bar"><a href="javascript:void(0);" style="color:#fff;"><span>All Categories</span></a></div>                                       
                                    </div>
                                    <?php $categories= App\Models\Category::orderBy('id','ASC')->get(); ?> 
                                    @include('layouts.mainMenuBar')
                                 </div>
                              </div>
                              <div class="col-hoz"> 
                                 <div class="pt-menu horizontal-menu pt-menu-bar visible-lg  " id="pt-menu-6355">
                                    <input type="hidden" id="menu-effect-6355" class="menu-effect" value="none" />
                                    <ul class="ul-top-items">
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('/') }}">
                                          <span>Home</span>
                                          </a>
                                       </li>
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('resource-center') }}">
                                          <span>Resource Center</span>
                                          <i class="ion-ios-arrow-down" style="padding:3px;" aria-hidden="true"></i>
                                          </a>
                                          <!-- Mega Menu -->
                                          <div class="mega-menu-container sub-menu-container left " style="width: 1140px;z-index: 9999 !important;margin-left: -25rem!important;">
                                             <div class="row">
                                             <?php $blogs=App\Models\Blog::OrderBy('blog_name','ASC')->get(); ?>
                                             @foreach($blogs as $blog)
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ route('resource_center_blog',$blog->slug) }}">
                                                         <img src="{{ asset($blog->image_path) }}" class="imgResCenter" alt="blog-page-left-column"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $blog->blog_name }}</h4>
                                                </div>
                                             @endforeach    
                                             </div>
                                          </div>
                                          <!-- Flyout Menu -->
                                       </li>
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('new-pet-guides') }}">
                                          <span>New Pet Guides</span>
                                          <i class="ion-ios-arrow-down" style="padding:3px;" aria-hidden="true"></i>
                                          </a>
                                          <!-- Mega Menu -->
                                          <div class="mega-menu-container sub-menu-container left " style="width: 1140px;margin-left: -38rem !important;">
                                             <div class="row">
                                             <?php $petGuide = App\Models\PetGuide::findOrFail(1); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('new-dog-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                                <?php $petGuide = App\Models\PetGuide::findOrFail(2); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('new-cat-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                                <?php $petGuide = App\Models\PetGuide::findOrFail(3); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('reptile-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                                <?php $petGuide = App\Models\PetGuide::findOrFail(4); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('bird-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                                <?php $petGuide = App\Models\PetGuide::findOrFail(5); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('saltwater-fish-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                                <?php $petGuide = App\Models\PetGuide::findOrFail(6); ?>
                                                <div class="col-md-4 sub-item2-content" data-cols="4">
                                                   <div class="pt-block">
                                                      <div class="image"><a href="{{ url('new-rabbit-guide') }}">
                                                         <img src="{{ asset($petGuide->image_path) }}" class="imgResCenter" alt="{{ $petGuide->petGuide_name }}"></a></div>
                                                   </div>
                                                   <h4 class="html-title1">{{ $petGuide->petGuide_name }}</h4>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Flyout Menu -->
                                       </li>
                                       
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('shop') }}">
                                          <span>My Store</span>
                                          <i class="ion-ios-arrow-down" style="padding:3px;" aria-hidden="true"></i>
                                          </a>
                                          <!-- Mega Menu -->
                                          <!-- Flyout Menu -->
                                          <div class="flyout-menu-container sub-menu-container left">
                                             <ul class="ul-second-items">
                                                <li class="li-second-items">
                                                   <a href="{{ url('new') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">New Arrivals</span>
                                                   <i class="ion-ios-arrow-right" style="padding:3px;" aria-hidden="true"></i>
                                                   </a>
                                                <div class="flyout-third-items left">
                                                   <ul class="ul-third-items">
                                                      @foreach ($categories as $category)
                                                      <li class="li-third-items">
                                                         <a href="{{ url('new-category',$category->slug) }}" class="a-third-link">
                                                            <span class="a-third-link"> <span class="a-third-title">{{ $category->category_name }}</span>  </span>
                                                          </a>
                                                      </li>
                                                      @endforeach
                                                      
                                                   </ul>
                                                </div>
                                             </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('sale') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">On Sale</span>
                                                   <i class="ion-ios-arrow-right" style="padding:3px;" aria-hidden="true"></i>
                                                </a>
                                             <div class="flyout-third-items left">
                                                <ul class="ul-third-items">
                                                   @foreach ($categories as $category)
                                                   <li class="li-third-items">
                                                      <a href="{{ url('sale-category',$category->slug) }}" class="a-third-link">
                                                         <span class="a-third-link"> <span class="a-third-title">{{ $category->category_name }}</span>  </span>
                                                       </a>
                                                   </li>
                                                   @endforeach
                                                   
                                                </ul>
                                             </div>
                                          </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/monthly-sales') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Monthly Sale</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('best-selling-products') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Best Selling Product</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>
                                       
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('services') }}">
                                          <span>Services</span>
                                          <i class="ion-ios-arrow-down" style="padding:3px;" aria-hidden="true"></i>
                                          </a>
                                          <!-- Mega Menu -->
                                          <!-- Flyout Menu -->
                                          <div class="flyout-menu-container sub-menu-container left">
                                             <ul class="ul-second-items">
                                                <li class="li-second-items">
                                                   <a href="{{ url('/dog-training') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Dog Training</span>
                                                   <i class="icon-more-right ion-ios-arrow-right" aria-hidden="true"></i>
                                                   </a>
                                                   <div class="flyout-third-items left">
                                                      <ul class="ul-third-items">
                                                         <li class="li-third-items">
                                                            <a href="{{ url('/in-store-dog-training') }}" class="a-third-link"><span class="a-third-title">InStore Dog Training</span></a>
                                                         </li>
                                                         <li class="li-third-items">
                                                            <a href="{{ asset('/online-dog-training-courses') }}" class="a-third-link"><span class="a-third-title">Online Dog Training</span></a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/dog-grooming') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Dog Grooming</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/veterinary-service') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Veterinary Services</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/adoptions') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Adoptions</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/vital-care') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Vital Care</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/diy-dog-wash') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">DIY Dog wash</span>
                                                   </a>
                                                </li>
                                                <li class="li-second-items">
                                                   <a href="{{ url('/repair-service') }}" class="a-second-link a-item">
                                                   <span class="a-second-title">Repair service</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>

                                       
                                       
                                       <li class="li-top-item left " style="float: left">
                                          <a class="a-top-link" href="{{ url('rewards') }}">
                                          <span>Rewards</span>
                                          </a>
                                       </li>
                                       <li class="li-top-item left" style="float: left">
                                       <a class="a-top-link" href="{{ url('affiliate-program') }}">
                                       <span>Affiliate</span>
                                       </a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                             
                           </div>
                        </div>
                     </div>