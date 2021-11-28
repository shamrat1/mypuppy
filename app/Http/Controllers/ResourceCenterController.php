<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogFAQ;
use App\Models\BlogInformation;
use App\Models\BlogType;
use App\Models\ResourceCenter;

class ResourceCenterController extends Controller
{
    public function myBlogs($slug)
    {
        $myBlog = Blog::where('slug',$slug)->first();
        return view('ResourceCenterBlogs.myBlogCategory',compact('myBlog'));
    }
    public function myBlogTypes($blogSlug,$blogTypeSlug)
    {
        $myBlog = Blog::where('slug',$blogSlug)->first();
        $myBlogType = BlogType::where('slug',$blogTypeSlug)->first();
        
        return view('ResourceCenterBlogs.myBlogTypeResCenter',compact('myBlog','myBlogType'));
    }
    public function myResourceCenter($blogSlug,$blogTypeSlug,$resourceCenterSlug)
    {
        $myBlog = Blog::where('slug',$blogSlug)->first();
        $myBlogType = BlogType::where('slug',$blogTypeSlug)->first();
        $myResourceCenter = ResourceCenter::where('slug',$resourceCenterSlug)->first();
        return view('ResourceCenterBlogs.myResourceCenter',compact('myBlog','myBlogType','myResourceCenter'));
    }
}
