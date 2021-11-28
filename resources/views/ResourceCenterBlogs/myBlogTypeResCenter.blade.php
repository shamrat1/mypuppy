@extends('layouts.myApp')
@section('content')
<?php
   if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
     $url = "https://";
   else
     $url = "http://";
   // Append the host(domain name, ip) to the URL.   
   $url .= $_SERVER['HTTP_HOST'];
   
   // Append the requested resource location to the URL   
   $url .= $_SERVER['REQUEST_URI'];
   $urlLen = explode('/', $url);
   $route = $urlLen[sizeof($urlLen) - 1];
   ?>
<link rel="stylesheet" href="{{ asset('css/w3Schools.css') }}">
<style>
   .imgbanner{
   width: 835px;
   height: 325px;
   }
   .subactive {
   padding: 5px;
   margin-bottom: 5px;
   background-color: #666;
   color: #eceeef;
   }
   .subactive:hover {
   color: #eceeef;
   }
   @media only screen and (max-width: 600px) {
   .imgbanner{
   width: 100%;
   height: 100%;
   }
   }
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                     <a href="{{ url('/resource-center') }}">
                     <span>Resource Center</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('/resource-center') }}">
                     <span>Resource Center</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('resource_center_blog',$myBlog->slug) }}">
                     <span>{{ $myBlog->blog_name }}</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)">
                     <span>{{ $myBlogType->blogtype_name }}</span>
                     </a>
                  </li>
         </ul>
</div>

      <img src="{{ asset('images/resource_centerBanner.png') }}" alt="Nature" style="width:100%;height:100%">
      <!-- w3-content defines a container for fixed size centered content, 
         and is wrapped around the whole page content, except for the footer in this example -->
      <div class="w3-content" style="max-width:1400px">
         <!-- Grid -->
         <div class="w3-row">
            <!-- Introduction menu -->
            <div class="w3-col l4">
               <!-- About Card -->
               <!-- Posts -->
               <div class="w3-card w3-margin">
                  <div class="w3-container w3-padding">
                     <h4 class="resource_h4"><i class="fa fa-list-ul fa-1x" aria-hidden="true"></i>&nbsp; Popular Categories</h4>
                  </div>
                  <ul class="w3-ul w3-hoverable w3-white">
                     <?php $blogs=App\Models\Blog::OrderBy('blog_name','ASC')->get(); ?>
                     @foreach($blogs as $blog)
                     <li class="w3-padding-16">
                        <a href="{{ route('resource_center_blog',$blog->slug) }}"  class="<?= $myBlog->id == $blog->slug ? 'subactive' : '' ?>">
                        <img src="{{ asset($blog->image_path) }}" alt="Image" class="w3-left w3-margin-right" style="width:50px;height:30px;">
                        <span class="w3-large">{{ $blog->blog_name }}</span>
                        </a>
                     </li>
                     <?php $blogTypes=App\Models\BlogType::OrderBy('blogtype_name','ASC')->get(); ?>
                     @if($myBlog->id == $blog->id)
                     <br>
                     @foreach($blogTypes as $blogType)
                     <?php $count=App\Models\ResourceCenter::where('blog_id',$blog->id)->where('blogtype_id',$blogType->id)->count(); ?>
                     @if($count>=1)
                     <span class="w3-margin-left"> 
                     <a href="{{ route('resource_center_blog_type',['blogSlug'=>$blog->slug,'blogTypeSlug'=>$blogType->slug]) }}" class="btn btn-outline-info alert alert-info">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     &nbsp {{ $blogType->blogtype_name }} ({{$count}})</a></span>
                     @endif
                     @endforeach
                     @endif
                     @endforeach 
                  </ul>
               </div>
               <hr>
               <!-- END Introduction Menu -->
            </div>
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
               <!-- Blog entry -->
               <div class="w3-card-4 w3-margin w3-white">
                  <div class="w3-container pt-3">
                     <img src="{{ asset($myBlog->image_path) }}" class="imgbanner" alt="">
                     <h1 class="title-page pt-5" style="text-align: center">{{ $myBlog->blog_name }}</h1>
                     <h5>
                     {{ $myBlog->blog_description }}
                     <h5>
                     <hr style="border: 1px solid #000;">
                  </div>
                  <div class="container">
                     <h2 class="pl-3"><a href="javascript:void(0)"> {{ $myBlogType->blogtype_name }} </a></h2>
                     <?php $resourceCenters=App\Models\ResourceCenter::where('blog_id',$myBlog->id)->where('blogtype_id',$myBlogType->id)->get(); ?>
                     <div class="w3-row">
                        @foreach($resourceCenters as $resCenter) 
                        <div class="w3-col p-2 mb-5 text-left alert alert-secondary rounded w3-border border-primary shadow">
                           <table>
                              <tr>
                                 <td class="p-3">
                                    <img src="{{ asset($resCenter->image_path) }}" class="imgBlog" alt="">
                                 </td>
                                 <td class="p-3">
                                 <small>{{ $myBlog->blog_name }}</small>
                                 <h4>
                                    <a href="{{ route('resource_center_display',['blogSlug'=>$myBlog->slug,'blogTypeSlug'=>$blogType->slug,'resourceCenterSlug'=>$resCenter->slug]) }}"  class="text-danger">{{ $resCenter->title }}</a></h4>
                                    <p class="mb-3" style="font-size:16px;">{{ $resCenter->shortDescription }}</p>
                                    <a href="{{ route('resource_center_display',['blogSlug'=>$myBlog->slug,'blogTypeSlug'=>$blogType->slug,'resourceCenterSlug'=>$resCenter->slug]) }}" class="w3-button w3-padding w3-blue w3-border">Read More</a>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr>
      </div>
      <!-- END GRID -->
   </div>
   <br>
   <!-- END w3-content -->
</div>
@endsection