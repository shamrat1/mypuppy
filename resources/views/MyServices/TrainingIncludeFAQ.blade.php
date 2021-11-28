<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<style>
@media only screen and (max-width: 600px) {
 .imgFaq {
   height: 100%!important;
   width: 100%!important;  
   }
   }
  </style>
<div class="container-fluid">
   <div class="row align-items-center">
      <div class="col-lg-7 col-md-12">
         <div class="faq-accordion">
            <h3>Frequently Asked Questions</h3>
            <ul class="accordion">
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How old should my dog be to start dog training classes?
                  </a>
                  <p class="accordion-content">
                     It depends on the class level. Puppies can take their first class starting at 2-4 months, while more mature dogs can start at 6 months.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What time are training classes?
                  </a>
                  <p class="accordion-content">
                     Class times vary by store location. The group class you enroll in will occur at the same time every week for 6 consecutive weeks (week may be skipped if class falls on major holiday).
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What do I need to bring to class?
                  </a>
                  <p class="accordion-content">
                     A current copy of your dog's vaccination records, a 6 foot nylon or leather leash, a collar or harness, training treats and a treat pouch, and cleanup bags.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What vaccinations are required to participate in training classes?
                  </a>
                  <p class="accordion-content">
                     To participate in trianing classes we require to see up-to-date documentation of age-appropriate vaccinations including:
                     <br><br>
                     ★	Parvovirus, hepatitis, and distemper vaccinations for all dogs and puppies.
                     <br>
                     ★	Rabies vaccination for dogs aged 16 weeks or older (if a medical reason prohibits your pet from receiving this vaccination, please consult your trainer ahead of visit).
                     <br>
                     ★	Parvovirus (panleukopenia), herpesvirus-1 (viral rhinotracheitis), and calicivirus for cats. 
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> Does my dog need to complete level 1 in order to participate in level 2?
                  </a>
                  <p class="accordion-content">
                     We want to set you and your dog up to be successful! If you have already had some type of formal training with your (older than six months) dog, you may be ready for our Adult Level 2 class. Our Puppy Level classes are based on the age of your puppy.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i>What happens if I have to miss a class?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     You will get six classes in total. Together we will figure out a makeup class for you and your dog.
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> What if my class lands on the same day as a major holiday?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     We schedule around major holidays and will add an additional week to ensure you get your six classes in the amount of weeks needed to complete them!
                  </p>
               </li>
               <li class="accordion-item">
                  <a class="accordion-title" href="javascript:void(0)">
                  <i class="fa fa-plus-circle"></i> How many dogs participate in a training class?
                  </a>
                  <p  class="accordion-content ml-2 list-unstyled">
                     It depends on the size of the training area, as we follow our safety policy to always keep a minimum of three feet in between dogs at all times!
                  </p>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-5 col-md-12">
         <div class="p-3">
            <img src="{{ asset('images/faq-img1.png') }}" class="imgFaq" alt="image">
         </div>
      </div>
   </div>
</div>
</div>
</div>
<br><br>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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