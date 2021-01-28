const header = document.getElementById("my-header");
const initialHash = location.hash.split("#")[1];
if (initialHash  != "Welcome" && initialHash != "") {
    header.classList.add("fixed-header");
} else {
    header.classList.remove("fixed-header");
}
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

new fullpage("#home", {
    anchors: ["Welcome", "Services", "Villas"],
    navigationTooltips: ["خوش آمدید", "سرویس های ما", "ویلا های برتر و دنج"],
    css3: true,
    scrollingSpeed: 1000,
    navigation: true,
    slidesNavigation: true,
    responsiveHeight: 330,
    dragAndMove: true,
    dragAndMoveKey: "YWx2YXJvdHJpZ28uY29tX0EyMlpISmhaMEZ1WkUxdmRtVT0wWUc=",
    controlArrows: false,
    margin: 10,
    stagePadding: 50,
});

window.addEventListener("hashchange", function (e) {
    const hash = e.newURL.split("#")[1];
    if (hash != "Welcome") {
        header.classList.add("fixed-header");
    } else {
        header.classList.remove("fixed-header");
    }
});
