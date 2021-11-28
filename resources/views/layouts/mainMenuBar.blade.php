<style>
    #DeskNavBar{
        display: none;
    }
</style>

<ul class="ul-top-items" id="DeskNavBar">
    @foreach ($categories as $category)
      <li class="li-top-item left  ">
         <a class="a-top-link a-item" href="{{ route('shop_category',$category->slug) }}">
         <span>{{ $category->category_name }}</span>
         
            <i class="@if($category->id != '') icon-more-right ion-ios-arrow-right @endif" aria-hidden="true"></i>
         
         </a>
         <!-- Mega Menu -->
         <!-- Flyout Menu -->
         <div class="flyout-menu-container sub-menu-container left" style="display: none;">
            <ul class="ul-second-items">
                <?php $subcategories= App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get(); ?> 
                @foreach($subcategories as $subcategory)
               <li class="li-second-items">
                  <a href="{{ route('subcategory_shop',['categorySlug'=>$category->slug,'subcategorySlug'=>$subcategory->slug]) }}" class="a-second-link a-item">
                  <span class="a-second-title">{{ $subcategory->subcategoryname }} </span>
                 
                    <i  class="@if($subcategory->id != '') icon-more-right ion-ios-arrow-right @endif" aria-hidden="true"></i>
                  
                  </a>
                  <div class="flyout-third-items left">
                     <ul class="ul-third-items">
                         <?php $subcategory_types = App\Models\SubCategoryType::where('subcategory_id',$subcategory->id)->orderBy('id','ASC')->get(); ?>
                         @foreach($subcategory_types as $subcategory_type)
                        <li class="li-third-items bg-light">
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
   </ul>


