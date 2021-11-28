 var layout01 = document.getElementById("layout01");
    var layout02 = document.getElementById("layout02");
    var layout03 = document.getElementById("layout03");
    var layout04 = document.getElementById("layout04");
    var layout05 = document.getElementById("layout05");
   
    var tab1 = document.getElementById("tab1");
    var tab2 = document.getElementById("tab2");
    var tab3 = document.getElementById("tab3");
    var tab4 = document.getElementById("tab4");
    var tab5 = document.getElementById("tab5");
   
   function category_view1() {
             
            layout01.classList.add("active");
            layout02.classList.remove("active");
            layout03.classList.remove("active");
            layout04.classList.remove("active");
            layout05.classList.remove("active");
            // remove d-none
            tab1.classList.remove("d-none");
            // add d-none 
            tab2.classList.add("d-none");
            tab3.classList.add("d-none");
            tab4.classList.add("d-none");
            tab5.classList.add("d-none");
            
    }
     function category_view2() {
         
         layout02.classList.add("active");
            
            layout01.classList.remove("active");
            layout03.classList.remove("active");
            layout04.classList.remove("active");
            layout05.classList.remove("active");
            
            // remove d-none
            tab2.classList.remove("d-none");
             // add d-none 
            tab1.classList.add("d-none");
            tab3.classList.add("d-none");
            tab4.classList.add("d-none");
            tab5.classList.add("d-none");
    }
     function category_view3() {
         
        layout03.classList.add("active");
            
            layout01.classList.remove("active");
            layout02.classList.remove("active");
            layout04.classList.remove("active");
            layout05.classList.remove("active");
            // remove d-none
            tab3.classList.remove("d-none");
             // add d-none 
            tab1.classList.add("d-none");
            tab2.classList.add("d-none");
            tab4.classList.add("d-none");
            tab5.classList.add("d-none");
    }
     function category_view4() {
         
        layout04.classList.add("active");
            
            layout01.classList.remove("active");
            layout02.classList.remove("active");
            layout03.classList.remove("active");
            layout05.classList.remove("active");
            
            // remove d-none
            tab4.classList.remove("d-none");
             // add d-none 
            tab1.classList.add("d-none");
            tab3.classList.add("d-none");
            tab2.classList.add("d-none");
            tab5.classList.add("d-none");
    }
    
     function category_view5() {
         
        layout05.classList.add("active");
            
            layout01.classList.remove("active");
            layout02.classList.remove("active");
            layout03.classList.remove("active");
            layout04.classList.remove("active");
            
             // remove d-none
            tab5.classList.remove("d-none");
             // add d-none 
            tab1.classList.add("d-none");
            tab3.classList.add("d-none");
            tab2.classList.add("d-none");
            tab4.classList.add("d-none");
    }
    $(document).ready(function() {
         
         
      $('.show-sidebar').click(function () {
      if($(this).hasClass('opened')) {
      $(this).removeClass('opened');
      } else {
      $(this).addClass('opened');
      }
      $('.layer-category #column-left,.layer-category #column-right').toggle();
      });
      
      });
    