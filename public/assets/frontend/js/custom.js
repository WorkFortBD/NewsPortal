(function ($) {
  "use strict";

  $(".enternaimentNews").owlCarousel({
    loop: true,
    dots: true,
    dotsEach: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    nav: true,
    margin: 20,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      400: {
        items: 2,
        nav: false,
      },
      991: {
        items: 4,
      },
      1000: {
        items: 5,
      },
    },
  });
})(jQuery);
