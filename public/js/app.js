

$(document).ready(function () {
    $(".my-slider").slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 1,        
        swipeToSlide: true,
        rtl: true,
        // autoplay : true , 
        arrows : true ,
        nextArrow : "<button class='prev-arrow'><i class='fa fa-arrow-left'></i></button>" , 
        prevArrow : "<button class='next-arrow'><i class='fa fa-arrow-right'></i></button>" , 
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".owl-carousel").owlCarousel({
        items: 4,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
            },
        },
    });
});


