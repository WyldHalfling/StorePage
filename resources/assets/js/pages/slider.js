(function () {
    'use strict';

    ACMESTORE.homeslider.initCarousel = function() {
        $('.hero-slider').slick({
            slidesToShow: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            fade: true,
            autoplayHoverPuase: true,
            slidesToScroll: 1
        });
    }
})();