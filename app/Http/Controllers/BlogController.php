<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogFAQ;
use App\Models\BlogInformation;
use App\Models\BlogType;
use App\Models\ResourceCenter;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogCategories()
    {
        
        return view('ResourceCenter_Admin.blogcategories');
    }
    public function addBlogCategory()
    {
        return view('ResourceCenter_Admin.blog_category_create');
    }
    public function saveBlogCategory(Request $request)
    {
        
    	$this->validate($request, [
    		'blog_name' => 'required',
            'blog_description' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $input['image_path'] = 'storage/'.time().'.'.$request->image_path->getClientOriginalExtension();
        $request->image_path->move(public_path('storage/'), $input['image_path']);
        $input['blog_name'] = $request->blog_name;
        $input['blog_description'] = $request->blog_description;
        $str = strtolower($request->blog_name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
        $blog = Blog::create($input);
        return back()->with('success','Blog Category Created Successfully.');
    }
    public function updateBlogCategory(Request $request)
    {
        $this->validate($request, [
            'blog_id'=>'required',
    		'blog_name' => 'required',
            'blog_description' => 'required',
            
        ]);
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        if($request->hasFile('image_path1'))
        {
            $input['image_path1'] = 'storage/'.time().'.'.$request->image_path1->extension();
            $saveimage = $request->image_path1->move(public_path('storage/'), $input['image_path1']);

        }
        $id=$request->blog_id;
        $input['blog_name'] = $request->blog_name;
        $input['blog_description'] = $request->blog_description;
        $str = strtolower($request->blog_name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
        $blog = Blog::whereId($id)->update($input);
        return back()->with('success','Blog Updated Successfully.');
    }
    public function blogType()
    {
        return view('ResourceCenter_Admin.blogType');
    }
    public function addBlogType()
    {
        return view('ResourceCenter_Admin.blogType_create');
    }
    public function saveBlogType(Request $request)
    {
    	$this->validate($request, [
    		'blogtype_name' => 'required',
        ]);
        $input['image_path'] = 'storage/'.time().'.'.$request->image_path->getClientOriginalExtension();
        $request->image_path->move(public_path('storage/'), $input['image_path']);
        $input['blogtype_name'] = $request->blogtype_name;
        $str = strtolower($request->blogtype_name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
        $blog = BlogType::create($input);
        return back()->with('success','Blog Type Created Successfully.');
    }
    public function updateBlogType(Request $request)
    {
        $this->validate($request, [
            'blogtype_id'=>'required',
    		'blogtype_name' => 'required',
            
        ]);
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        $id=$request->blogtype_id;
        $input['blogtype_name'] = $request->blogtype_name;
        $str = strtolower($request->blogtype_name);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
        $blog = BlogType::whereId($id)->update($input);
        return back()->with('success','Blog Type Updated Successfully.');
    }

    public function blogfaq()
    {
        return view('ResourceCenter_Admin.blog_faq');
    }
    public function AddBlogFaq()
    {
        return view('ResourceCenter_Admin.blogFAQ_Create');
    }
    public function saveBlogFaq(Request $request)
    { 
    	$this->validate($request, [
    		'blog_id' => 'required',
            'ques' => 'required',
            'ans' => 'required',
        ]);
        
        $input['blog_id'] = $request->blog_id;
        $input['ques'] = $request->ques;
        $input['ans'] = $request->ans;
        $blog = BlogFAQ::create($input);
        return back()->with('success','Blog Type Created Successfully.');
    }
    public function updateBlogFaq(Request $request)
    {
        $this->validate($request, [
    		'blog_id' => 'required',
            'ques' => 'required',
            'ans' => 'required',
        ]);
        $id=$request->faq_id;
        $input['blog_id'] = $request->blog_id;
        $input['ques'] = $request->ques;
        $input['ans'] = $request->ans;

        $blog = BlogFAQ::whereId($id)->update($input);
        return back()->with('success','Blog FAQ Created Successfully.');
    }
    public function rcBlogAdmin()
    {
        return view('ResourceCenter_Admin.resourceCenter_Admin');
    }
    public function rcBlogAdminCreate()
    {
        return view('ResourceCenter_Admin.rcAdmin_create');
    }
    public function saveRCBlogAdmin(Request $request)
    {
         
    	$this->validate($request, [
    		'title' => 'required',
            'blog_id' => 'required',
            'blogtype_id' => 'required',
            'shortDescription' => 'required',
            'heading' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        $input['title'] = $request->title;
        $input['blog_id'] = $request->blog_id;
        $input['blogtype_id'] = $request->blogtype_id;
        $input['shortDescription'] = $request->shortDescription;
        $input['heading'] = $request->heading;
        $str = strtolower($request->title);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
            
            
        $resoucecenter = ResourceCenter::create($input);
        return back()->with('success','Resource Center Created Successfully.');
    }

    public function updateRCBlogAdmin(Request $request)
    {
        $this->validate($request, [
    		'title' => 'required',
            'blog_id' => 'required',
            'blogtype_id' => 'required',
            'shortDescription' => 'required',
            'heading' => 'required'
        ]);
        $id = $request->myBlog_id;
        $input['title'] = $request->title;
        $input['blog_id'] = $request->blog_id;
        $input['blogtype_id'] = $request->blogtype_id;
        $input['shortDescription'] = $request->shortDescription;
        $input['heading'] = $request->heading;
        if($request->hasFile('image_path'))
        {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);

        }
        $str = strtolower($request->title);
        $input['slug'] = preg_replace('/\s+/', '-', $str);
        $resoucecenter = ResourceCenter::whereId($id)->update($input);
        return back()->with('success','Resource Center Updated Successfully.');
    }

    public function addBlogContent(Request $request,$id)
    {
        return view('ResourceCenter_Admin.add_blog_content',compact('id'));
    }
    public function storeBlogContent(Request $request)
    {
        $input['resource_center_id'] = $request->resource_center_id;
        $input['content'] = $request->content;
        if ($request->hasFile('image_path')) {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
        }
        $input['imgCssClass'] = $request->imgCssClass;
        $blogInformation = BlogInformation::create($input);
        return back()->with('success','Blog Information Created Successfully.');
    }
    public function showBlogContent($id)
    {
        $resourceCenter = ResourceCenter::with('blogInformations')->findOrfail($id);
        return view('ResourceCenter_Admin.showBlogContent',compact('resourceCenter'));
    }
    public function updateBlogContent(Request $request)
    {
       
        $id= $request->information_id;
        if ($request->hasFile('image_path')) {
            $input['image_path'] = 'storage/'.time().'.'.$request->image_path->extension();
            $saveimage = $request->image_path->move(public_path('storage/'), $input['image_path']);
        }
        $input['resource_center_id'] = $request->resource_center_id;
        $input['content'] = $request->content;
        $BlogInformation = BlogInformation::whereId($id)->update($input);
        return back()->with('success','Blog Information Updated Successfully.');
    }
    public function blogInfoDelete($id ) {
        BlogInformation::find($id)->delete();
        //dd($id);
       
    	return back()->with('success','Blog Information Deleted Successfully.');

    }
}
