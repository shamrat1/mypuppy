@extends('layouts.myApp')
@section('content')
<style>
.imgBanner{
   width:100%!important;
   height:100%!important;
   }
.reward td, .reward th {
   border: 1px solid #000;
   padding: 8px;
 }
 
 .reward tr:nth-child(even){background-color: #f2f2f2;}
 
 .reward tr:hover {background-color: #ddd;}
 
 .reward th {
   padding-top: 12px;
   padding-bottom: 12px;
   text-align: left;
   background-color: #005080;
   color: white;
 }
 </style>
 
 <div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            
            <li>
                <a href="javascript:void(0)">
                <span>Rewards</span>
                </a>
             </li>
         </ul>
</div>
<img src="{{ asset('images/rewardBanner.png') }}" alt="bannerimage" class="imgBanner">
       <div class="container">
          <div class="about-us-content">
             <br>
             <h2 style="text-align: center;">Welcome to My Puppy My pet Rewards!</h2>
             <p>&nbsp; At Friends For Life, we understand that you want the opportunity to earn more rewards faster. And that's why we're excited to welcome you to the new and improved Friends For Life rewards program.
                <br>&nbsp; Simply join with us <a href="javascript:void(0)"> https://mypuppymypet.demo-meritzeal2.com/rewards</a>
             </p>
             <h4>Earn points with every purchase</h4>
             <p>On top of your benefits, every dollar you spend in online with My Puppy My Pet you point towards more savings. The points you earn are linked to your membership status. Every Point that you rean you can used on your next purchase, at online. Easy!</p>
             <h3>It’s easy to earn Rewards:</h3>
             <h4>MPMP CASH</h4>
             <p>As a My puppy My Pet Rewards Member, you’ll earn MPMP Cash for every $ you spent on thousands of products and services in online. Use them on anything you like, at any time you like, in online. Look out for member only offers and opportunities to earn double or triple Cash.</p>
             <div class="row">
                <div class="column">
                   <h4>How many points will you earn?</h4>
                   <p> %5 MPMP Cash Back for your each Shopping, you can use that for your Next Purchase with Us.</p>
                   <table class="reward">
                      <tr>
                         <th>Spend</th>
                         <th>Cash Back</th>
                      </tr>
                      <tr>
                         <td>Spend $20</td>
                         <td>1 MPMP CASH</td>
                      </tr>
                      <tr>
                         <td>Spend $100</td>
                         <td>5 MPMP CASH</td>
                      </tr>
                      <tr>
                         <td>Spend $1000</td>
                         <td>50 MPMP CASH</td>
                      </tr>
                   </table>
                </div>
                <div class="column">
                   <h4>How many points will you earn from my Referral?</h4>
                   <p>Invite your friends and family to join our online shopping and earn %5 from the total shopping from each referral.</p>
                   <table class="reward">
                      <tr>
                         <th>Invite</th>
                         <th>Rewards</th>
                      </tr>
                      <tr>
                         <td>When Your Friend Spent $20 +</td>
                         <td>You Will Receive 1+ MPMP CASH</td>
                      </tr>
                      <tr>
                         <td>When Your Friend Spent $100 + </td>
                         <td>You Will Receive 5+ MPMP CASH</td>
                      </tr>
                      <tr>
                         <td>When Your Friend Spent $1000 +</td>
                         <td>You Will Receive 50+ MPMP CASH </td>
                      </tr>
                   </table>
                </div>
             </div>
             <br>
             <h4>Birthday Gift for your Pet</h4>
             <p>If you are eligible Customer Every year you will receive gift for your pet birthday. </p> 

             <h4>Sharing your Postage Fee</h4> 
             <p>We deliver everything straight to your door and offer %50 offer for your shipping cost on all orders over $200</p> 

             <h4>Track your rewards </h4> 
             <p>You can keep an eye on your rewards points and your Frequent Feeder status by logging in to your account here. If you haven't already activated your online profile, it only takes a minute to register. Online members are the first to know about the latest offers from “My puppy My Pet” special opportunities to earn bonus Friends For Life points and reach your rewards sooner.</p> 

        </div>
      </div>
    </div>
 </div>
</div>
  @endsection