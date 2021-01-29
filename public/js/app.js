const header = document.getElementById("my-header");
const logo = header.querySelector("img");
const initialHash = location.hash.split("#")[1];

const changeSection = (hash) => {
    if (hash && hash != "Welcome") {
        logo.src = "http://localhost:8000/images/dpavz.png";
        header.classList.add("fixed-header");
    } else {
        logo.src = "http://localhost:8000/images/pavz.png";
        header.classList.remove("fixed-header");
    }
};

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

AOS.init(); // AOS initiation

$(".aos-init").removeClass("aos-animate");

new fullpage("#home", {
    anchors: ["Welcome", "Villas", "Places", "Apartments" , "Areas"],
    navigationTooltips: [
        "خوش آمدید",
        "ویلا های برتر و دنج",
        "برترین شهر های ایران",
        "برترین آپارتمان های ایران",
        "برترین زمین های ایران"
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
    afterLoad: function () {
        var a_table = [
            "start",
            "quality",
            "performance",
            "dob",
            "parameters",
            "compatibility",
            "options",
            "contact",
        ]; // duplicated table of anchors name

        for (var i = 0; i < a_table.length; i++) {
            $(".section-" + a_table[i] + ".active .aos-init").addClass(
                "aos-animate"
            ); // all magic goes here - when page is active, then all elements with AOS will start animate
        }
    },
});

window.addEventListener("hashchange", function (e) {
    const hash = e.newURL.split("#")[1];
    changeSection(hash);
});

changeSection(initialHash);
