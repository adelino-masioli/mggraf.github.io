jQuery(document).ready(function() {


 $('#carousel-example-generic').carousel({
  interval: 7000,
  pause:'hover'
});

	//this code is for the gmap
  var map = new GMaps({
    el: '#map',
    lat: -19.8990445,
    lng: -43.9942205
  });


      //this code is for smooth scroll and nav selector
      $(document).ready(function () {
        $(document).on("scroll", onScroll);

              //smoothscroll
              $('a[href^="#"]').on('click', function (e) {
                e.preventDefault();
                $(document).off("scroll");

                $('a').each(function () {
                  $(this).removeClass('active');
                })
                $(this).addClass('active');
                
                var target = this.hash,
                menu = target;
                $target = $(target);
                $('html, body').stop().animate({
                  'scrollTop': $target.offset().top+2
                }, 500, 'swing', function () {
                  window.location.hash = target;
                  $(document).on("scroll", onScroll);
                });
              });
            });

      function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('.navbar-default .navbar-nav>li>a').each(function () {
          var currLink = $(this);
          var refElement = $(currLink.attr("href"));
          if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.navbar-default .navbar-nav>li>a').removeClass("active");
            currLink.addClass("active");
          }
          else{
            currLink.removeClass("active");
          }
        });
      }


     //this code is for animation nav
     jQuery(window).scroll(function() {
      var windowScrollPosTop = jQuery(window).scrollTop();

       /* if(windowScrollPosTop >= 150) {
          jQuery(".header").css({"background": "#B193DD",});
          jQuery(".top-header img.logo").css({"margin-top": "-30px", "margin-bottom": "0"});
          jQuery(".navbar-default").css({"margin-top": "0px",});
        }
        else{
          jQuery(".header").css({"background": "transparent",});
           jQuery(".top-header img.logo").css({"margin-top": "12px", "margin-bottom": "25px"});
           jQuery(".navbar-default").css({"margin-top": "20px", "margin-bottom": "0"});
          
         }*/
       });


     

   });


$("#contactformvalidation").validate();
