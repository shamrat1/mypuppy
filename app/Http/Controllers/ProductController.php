<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\NewPost;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\SubCategoryType;
use App\Models\ProductType;
use App\Models\Sale;
use App\Models\MonthlySale;
use App\Models\Favourite;
use App\Models\NewProd;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$products = Product::orderBy('id','DESC')->paginate(1000);


    	return view('Admin_Product.products',compact('products'));
    }

    public function create()
    {
    	return view('Admin_Product.product_create');
    }

    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'subcategory_type' => 'required',
            'description' => 'required',
            'weightname1' => 'required',
            'price1_weight'=>'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $input['image_path'] = time().'.'.$request->image_path->getClientOriginalExtension();
        $request->image_path->move(public_path('storage/'), $input['image_path']);


        $input['name'] = $request->name;
        $input['tagname'] = $request->tagname;
        $input['category'] = $request->category;
        $input['subcategory'] = $request->subcategory;
        $input['subcategory_type'] = $request->subcategory_type;
        $input['product_type'] = $request->product_type;
        $input['description'] = $request->description;
        $input['weightname1'] = $request->weightname1;
        $input['weightname2'] = $request->weightname2;
        $input['weightname3'] = $request->weightname3;
        $input['weightname4'] = $request->weightname4;
        $input['weightname5'] = $request->weightname5;
        $input['price1_weight'] = $request->price1_weight;
        $input['price2_weight'] = $request->price2_weight;
        $input['price3_weight'] = $request->price3_weight;
        $input['price4_weight'] = $request->price4_weight;
        $input['price5_weight'] = $request->price5_weight;
        $input['stock1'] = $request->stock1;
        $input['stock2'] = $request->stock2;
        $input['stock3'] = $request->stock3;
        $input['stock4'] = $request->stock4;
        $input['stock5'] = $request->stock5;
        $str = strtolower($request->name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);

        $product = Product::create($input);

        //Notification by mail
    	// if($product)
        // {

        //     $users = User::all();
        //     foreach($users as $user)
        //     {
        //         dispatch(new SendEmailJob($product));
        //     }



        // }
        

         return back()->with('success','Product Created Successfully.');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin_Product.product_edit', compact('product'));
    }



    public function productUpdate(Request $request,$id) {
        
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'subcategory_type' => 'required',
            'description' => 'required',
            'weightname1' => 'required',
            'price1_weight'=>'required',
        ]);
        // $product = Product::findOrFail($id);

        // dd($product);
        //$input = Product::where('id', $product->id)->first();


        if($request->hasFile('image_path'))
        {
            $input['image_path'] = time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }

         
        $input['name'] = $request->name;
        $input['tagname'] = $request->tagname;
        $input['category'] = $request->category;
        $input['subcategory'] = $request->subcategory;
        $input['subcategory_type'] = $request->subcategory_type;
        $input['product_type'] = $request->product_type;
        $input['description'] = $request->description;
        $input['weightname1'] = $request->weightname1;
        $input['weightname2'] = $request->weightname2;
        $input['weightname3'] = $request->weightname3;
        $input['weightname4'] = $request->weightname4;
        $input['weightname5'] = $request->weightname5;
        $input['price1_weight'] = $request->price1_weight;
        $input['price2_weight'] = $request->price2_weight;
        $input['price3_weight'] = $request->price3_weight;
        $input['price4_weight'] = $request->price4_weight;
        $input['price5_weight'] = $request->price5_weight;
        
        
        $str = strtolower($request->name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
       
        // dd($request->all());
        $product = Product::whereId($id)->update($input);
        return back()->with('success','Product Updated Successfully.');
    }

    public function productDelete($id ) {
        Product::find($id)->delete();
        //dd($id);
       $products = Product::orderBy('id','DESC')->paginate(10);


    	return view('products',compact('products'));

    }

      public function gallery($id)
    {
        //Update Product count
        $product = Product::findOrFail($id);
        return view('Admin_Product.productGallery', compact('product'));

    }


    public function Gallery_Update(Request $request,$id) {
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
            $product = Product::whereId($id)->update($input);
            return back()->with('success','Image Updated Successfully.');

        }

          if($request->hasFile('image_path1'))
        {
            $input['image_path1'] = time().'.'.$request->image_path1->extension();
            $saveimage01 = $request->image_path1->move(public_path('storage/'), $input['image_path1']);
            $product = Product::whereId($id)->update($input);
            return back()->with('success','Gallery Image-1 Updated Successfully.');

        }
          if($request->hasFile('image_path2'))
        {
            $input['image_path2'] = time().'.'.$request->image_path2->extension();
            $saveimage02 = $request->image_path2->move(public_path('storage/'), $input['image_path2']);
            $product = Product::whereId($id)->update($input);
            return back()->with('success','Gallery Image-2 Updated Successfully.');
        }
          if($request->hasFile('image_path3'))
        {
            $input['image_path3'] = time().'.'.$request->image_path3->extension();
            $saveimage03 = $request->image_path3->move(public_path('storage/'), $input['image_path3']);
            $product = Product::whereId($id)->update($input);
            return back()->with('success','Gallery Image-3 Updated Successfully.');
        }
    }
    public function prod_size($id)
    {
        //Update Product count
        $product = Product::findOrFail($id);
        return view('Admin_Product.product_size', compact('product'));

    }
      public function size_update(Request $request,$id) {
            
            $input['size_measure'] = $request->size_measure;
            $input['one_size'] = $request->one_size;
            $input['dimension_name1'] = $request->dimension_name1;
            $input['dimension_name2'] = $request->dimension_name2;
            $input['dimension_name3'] = $request->dimension_name3;
            $input['dimension_name4'] = $request->dimension_name4;
            $input['dimension_name5'] = $request->dimension_name5;
            $input['dimension_name1Small'] = $request->dimension_name1Small;
            $input['dimension_name2Small'] = $request->dimension_name2Small;
            $input['dimension_name3Small'] = $request->dimension_name3Small;
            $input['dimension_name4Small'] = $request->dimension_name4Small;
            $input['dimension_name5Small'] = $request->dimension_name5Small;
            $input['dimension_name1Medium'] = $request->dimension_name1Medium;
            $input['dimension_name2Medium'] = $request->dimension_name2Medium;
            $input['dimension_name3Medium'] = $request->dimension_name3Medium;
            $input['dimension_name4Medium'] = $request->dimension_name4Medium;
            $input['dimension_name5Medium'] = $request->dimension_name5Medium;
            $input['dimension_name1Large'] = $request->dimension_name1Large;
            $input['dimension_name2Large'] = $request->dimension_name2Large;
            $input['dimension_name3Large'] = $request->dimension_name3Large;
            $input['dimension_name4Large'] = $request->dimension_name4Large;
            $input['dimension_name5Large'] = $request->dimension_name5Large;
            $input['dimension_name1XLarge'] = $request->dimension_name1XLarge;
            $input['dimension_name2XLarge'] = $request->dimension_name2XLarge;
            $input['dimension_name3XLarge'] = $request->dimension_name3XLarge;
            $input['dimension_name4XLarge'] = $request->dimension_name4XLarge;
            $input['dimension_name5XLarge'] = $request->dimension_name5XLarge;
            $input['dimension_name1XXLarge'] = $request->dimension_name1XXLarge;
            $input['dimension_name2XXLarge'] = $request->dimension_name2XXLarge;
            $input['dimension_name3XXLarge'] = $request->dimension_name3XXLarge;
            $input['dimension_name4XXLarge'] = $request->dimension_name4XXLarge;
            $input['dimension_name5XXLarge'] = $request->dimension_name5XXLarge;
            $input['medium'] = $request->medium;
            $input['large'] = $request->large;
            $input['extra_large'] = $request->extra_large;
            $input['double_x_large'] = $request->double_x_large;
            $input['size_desc'] = $request->size_desc;
            $input['instructions'] = $request->instructions;
            
           
            $input['material'] = $request->material;
            // dd($input['material']);
            
            $product = Product::whereId($id)->update($input);
           return back()->with('success','size Updated Successfully.');
      } 
    public function show($id)
    {
        //Update Product count
        $product = Product::findOrFail($id);
        return view('Admin_Product.product_show', compact('product'));

    }
    public function  addtoWishlist($id)
    {
        //dd($id,Auth::user()->id);

          //Check if this user has already in wishlist list
          $userHasLiked = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->get()->count() > 0 ? true : false;

          if(!$userHasLiked){
              $liked = Wishlist::create([
                  'product_id' => $id,
                  'user_id' => Auth::user()->id,
                  'wishlist' => 1                
              ]);
          }
        
            
        return  redirect()->back()->with('success', 'Added to Wishlist!');
    }
    public function deletefromWishlist($id)
    {
        $userHasLiked = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->get()->count() > 0 ? true : false;
        
          //Check if this user has already in Wishlist
      
          if($userHasLiked){
              
            Wishlist::where('user_id', Auth::user()->id)
                        ->where('product_id', $id)
                        ->delete();
        }
        
        return redirect()->back()->with('success', 'Removed from wishlist!');
    }
    public function getWishlist()
    {
        
        $wishlists= Wishlist::leftJoin('products', 'products.id', '=', 'wishlists.product_id')
                                        ->where('wishlists.user_id','=',Auth::user()->id)
                                        ->get();
        return view('Webpages.wishlist', compact('wishlists'));
        
    }
    public function subcategorytypeDropdown(Request $request)
    {
        
        $subcateogryType = SubCategoryType::select('id as subcategory_type_id','subcategory_id','subcategory_type')
                                            ->where('subcategory_id',$request->subcategory_id)
                                            ->get()->toArray();
        return response()->json(['data' => $subcateogryType]);
        
    }
    public function productTypeDropdown(Request $request)
    {
        // dd($request->all());
        $productType = ProductType::select('id as product_type_id','subcategoryType_id','product_type')
                                            ->where('subcategoryType_id',$request->subcategoryType_id)
                                            ->get()->toArray();
        return response()->json(['data' => $productType]);
        
    }
    public function getProdFavourites()
    {
        
        $sales= Sale::leftJoin('products', 'products.id', '=', 'sales.sale_id')->get();
        return view('productList_admin.salesList_admin', compact('sales'));
        
    }
    public function  addProdSale($id)
    {
        //dd($id,Auth::user()->id);

          //Check if this user has already in sale list
          $userHasLiked = Sale::where('sale_id', $id)->get()->count() > 0 ? true : false;

          if(!$userHasLiked){
              $liked = Sale::create([
                  'sale_id' => $id,
                  'discount' => "10",
                  'sale' => 1                
              ]);
          }
        
            
        return  redirect()->back()->with('success', 'Product Added to Sale list successfully!');
    }
    public function deleteProdSale($id)
    {
        
        $userHasLiked = Sale::where('sale_id', $id)->get()->count() > 0 ? true : false;
        
        
          //Check if this user has already in sale list
      
          if($userHasLiked){
              
            Sale::where('sale_id', $id)
                        ->delete();
        }
        //dd($id,Auth::user()->id,$userHasLiked);
        return redirect()->back()->with('success', 'Product Removed from Sales Successfully!');
    }
    
    public function updateSaleDiscount(Request $request)
    {
        $id = $request->saleId;
        
        
        $input['discount'] = $request->discount;
        
        Sale::whereId($id)->update($input);
        
        
        return back()->with('success', 'Discount Percentage Updated Successfully');
    }
    public function  addProdFavourites($id)
    {
        //dd($id,Auth::user()->id);

          //Check if this user has already in sale list
          $userHasLiked = Favourite::where('fav_id', $id)->get()->count() > 0 ? true : false;

          if(!$userHasLiked){
              $liked = Favourite::create([
                  'fav_id' => $id,
                  'favourite' => 1                
              ]);
          }
        
            
        return  redirect()->back()->with('success', 'Product Added to Best Selling list successfully!');
    }
    public function deleteProdFavourites($id)
    {
        
        $userHasLiked = Favourite::where('fav_id', $id)->get()->count() > 0 ? true : false;
        
        
          //Check if this user has already in sale list
      
          if($userHasLiked){
              
            Favourite::where('fav_id', $id)
                        ->delete();
        }
        //dd($id,Auth::user()->id,$userHasLiked);
        return redirect()->back()->with('success', 'Product Removed from Best Selling Successfully!');
    }
    public function getProdSellingList()
    {
        $favourites= Favourite::leftJoin('products', 'products.id', '=', 'favourites.fav_id')->get();
        return view('productList_admin.bestSelling_admin', compact('favourites'));
    }
    
    
    public function addProdMonthlySales($id)
    {
        $userHasLiked = MonthlySale::where('sale_id', $id)->get()->count() > 0 ? true : false;

        $date = Carbon::now();
  
        $monthName = $date->format('F');
        
          if(!$userHasLiked){
              $liked = MonthlySale::create([
                  'sale_id' => $id,
                  'month_name'=>$monthName,
                  'discount' => "10",
                  'monthlysale' => 1                
              ]);
          }
        
            
        return  redirect()->back()->with('success', 'Product Added to Monthly Sale list successfully!');
    }
    public function deleteProdMonthlySales($id)
    {
        $userHasLiked = MonthlySale::where('sale_id', $id)->get()->count() > 0 ? true : false;
        
        
          //Check if this user has already in sale list
      
          if($userHasLiked){
              
            MonthlySale::where('sale_id', $id)
                        ->delete();
        }
        //dd($id,Auth::user()->id,$userHasLiked);
        return redirect()->back()->with('success', 'Product Removed from Monthly Sales Successfully!');
    }
    public function updateMonthlySaleDiscount(Request $request)
    {
        $id = $request->saleId;
        $input['discount'] = $request->discount;
        MonthlySale::whereId($id)->update($input);
        return back()->with('success', 'Discount Percentage Updated Successfully');
    }
    public function getProdMonthlySales()
    {
        
        $monthlysales= MonthlySale::leftJoin('products', 'products.id', '=', 'monthly_sales.sale_id')->get();
        return view('productList_admin.monthlySaleList_admin', compact('monthlysales'));
        
    }
    public function getNewProductsList()
    {
         $newproducts=NewProd::leftJoin('products', 'products.id', '=', 'new_prods.new_id')->get();
        return view('productList_admin.newProductList_admin',compact('newproducts'));
    }
    public function addNewProdList($id)
    {
        $userHasLiked = NewProd::where('new_id', $id)->get()->count() > 0 ? true : false;

          if(!$userHasLiked){
              $liked = NewProd::create([
                  'new_id' => $id,
                  'status' => 1                
              ]);
          }
        
            
        return  redirect()->back()->with('success', 'Product Added to New Product list successfully!');
    }
    public function deleteNewProdList($id)
    {
        $userHasLiked = NewProd::where('new_id', $id)->get()->count() > 0 ? true : false;
        
          //Check if this user has already in sale list
      
          if($userHasLiked){
              
            NewProd::where('new_id', $id)
                        ->delete();
        }
        //dd($id,Auth::user()->id,$userHasLiked);
        return redirect()->back()->with('success', 'Product Removed from New Product List Successfully!');
    }
}
