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
        arrows: true,
        nextArrow:
            "<button class='prev-arrow'><i class='fa fa-arrow-left'></i></button>",
        prevArrow:
            "<button class='next-arrow'><i class='fa fa-arrow-right'></i></button>",
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
});

function like(btn, type) {
    const id = btn.attr("data-id");
    const defaultClass = btn.find("i").attr("class");
    $.ajax({
        method: "GET",
        url: `/like/${type}/${id}`,
        beforeSend: () => {
            btn.find("i").removeAttr("class");
            btn.find("i").addClass("fas fa-spinner fa-spin");
            btn.prop("disabled", true);
        },
        success: (response) => {
            btn.find("i").removeAttr("class");
            btn.prop("disabled", false);
            if (response.type == "delete") {
                btn.find("i").addClass("far text-danger fa-heart");
            } else {
                btn.find("i").addClass("fas text-danger fa-heart");
            }
        },
        error: (err) => {
            btn.find("i").removeAttr("class");
            btn.find("i").addClass(defaultClass);
            btn.prop("disabled", false);
            if (err.status == 401) {
                Swal.fire({
                    title: "خطا",
                    text: "برای پسندیدن باید به حساب خود ورود کنید",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
                return;
            } else {
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            }
        },
    });
}

$(".btn-villa-like").click(function () {
    like($(this), "villa");
});

$(".btn-apartment-like").click(function () {
    like($(this), "apartment");
});

$(".btn-area-like").click(function () {
    like($(this), "area");
});

$(".btn-shop-like").click(function () {
    like($(this), "shop");
});

$(".share-item").click(function () {
    $("#copy-link-btn").attr(
        "copy-button-text",
        window.location.origin +
            "/" +
            $(this).attr("data-type") +
            "/" +
            $(this).attr("data-id")
    );
    $("#share-telegram-btn").attr(
        "href",
        `https://t.me/share/url?url=${
            window.location.origin +
            "/" +
            $(this).attr("data-type") +
            "/" +
            $(this).attr("data-id")
        }&text=${$(this).parents(".ads-item-content").find("h2").text()}`
    );
    $("#share-modal").modal("show");
});

$("#copy-link-btn").click(function () {
    const text = $(this).attr("copy-button-text");
    const el = document.createElement("input");
    el.value = text;
    el.select();
    el.setSelectionRange(0, 99999);
    document.execCommand("copy");
});
