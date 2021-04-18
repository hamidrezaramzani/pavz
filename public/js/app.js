const header = document.getElementById("my-header");
const logo = document.getElementById("navbar-logo");
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
});

AOS.init();

function scrollDocument() {
    const scrollHeader = document.getElementById("header").offsetHeight;
    const y = scrollY;
    if (y >= scrollHeader) {
        goToTop.style.display = "inline";
        header.classList.add("fixed-header");
        console.log(logo);
        logo.src = logo.getAttribute("data-dark-src");
    } else {
        goToTop.style.display = "none";
        header.classList.remove("fixed-header");
        logo.src =  logo.getAttribute("data-light-src");
    }
}
window.addEventListener("scroll", scrollDocument);
window.addEventListener("load", scrollDocument);
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
