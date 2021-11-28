@extends('layouts.myApp')
@section('content')
<style>
.imgBanner{
       width:100%!important;
       height:100%!important;
   }
   .imgDIYWash{
      width:795; 
      height:300;
      border: 2px solid #fff;
 }
.background-img-newsaltwaterfish-hero-container {
        background-image: url(images/dogWashPricingBanner.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center fixed;
        max-width: 100%!important;
        padding: 50px;
    }
    @media only screen and (max-width: 600px) {
 .imgDIYWash{
      width:100%; 
      height:100%;
      border: 2px solid #fff;
 }
}   
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                  <a href="{{ url('/services') }}">
                  <span>Services</span>
                  </a>
               </li>
            <li>
                        <a href="javascript:void(0)">
                        <span>DIY Dog Wash</span>
                        </a>
                     </li>
         </ul>
</div>

  <img src="{{ asset('images/dogWashPricingBanner.png') }}" alt="bannerimage" class="imgBanner">
  <div class="booknow">
   <form action="{{ route('appointment.service',) }}" method="POST">
      @csrf
      <input type="hidden" name="service_name" value="DIY Dog Wash" />
   <button type="submit" class="btn btn-category slide_right">Book an Appointment</button>
   </form>
</div>
   <div id="main" style="margin-bottom:15px; ">
      <div class="page-home">
         <div class="container">
            <div class="about-us-content">
               <br>
               <div id="pgc-1985-0-0" class="panel-grid-cell">
                  <div id="panel-1985-0-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="0">
                     <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <div class="siteorigin-widget-tinymce textwidget">
                          
                           <p>It’s a common&nbsp;dilemma&nbsp;for pet owners:&nbsp;Should you wash your dog yourself, go to the groomer or use a self-service pet wash? Taking your dog to a groomer is&nbsp;less of a hassle&nbsp;than washing your dog yourself, but it's also expensive. You have to fit into an appointment time, and your dog might not be overly fond of the groomer, making the whole experience stressful for everyone.</p>
                           <p>If you wash your dog yourself, you can save money, time and stress compared to going to the groomer. And you can do it&nbsp;whenever it's convenient for you,&nbsp;instead of needing to schedule an appointment. After all, when your dog decides a mud romp is a great way to end the day, you might not be able to get&nbsp;in&nbsp;with the groomer right away. We specialize in places to wash your dog yourself, with professional results!</p>
                           <p>The whole process of getting your dog into the bathtub — and the cleanup process after — doesn't sound like a good time either. What other option do you have? A self-serve dog wash can solve many of these issues.</p>
                          
                           
                           </p>
                           <h2 id="how_to_use_self_serve_dog wash">How to Use a Self-Serve Dog Wash</h2>
                           <p>You'll be surprised at how simple a&nbsp;<a href="{{ url('dog-washing-stations') }}" target="_blank" rel="noopener noreferrer">self-serve dog wash</a>&nbsp;is to use. Once you try it, you'll never wash your dog in the bathtub again.</p>
                           <p>Here are the basic steps:</p>
                           <ol>
                              <li>Take your dog on a leash into the dog wash facility. Once inside, secure the leash to a hook to keep your dog in place.</li>
                              <li>Carefully remove any matting or burrs in your dog's fur before bathing.</li>
                              <li>Allow water to get comfortably warm.</li>
                              <li>Thoroughly wet and lather your dog with whatever shampoo you've selected.</li>
                              <li>Rinse&nbsp;thoroughly&nbsp;to remove all shampoo from your dog's coat.&nbsp;Leftover&nbsp;shampoo can make your dog itch, and it also attracts dirt.</li>
                              <li>If desired, apply conditioner and rinse again if the conditioner you use requires it.</li>
                              <li>Dry your dog with a towel or a low-heat blow dryer.</li>
                           </ol>
                           <p>To make it even more&nbsp;of a cinch, follow these do-it-yourself dog wash tips.</p>
                           <ul>
                              <li><b>Brush your dog thoroughly before&nbsp;bathtime:</b>&nbsp;Doing so&nbsp;will help remove loose dirt and hair, making the bath&nbsp;more effective.</li>
                              <li><b>Tie your dog securely in the wash station:</b>&nbsp;It's&nbsp;also a good time for a treat, so your dog begins to associate&nbsp;bathtime&nbsp;with something positive.</li>
                              <li><b>Be very careful not to get water in your dog's ears:</b>&nbsp;Not only is it irritating, but it can also lead to infection. Some people put cotton balls in their dog's ears to help keep them dry.</li>
                              <li><b>Wash your dog from the neck down:</b>&nbsp;Following this advice&nbsp;not only helps keep water out of their ears, but it also ensures you don't get water or shampoo in your dog's eyes. To wash your dog's face, use a wet washcloth. Use special wipes designed for cleaning the ears and around the eyes.</li>
                              <li><b>Go slowly with the blow dryer:</b> Keep in mind that some dogs are afraid of the noise of a&nbsp;blow dryer,&nbsp;so you may need to gradually introduce it. Turn the dryer on and give a treat, but don't hesitate to switch to a towel if your dog seems overly stressed.</li>
                              <li><b>Check the blow dryer heat setting:</b> If your dog is&nbsp;OK&nbsp;with a dryer, ensure it doesn’t get too hot.&nbsp;Blow dryers&nbsp;at a DIY dog wash are&nbsp;safe to&nbsp;use on dogs, but you'll still want to monitor the temperature.</li>
                           </ul>
                           <h2 id="how_to_groom_your_dog">How to Groom Your Dog Yourself and Save Money</h2>
                           <p>Often, a bath and blow dry alone are enough when your dog is dirty, but grooming a dog consists of more than just bathing them. DIY dog grooming is not only a great way to save money, but it's a perfect opportunity to create a closer bond with your dog.</p>
                           <p><img class="aligncenter size-full imgDIYWash lazyloaded" src="{{ asset('images/2-materials-needed.jpg') }}" alt="Materials Needed for Dog Grooming" srcset="{{ asset('images/2-materials-needed.jpg') }}" data-ll-status="loaded">
                           
                           </p>
                           <p>First, you'll need to be sure you have the right tools. If you're new to grooming your dog, you're probably asking, “What do I need to groom my dog correctly?” Gather essential grooming tools, including:</p>
                           <ul>
                              <li>Shampoo</li>
                              <li>Brush</li>
                              <li>Wipes for eyes and ears</li>
                              <li>Nail clipper&nbsp;or&nbsp;grinder</li>
                              <li>Emery board</li>
                              <li>Styptic powder or&nbsp;cornstarch</li>
                              <li>Hair clipper if your dog requires a&nbsp;haircut</li>
                              <li>Scissors</li>
                              <li>Grooming spray</li>
                           </ul>
                           <p>Once you have your tools, you can start the grooming process.</p>
                           <h2>1. Clean Eyes and Ears</h3>
                           <p>After bathing and drying your dog, it's time to pay special attention to the face and ears. Some dogs, such as&nbsp;poodles, are prone to staining around the eyes. You can use special wipes designed for cleaning the eye area to get rid of the stains. Do this carefully,&nbsp;so your dog feels safe and secure.</p>
                           <p>While you clean your dog's face, it's a good time to check the health of&nbsp;their&nbsp;eyes. Gently pull down the lower lid. It should be pink, not red or white. If the color is off, consult your veterinarian.&nbsp;Also,&nbsp;check for unusual discharge or crustiness around the eye area.</p>
                           <p>Next, you'll want to clean your dog's ears. You can buy special wipes designed for dog ears. Another option is to&nbsp;use&nbsp;ear wash and cotton balls to clean dirt and excess wax out of&nbsp;their&nbsp;ears. Always be careful when cleaning your dog's ears. Don't probe where you can't see, because you can do damage. Some dogs also need hair trimmed from the inside of their ears. Have patience if this is new for your dog.</p>
                           <p>If your dog spends a lot of time in the water, you will need to pay special attention to&nbsp;their&nbsp;ears. Put cotton balls in to prevent water from entering the ear canal. When your dog gets out of the water, dry&nbsp;their&nbsp;ears carefully. You can also purchase a solution that helps dry ears.</p>
                           <p>While you are cleaning your dog's ears, look for redness, swelling, discharge or odor. These can be signs of an infection. Other signs of infection include loss of balance, excessive head shaking, rubbing ears on furniture or walking in circles. If you notice any of these symptoms, schedule an appointment with your vet.</p>
                           <h2>2. Brush Fur</h3>
                           <p>Now, you'll want to brush your dog. There are many kinds of dog brushes, but you don't have to feel overwhelmed. Often,&nbsp;your dog's coat will determine&nbsp;the type of brush you need.</p>
                           <p>Generally,&nbsp;you'll only need to brush&nbsp;a short coat once a week. A rubber-bristled brush will help remove dead skin, dirt and hair. If your dog has a dense coat, a slicker brush will be useful for removing mats.</p>
                           <p>Dogs with a long coat need a bit more attention, so plan to set aside a little time each day to keep your dog's coat beautiful and healthy. Start with a slicker brush to remove mats and tangles. A little conditioning spray may help make this task easier, but daily grooming will also keep the matting at bay. Once you get the tangles out, use a&nbsp;bristled&nbsp;brush to remove dead skin, loose hair and dirt. Finish off with a spritz of grooming spray if desired.</p>
                           <h2>3. Give Your Dog a Haircut</h3>
                           <p>Once&nbsp;you've brushed&nbsp;your dog, it may be time to trim carefully around&nbsp;their&nbsp;face and feet. Using scissors with a rounded or ball tip is a good way to prevent injury if your dog moves suddenly. If you plan to do more than trimming, consider getting thinning or coat scissors, depending on your needs.</p>
                           <p><img class="aligncenter size-full imgDIYWash lazyloaded" src="{{ asset('images/4-rounded-scissors.jpg') }}" alt="Rounded Scissors" srcset="{{ asset('images/4-rounded-scissors.jpg') }}" data-ll-status="loaded">
                           
                           </p>
                           <h2><strong>4. Trim Their Nails</strong></h3>
                           <p>After you tended to your dog's coat, you'll want to take a closer look at his feet. Unless he gets a lot of exercise, your dog will likely need a nail trim. Not trimming nails can result in feet that are painful to walk on, but this is easily avoided by clipping your dog's nails a couple of times a month.</p>
                           <p>There are two types of nail clippers. One is a scissors type, and the other is called a guillotine. Most dog professionals prefer the scissors type of clipper over the guillotine clipper to help prevent injury.</p>
                           <p>Before clipping, gently separate the toes and trim away excess hair, which can dull your nail clipper. Then, clip the tip of each nail. You can smooth rough edges with an emery board or nail grinder.</p>
                           <p>If your dog's nails are excessively long, trim them weekly until they are the proper length. Do NOT trim too much in an effort to shorten them more quickly. This can result in cutting into the nail bed, also called the quick. This is painful and causes bleeding. It can also make your dog fearful of having his nails trimmed in the future. If you accidentally cut too deep, use styptic powder or cornstarch to stop the bleeding.</p>
                           <h2><strong>5. Clean Teeth&nbsp;</strong></h3>
                           <p>An important part of grooming that many people forget is dental care. You should brush your dog's teeth regularly. If this seems like too much of a chore because your dog is uncooperative, consider that dental disease can lead to heart, kidney and liver problems. Keeping up with this yourself can save you hundreds of dollars a year.</p>
                           <p>Take it slow when it comes to brushing your dog’s teeth. Buy a pleasantly flavored toothpaste designed for dogs and just do a little bit followed by lots of praise and reward. Soon your dog will look forward to this time, and you'll be able to brush his or her teeth every day.</p>
                           <p><img class="aligncenter size-full imgDIYWash lazyloaded" src="{{ asset('images/3-dog-toothpaste.jpg') }}" alt="Dog Toothpaste" srcset="{{ asset('images/3-dog-toothpaste.jpg') }}" data-ll-status="loaded">
                           
                           </p>
                           <h2>Breed-Specific Grooming Considerations</h3>
                           <p>Some breeds require a little extra care. Be sure to consider these needs when you set up your grooming routine.</p>
                           <ul>
                              <li><b>Wrinkles:</b>&nbsp;Some breeds, such as the French&nbsp;bulldog, Shar-Pei, Neapolitan&nbsp;mastiff and&nbsp;pug, have wrinkled faces and bodies. These wrinkles are pretty adorable, but they also need special care. Dirt and moisture can become trapped in those skin folds and cause skin irritations and infections. During grooming, be sure to clean and dry each fold of skin daily to keep your dog healthy and happy. You can use special wipes or a washcloth and gentle cleanser. Make sure you rinse cleansers and shampoo&nbsp;thoroughly,&nbsp;because residue can also irritate the skin.</li>
                              <li><b>Curly coats</b><b>:</b>&nbsp;Curls tend to hold on to fur, even after your dog sheds hair. Accumulated hair forms&nbsp;painful mats that pull on the skin, which&nbsp;is why daily brushing is&nbsp;essential&nbsp;for breeds such as the Airedale and&nbsp;cocker&nbsp;spaniel. When bathing your curly-coated&nbsp;dog, take extra care to rinse&nbsp;the&nbsp;shampoo out completely. In the same way those curls trap loose hair, they can also trap shampoo. Shampoo that dries on your dog can cause skin irritation.</li>
                              <li><b>Floppy or hairy ears</b><b>:</b>&nbsp;Most dogs only need their ears cleaned&nbsp;once per month. But dogs such as the Afghan&nbsp;hound and&nbsp;basset&nbsp;hound, with floppy or hairy ears, need more frequent cleaning. That's&nbsp;because there is less air circulation, and the ear traps dirt and moisture that can lead to infection. Give your dog's ears a wipe each week to remove dirt. If there is a lot of hair inside your dog's ears, you can also consider plucking&nbsp;them&nbsp;with special tweezers designed for dog ears. This&nbsp;process&nbsp;is not typically painful and can make it much easier to clean the ears as well as spot signs of infection.</li>
                              <li><b>Non-shedding dogs</b><b>:</b>&nbsp;Some dogs are popular because they shed very little. Examples are the&nbsp;standard&nbsp;poodle and Irish&nbsp;water&nbsp;spaniel. While this is&nbsp;ideal&nbsp;when it comes to allergies or housekeeping, it also means your dog's coat will need a little extra care. These breeds will likely need daily brushing and occasional trimming to keep the coat tidy and prevent matting.</li>
                              <li><b>Tear stains</b><b>:</b>&nbsp;Short-nosed breeds such as the Shih Tzu and Maltese tend to tear more than other breeds, which&nbsp;often leads to staining. While staining doesn't&nbsp;require treatment, many owners prefer to keep those stains away. To prevent tear stains, rinse your dog's eyes daily with a special canine&nbsp;eyewash&nbsp;product. You can also wash the fur around&nbsp;their&nbsp;eyes with the same product or a contact lens solution. You should keep the hair around your dog's eyes carefully trimmed, as well.</li>
                           </ul>
                           <p>Once you establish a routine, it will take much less time than you might think. And the rewards aren’t&nbsp;only&nbsp;monetary. You'll also get more&nbsp;bonding&nbsp;time with your pet, and you'll be more likely to notice any potential health issues. DIY grooming will keep your pet healthy, and both of you happy.</p>
                           <h2>DIY Dog Grooming Made Easy at All Paws Pet Wash</h2>
                           <p><a href="https://allpawspetwash.com/">All Paws Pet Wash</a>&nbsp;is here&nbsp;to make your job&nbsp;as a pet parent&nbsp;easier. We have self-contained, fully functional pet wash buildings across the country. When you use an All Paws Pet Wash&nbsp;self-serve&nbsp;station, grooming your dog yourself is easy because you don't have to break your back leaning over a bathtub,&nbsp;or&nbsp;clean up your entire bathroom after grooming. All the supplies you need are right there. And if you have a bigger dog, you have plenty of room to get the job done — and have fun while you’re doing it.</p>
                           <h3 id="benefits_using_self_serve_dog_wash">Benefits of Using a Self-Serve Dog Wash</h3>
                           <p>Using a do-it-yourself dog wash station has several benefits.</p>
                           <h2>1. Convenience</h3>
                           <p>Our DIY dog wash stations are open 24 hours a day, seven days a week, so you can wash your dog at all hours of the day or night without worrying that some barking or howling will bother the neighbors. And you don't have to take time out of your day to call and schedule an appointment or wait for a coveted slot to open up — just come by whenever is best for you.</p>
                           <h2>2. Full Stock of Tools</h3>
                           <p>When you use All Paws Pet Wash, there's no need to lug bottles of shampoo or a stack of towels. The dog wash station will contain a full stock of towels and five different choices of shampoos, as well as a disinfectant to keep the space safe and healthy. It will have aprons to protect your clothes and a vending machine full of treats to keep your dog happy and occupied. And it will have an easy-to-use sprayer that lets you shampoo without squeezing your dog under a tiny faucet, as well as a dryer and vacuum for afterward.</p>
                           <p><img class="aligncenter size-full imgDIYWash lazyloaded" src="{{ asset('images/5-space-for-big-dogs.jpg') }}" alt="5-space-for-big-dogs" srcset="{{ asset('images/5-space-for-big-dogs.jpg') }}" data-ll-status="loaded">
                           
                           </p>
                           <h2>3. Affordability</h3>
                           <p>Many professional dog groomers charge high prices, but DIY dog grooming with All Paws Pet Wash is an affordable, quality experience. Our easy-to-use coin-operated stations make paying simple, and our economical prices help leave some room in your budget.</p>
                           <h2>4. Less Mess</h3>
                           <p>Washing your dog at home can be an especially messy experience. As hard as you try to contain your pet, sometimes it just isn't possible. Your dog may slop water and suds all over the bathroom or shake dry near the nice furniture in your living room, sending hair and water everywhere. Even if you successfully keep your home clean and dry, that distinctive wet-dog smell can linger for hours. Bring your dog to All Paws Pet Wash and keep your home clean, dry and fresh-smelling.</p>
                           <h2>Entrepreneurial Opportunities</h2>
                           <p>Sometimes the DIY model extends to going into business for yourself. If you're interested in operating a do-it-yourself dog bath, we have opportunities for you! Our dog wash stations come fully assembled and ready to hook up to utilities, and they are sturdy, reliable and easy to clean. We offer a variety of package deals as well — these offer perks like security cameras, advertising and signage.</p>
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection