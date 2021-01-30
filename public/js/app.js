const header = document.getElementById("my-header");
const logo = header.querySelector("img");

$(document).ready(function () {
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

    $(".my-rating").starRating({
        initialRating: 4,
        starSize: 25,
    });

    $(".test").click(function (e) {
        $(".owl-carousel").carousel("next");
    });
});

AOS.init();


window.addEventListener("scroll" ,function(){
    console.log(document.body.offsetTop);
})