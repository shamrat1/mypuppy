<div class="pt-menu mobile-menu hidden-lg  " id="pt-menu-1432">
   <input type="hidden" id="menu-effect-1432" class="menu-effect" value="none" />
   <div class="pt-menu-bar">
      <i class="ion-android-menu" aria-hidden="true"></i>
      <i class="ion-android-close" aria-hidden="true"></i>
   </div>
   <ul class="ul-top-items">
      <li class="menu-mobile-title">
         <h3>Mobile Menu</h3>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/') }}">
         <span>Home</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/sale') }}">
         <span>On Sale</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/new') }}">
         <span>New Arrivals</span>
         </a>
      </li>
      <?php  $menuCategories = App\Models\Category::orderBy('id','ASC')->get(); ?> 

      @foreach ($menuCategories as $category)
      
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ route('shop_category',$category->id) }}">
         <span>{{ $category->category_name }}</span>
         </a>
         <span class="top-click-show a-click-show">
         <i class="ion-ios-arrow-down" aria-hidden="true"></i>
         <i class="ion-ios-arrow-up" aria-hidden="true"></i>
         </span>
         <div class="sub-menu-container">
            <ul class="ul-second-items">
                
                <li class="li-second-items">
                    <a href="{{ url('/new-category',$category->id) }}"><span class="a-second-title">New Arrivals</span></a>
                </li>
                <li class="li-second-items">
                    <a href="{{ url('/sale-category',$category->id) }}"><span class="a-second-title">On Sale</span></a>
                </li>
                <?php 
                    $menuSubcategories= App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get(); 
                ?>
                @foreach($menuSubcategories as $subcategory)

               <li class="li-second-items">
                  <a href="{{ route('subcategory_shop',['categorySlug'=>$category->slug,'subcategorySlug'=>$subcategory->slug]) }}" class="a-second-link a-item">
                  <span class="a-second-title">{{ $subcategory->subcategoryname }}</span>
                  </a>
                  <span class="second-click-show a-click-show">
                  <i class="ion-ios-arrow-down" aria-hidden="true"></i>
                  <i class="ion-ios-arrow-up" aria-hidden="true"></i>
                  </span>
                  <?php $menuSubcategory_types = App\Models\SubCategoryType::where('subcategory_id',$subcategory->id)->orderBy('id','ASC')->get();  ?>
                  <div class="flyout-third-items">
                     <ul class="ul-third-items">
                         @foreach($menuSubcategory_types as $subcategory_type)
                        <li class="li-third-items">
                           <a href="{{ route('subcategorytype_shop',['categorySlug'=>$category->slug,'subcategorySlug'=>$subcategory->slug,'subcategorytypeSlug'=>$subcategory_type->slug]) }}" class="a-third-link"><span class="a-third-title">{{ $subcategory_type->subcategory_type }}</span></a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </li>
      @endforeach
       <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/services') }}">
         <span>Our Services</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/new-pet-guides') }}">
         <span>New Pet Guides</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/resource-center') }}">
         <span>Resource Center</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/rewards') }}">
         <span>Earn Rewards</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/affiliation-program') }}">
         <span>Affiliate Program</span>
         </a>
      </li>
      <li class="li-top-item ">
         <a class="a-top-link a-item" href="{{ url('/service-partners') }}">
         <span>Service Partner</span>
         </a>
      </li>
   </ul>
</div>