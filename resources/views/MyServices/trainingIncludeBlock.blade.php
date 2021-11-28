<style>
   .imgIcon {
   width: 140px;
   height :140px;
   }
   #blockIcon{
       display:block!important;
   }
   #blockIcon-mob{
       display:none!important;
   }
   @media only screen and (max-width: 600px) {
       #blockIcon{
           display:none!important;
       }
       #blockIcon-mob{
       display:block!important;
   }
   }
</style>
<div class="container p-5">
   <div id="blockIcon">
      <div class="row align-items-center">
         <div class="col">
            <?php $sectionHeading= App\Models\Point::where('service_id',"40")->orderBy('id','asc')->get();   ?>
            @foreach($sectionHeading as $last)
            {!! $last->point !!}
            @endforeach
            <br><br>
            <div class="center">
               <form action={{ url('shop',1) }} method="get">
               <button type="submit"class="primary-cta-blue" >SHOP</button>
               </form>
            </div>
         </div>
         <div class="col">
            <?php $images = App\Models\ImageLocation::where('key',"Online Dog Training")->orderBy('id','asc')->get();  ?>
            @foreach($images as $myIcon)
            <img src="{{ $myIcon->image_path }}" class="imgIcon">
            @endforeach
         </div>
      </div>
   </div>
   <div id="blockIcon-mob">
      <div class="row align-items-center">
         <div class="col">
            <?php $sectionHeading= App\Models\Point::where('service_id',"40")->orderBy('id','asc')->get();   ?>
            @foreach($sectionHeading as $last)
            {!! $last->point !!}
            @endforeach
            <br><br>
            <div class="center">
               <form action={{ url('shop',1) }} method="get">
               <button type="submit"class="primary-cta-blue p-3" >SHOP</button>
               </form>
            </div>
         </div>
         </div>
         <div class="row align-items-center mt-5">
         <div class="col">
            <?php $images = App\Models\ImageLocation::where('key',"Online Dog Training")->orderBy('id','asc')->get();  ?>
            @foreach($images as $myIcon)
            <img src="{{ $myIcon->image_path }}" class="imgIcon">
            @endforeach
         </div>
      </div>
   </div>
</div>