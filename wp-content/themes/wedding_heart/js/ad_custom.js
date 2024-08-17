$(document).ready(function () {
    $('#gallery_slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots: false,
        center: true,
        autoplay: true,
        smartSpeed: 2200,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })


    $('#gallery_slider_two').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots: false,
        center: true,
        autoplay: true,
        smartSpeed: 2200,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })


    $('#testimonial_slider').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        center: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
});


$(window).on('scroll', function () {
    if ($(this).scrollTop() > 100) { // Set position from top to add class
        $('.header-main').addClass('sticky');
    }
    else {
        $('.header-main').removeClass('sticky');
    }
});

new WOW().init();
