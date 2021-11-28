@extends('layouts.myApp')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<header
class="l-section c-page-header c-page-header--header-type-1">
<img class="c-page-header__image" width="1920" height="900" src="https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957.jpg" srcset="https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957.jpg 1920w, https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957-360x169.jpg 360w, https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957-1500x703.jpg 1500w, https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957-750x352.jpg 750w, https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957-1536x720.jpg 1536w, https://parkofideas.com/antek/demo1/wp-content/uploads/2021/03/antek-0625137957-171x80.jpg 171w" sizes="(max-width: 1920px) 100vw, 1920px" alt="bg-categories" loading="lazy"/>				<div class="c-page-header__shadow"></div>
<svg class="c-page-header__bar" xmlns="http://www.w3.org/2000/svg" width="488" height="25" fill="inherit" viewBox="0 0 487 25"><path fill-rule="evenodd" d="M474.791 25h-1.664L486.334-.004H488L474.791 25zm-10.222 0l13.21-25.004h1.666L466.235 25h-1.666zm-8.554 0L469.223-.004h1.664L457.68 25h-1.665zm-8.557 0L460.669-.004h1.664L449.123 25h-1.665zm-8.554 0l13.21-25.004h1.666L440.569 25h-1.665zm-8.558 0l13.21-25.004h1.666L432.012 25h-1.666zm-8.554 0l13.21-25.004h1.666L423.457 25h-1.665zm-8.554 0L426.445-.004h1.665L414.903 25h-1.665zm-8.558 0L417.891-.004h1.665L406.345 25h-1.665zm-8.553 0L409.333-.004h1.666L397.791 25h-1.664zm-8.558 0l13.21-25.004h1.665L389.234 25h-1.665zm-8.554 0L392.226-.004h1.665L380.681 25h-1.666zm-8.558 0l13.21-25.004h1.666L372.122 25h-1.665zm-8.553 0l13.21-25.004h1.665L363.569 25h-1.665zm-9.174 0L365.937-.004h1.665L354.394 25h-1.664zm-8.558 0l13.21-25.004h1.666L345.837 25h-1.665zm-8.554 0L348.826-.004h1.664L337.283 25h-1.665zm-8.557 0L340.272-.004h1.664L328.726 25h-1.665zm-8.554 0l13.21-25.004h1.666L320.172 25h-1.665zm-8.559 0L323.159-.004h1.666L311.615 25h-1.667zm-8.553 0l13.21-25.004h1.666L303.06 25h-1.665zm-8.554 0L306.048-.004h1.665L294.506 25h-1.665zm-8.558 0L297.494-.004h1.665L285.948 25h-1.665zm-8.553 0L288.936-.004h1.666L277.394 25h-1.664zm-8.558 0l13.21-25.004h1.665L268.837 25h-1.665zm-8.554 0L271.829-.004h1.665L260.283 25h-1.665zm-8.558 0L263.27-.004h1.666L251.725 25h-1.665zm-8.553 0l13.21-25.004h1.665L243.172 25h-1.665zm-9.886 0L244.828-.004h1.665L233.284 25h-1.663zm-8.559 0L236.273-.004h1.666L224.728 25h-1.666zm-8.554 0L227.716-.004h1.665L216.174 25h-1.666zm-8.556 0l13.21-25.004h1.665L207.617 25h-1.665zm-8.555 0l13.21-25.004h1.666L199.062 25h-1.665zm-8.558 0L202.05-.004h1.665L190.505 25h-1.666zm-8.553 0l13.21-25.004h1.665L181.951 25h-1.665zm-8.555 0L184.939-.004h1.664L173.397 25h-1.666zm-8.557 0L176.385-.004h1.664L164.839 25h-1.665zm-8.554 0L167.827-.004h1.665L156.285 25h-1.665zm-8.558 0l13.21-25.004h1.666L147.728 25h-1.666zm-8.554 0L150.719-.004h1.665L139.174 25h-1.666zm-8.557 0l13.21-25.004h1.666L130.615 25h-1.664zm-8.554 0L133.608-.004h1.664L122.062 25h-1.665zm-9.174 0L124.431-.004h1.665L112.887 25h-1.664zm-8.558 0L115.876-.004h1.666L104.331 25h-1.666zm-8.554 0L107.319-.004h1.665L95.777 25h-1.666zm-8.556 0L98.765-.004h1.665L87.219 25h-1.664zM77 25L90.21-.004h1.666L78.665 25H77zm-8.558 0L81.653-.004h1.665L70.108 25h-1.666zm-8.554 0L73.099-.004h1.665L61.554 25h-1.666zm-8.554 0L64.541-.004h1.665L53 25h-1.666zm-8.557 0L55.988-.004h1.664L44.442 25h-1.665zm-8.554 0L47.43-.004h1.665L35.888 25h-1.665zm-8.558 0L38.875-.004h1.666L27.331 25h-1.666zm-8.554 0L30.322-.004h1.665L18.777 25h-1.666zm-8.557 0L21.764-.004h1.666L10.218 25H8.554zM0 25L13.21-.004h1.665L1.665 25H0z"/></svg>		<div
  class="c-page-header__wrap ">

    <div>
      <i class="ip-decor c-page-header__decor"></i>
    </div>
                          <h1 class="l-section__container c-page-header__title">paymentz with Paypal</h1>
                          <nav class="c-breadcrumbs">
<ol class="c-breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">
          <li class="c-breadcrumbs__item  c-breadcrumbs__item--first  "
      itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
      <a itemprop="item" title="Home" href="{{ url('/') }}"><span
         class="text-dark"	itemprop="name">Home</span></a>
      <meta itemprop="position" content="1">
    </li>
      <li class="c-breadcrumbs__item   c-breadcrumbs__item--last "
      itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
      <a itemprop="item" title="Check Out" href="#"><span
            class="text-light"	itemprop="name">paymentz with Paypal</span></a>
      <meta itemprop="position" content="2">
    </li>
        </ol>
</nav>
            </div>
</header>
<div class="container mt-5" style="background-color: #F5F5F5">

<br>

  <ul>
   <li> <strong> Transaction Id : </strong> {{$paymentz->token}}</li>
   <li><strong> Time : </strong> {{date('F j, Y', strtotime($paymentz->created_at))}}
    at {{date('H: i', strtotime($paymentz->created_at))}} </li>
   
  <li><strong>Payment Status :</strong>{{$paymentz->status}}</li>
  <li><strong>Order Id :</strong> {{ $paymentz->order_id }}</li>
  
  <li class="text-center"><img src="{{asset('images/gif/transactionsuccess.gif')}}"  style="width: 550px;
    height: 300px;" alt="Transaction Success"></li>
    <li class="text-center"><a href="{{ url('/my-orders') }}" class="c-form__button c-cart-empty__backward">My Orders </a>
    </li>
  </ul>
{{-- 
    <pre>
    {{print_r($result)}}
    </pre> --}}
  
</div>

@endsection