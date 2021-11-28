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
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<link rel="stylesheet" href="{{ asset('css/w3Schools.css') }}">
<style>
   .myImage {
        width: 220px;
        height: 180px;
    }
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                     <a href="javascript:void(0)">
                     <span>Resource Center</span>
                     </a>
                  </li>
         </ul>
</div>

      <img src="{{ asset('images/resource_centerBanner.png') }}" alt="banner" style="width:100%;height:100%">
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
                        <a href="{{ route('resource_center_blog',$blog->slug) }}" class="<?= $route == $blog->slug ? 'subactive' : '' ?>">
                        <img src="{{ asset($blog->image_path) }}" alt="Image" class="w3-left w3-margin-right" style="width:50px;height:30px;">
                        <span class="w3-large">{{ $blog->blog_name }}</span>
                        </a>
                     </li>
                     
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
                      <h2>Pet Resource Center</h2>
                        <p>Pets fill our lives with laughter, companionship and, when it comes to their care, questions. Our Resource Center is filled with information compiled from animal care experts and veterinarians to help you find the answers you need.</p>
                        <hr>
                      <!-- First Photo Grid-->
                      <div class="row w3-padding-16 w3-center">
                           @foreach($blogs as $blog)
                        <div class="column">
                          <img src="{{ asset($blog->image_path) }}" alt="photo" class="myImage">
                          <h4>{{$blog->blog_name}}</h4>
                          <p><a href="{{ route('resource_center_blog',$blog->slug) }}" class="btn-category slide_right">Learn More</a></p>
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