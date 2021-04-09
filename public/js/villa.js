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

$("#reserve")
    .mobiscroll()
    .datepicker({
        display: "inline",
        controls: ["calendar"],
        min: min,
        locale: mobiscroll.localeFa,
        selectMultiple: true,
        max: max,
        themeVariant: "light",
        onPageLoading: function (event, inst) {
            // getPrices(event.firstDay, function callback(bookings) {
            //     inst.setOptions({
            //         labels: bookings.labels,
            //         invalid: bookings.invalid
            //     });
            // });
        },
        onChange: function (event) {
            console.log(event);
        },
    });

function getPrices(d, callback) {
    var invalid = [],
        labels = [];

    mobiscroll.util.http.getJson(
        "//trial.mobiscroll.com/getprices/?year=" +
            d.getFullYear() +
            "&month=" +
            d.getMonth(),
        function (bookings) {
            for (var i = 0; i < bookings.length; ++i) {
                var booking = bookings[i],
                    d = new Date(booking.d);

                if (booking.price > 0) {
                    labels.push({
                        start: d,
                        title: "$" + booking.price,
                        textColor: "#e1528f",
                    });
                } else {
                    invalid.push(d);
                }
            }
            callback({ labels: labels, invalid: invalid });
        },
        "jsonp"
    );
}
const m = moment.from("1400/01/19", "fa", "YYYY/MM/DD");
console.log(m);
$("#date-in")
    .mobiscroll()
    .datepicker({
        controls: ["calendar"],
        locale: mobiscroll.localeFa,
        min: min,
        max: max,
        themeVariant: "light",
        invalid: [m._i.slice(0, -3)],
    });

$("#date-out")
    .mobiscroll()
    .datepicker({
        controls: ["calendar"],
        locale: mobiscroll.localeFa,
        min: min,
        max: max,
        themeVariant: "light",
        invalid: [m._i.slice(0, -3)],
        onChange: (event) => {
            const start = $("#date-in").val();
            const end = event.valueText;

            const startDate = new Date(start);
            const endDate = new Date(end);
            if (startDate <= endDate == false) {
                Swal.fire({
                    title: "خطا",
                    text: "تاریخ خروج نباید کم تر از تاریخ ورود باشد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            }
        },
    });

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
    saveAds(btn , "villa");
});
