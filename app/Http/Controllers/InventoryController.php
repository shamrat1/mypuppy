<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);

    	return view('Admin_Product.inventory',compact('products'));
        
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin_Product.inventory_edit', compact('product'));
        
    }
    public function inventory_update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $input['status1'] = $request->status1;
        $input['stock1'] = $request->stock1;
        $input['status2'] = $request->status2;
        $input['stock2'] = $request->stock2;
        $input['status3'] = $request->status3;
        $input['stock3'] = $request->stock3;
        $input['status4'] = $request->status4;
        $input['stock4'] = $request->stock4;
        $input['status5'] = $request->status5;
        $input['stock5'] = $request->stock5;
        
        
        $product = Product::whereId($id)->update($input);

        $products = Product::orderBy('id','DESC')->paginate(100);

    	return view('Admin_Product.inventory',compact('products'))
    		->with('success','Inventory Updated Successfully.');
        
    }
}
