@extends('layouts.myApp')
@section('content')
<style>
    .imgThumnail {
        width: 320px;
        height : 280px;
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
                                 <a href="{{ url('/services') }}">
                                 <span>Services</span>
                                 </a>
                                 </li>
                                <li>
                                    <a href="{{ url('/diy-dog-wash') }}">
                                        <span>Diy Dog Wash</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span>Commercial Dog Washing Stations and More</span>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </nav>
                <div id="main">
                    <div class="page-home">
                        <div class="container">
                            <div class="about-us-content">
                                <br>
                                <h1 class="title-page">Commercial Dog Washing Stations and More</h1>
                                <div class="row">
                                    <div class="column">
                                        <img src="{{ asset('images/APW_A_Iso.png') }}" class="imgThumnail" alt="">
                                        <h3>APWs</h3>
                                        <p>
                                            
                                            Our flagship models. These units come in five different varieties and can be programmed to generate revenue or act as a free amenity unit. Owners can set their own rates or use our standard $10 for 12 minutes configuration. Every unit measures differently in size and has a separate list of features. Use our interactive guide to help you decide which model is best for you!
                                        </p>
                                    </div>
                                    <div class="column">
                                        <img src="{{ asset('images/ADA-813-iso-1.png') }}" class="imgThumnail" alt="">
                                        <h3>Modular Buildings</h3>
                                        <p>
                                            Our Modular Buildings offer all of the convenience of our APW models with the addition of a fully enclosed bay. These buildings are fully air conditioned for the summer months and heated for those cold winter months. Our buildings also feature a vacuum for sucking up all of the excess water left on your pet after a wash. Modular buildings come in two sizes, a single (8' x 13'), and a double (8' x 21').</p>
                                    </div>
                                    <div class="column">
                                        <img src="{{ asset('images/Awning-Quarter-Iso.png') }}" class="imgThumnail" alt="">
                                        <h3>Awnings</h3>
                                        <p>
                                            Built to the same high standards as our aluminum powder coated units, these awnings offer protection from the elements while washing your pet. Our awnings make a great addition to any APW unit and they can be powder coated to match your unit. Alternately, choose another color to add some contrast and make your unit pop.
                                        </p>
                                    </div>
                                </div>
                                @include('mobilemenu')
                                @endsection