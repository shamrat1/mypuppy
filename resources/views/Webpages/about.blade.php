@extends('layouts.myApp')

@section('content')

  <style>
    li{
        padding: 10px;
      }
      .imgBanner{
           width:100%!important;
           height:100%!important;
       }
      
      #showhide1,
      #showhide2,
      #showhide3 {
        display:none;
       }
  </style>
  
  <div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">About us</a></li>
         </ul>
</div>
   <img src="{{ asset('images/aboutBanner.png') }}" alt="bannerimage" class="imgBanner">
    
                        <div class="container">
                            <div class="about-us-content">
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 right">
                                        <a href="javascript(0)">
                                            <img class="img-fluid" src="img/other/1.jpg" alt="#" />
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 left">
                                        <div class="cms-block f-right">
                                            <h2 class="page-subheading">WHO WE ARE</h2>
                                            <?php $companyInfo = App\Models\CompanyInfo::orderBy('id','ASC')->get(); ?>
                                            @foreach ($companyInfo as $data)
                                                <p style="margin: 25px;padding:25px;"> {{ $data->who_we_are }}</p>
                                            @endforeach
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 right">
                                        <div class="cms-block f-left">
                                            <h2 class="page-subheading">WHAT WE DO</h3>
                                            <?php $points = App\Models\WhyChooseUsPoint::orderBy('id','ASC')->get();  ?>                        
                                                @foreach ( $points as $data)
                                                    <ol>
                                                        <li>{{ $data->point1 }}</li>
                                                        <li>{{ $data->point2 }}</li>
                                                        <li>{{ $data->point3 }}</li>
                                                        <li>{{ $data->point4 }}</li>
                                                        <li>{{ $data->point5 }}</li>
                                                        <li>{{ $data->point6 }}</li>
                                                    </ol>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 left">
                                        <a href="#">
                                            <img class="img-fluid" src="img/other/2.jpg" alt="#" />
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 right">
                                        <a href="#">
                                            <img class="img-fluid" src="img/other/3.jpg" alt="#" />
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 left">
                                        <div class="cms-block f-right">
                                            <h2 class="page-subheading no-before">Our principles</h3>
                                                <?php $data = App\Models\About::findOrFail(1);  ?>                        
                                                
                                                    <ol>
                                                        <li>{{ $data->paragraph_1 }}</li>
                                                        <li>{{ $data->paragraph_2 }}</li>
                                                        <li>{{ $data->paragraph_3 }}</li>
                                                        
                                                     
                                                            <li id="showhide1">{{ $data->sidebarpoint1 }}</li>
                                                            <li id="showhide2">{{ $data->sidebarpoint2 }}</li>
                                                            <li id="showhide3">{{ $data->sidebarpoint3 }}</li>
                                                        
                                                            <button class="btn-category slide_right" id="button" onclick="show()">Show More..</button>
                                                    </ol>
                                                
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function show()
        {
            var m1=document.getElementById("showhide1");
            var m2=document.getElementById("showhide2");
            var m3=document.getElementById("showhide3");
            var button1 =document.getElementById("button");
            if(m1.style.display==="none" )
            {
                m1.style.display = "block";
                m2.style.display = "block";
                m3.style.display = "block";
               
            }
            else
            {
                m1.style.display = "none";
                m2.style.display = "none";
                m3.style.display = "none";
                
            }
            
        }
        
    </script>
    @endsection


