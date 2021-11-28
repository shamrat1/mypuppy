<section id="petFeatures">
   <div class="block-title p-3">
      <div class="title"><span>What your pet needs, when they need it.</span></div>
   </div>
   <div class="row">
      <div class="col">
         <a href="{{ url('rewards') }}">
         <img src="{{ asset('images/HomeRewards.png') }}" class="imgFirstRow"  alt="Rewards">
         </a>
      </div>
      <div class="col">
         <a href="{{ url('affiliation-program') }}">
         <img src="{{ asset('images/homeAffiliation.png') }}" class="imgFirstRow" alt="Affliate Program">
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <a href="{{ url('services') }}">
         <img src="{{ asset('images/HomeServices.png') }}" class="imgSecondRow"  alt="Services">
         </a>
      </div>
      <div class="col">
         <a href="{{ url('new-pet-guides') }}">
         <img src="{{ asset('images/HomePetGuide.png') }}" class="imgSecondRow" alt="petGuides">
         </a>
      </div>
      <div class="col">
         <a href="{{ url('resource-center') }}">
         <img src="{{ asset('images/HomeResourceCenter.png') }}" class="imgSecondRow"  alt="Resource Center">
         </a>
      </div>
      <div class="col">
         <a href="{{ url('our-service-partner') }}">
         <img src="{{ asset('images/HomeServicePartner.png') }}" class="imgSecondRow" alt="Service Partner">
         </a>
      </div>
   </div>
   <br>
</section>
<style>
   .chip {
   display: inline-block;
   padding: 0 25px;
   height: 50px;
   font-size: 16px;
   line-height: 50px;
   border-radius: 25px;
   background-color: #f1f1f1;
   }
   .chip img {
   float: left;
   margin: 0 10px 0 -25px;
   height: 50px;
   width: 50px;
   border-radius: 50%;
   }
</style>
<section id="mobileFeatures">
   <div class="block-title p-3">
      <div class="title"><span>What your pet needs, when they need it.</span></div>
   </div>
   <div>
      <a href="{{ url('rewards') }}">
      <img src="{{ asset('images/HomeRewards.png') }}" class="imgFirstRow"  alt="Rewards">
      </a>
   </div>
   <div>
      <a href="{{ url('affiliation-program') }}">
      <img src="{{ asset('images/homeAffiliation.png') }}" class="imgFirstRow" alt="Affliate Program">
      </a>
   </div>
   <div>
      <a href="{{ url('services') }}">
      <img src="{{ asset('images/HomeServices.png') }}" class="imgSecondRow"  alt="Services">
      </a>
   </div>
   <div>
      <a href="{{ url('new-pet-guides') }}">
      <img src="{{ asset('images/HomePetGuide.png') }}" class="imgSecondRow" alt="petGuides">
      </a>  
   </div>
   <div>
      <a href="{{ url('resource-center') }}">
      <img src="{{ asset('images/HomeResourceCenter.png') }}" class="imgSecondRow"  alt="Resource Center">
      </a>
   </div>
   <div>
      <a href="{{ url('our-service-partner') }}">
      <img src="{{ asset('images/HomeServicePartner.png') }}" class="imgSecondRow" alt="Service Partner">
      </a>
   </div>
   <div class="block-title p-3">
      <div class="title"><span>Our Collections</span></div>
   </div>
   <div class="pl-3 mb-3">
       
      <div class="chip">
          <a href="{{ url('new') }}">
         <img src="{{ asset('images/new-arrivals.png') }}" alt="New Arrivals" width="96" height="96">
         New Arrivals
         </a>
      </div>
   </div>
   <div class="pl-3 mb-3">
      <div class="chip">
          <a href="{{ url('/best-selling-products') }}">
             <img src="{{ asset('images/best-seller.png') }}" alt="Best Selling Product" width="96" height="96">
             Best Selling Product
         </a>
      </div>
   </div>
   <div class="pl-3 mb-3">
      <div class="chip">
          <a href="{{ url('sale') }}">
             <img src="{{ asset('images/sales_icon.png') }}" alt="On Sale" width="96" height="96">
             On Sale
         </a>
      </div>
   </div>
   <div class="pl-3 mb-3">
      <div class="chip">
          <a href="{{ url('/monthly-sales') }}">
             <img src="{{ asset('images/monthly_sales.png') }}" alt="Monthly Sale" width="96" height="96">
             Monthly Sale
         </a>
      </div>
   </div>
</section>