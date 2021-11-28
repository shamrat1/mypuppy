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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Puppy My Pet| Dashboard</title>
	<link rel="icon" href="{{ asset('images/meritzeallogo.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('images/meritzeallogo.png') }}" />
	
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css') }}">
	<!-- summernote -->
	<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css') }}">
	  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/codemirror/theme/monokai.css') }}">
 
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
				<li class="nav-item d-none d-sm-inline-block"> <a href="{{ url('/dashboard') }}" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
				<li class="nav-item d-none d-sm-inline-block"> <a href="{{ url('/') }}" target="_blank" class="nav-link"><i class="fa fa-external-link" aria-hidden="true"></i> Visit Website</a></li>
				<li class="nav-item d-none d-sm-inline-block"> <a  class="nav-link" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out" aria-hidden="true"></i>
									<span class="text-center ml-2"> Log Out</span> </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
			</ul>
			<!-- SEARCH FORM -->
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- PROFILE LOGO START HERE -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#"> <i class="fas fa-user">Logged In : {{Auth::user()->name}}</i> </a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> 
						<a href="{{ url('/') }}" target="_blank" class="dropdown-item dropdown-header"><i class="far fa-hand-point-right"></i> Visit Website</a>
						<div class="dropdown-divider"></div>
						
						                   
							
								<div class="dropdown-divider"></div>
								<a  class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out" aria-hidden="true"></i>
									<span class="text-center ml-2"> Log Out</span> </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								<div class="dropdown-divider"></div>
					</div>
				</li>
			
				<!-- PROFILE LOGO END HERE -->
		
				<!-- Notifications Dropdown Menu -->
		
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button"> <i class="fas fa-expand-arrows-alt"></i> </a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"> <i class="fas fa-th-large"></i> </a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="{{ url('/') }}" class="brand-link">
				 {{--  <img src="{{ asset('images/bardwelllogo-transparent.png') }}" alt="" style=" border: 2px solid gray; border-radius:5%">   --}}
				My Puppy My Pet
			</a>
			<!-- Sidebar -->


			<div class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex" style="color:#fff;font-size:18px;"><img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="" style="width:50px;height:50px; border: 2px solid gray; border-radius:25%;"><span class="m-2">{{ Auth::user()->name }}</span> </div>
				<!-- SidebarSearch Form -->

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					@if(Auth::user()->user_role == 'booking')
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						
						<li class="nav-item">
							<a href="{{ url('/our-service-locations') }}" class="nav-link <?= $route == 'our-service-locations' ? 'active' : '' ?>"> <i class="far fa-home nav-icon"></i>
								<p> Our Store Details  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/our-service-timings') }}" class="nav-link <?= $route == 'our-service-timings' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>Our Service Timings  </p>
							</a>
						</li>
						
						<?php
							$serviceLists= App\Models\PartnerRole::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get(); ?>
								@foreach($serviceLists as $list)
									<li class="nav-item">
										<?php $navService= App\Models\BookService::findOrFail($list->service_id ); ?>
										<a href="{{ url('/booking-dashboard',$list->id) }}" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p> {{ $navService->service_name }}</p>
										</a>
									</li>
								@endforeach
						
						

					 </ul>
					@endif
					@if(Auth::user()->user_role == 'admin')
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class               with font-awesome or any other icon font library -->
						
						<li class="nav-item menu-open">
							<a href="{{ url('/dashboard') }}" class="nav-link <?= $route == 'dashboard' ? 'active' : '' ?>"> <i class="nav-icon fas fa-tachometer-alt"></i>
								<p> Dashboard </p>
							</a>
						</li>
						
						
						<!-- Booking Appointment content edit -->
						<li class="nav-item">
							<a href="javascript:void(0)" class="nav-link <?= $route == 'booking-services' ? 'active' : '' ?> "> <i class="fa fa-calendar" aria-hidden="true"></i>
								<p>Booking Appointment </p>
								<i class="fas fa-angle-left right"></i>
							</a>
							
                            <ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('/booking-dashboard') }}" class="nav-link <?= $route == 'booking-dashboard' ? 'active' : '' ?>">
									   <i class="far fa-circle nav-icon"></i>
									   <p>  Booking Dashboard  </p>
									</a>
								 </li>
								
                                <li class="nav-item">
							<a href="{{ url('/booking-services') }}" class="nav-link <?= $route == 'booking-services' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Booking Services  </p>
							</a>
					
						</li>
						<li class="nav-item">
							<a href="{{ url('/cities') }}" class="nav-link <?= $route == 'cities' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Cities  </p>
							</a>
					
						</li>
						<li class="nav-item">
							<a href="{{ url('/suburbs') }}" class="nav-link <?= $route == 'suburbs' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Suburbs  </p>
							</a>
					
						</li>
						<li class="nav-item">
							<a href="{{ url('/service-locations-admin') }}" class="nav-link <?= $route == 'service-locations-admin' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Store Details  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/animal-types') }}" class="nav-link <?= $route == 'animal-types' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Animal Types  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/animal-breeds') }}" class="nav-link <?= $route == 'animal-breeds' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Animal Breeds  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/animal-colours') }}" class="nav-link <?= $route == 'animal-colours' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Animal Colours  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/appointment-types') }}" class="nav-link <?= $route == 'appointment-types' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Appointment Types  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/pet-details-admin') }}" class="nav-link <?= $route == 'pet-details-admin' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Pet Details  </p>
							</a>
						</li>
						
                            </ul>
						</li>
						
						<li class="nav-item">
                           <a href="javascript:void(0)" class="nav-link <?= $route == 'categories' ? 'active' : '' ?>">
                              <i class="nav-icon fas fa-filter"></i>
                              <p>Product Filter </p>
                              <i class="fas fa-angle-left right"></i>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{ url('categories')}}" class="nav-link <?= $route == 'categories' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categories</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{ url('sub-categories')}}" class="nav-link <?= $route == 'sub-categories' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sub-Categories</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{ url('sub-category-types')}}" class="nav-link <?= $route == 'sub-category-types' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sub-Category Types</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{ url('product-type')}}" class="nav-link <?= $route == 'product-type' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Types </p>
                                 </a>
                              </li>
                           </ul>
                        </li>
						
						<li class="nav-item">
							<a href="{{ url('product')}}" class="nav-link <?= $route == 'product' ? 'active' : '' ?>"> <i class="nav-icon fas fa-tshirt"></i>
								<p> Products </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('inventory')}}" class="nav-link <?= $route == 'inventory' ? 'active' : '' ?>"> <i class="nav-icon fas fa-inventory"></i>
								<p> Inventory </p>
							</a>

						</li>
						<li class="nav-item">
							<a href="javascript:void(0)" class="nav-link <?= $route == 'sales-list' ? 'active' : '' ?>"> <i class="nav-icon fas fa-star"></i>
								<p>Product List </p>
								<i class="fas fa-angle-left right"></i>
							</a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
							<a href="{{ url('sales-list')}}" class="nav-link <?= $route == 'sales-list' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>Sales </p>
							</a>

						</li>
						<li class="nav-item">
							<a href="{{ url('monthly-sales-list')}}" class="nav-link <?= $route == 'monthly-sales-list' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>Monthly Sales</p>
							</a>

						</li>
						<li class="nav-item">
							<a href="{{ url('best-selling-list')}}" class="nav-link <?= $route == 'best-selling-list' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>Best Selling Products </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('new-product-list')}}" class="nav-link <?= $route == 'new-product-list' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>New Product List </p>
							</a>
						</li>
                            </ul>
						</li>
						
						<li class="nav-item <?= $route == 'blog-categories' ||  $route == 'blog-type' || $route == 'blog-type' || $route == 'blog-faq' || $route == 'resource-center-admin' ? 'menu-open' : '' ?>">
							<a href="javascript:void(0)" class="nav-link">
							  <i class="nav-icon fas fa-tree"></i>
							  <p>
								Resource Center
								<i class="fas fa-angle-left right"></i>
							  </p>
							</a>
							<ul class="nav nav-treeview">
							  <li class="nav-item">
								<a href="{{ url('/blog-categories') }}" class="nav-link <?= $route == 'blog-categories' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Blog-Category</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('blog-type') }}" class="nav-link <?= $route == 'blog-type' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Blog-Type</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/blog-faq') }}" class="nav-link <?= $route == 'blog-faq' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Blog FAQ</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('resource-center-admin') }}" class="nav-link <?= $route == 'resource-center-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Resource Center</p>
								</a>
							  </li>
							</ul>
						  </li>
						  <li class="nav-item <?= $route == 'my-company-services' ||  $route == 'repair_service_admin' || $route == 'vital_care_admin' || $route == 'dog_grooming_admin' || $route == 'veterinary_services_admin' || $route == 'adoptions_admin' || $route == 'dog_training_admin' || $route == 'diy_dog_wash_admin' || $route == 'inStore-dog-training-admin' || $route == 'online-dog-training-admin'  ? 'menu-open' : '' ?>">
							<a href="{{ url('/my-company-services') }}" class="nav-link <?= $route == 'my-company-services' ? 'active' : '' ?>"> <i class="fa fa-server"></i>
								<p> Our Services  <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
							   <li class="nav-item">
    							<a href="{{ url('/my-company-services') }}" class="nav-link <?= $route == 'my-company-services' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
    								<p> All Services Thumnail </p>
    							</a>
							</li>
							  <li class="nav-item">
								<a href="{{ url('/repair_service_admin') }}" class="nav-link <?= $route == 'repair_service_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Repair Service</p>
								</a>
							  </li>
							 <li class="nav-item">
								<a href="{{ url('/vital_care_admin') }}" class="nav-link <?= $route == 'vital_care_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Vital Care</p>
								</a>
							  </li>
							 <li class="nav-item">
								<a href="{{ url('/dog_grooming_admin') }}" class="nav-link <?= $route == 'dog_grooming_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Dog Grooming</p>
								</a>
							  </li>
							 <li class="nav-item">
								<a href="{{ url('/veterinary_services_admin') }}" class="nav-link <?= $route == 'veterinary_services_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Veterinary Services</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/adoptions_admin') }}" class="nav-link <?= $route == 'adoptions_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Adoptions</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/dog_training_admin') }}" class="nav-link <?= $route == 'dog_training_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Dog Training</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/inStore-dog-training-admin') }}" class="nav-link <?= $route == 'inStore-dog-training-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>InStore Dog Training</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/online-dog-training-admin') }}" class="nav-link <?= $route == 'online-dog-training-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>Online Dog Training</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('/diy_dog_wash_admin') }}" class="nav-link <?= $route == 'diy_dog_wash_admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>DIY Dog Wash</p>
								</a>
							  </li>
							</ul>
							 
						</li>


						<li class="nav-item <?= $route == 'new-pet-guides-admin' OR $route == 'new-dog-guide-admin'   ? 'menu-open' : '' ?>">
							<a href="{{ url('/new-pet-guides-admin') }}" class="nav-link <?= $route == 'new-pet-guides-admin' ? 'active' : '' ?>"> <i class="fa fa-book" aria-hidden="true"></i>
								<p> New Pet Guides <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
							   <li class="nav-item">
    							<a href="{{ url('/new-pet-guides-admin') }}" class="nav-link <?= $route == 'new-pet-guides-admin' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
    								<p> All New Pet Guides </p>
    							</a>
							</li>
							  <li class="nav-item">
								<a href="{{ url('new-dog-guide-admin') }}" class="nav-link <?= $route == 'new-dog-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Dog Guide</p>
								</a>
							  </li>
							 <li class="nav-item">
								<a href="{{ url('new-cat-guide-admin') }}" class="nav-link <?= $route == 'new-cat-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Cat Guide</p>
								</a>
							  </li>
							 <li class="nav-item">
								<a href="{{ url('new-reptile-guide-admin') }}" class="nav-link <?= $route == 'new-reptile-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Reptile Guide</p>
								</a>
							  </li>
							 
							  <li class="nav-item">
								<a href="{{ url('new-bird-guide-admin') }}" class="nav-link <?= $route == 'new-bird-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Bird Guide</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('saltwater-fish-guide-admin') }}" class="nav-link <?= $route == 'saltwater-fish-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Fish Guide</p>
								</a>
							  </li>
							  <li class="nav-item">
								<a href="{{ url('new-rabit-guide-admin') }}" class="nav-link <?= $route == 'new-rabit-guide-admin' ? 'active' : '' ?>">
								  <i class="far fa-circle nav-icon"></i>
								  <p>New Small Animal Guide</p>
								</a>
							  </li>
							</ul>
							 
						</li>
						
						<!-- Webpages content edit -->
						<li class="nav-item">
							<a href="javascript:void(0)" class="nav-link <?= $route == 'about-company' ? 'active' : '' ?>"> <i class="fas fa-building"></i>
								<p>Webpages Content </p>
								<i class="fas fa-angle-left right"></i>
							</a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
							<a href="{{ url('/about-company') }}" class="nav-link <?= $route == 'about-company' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  About Company  </p>
							</a>
					
						</li>
						<li class="nav-item">
							<a href="{{ url('/slider-images') }}" class="nav-link <?= $route == 'slider-images' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Sliding Images  </p>
							</a>
					
						</li>
						<li class="nav-item">
							<a href="{{ url('/banner-images') }}" class="nav-link <?= $route == 'banner-images' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  Banner Images  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/about-page-content') }}" class="nav-link <?= $route == 'about-page-content' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>  About Page Content  </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('contact-details') }}" class="nav-link <?= $route == 'contact-details' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p>Contact Details</p>
							</a>
						</li>
                            </ul>
						</li>
						
						

						
						
						<!-- Users -->
						<li class="nav-item">
							<a href="javascript:void(0)" class="nav-link <?= $route == 'customers' ? 'active' : '' ?>"> <i class="fas fa-users"></i>
								<p>Users </p>
								<i class="fas fa-angle-left right"></i>
							</a>
							<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('customers')}}" class="nav-link <?= $route == 'customers' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p> Customers </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('service-partners-users')}}" class="nav-link <?= $route == 'service-partners-users' ? 'active' : '' ?>"> <i class="far fa-circle nav-icon"></i>
								<p> Service Partners </p>
							</a>
						</li>
						</ul>
							 
						</li>
						<li class="nav-item">
							<a href="{{ url('offers')}}" class="nav-link <?= $route == 'offers' ? 'active' : '' ?>"> <i class="nav-icon fas fa-gift"></i>
								<p> Offers </p>
							</a>

						</li>
					</ul>
					@endif
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- sidebar end -->
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="main-footer">

            <strong>Copyright &copy; 2021 <a href="https://meritzeal.com/">Meritzeal.com</a>.</strong>
        
            All rights reserved.
        
            <div class="float-right d-none d-sm-inline-block">
        
              <b>Version</b> 3.1.0-rc
        
            </div>
        
          </footer>
          <!-- Control Sidebar -->
        
          <aside class="control-sidebar control-sidebar-dark">
        
            <!-- Control sidebar content goes here -->
        
          </aside>
        
          <!-- /.control-sidebar -->
        
        </div>
        
        <!-- ./wrapper -->
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- jQuery -->
        
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        
        <!-- jQuery UI 1.11.4 -->
        
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
        <script>
        
          $.widget.bridge('uibutton', $.ui.button)
        
        </script>
        
        <!-- Bootstrap 4 -->
        
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
       
      
       
        
        <!-- daterangepicker -->
        
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        
        <!-- Tempusdominus Bootstrap 4 -->
        
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        
        
        
        <!-- overlayScrollbars -->
        
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        
        <!-- AdminLTE for demo purposes -->
        
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        
        <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
        
    
    
    
    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    

    
    <script>  
        $(document).ready(function(){     
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#previewImg').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      
      $("#image_path").change(function() {
        readURL(this);
      });
 
      //Form Submission

			function exportTableToExcel(tableID, filename = ''){
				var downloadLink;
				var dataType = 'application/vnd.ms-excel';
				var tableSelect = document.getElementById(tableID);
				var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
				
				// Specify file name
				filename = filename?filename+'.xls':'excel_data.xls';
				
				// Create download link element
				downloadLink = document.createElement("a");
				
				document.body.appendChild(downloadLink);
				
				if(navigator.msSaveOrOpenBlob){
					var blob = new Blob(['\ufeff', tableHTML], {
						type: dataType
					});
					navigator.msSaveOrOpenBlob( blob, filename);
				}else{
					// Create a link to the file
					downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
				
					// Setting the file name
					downloadLink.download = filename;
					
					//triggering the function
					downloadLink.click();
				}
			}
			function createPDF() {
				var sTable = document.getElementById('tab').innerHTML;
		 
				var style = "<style>";
				style = style + "table {width: 100%;font: 17px Calibri;}";
				style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
				style = style + "padding: 2px 3px;text-align: center;}";
				style = style + "</style>";
		 
				// CREATE A WINDOW OBJECT.
				var win = window.open('', '', 'height=700,width=700');
		 
				win.document.write('<html><head>');
				win.document.write('<title>User details</title>');   // <title> FOR PDF HEADER.
				win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
				win.document.write('</head>');
				win.document.write('<body>');
				win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
				win.document.write('</body></html>');
		 
				win.document.close(); 	// CLOSE THE CURRENT WINDOW.
		 
				win.print();    // PRINT THE CONTENTS.
			}
			$(document).ready(function(){
				$("#myInput").on("keyup", function() {
				  var value = $(this).val().toLowerCase();
				  $("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				  });
				});
			  });
			});
		 </script>
		 
        
        </body>
        
        </html>