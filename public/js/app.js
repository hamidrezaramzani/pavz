const header = document.getElementById("my-header");
const logo = header.querySelector("img");
const goToTop = document.getElementById("gototop");

goToTop.addEventListener("click", function () {
    scrollTo({ top: 0 });
});



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

function scrollDocument() {
    console.log("scroll");
    const scrollHeader = document.getElementById("header").offsetHeight;
    const y = scrollY;
    if (y >= scrollHeader) {
        goToTop.style.display = "inline";
        header.classList.add("fixed-header");
        logo.src = "http://localhost:8000/images/dpavz.png";
    } else {
        goToTop.style.display = "none";
        header.classList.remove("fixed-header");
        logo.src = "http://localhost:8000/images/pavz.png";
    }
}
window.addEventListener("scroll", scrollDocument);

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
