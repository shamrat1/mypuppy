@extends('layouts.myApp')
@section('content')
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
        @include('mobilemenu')
@endsection