<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\SubCategoryType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function subcategories()
    {
        return view('Admin_Filters.subcategories');
    }
    public function addsubCategory()
    {
        return view('Admin_Filters.subcategory_create');
    }
    public function saveSubCategory(Request $request)
    {
        $this->validate($request, [
            'subcategoryname' => 'required',
            'category_id'=>'required',
        ]);
            $input['subcategoryname'] = $request->subcategoryname;
            $input['category_id'] = $request->category_id;
            $str = strtolower($request->subcategoryname);
            $input['slug'] = preg_replace('/\s+/', '-', $str);
            SubCategory::create($input);
            return back()->with('success', 'Sub-Category Created Successfully');
    }
    public function updateSubCategories(Request $request)
        {
                $this->validate($request, [
                        'subcategoryname'=>'required',
                        'category_id'=>'required',
                    ]);

                    $id = $request->subcat_id;
                    $input['subcategoryname'] = $request->subcategoryname;
                    $input['category_id'] = $request->category_id;
                    $str = strtolower($request->subcategoryname);
                    $input['slug'] = preg_replace('/\s+/', '-', $str);
                    SubCategory::whereId($id)->update($input);

                return back()->with('success', 'Sub-Category Updated Successfully');
        }
            public function saveSubCategoryType(Request $request)
            {
                $this->validate($request, [
            		'subcategory_type' => 'required',
                ]);

                    $input['subcategory_id'] = $request->subcategory_id;
                    $input['subcategory_type'] = $request->subcategory_type;
                    $str = strtolower($request->subcategory_type);
                    $input['slug'] = preg_replace('/\s+/', '-', $str);
                    SubCategoryType::create($input);
                    return back()->with('success', 'SubCategory-Type Created Successfully');
            }
            
             public function subCategoryTypesCRUD()
            {
               return view('Admin_Filters.subCategoryTypesCRUD');
            }
             
             public function subcategoryTypes()
            {
                return view('Admin_Filters.subCategoryType_Admin');
            }
            public function updateSubCategoryType(Request $request)
            {
                $this->validate($request, [
                    'subcategoryType_id'=>'required',
            		'subcategory_id' => 'required',
            		'subcategory_type'=>'required'
                ]);
                $id = $request->subcategoryType_id;
                $input['subcategory_id'] = $request->subcategory_id;
                $input['subcategory_type'] = $request->subcategory_type;
                $str = strtolower($request->subcategory_type);
                $input['slug'] = preg_replace('/\s+/', '-', $str);
                SubCategoryType::whereId($id)->update($input);
                return back()->with('success', 'SubCategory-Type Updated Successfully');
            }
            public function productTypes()
            {
               return view('Admin_Filters.productType');
            }
            public function addproductType()
            {
                return view('Admin_Filters.productType_create');
            }
            public function saveproductType(Request $request)
            {
                $this->validate($request, [
            		'product_type' => 'required',
            		'subcategoryType_id'=>'required'
                ]);
                    $input['subcategoryType_id'] = $request->subcategoryType_id;
                    $input['product_type'] = $request->product_type;
                    $str = strtolower($request->product_type);
                    $input['slug'] = preg_replace('/\s+/', '-', $str);
                    ProductType::create($input);
                    return back()->with('success', 'Product-Type Created Successfully');
            }
            public function updateproducttype(Request $request)
            {
                $this->validate($request, [
            		'product_type' => 'required',
            		'subcategoryType_id'=>'required'
                ]);
                $id = $request->product_type_id;
                $input['subcategoryType_id'] = $request->subcategoryType_id;
                    $input['product_type'] = $request->product_type;
                    $str = strtolower($request->product_type);
                    $input['slug'] = preg_replace('/\s+/', '-', $str);
                    ProductType::whereId($id)->update($input);
                    return back()->with('success', 'Product-Type Updated Successfully');
                
            }
            
}
