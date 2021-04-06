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

$(".date-in").pDatepicker({
    minDate: new persianDate().unix(),
    initialValue: false,
});

$(".date-out").pDatepicker({
    minDate: new persianDate().unix(),
    initialValue: false,
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
                callback : (score) => {
                    $.ajax({
                        method : "POST" , 
                        url :"/rate/set-score" , 
                        data : {
                            score : score , 
                            id : $("#id").val() , 
                            _token : $("#token").val()
                        } , 
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
            method : "POST" , 
            url : "/comment/new" , 
            data  ,
            beforeSend : () => {
                $("#btn-comment").prop("disabled" , true);
                $("#comment-loading").show();
            } ,
            success: () => {
                $("#btn-comment").prop("disabled" , false);
                $("#comment-loading").hide();
                $("#description").val("")
                Swal.fire({
                    title: "انجام شد",
                    text: "نظر شما با موفقیت ثبت شد و بعد از تایید منتشر خواهد شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
            },
            error: () => {
                $("#btn-comment").prop("disabled" , false);
                $("#comment-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },

        })
        
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
