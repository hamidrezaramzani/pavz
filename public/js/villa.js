let lat = $("#lat").val();
let long = $("#lng").val();
let latlong = [lat, long];
var mymap = L.map("mapid").setView([lat, long], 15);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(mymap);

setInterval(() => {
    mymap.invalidateSize(true);
}, 0);

L.marker({
    lat: $("#lat").val(),
    lng: $("#lng").val(),
}).addTo(mymap);

$(".datepicker").datepicker({
    minDate: "-0d",
    maxDate: "+12m +0d",
    changeMonth: true, // True if month can be selected directly, false if only prev/next
    changeYear: true,
    yearRange: "c-0:c+2",
});

$(document).ready(function () {
    function setScore(name, score) {
        const url = `/scores/${name}/${$("#id").val()}/${score}`;
        $.ajax({
            method: "GET",
            url,
            success: () => {
                Swal.fire({
                    title: "انجام شد",
                    text: "امتیاز ثبت شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
            },
            error: (err) => {
                if (err.status == 401) {
                    Swal.fire({
                        title: "خطا",
                        text: "برای امتیاز دادن باید به حساب خود ورود کنید",
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

    $.ajax({
        method: "GET",
        url: "/scores/get/" + $("#id").val(),
        success: (response) => {
            $(".my-rating").starRating({
                initialRating: response.rates,
                starSize: 20,
                callback: (score) => {
                    $.ajax({
                        method: "POST",
                        url: "/rate/set-score",
                        data: {
                            score: score,
                            id: $("#id").val(),
                            _token: $("#token").val(),
                        },
                        success: () => {
                            Swal.fire({
                                title: "انجام شد",
                                text: "امتیاز ثبت شد",
                                icon: "success",
                                confirmButtonText: "باشه",
                            });
                        },
                        error: (err) => {
                            if (err.status == 401) {
                                Swal.fire({
                                    title: "خطا",
                                    text:
                                        "برای امتیاز دادن باید به حساب خود ورود کنید",
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
                },
            });

            $(".accuracy_of_content").starRating({
                initialRating: response.accuracyOfContent,
                starSize: 20,
                callback: (score) => {
                    setScore("set-accuracy-of-content", score);
                },
            });

            $(".timely_delivery").starRating({
                initialRating: response.timelyDelivery,
                starSize: 20,
                callback: (score) => {
                    setScore("set-timely-delivery", score);
                },
            });

            $(".host_encounter").starRating({
                initialRating: response.hostEncounter,
                starSize: 20,
                callback: (score) => {
                    setScore("set-host-encounter", score);
                },
            });

            $(".quality").starRating({
                initialRating: response.quality,
                starSize: 20,
                callback: (score) => {
                    setScore("set-quality", score);
                },
            });

            $(".purity").starRating({
                initialRating: response.purity,
                starSize: 20,
                callback: (score) => {
                    setScore("set-purity", score);
                },
            });

            $(".address").starRating({
                initialRating: response.address,
                starSize: 20,
                callback: (score) => {
                    setScore("set-address", score);
                },
            });
        },
    });
});

$("#comment-form").validate({
    submitHandler: () => {
        const data = {
            description: $("#description").val(),
            villa_id: $("#id").val(),
            _token: $("#token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/comment/new",
            data,
            beforeSend: () => {
                $("#btn-comment").prop("disabled", true);
                $("#comment-loading").show();
            },
            success: () => {
                $("#btn-comment").prop("disabled", false);
                $("#comment-loading").hide();
                $("#description").val("");
                Swal.fire({
                    title: "انجام شد",
                    text:
                        "نظر شما با موفقیت ثبت شد و بعد از تایید منتشر خواهد شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
            },
            error: () => {
                $("#btn-comment").prop("disabled", false);
                $("#comment-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    },
    rules: {
        title: {
            required: true,
        },
        description: {
            required: true,
            minlength: 5,
        },
    },
    messages: {
        title: {
            required: "پر کردن این فیلد الزامی است",
        },
        description: {
            required: "پر کردن این فیلد الزامی است",
            minlength: "حداقل باید 5 کاراکتر داشته باشد",
        },
    },
});

$(".show-more-images").click(function (e) {
    e.preventDefault();
    $(".slideshow").show();
});

$("#close-slideshow").click(function (e) {
    $(".slideshow").hide();
});

var now = new Date(),
    currYear = now.getFullYear(),
    currMonth = now.getMonth(),
    currDay = now.getDate(),
    min = new Date(currYear, currMonth, currDay),
    max = new Date(currYear, currMonth + 6, currDay);

$.validator.addMethod(
    "regex",
    function (value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "شماره تلفن صحیح نمیباشد"
);

$.validator.addMethod(
    "compare",
    function (value) {
        const start = $("#date-in").val();
        const startDate = new Date(start);
        const endDate = new Date(value);

        return startDate <= endDate;
    },
    "تاریخ دوم باید بیشتر یا مساوی با تاریخ اول باشد"
);

$("#reserve-form").validate({
    submitHandler: () => {
        const data = {
            start: $("#date-in").val(),
            end: $("#date-out").val(),
            fullname: $("#fullname").val(),
            phonenumber: $("#phonenumber").val(),
            guests: $("#guests").val(),
            _token: $("#token").val(),
            villa_id: $("#id").val(),
            user_id: $("#user_id").val(),
        };
        
        $.ajax({
            method: "POST",
            url: "/reserve/new",
            data: data,

            beforeSend: () => {
                $("#reserve-loading").prop("disabled", true);
                $("#reserve-loading").show();
            },
            success: () => {
                $("#reserve-loading").prop("disabled", false);
                $("#reserve-loading").hide();
                Swal.fire({
                    title: "درخواست رزرو ثبت شد",
                    text:
                        "درخواست رزرو شما ثبت شد. بعد از تایید میزبان پیامکی به شماره تلفنی که وارد کردید ارسال خواهد شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
            },
            error: (err) => {
                $("#reserve-loading").prop("disabled", false);
                $("#reserve-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    },
    rules: {
        ["date-in"]: {
            required: true,
        },
        ["date-out"]: {
            required: true,
            compare: $("#date-in").val(),
        },
        guests: {
            required: true,
            min: 0,
        },
        fullname: {
            required: true,
        },
        phonenumber: {
            required: true,
            regex: /^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/,
        },
    },
    messages: {
        ["date-in"]: {
            required: "الزامی می باشد",
        },
        ["date-out"]: {
            required: "الزامی می باشد",
        },
        guests: {
            required: "الزامی می باشد",
            min: "نمیتواند خالی باشد",
        },
        fullname: {
            required: "الزامی می باشد",
        },
        phonenumber: {
            required: "الزامی می باشد",
        },
    },
});

$(".saved-ads").click(function () {
    const btn = $(this);
    saveAds(btn, "villa");
});

let commentId = null;

$(".answer-comment-btn").click(function () {
    const parent = $(this).parents("li");
    const text = parent.find("p").text().trim();
    commentId = parent.find(".comment-id-input").val();
    $("#user-comment-text").text(text);
    $("#answer-comment-modal").modal("show");
});

$("#answer-form").validate({
    submitHandler: () => {
        const data = {
            description: $("#text").val(),
            comment_id: commentId,
            _token: $("#token").val(),
        };

        $.ajax({
            url: "/comment-answer/new",
            data,
            method: "POST",
            beforeSend: () => {
                $("#new-answer-loading").prop("disabled", true);
                $("#new-answer-loading").show();
            },
            success: () => {
                $("#new-answer-loading").prop("disabled", false);
                $("#new-answer-loading").hide();
                Swal.fire({
                    title: "انجام شد",
                    text: "پاسخ این نظر داده شد و بعد از بررسی تایید خواهد شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                    onClose: () => {
                        $("#text").val("");
                        $("#answer-comment-modal").modal("hide");
                    },
                });
            },
            error: () => {
                $("#new-answer-loading").prop("disabled", false);
                $("#new-answer-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    },
    rules: {
        text: {
            required: true,
            minlength: 10,
            maxlength: 10000,
        },
    },
    messages: {
        text: {
            required: "پر کردن این فیلد الزامی است",
            minlength: "حداقل باید 10 کاراکتر باشد",
            maxlength: "حداکثر باید 10000 کاراکتر باشد",
        },
    },
});

$(".delete-answer").click(function () {
    const btn = $(this);
    const id = btn.attr("id");
    Swal.fire({
        title: "حذف پاسخ",
        text: "آیا واقعا میخواهید این پاسخ را پاک کنید؟",
        icon: "question",
        confirmButtonText: "بله",
        showCancelButton: true,
        cancelButtonText: "خیر",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            $.ajax({
                method: "GET",
                url: "/comment-answer/delete/" + id,
                beforeSend: () => {
                    btn.find("div").prop("disabled", true);
                    btn.find("div").show();
                },
                success: () => {
                    btn.find("div").prop("disabled", false);
                    btn.find("div").hide();
                    Swal.fire({
                        title: "انجام شد",
                        text: "این پاسخ پاک شد",
                        icon: "success",
                        confirmButtonText: "باشه",
                        onClose: () => {
                            btn.parents(".comment-answer").remove();
                        },
                    });
                },
                error: () => {
                    btn.find("div").prop("disabled", false);
                    btn.find("div").hide();
                    Swal.fire({
                        title: "خطا",
                        text: "مشکلی در سرور وجود دارد",
                        icon: "error",
                        confirmButtonText: "باشه",
                    });
                },
            });
        }
    });
});
