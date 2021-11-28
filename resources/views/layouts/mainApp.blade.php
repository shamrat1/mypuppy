<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   @include('layouts.headContent')

   
   <body class="common-home">
      <!-- Sticky Menu -->
      <script >
         $(document).ready(function () {	
         var height_box_scroll = $('.scroll-fix').outerHeight(true);
          $(window).scroll(function () {
         if ($(this).scrollTop() > 800) {
         	$('.scroll-fix').addClass("scroll-fixed");
         	$('body').css('padding-top',height_box_scroll);
         } else {
         	$('.scroll-fix').removeClass("scroll-fixed");
         	$('body').css('padding-top',0);
         }
          });
         });
      </script>
      <!-- Scroll Top -->
      <script>
         $("#back-top").hide();
         $(function () {
           $(window).scroll(function () {
             if ($(this).scrollTop() > $('body').height()/3) {
               $('#back-top').fadeIn();
             } else {
               $('#back-top').fadeOut();
             }
           });
           $('#back-top').click(function () {
             $('body,html').animate({scrollTop: 0}, 800);
             return false;
           });
         });
      </script>
      <div class="wrapper">
      <div id="back-top"><i class="ion-chevron-up"></i></div>
      <div id="header" >
          <?php $contactinfo = App\Models\ContactInfo::findOrFail(1); ?>
         @include('layouts.topBar')
         <header class="scroll-fix ">
         <div class="header-middle fluid-width">
         <div class="container">
         <div class="box-inner">
         <div class="box-inner-inner">
         <div class="col-logo">
            <!--Mobile Menu items-->
            @include('layouts.mobileMenuItems')
            <!--End of Mobile Menu-->
         <?php $companyInfo = App\Models\CompanyInfo::findOrFail(1);?>
         <div id="logo">
         <a href="{{ url('/') }}"><img src="{{ URL::asset("{$companyInfo->company_logo}") }}" title="" alt="" class="img-responsive" /></a>							
         </div>
         </div>
         <div class="col-cart">
         <div class="inner">
         <a href="{{ url('wishlist') }}" id="wishlist-total" ><span><span class="text-wishlist">Wish List</span> 
         @if (Route::has('login'))
         @auth
         <span class="txt-count">
         <?php $wishCount=App\Models\Wishlist::where('user_id',Auth::user()->id)->count(); ?>
         {{ $wishCount }}
         </span> 
         @endauth
         @endif
         </a>
         <div id="cart" class="btn-group btn-block">
         <button type="button" data-toggle="modal" data-target="#myModal2" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle"><span id="cart-total">
         @if(session('cart'))
         <?php $total = 0 ?>
         <span class="txt-count">{{count(session('cart')) }}</span>
         <span class="text-item"> My Cart </span>
         </span></button>
         @endif
         </div>
         </div>
         </div>
         </div>
         <div class="col-search">
         <div id="search-by-category">
         <div class="dropdown-toggle search-button" data-toggle="dropdown"></div>
         <div class="dropdown-menu search-content" >
         <div class="search-container">
         <form autocomplete="off" action="{{ url('search') }}" method ="GET">
         @csrf
         <div class="autocomplete">
         <input type="text" name="myData" id="text-search" value="" placeholder="Search entire store here ..." class=""  />
         <div id="sp-btn-search" class="">
         <button type="submit" id="btn-search-category" class="btn btn-default btn-lg">
         <span class="hidden-xs">Search</span>
         </button>
         </div>
         </div>
         </form>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         
          <!-- Desktop Main NavBar -->
          @include('layouts.DesktopMainNavBar')
         </header>
         </div>
         <div id="content">
            <div class="main-row home-content-store3">
               <div class="container">
                  <div class="row">
                     <div class="main-col col-sm-12 col-md-12">
                        <div class="row sub-row">
                           <div class="sub-col col-sm-12 col-md-9">
                              @include('layouts.newsLetter')
                              <main>
                                 @yield('content')
                              </main>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         
<footer class="pt-5">
            <div class="footer-links">
               <div class="container">
                  <div class="inner btn-group-vertical">
                     <div class="row">
                        <div class="col col-md-4 col-sm-6 col-xs-12">
                           <div class="btn-group">
                              <div id="btnGroupVerticalDrop1" data-toggle="dropdown" class="dropdown-toggle title visible-xs">About us</div>
                              <div class="mb-3 footer-content" aria-labelledby="btnGroupVerticalDrop1">
                                 <div class="footer-contact-us">
                                    <div class="address">
                                       <p> <span><i class="fa fa-map-marker" style="font-size: -webkit-xxx-large;"></i> &nbsp;</span> <span  style="font-size:24px;">{{ $contactinfo->address }}</span></p>
                                    </div>
                                    <div class="footer-phone">
                                       <label>NEED HELP?</label>
                                       <p>{{ $contactinfo->phone }}</p>
                                    </div>
                                 </div>
                                 <div class="social-block">
                                    <div class="social">
                                       <a href="{{ $contactinfo->fb_link }}" class="facebook" target="_blank" title="Facebook"><i class="ion-social-facebook"></i><span>facebook</span></a>
                                       <a href="{{ $contactinfo->twitter_link }}" target="_blank" class="twitter" title="Twitter"><i class="ion-social-twitter"></i><span>twitter</span></a>
                                       <a href="{{ $contactinfo->insta_link }}" target="_blank" class="instagram" title="Instagram"><i class="ion-social-instagram-outline"></i><span>instagram</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col col-md-2 col-sm-6 col-xs-12">
                           <div class="btn-group">
                              <div id="btnGroupVerticalDrop2" data-toggle="dropdown" class="dropdown-toggle title">Information</div>
                              <div class="mb-3 footer-content footer-information" aria-labelledby="btnGroupVerticalDrop2">
                                 <ul class="list-unstyled">
                                    <li><a href="{{ url('/services') }}">Our Services</a></li>
                                    <li><a href="{{ url('shipping-and-return') }}">Shipping and Return</a></li>
                                    <li><a href="{{ url('product-guarantee-registration') }}">Product Registration</a></li>
                                    <li><a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col col-md-2 col-sm-6 col-xs-12">
                           <div class="btn-group">
                              <div id="btnGroupVerticalDrop3" data-toggle="dropdown" class="dropdown-toggle title">Customer Service</div>
                              <div class="mb-3 footer-content" aria-labelledby="btnGroupVerticalDrop3">
                                 <ul class="list-unstyled">
                                    <li><a href="{{ url('sale') }}">Sale</a></li>
                                    <li><a href="{{ url('new') }}">New Arrivals</a></li>
                                    <li><a href="{{ url('/rewards') }}">Rewards</a></li>
                                    <li><a href="{{ url('/login') }}">My Account</a></li>
                                    <li><a href="{{ url('/about') }}">About</a></li>
                                    <li><a href="{{ url('/our-service-partner') }}">Service Partner</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col col-md-4 col-sm-6 col-xs-12">
                           <div class="btn-group">
                              <div id="btnGroupVerticalDrop4" data-toggle="dropdown" class="dropdown-toggle title">Join Our Newsletter</div>
                              <div class="mb-3 footer-content" aria-labelledby="btnGroupVerticalDrop4">
                                 <div class="newsletter-container newsletter-block">
                                    <div class="newsletter-title">
                                       <h3></h3>
                                       <p>Sign up for our e-mail to get latest news.</p>
                                    </div>
                                    <div class="newsletter-content">
                                       <div class="content">
                                          <input type="text" class="newsletter_email" name="mail_subscribe" value="" placeholder="Please enter your email to subscribe" />
                                          <button type="button" class="btn btn-primary" onclick="ptnewsletter.saveMail($(this));">Subscribe</button>
                                       </div>
                                       <div class="newsletter-notification"></div>
                                    </div>
                                 </div>
                                 <script>
                                    ptnewsletter.checkCookie();
                                 </script>
                                 <div class="footer-software">
                                    <a href="#">
                                    <img src="{{ asset('image/catalog/ptblock/apple_store.png')}}" alt="apple_store">
                                    <img class="hover" src="{{ asset('image/catalog/ptblock/apple_store_hover.png') }}" alt="apple_store">
                                    </a>
                                    <a href="#">
                                    <img src="{{ asset('image/catalog/ptblock/google_play.png') }}" alt="google_play">
                                    <img class="hover" src="{{ asset('image/catalog/ptblock/google_play_hover.png') }}" alt="google_play">
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-middle">
               <div class="container">
                  <div class="footer-custom-links">
                     <?php $FooterCategories=App\Models\Category::OrderBy('id','asc')->get(); ?>
                     @foreach($FooterCategories as $FooterCategory)
                     <li><a href="{{ route('shop_category',$FooterCategory->id) }}" style="text-transform:uppercase;">{{ $FooterCategory->category_name }}</a></li>
                     @endforeach
                  </div>
                  <div class="payment">
                     <img src="{{ asset('image/catalog/ptblock/payment.png') }}" alt="payment">
                  </div>
               </div>
            </div>
            <div class="footer-copyright">
               <div class="container">
                  <p class="text-powered">Powered By <a href="https://meritzeal.com/web-development/" target="_blank">Meritzeal</a>.  &copy; 2021</p>
               </div>
            </div>
         </footer>
         @include('layouts.cartModal')
         @include('layouts.autoCompleteSearch')
      </div>
   </body>
</html>