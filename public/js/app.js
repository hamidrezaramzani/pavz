$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 4,
    });

    $(".my-rating").starRating({
        initialRating: 4,
        starSize: 25,
    });
});

new fullpage("#home", {
    anchors: ["Welcome", "Services", "Villas"],
    navigationTooltips: [
        "خوش آمدید",
        "سرویس های ما",
        "ویلا های برتر و دنج",
        "Touch",
    ],
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
