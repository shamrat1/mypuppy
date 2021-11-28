<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryType;
use App\Models\ProductType;
use App\Models\Offer;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
   
    public function ProductTypeSelection($categorySlug,$subcategorySlug,$subcategorytypeSlug,$producttypeSlug)
    {
        $selectCategory=Category::where('slug','LIKE', $categorySlug)->first();
        $selectSubCategory=SubCategory::where('slug','LIKE', $subcategorySlug)->first();
        $selectSubcategorytype=SubCategoryType::where('slug','LIKE', $subcategorytypeSlug)->first();
        $selectProducttype=ProductType::where('slug','LIKE', $producttypeSlug)->first();

        $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                    ->where('subcategory','LIKE', $selectSubCategory->id)
                                    ->where('subcategory_type','LIKE', $selectSubcategorytype->id)
                                    ->where('product_type','LIKE', $selectProducttype->id)
                                    ->orderBy('name','ASC')
                                    ->paginate(30);
        
       
        return view('MyStores.productTypeShop',compact('products','selectCategory','selectSubCategory','selectSubcategorytype','selectProducttype'));
    }
    public function SortSubCategoriesTypeShop($categorySlug,$subcategorySlug,$subcategorytypeSlug,$sort)
    {
        $selectCategory = Category::where('slug', $categorySlug)->first();
        $selectSubCategory = SubCategory::where('slug', $subcategorySlug)->first();
        $selectSubCategorytype= SubCategoryType ::where('slug', $subcategorytypeSlug)->first();
        
        if($sort=="asc")
        {
           
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubCategorytype->id)
                                        ->orderBy('name','ASC')
                                        ->paginate(100);
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubCategorytype->id)
                                        ->orderBy('name','DESC')
                                        ->paginate(100);
        }
        else if($sort=="price:low-to-high")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubCategorytype->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(100);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubCategorytype->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(100);
        }
        return view('MyStores.shopBedMatress',compact('products','selectCategory','selectSubCategory','selectSubCategorytype'));
    }
    public function SortCategoriesShop($slug,$sort)
    {
        $category = Category::where('slug', $slug)->first();
       
        
        if($sort=="asc")
        {
           
            $products = Product::query()->where('category','LIKE', $category->id)
                                        ->orderBy('name','ASC')
                                        ->paginate(100);
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $category->id)
                                        ->orderBy('name','DESC')
                                        ->paginate(100);
        }
        else if($sort=="price:low-to-high")
        {
            $products = Product::query()->where('category','LIKE', $category->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(100);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $category->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(100);
        }
        return view('MyStores.product-grid',compact('products','category'));
    }
    public function SortSubCategoriesShop($categorySlug,$subcategorySlug,$sort)
    {
        $selectCategory = Category::where('slug', $categorySlug)->first();
        $selectSubcategory = SubCategory::where('slug', $subcategorySlug)->first();
        
        if($sort=="asc")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubcategory->id)
                                        ->orderBy('name','ASC')
                                        ->paginate(100);
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubcategory->id)
                                        ->orderBy('name','DESC')
                                        ->paginate(100);
        }
        else if($sort=="price:low-to-high")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubcategory->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(100);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubcategory->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(100);
        }
        return view('MyStores.subcategoryshop',compact('products','selectCategory','selectSubcategory'));
    }
    public function sortProductTypeSelection($categorySlug,$subcategorySlug,$subcategorytypeSlug,$producttypeSlug,$sort)
    {
        $selectCategory=Category::where('slug','LIKE', $categorySlug)->first();
        $selectSubCategory=SubCategory::where('slug','LIKE', $subcategorySlug)->first();
        $selectSubcategorytype=SubCategoryType::where('slug','LIKE', $subcategorytypeSlug)->first();
        $selectProducttype=ProductType::where('slug','LIKE', $producttypeSlug)->first();

        if($sort=="asc")
        {
           
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubcategorytype->id)
                                        ->where('product_type','LIKE', $selectProducttype->id)
                                        ->orderBy('name','ASC')
                                        ->paginate(100);
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubcategorytype->id)
                                        ->where('product_type','LIKE', $selectProducttype->id)
                                        ->orderBy('name','DESC')
                                        ->paginate(100);
        }
        else if($sort=="price:low-to-high")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubcategorytype->id)
                                        ->where('product_type','LIKE', $selectProducttype->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(100);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                        ->where('subcategory','LIKE', $selectSubCategory->id)
                                        ->where('subcategory_type','LIKE', $selectSubcategorytype->id)
                                        ->where('product_type','LIKE', $selectProducttype->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(100);
        }
        return view('MyStores.productTypeShop',compact('products','selectCategory','selectSubCategory','selectSubcategorytype','selectProducttype'));
    }
    public function couponcode(Request $request) {
        $result=Offer::where(['code'=>$request->code])->get();
        if(isset($result[0])){
            if($result[0]->status==1)
            {
                $min_amt=$result[0]->min_amt;
                
                $status="success";
        	    $msg="Coupon Code is Applied";
            }
            else
            {
                $status="error";
            	$msg="Coupon Code is Expired";
            }
        }
        else
        {
        	$status="error";
        	$msg="Please enter valid coupon code";
        }
        return response()->json(['status'=>$status,'$msg'=>$msg]);
        }
}
