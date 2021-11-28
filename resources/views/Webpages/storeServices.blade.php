@extends('layouts.myApp')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<style>
.search-wrapper {
    max-width: 320px;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
}
.map-list-heading {
    font-weight: 700;
    font-size: 28px;
}
.map-list-heading.small-font {
    font-size: 22px;
}

.map-list-heading {
    font-weight: 700;
    font-size: 28px;
}
.map-filter-wrap ul {
    column-count: 4;
    -webkit-column-count: 4;
    -moz-column-count: 4;
    margin-top: 20px;
    margin-bottom: 20px;
    padding-left: 0;
}
.col-md-12 {
    width: 100%;
}
.locator {
    position: relative;
    margin-bottom: 20px;
}
.no-padding {
    padding: 0!important;
}
.mb-25 {
    margin-bottom: 25px!important;
}


/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

.store input{
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

..store input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>
<div class="main-content">
   <div id="wrapper-site">
      <div id="content-wrapper">
         <!-- breadcrumb -->
         <nav class="breadcrumb-bg">
            <div class="container no-index">
               <div class="breadcrumb">
                  <ol>
                     <li>
                        <a href="{{ url('/') }}">
                        <span>Home</span>
                        </a>
                     </li>
                       <li>
                        <a href="{{ url('new-pet-guides') }}">
                        <span>New Pet Guides</span>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <span>store services</span>
                        </a>
                     </li>
                  </ol>
               </div>
            </div>
         </nav>
         <div id="main" style="margin-bottom:15px; ">
            <div class="page-home">
               <div class="container">
                  <div class="about-us-content">
                     <br>
                     
                     <div class="container pt-30 pb-10 pb-xs-0">
                    <div class="col-row">
                        <div class="text-center map-list-heading">Find a store</div>
                        <div class="search-wrapper">
                            <div class="map-search-wrap">
                                <div class="map-search">
                                        <form autocomplete="off" action="">
                  <div class="autocomplete" style="width:300px;">
                      <table class="no-border">
                          <tr>
                              <td class="store">
                                  
                             <input id="myInput" type="text" name="myCountry" placeholder="Enter Location..."></td>
                    <td class="store">
                        <input type="submit">
                    </td>
                    </tr>
                    </table>
                  </div>
              
                </form>

                </div>
            </div>
            <!-- 13781 -->
            <!-- 13781 -->
        </div>
                    <div class="col-md-12 filter-wrapper">
                <div class="map-filter-wrap">
                    <div class="map-list-heading small-font filter-title">store services</div>
                    <ul class="no-bullets expandable-content" data-height="255">
                                                                                                                                    
                                                                    <li class="spid13810">
                                        <input type="checkbox" data-filter="Mobile Grooming" class="filter" data-spid="13810" name="filter" id="spid13810" data-store-link="locator-_-filter-_-check-_-"> 
                                        <label for="spid13810" data-filter="Mobile Grooming" data-spid="13810">Mobile Grooming</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid11015">
                                        <input type="checkbox" data-filter="Full-Service Dog Grooming" class="filter" data-spid="11015" name="filter" id="spid11015" data-store-link="locator-_-filter-_-check-_-groom"> 
                                        <label for="spid11015" data-filter="Full-Service Dog Grooming" data-spid="11015">Full-Service Dog Grooming</label>
                                    </li>
                                                                                                                                                                                                
                                                                    <li class="spid11021">
                                        <input type="checkbox" data-filter="Dog Training" class="filter" data-spid="11021" name="filter" id="spid11021" data-store-link="locator-_-filter-_-check-_-train"> 
                                        <label for="spid11021" data-filter="Dog Training" data-spid="11021">Dog Training</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid13747">
                                        <input type="checkbox" data-filter="Pet Hospital" class="filter" data-spid="13747" name="filter" id="spid13747" data-store-link="locator-_-filter-_-check-_-hospital"> 
                                        <label for="spid13747" data-filter="Pet Hospital" data-spid="13747">Pet Hospital</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid13799">
                                        <input type="checkbox" data-filter="Vaccinations" class="filter" data-spid="13799" name="filter" id="spid13799" data-store-link="locator-_-filter-_-check-_-"> 
                                        <label for="spid13799" data-filter="Vaccinations" data-spid="13799">Vaccinations</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid11017">
                                        <input type="checkbox" data-filter="Self-Service Dog Wash" class="filter" data-spid="11017" name="filter" id="spid11017" data-store-link="locator-_-filter-_-check-_-wash"> 
                                        <label for="spid11017" data-filter="Self-Service Dog Wash" data-spid="11017">Self-Service Dog Wash</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid11019">
                                        <input type="checkbox" data-filter="Aquatics Department" class="filter" data-spid="11019" name="filter" id="spid11019" data-store-link="locator-_-filter-_-check-_-aqua"> 
                                        <label for="spid11019" data-filter="Aquatics Department" data-spid="11019">Aquatics Department</label>
                                    </li>
                                                                                                                                            
                                                                    <li class="spid13761">
                                        <input type="checkbox" data-filter="JustFoodForDogs" class="filter" data-spid="13761" name="filter" id="spid13761" data-store-link="locator-_-filter-_-check-_-"> 
                                        <label for="spid13761" data-filter="JustFoodForDogs" data-spid="13761">JustFoodForDogs</label>
                                    </li>
                                                                                                                                                                                                
                                                                                                            <li class="spid13781">
                            <input type="checkbox" data-filter="Adoption Habitats" class="filter" data-spid="13781" name="filter" id="spid13781" data-store-link="locator-_-filter-_-check-_-jffd"> 
                            <label for="spid13781" data-filter="Adoption Habitats" data-spid="13781">Adoption Habitats</label>
                        </li>
                    </ul> 
                </div>
            </div>
                <div class="clear"></div>
    </div>
</div>
<div class="container" style="background-color:#fff;border:2px double;padding:15px;">
                    <h1 class="text-center">Pet stores with complete care at heart</h1>
                    <div class="location-description">With over 50 years of service to pets and pet parents, Petco is a leader among pet stores when it comes to delivering health and happiness. We are committed to keeping pets physically fit, mentally alert, socially engaged and emotionally happy through our wide range of products, exceptional services and knowledgeable store partners. After all, for all pets do for us, it’s a little something we can do for them.
 
<h2><strong>A bold, new standard in nutrition</strong></h2>

At Petco, we're setting the new standard for nutrition by eliminating all dog and cat food and treats that contain artificial ingredients. 
<h2><strong>Pet supplies that stand for quality</strong></h2>
 
Whether you’re shopping for your Border Collie or your bearded dragon, Petco carries the pet supplies you need. Every product we offer meets our rigorous quality standards, and if you’re not satisfied with your purchase, you can return it with our no-risk, <a href="https://www.petco.com/returns" data-store-link="locator-_-main-_-link-_-100-guarantee" target="_blank">100% money-back guarantee.</a>

<h2><strong>Services to care for them from nose to tail</strong></h2>

Petco is so much more than a pet supply store, it’s your one-stop shop for total pet wellness. You’ll find a variety of premium pet services right inside most stores, designed to save you time, stress and money, including:
<ul>
<li><strong><a href="{{ url('dog-grooming') }}" title="Grooming" target="_blank">Grooming</a></strong> - Our full-service grooming salons offer an extensive array of solutions and services for dogs and cats, whether they need a nail trim or a total transformation.</li>
<li><strong><a href="{{ url('dog-training') }}" title="Positive Dog Training" target="_blank">Positive Dog Training</a></strong> - Petco's reward-based dog training classes teach the behavior basics, while helping you build a lifelong connection with your pet.</li>
<li><strong><a href="{{ url('veterinary-services') }}" title="Veterinary clinics" target="_blank">Veterinary clinics</a></strong> - Vetco clinics offer affordable, preventative care like pet vaccinations and microchipping in-store.</li>
<li><strong><a href="{{ url('veterinary-services') }}" title="Pet hospitals" target="_blank">Pet hospitals</a></strong> - In-store animal hospitals provide a full range of services from to spay and neuter procedures to advanced treatments and surgeries.</li>
<center><em>Disclaimer: Pet hospitals available at select locations only.</em></center>
<li><strong><a href="{{ url('adoptions') }}" title="Adoptions" target="_blank">Adoptions</a></strong> - Looking to grow your family? Check your local store calendar for adoption events.</li></ul></div>
                </div>
                            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container-fluid">
      <div class="row align-items-center">
          <div class="col-lg-7 col-md-12">
              <div class="faq-accordion">
                  <h2>Frequently Asked Questions</h2>
                  <ul class="accordion">
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Does MPMP offer curbside pickup?
                          </a>
                          <p class="accordion-content">
                          Yes. Curbside pickup is available at MPMP, during regular store hours. All of our products that are eligible for store pickup will show this option on the product's detail page.
                          </p>
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> What additional precautions is MPMP taking in light of COVID-19?
                          </a>
                          <p class="accordion-content">
                           All MPMP stores are cleaned and sanitized daily as part of our normal business operations. In light of COVID-19, we're increasing the frequency and extent of those cleanings and taking proactive steps to ensure all MPMP locations (including stores and our distribution and support centers) have ample hygiene and sanitation supplies available.
                           <br>
                           Out of an abundance of caution, we’re making disposable gloves and masks available to all MPMP partners, and requiring that all partners wear masks while working in our stores. Additionally, we have installed plexiglass barriers in MPMP stores located in areas that are highly impacted by COVID-19, and are in the process of making this safety feature available in stores nationwide.
                           <br>
                           Each MPMP store has several hand sanitizer dispenser stations in place at varying locations throughout the store, and we've instructed our store teams to ensure hand sanitizer is also available at all checkout locations, grooming salons and other high traffic areas of the store.
                           <br>
                           Using in-store signage, we're encouraging customers to help us keep our communities safe by maintaining at least six feet of distance from others, limiting the number of people per shopping trips when possible, and other recommended precautions.
                          </p>
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Can pets come into MPMP?
                          </a>
                          <p class="accordion-content">
                           Yes. Any domesticated, licensed, vaccinated companion animals are welcome to accompany you to your visit to Petco. All visiting pets are required to be appropriately restrained (leash, carrier, travel habitat).
                          </p>
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Does MPMP offer Price Matching?
                          </a>
                          <p class="accordion-content">
                           We do match prices available to the general public (i.e. not any special prices available to members of subscription or membership programs) at the following select online retailers (amazon.com, chewy.com, jet.com, petsmart.com, walmart.com, wag.com, target.com). We do not match prices at other retailers that are not previously listed.
                           
                          </p>
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Where is the closest MPMP?
                          </a>
                          <p class="accordion-content">
                           Use our store locator tool on stores.mpmp.com to find the store closest to you.
                          </p>
                      </li>

                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Does Petco sell cats?
                          </a>
                        
                          <p  class="accordion-content ml-2 list-unstyled">
                           Petco makes it easy to find your new furry family member by allowing you to meet adoptable pets at your local store. Cats are available for adoption in certain stores and dog adoption events occur routinely with rescue partners (call your local Petco for more details).
                          </p>
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> Does MPMP sell dogs?
                          </a>
                        
                          <p  class="accordion-content ml-2 list-unstyled">
                           MPMP makes it easy to find your new furry family member by allowing you to meet adoptable pets at your local store. Dogs are available for adoption in certain stores and dog adoption events occur routinely with rescue partners (call your local Petco for more details).
                          </p>
                      
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> How old do you have to be to volunteer at MPMP?
                          </a>
                        
                          <p  class="accordion-content ml-2 list-unstyled">
                           Volunteers must be 14 years or older and anyone under the age of 18 must volunteer with a parent/guardian.
                          </p>
                      
                      </li>
                      <li class="accordion-item">
                          <a class="accordion-title" href="javascript:void(0)">
                              <i class="fa fa-plus-circle"></i> How old do you have to be to work at MPMP?
                          </a>
                        
                          <p  class="accordion-content ml-2 list-unstyled">
                           You must be 18 years old to work at most MPMP locations.
                          </p>
                      
                      </li>
                  </ul>
              </div>
          </div>
         <div class="col-lg-5 col-md-12">
                                    <div class="faq-image">
                                        <img src="{{ asset('images/faq-img1.png') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
  
   $(document).ready(function(){
      $('.accordion').find('.accordion-title').on('click', function() {
          // Adds Active Class
          $(this).toggleClass('active');
          // Expand or Collapse This Panel
          $(this).next().slideToggle('fast');
          // Hide The Other Panels
          $('.accordion-content').not($(this).next()).slideUp('fast');
          // Removes Active Class From Other Titles
          $('.accordion-title').not($(this)).removeClass('active');
      });
     
    });
</script>
@include('mobilemenu')
@endsection