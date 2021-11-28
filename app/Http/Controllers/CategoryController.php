<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\NewProd;
use App\Models\Favourite;
use App\Models\MonthlySale;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryType;

class CategoryController extends Controller
{
    public function myShop()
    {
        $products = Product::orderBy('name','ASC')->paginate(100);
    	return view('MyStores.shop',compact('products'));
    }
     public function sortShop($sort)
    {
         
         if($sort=="asc")
        {
           
            $products = Product::orderBy('name','ASC')->paginate(100);
        }
        else if($sort=="desc")
        {
            $products = Product::orderBy('name','DESC')->paginate(100);
        }
        else if($sort=="price:low-to-high")
        {
            $products = Product::orderBy('price1_weight','ASC')->paginate(100);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::orderBy('price1_weight','DESC')->paginate(100);
        }
        return view('MyStores.shop',compact('products'));
    }
    
   public function newCollections()
   {
       $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->paginate(30);
        
    	return view('MyStores.newShop',compact('products'));
    }
     public function newCollectionsByCategory($slug)
   {
       $myCategory=Category::where('slug',$slug)->first();
       $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->where('category',$myCategory->id)->paginate(30);
        
    	return view('MyStores.newShopCategory',compact('products','myCategory'));
    }
     public function newSortCollectionsByCategory($slug,$sort)
     {
         $myCategory=Category::where('slug',$slug)->first();
        
        if($sort=="asc")
        {
          $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->where('category',$myCategory->id)->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->where('category',$myCategory->id)->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->where('category',$myCategory->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->where('category',$myCategory->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(30);
        }
        
         	return view('MyStores.newShopCategory',compact('products','myCategory'));
     }
    public function saleCollections()
   {
       $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->paginate(30);
        
    	return view('MyStores.sale',compact('products'));
    }
    
    public function saleCollectionsByCategory($slug)
   {
        $myCategory=Category::where('slug',$slug)->first();
       $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->where('category',$myCategory->id)->paginate(30);
       
    	return view('MyStores.saleCategoryShop',compact('products','myCategory'));
    }
    public function saleSortCollectionsByCategory($slug,$sort)
    {
        $myCategory=Category::where('slug',$slug)->first();
        if($sort=="asc")
        {
          $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->where('category',$myCategory->id)->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->where('category',$myCategory->id)->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->where('category',$myCategory->id)
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->where('category',$myCategory->id)
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(30);
        }
        return view('MyStores.saleCategoryShop',compact('products','myCategory'));
    }
    public function monthlySalesCollections()
   {
       $products= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')->paginate(30);
        
    	return view('MyStores.monthlySaleShop',compact('products'));
    }
    
    public function myCategories($slug)
    {
        $category = Category::where('slug', $slug)->first();
        
        $products = Product::query()->where('category','LIKE', $category->id)->orderBy('name','ASC')->paginate(30);

        return view('MyStores.product-grid',compact('products','category'));
    }
  
    public function SubCategoryShop($categorySlug,$subcategorySlug)
    {
        
        
        $selectCategory = Category::where('slug', $categorySlug)->first();
        $selectSubcategory = SubCategory::where('slug', $subcategorySlug)->first();
        
        $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                    ->where('subcategory','LIKE', $selectSubcategory->id)
                                    ->orderBy('name','ASC')
                                    ->paginate(30);

        return view('MyStores.subcategoryshop',compact('products','selectCategory','selectSubcategory'));
    }
    
    public function SubCategoriesTypeShop($categorySlug,$subcategorySlug,$subcategorytypeSlug)
    {
        $selectCategory = Category::where('slug', $categorySlug)->first();
        $selectSubCategory = SubCategory::where('slug', $subcategorySlug)->first();
        $selectSubCategorytype= SubCategoryType ::where('slug', $subcategorytypeSlug)->first();

        $products = Product::query()->where('category','LIKE', $selectCategory->id)
                                    ->where('subcategory','LIKE', $selectSubCategory->id)
                                    ->where('subcategory_type','LIKE', $selectSubCategorytype->id)
                                    ->orderBy('name','ASC')
                                    
                                    ->paginate(30);

        return view('MyStores.shopBedMatress',compact('products','selectCategory','selectSubCategory','selectSubCategorytype'));
    }
    
    
     public function sortSaleCollections(Request $request,$sort)
     {
         if($sort=="asc")
        {
          $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(30);
        }
    	return view('MyStores.sale',compact('products'));
     }
     public function sortMonthlySaleCollections(Request $request,$sort)
    {
      if($sort=="asc")
        {
          $products= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')
                                        ->orderBy('price1_weight','ASC')
                                        ->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products = MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')
                                        ->orderBy('price1_weight','DESC')
                                        ->paginate(30);
        }
    	return view('MyStores.monthlySaleShop',compact('products'));  
    }
    public function sortNewCollections(Request $request,$sort)
    {
        if($sort=="asc")
        {
            $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->orderBy('price1_weight','DESC')->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products = NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->orderBy('price1_weight','ASC')->paginate(30);
        }
    	return view('MyStores.newShop',compact('products'));
    }
    public function sortShopCollections($sort,$slug)
    {
       $category = Category::where('slug', $slug)->first();
        if($sort=="asc")
        {
            $products = Product::query()->where('category','LIKE', $category->id)->orderBy('name','ASC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $category->id)->orderBy('name','DESC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="price:low-to-high")
        {
           $products= Product::query()->where('category','LIKE', $category->id)->orderBy('price1_weight','ASC')->paginate(30);
           return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $category->id)->orderBy('price1_weight','DESC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        
    }
    public function sortCategoryCollection($sort,$id)
    {
        $category = Category::findOrFail($id);
        if($sort=="asc")
        {
            $products = Product::query()->where('category','LIKE', $id)->orderBy('name','ASC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="desc")
        {
            $products = Product::query()->where('category','LIKE', $id)->orderBy('name','DESC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="price:low-to-high")
        {
           $products= Product::query()->where('category','LIKE', $id)->orderBy('price1_weight','ASC')->paginate(30);
           return view('MyStores.product-grid',compact('products','category'));
        }
        else if($sort=="price:high-to-low")
        {
            $products = Product::query()->where('category','LIKE', $id)->orderBy('price1_weight','DESC')->paginate(30);
            return view('MyStores.product-grid',compact('products','category'));
        }
        
    }
    
    public function bestSellerCollections()
   {
       $products= Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->paginate(30);
        
    	return view('MyStores.bestSeller',compact('products'));
    }
    
    public function sortBestSellerCollections(Request $request,$sort)
    {
        if($sort=="asc")
        {
            $products= Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->orderBy('name','ASC')->paginate(30);
        }
        else if($sort=="desc")
        {
            $products= Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->orderBy('name','DESC')->paginate(30);
        }
        else if($sort=="price:low-to-high")
        {
           $products= Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->orderBy('price1_weight','DESC')->paginate(30);
        }
        else if($sort=="price:high-to-low")
        {
            $products = Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->orderBy('price1_weight','ASC')->paginate(30);
        }
    	return view('MyStores.bestSeller',compact('products'));
    }
    
    public function search(Request $request)
    {
        
       // dd($request->all());
             $products = Product::query()
                ->where("name","LIKE","%{$request->myData}%")
                ->paginate(30);
            
        return view('MyStores.shop',compact('products'));
        
    }
    public function singleEquipment($slug)
    {
        
        $product= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')
                                ->where('products.slug',$slug)
                                ->get();
        if($product->isEmpty())
        {
            $product= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')
                                ->where('products.slug',$slug)
                                ->get();
            if($product->isEmpty())
            {
                $product = Product::where('products.slug',$slug)->first();
                return view('MyStores.singleEquipment', compact('product'));
            }
            else
            {
                return view('MyStores.SaleProductDetails',compact('product'));
            }
        }
        else
        {
            return view('MyStores.SaleProductDetails',compact('product'));
        }   
    }
    


    //shopping cart 
    public function cart()
    {
        return view('Webpages.cart');
    }

    public function addToCart(Request $request,$id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');
        //print_r($request->all());
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => $request->quantity,
                        "price" => $request->price,
                        "image_path" => $product->image_path
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', '✔ Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', '✔ Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "image_path" => $product->image_path
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addToCartSale(Request $request,$id,$price)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');
        //print_r($request->all());
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => $request->quantity,
                        "price" => $price,
                        "image_path" => $product->image_path
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', '✔ Product added to cart successfully!');
        }

        

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $price,
            "image_path" => $product->image_path
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    protected function setSessionAndReturnResponse($cart)
    {
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', "Added to Cart");
    }

    public function changeQty(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        if ($request->change_to === 'down') {
            if (isset($cart[$product->id])) {
                if ($cart[$product->id]['quantity'] > 1) {
                    $cart[$product->id]['quantity']--;
                    return $this->setSessionAndReturnResponse($cart);
                } else {
                    return $this->removeFromCart($product->id);
                }
            }
        } else {
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
                return $this->setSessionAndReturnResponse($cart);
            }
        }

        return redirect()->back()->with('success', '✔ Cart updated successfully!');
    }

    public function IncUpdate(Request $request,$id)
    {
         // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', '✔ Cart updated successfully!');

        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

  
    
   
}
