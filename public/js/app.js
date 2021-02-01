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

});

AOS.init();

window.onscroll = function (e) {
    const scrollHeader = document.getElementById("header").offsetHeight;
    const y = scrollY;
    if (y >= scrollHeader){
        header.classList.add("fixed-header");
        logo.src= "http://localhost:8000/images/dpavz.png";
    }else{
        header.classList.remove("fixed-header");
        logo.src= "http://localhost:8000/images/pavz.png";
    }
};

