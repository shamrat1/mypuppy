<nav id="top" class="fluid-width">
   <div class="container">
   <div class="box-inner">
      <ul class="box-top box-top-left pull-left">
         <li class="social-top">
            <div class="social-block">
               <div class="social">
                  <a href="{{ $contactinfo->fb_link }}" class="facebook" target="_blank" title="Facebook"><i class="ion-social-facebook"></i><span>facebook</span></a>
                  <a href="{{ $contactinfo->twitter_link }}" target="_blank" class="twitter" title="Twitter"><i class="ion-social-twitter"></i><span>twitter</span></a>
                  <a href="{{ $contactinfo->insta_link }}" target="_blank" class="instagram" title="Instagram"><i class="ion-social-instagram-outline"></i><span>instagram</span></a>
               </div>
            </div>
         </li>
         <li class="header-email">
            <p><span>{{ $contactinfo->email }}</span></p>
         </li>
      </ul>
      <ul class="box-top box-top-right pull-right">
         <li><a href="{{ url('/our-service-partner') }}" title="Service Partner"><i class="ion-ios-location-outline icons"></i> <span class="hidden-xs">Service Partners</span></a></li>
         <li class="currency">
            <a href="{{ url('/contact') }}" title="Contact Us"><span>Contact Us</span></a>
         </li>
         <li class="language">
            <a href="{{ url('/about') }}" title="About Us"><span>About Us</span></a>
         </li>
         <li id="top-links" class="nav header-dropdown">
            <ul class="list-inline">
               <li class="dropdown">
                  <button class="dropbtn" title="My Account"><i class="ion-android-person icons"></i>  <span class="hidden-xs">
                      @if (Route::has('login'))
                     @auth
                        Hi, {{ \Illuminate\Support\Str::limit( Auth::user()->name, 18, ' [...]') }}
                      @else
                        My Account
                      @endauth
                     @endif
                      </span> <i class="icon-right ion-ios-arrow-down"></i></button>
                  <div class="dropdown-content">
                     @if (Route::has('login'))
                     @auth
                     @if(Auth::user()->user_role == "admin")
                     <a href="{{ url('/dashboard') }}" target="_blank" > <i class="fas fa-tachometer-alt"></i>
                     <span>Dashboard</span></a>
                     @endif
                     @if(Auth::user()->user_role == "booking")
                     <a href="{{ url('/our-service-locations') }}" target="_blank"> <i class="fas fa-tachometer-alt"></i>
                     <span>Booking Dashboard</span></a>
                     @endif
                     <a href="{{ url('home') }}" title="My Accounts">
                        <i class="fa fa-user-circle"></i>
                        <span>My Accounts</span>
                        </a>
                     <a href="{{ url('wishlist') }}" title="My Wishlists">
                     <i class="fa fa-heart"></i>
                     <span>My Wishlists</span>
                     </a>
                     <a href="{{ url('/my-orders') }}" ><i class="fa fa-first-order"></i>
                     <span>My-Orders</span></a>
                     <a href="{{ url('/checkout') }}" ><i class="fa fa-check" aria-hidden="true"></i>
                     <span>Checkout</span></a>
                     <a class="check-out" href="{{ route('logout') }}" rel="nofollow" title="Logout"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                     <span>Logout</span>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                     @else
                     <a href="{{ url('login') }}" class="btn-signin"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Sign In</a>
                     <a href="{{ url('register') }}" class="btn-signup slide_right"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Sign Up</a>
                     @endauth
                     @endif
               </li>
            </ul>
         </li>
      </ul>
      </div>
   </div>
</nav>