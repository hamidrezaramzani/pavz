const locationBox = $(".locations");
locationBox.hide();
const header = document.getElementById("my-header");
const logo = document.getElementById("navbar-logo");
const goToTop = document.getElementById("gototop");

if (goToTop) {
    goToTop.addEventListener("click", function () {
        scrollTo({ top: 0 });
    });
}

function setName(dom) {
    const name = dom.getAttribute("data-name");
    locationBox.hide();
    $("#location-name").val(name);
}
$("#location-name").keyup(function () {
    const text = $(this).val();
    $.ajax({
        method: "GET",
        url: "/search/locations/" + text.trim(),
        success: (res) => {
            if (!res.data.length) {
                locationBox.find("ul").html("");
                locationBox.hide();
            } else {
                locationBox.show();
                locationBox.find("ul").html("");
                res.data.forEach((item) => {
                    if (Object.keys(item).includes("country")) {
                        locationBox
                            .find("ul")
                            .append(
                                `<li onclick="setName(this)" data-name="${item.name}">${item.name}</li>`
                            );
                    } else {
                        locationBox
                            .find("ul")
                            .append(
                                `<li  onclick="setName(this)" data-name="${item.name}">${item.name} - ${item.state}</li>`
                            );
                    }
                });
            }
        },
        error: () => {
            locationBox.find("ul").html("");
            locationBox.hide();
        },
    });
});
AOS.init();

$("#btn-search").click(function () {
    const name = $("#location-name").val();
    const type = $("#type-input").val();
    if (name.length) {
        location.href = `/search/?name=${name}&type=${type}`;
    } else {
        Swal.fire({
            title: "مقصد",
            text: "مقصد خود را مشخص کنید",
            icon: "warning",
            confirmButtonText: "باشه",
            onClose: () => {
                $("#location-name").focus();
            },
        });
    }
});

// if($("#notification-btn")){
//     $("#notification-btn a").click(function (e) {
//         e.preventDefault();
//         console.log("Hi");
//     });
// }

$("#navbar-menu-btn").click(function () {
    $(".responsive-menu").show();
});
$("#close-responsive-menu-header").click(function () {
    $(".responsive-menu").hide();
});

$("document").ready(function () {
    $("#loading-box").hide();
});

function scrollDocument() {
    const scrollHeader = document.getElementById("header").offsetHeight - 100;
    const y = scrollY;
    if (y >= scrollHeader) {
        goToTop.style.display = "inline";
        header.classList.add("fixed-header");
        logo.src = logo.getAttribute("data-dark-src");
    } else {
        goToTop.style.display = "none";
        header.classList.remove("fixed-header");
        logo.src = logo.getAttribute("data-light-src");
    }
}
if (goToTop) {
    window.addEventListener("scroll", scrollDocument);
    window.addEventListener("load", scrollDocument);
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$("#sidebar-toggle").click(function () {
    $(".sidebar").show();
});

$("#close-sidebar").click(function (e) {
    e.preventDefault();
    $(".sidebar").hide();
});
