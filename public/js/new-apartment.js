let picturesList = [];
let isCover = false;
let pictures = new FormData();
let deletedPictures = [];
const cover = new FormData();



$("#atype").change(function (e) {
    const atype = Number(e.target.value);
    $.ajax({
        method: "GET",
        url: "/apartment/get-home-types/" + atype,
        success: (response) => {
            $("#htype").html("");
            response.forEach((obj) => {
                const o = new Option();
                o.text = obj.name;
                o.value = obj.id;
                $("#htype").append(o);
            });
        },
    });
});


function checkFormat(name) {
    const SUPPORTED_FORMATS = ["png", "jpg", "jpeg"];
    const format = name.split(".")[1].toLowerCase();
    return SUPPORTED_FORMATS.includes(format.toLowerCase());
}

$("#cover").change(function (e) {
    const files = e.target.files;
    if (!cover.has("cover") && !$(".cover-image").length) {
        if (files.length) {
            if (files[0].name) {
                const file = files[0];
                if (checkFormat(file.name)) {
                    Swal.fire({
                        title: "انجام شد",
                        text: "تصویر کاور ویلا انتخاب شد",
                        icon: "success",
                        confirmButtonText: "باشه",
                    });
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function ({ target }) {
                        cover.append("cover", file);
                        isCover = true;
                        const img = document.createElement("img");
                        img.src = target.result;
                        img.classList.add("cover-image");
                        $("#cover-image-box").append(img);
                        $("#cover-image-box").show();
                    };
                } else {
                    Swal.fire({
                        title: "خطا",
                        text: "فرمت تصویر درست نیست",
                        icon: "error",
                        confirmButtonText: "باشه",
                    });
                }
            }
        }
    } else {
        Swal.fire({
            title: "خطا",
            text:
                "تصویر کاور انتخاب شده است. برای تغییر باید قبلی را حذف نمایید",
            icon: "error",
            confirmButtonText: "باشه",
        });
    }
});

$("#cover-image-box").click(function () {
    $("#cover-image-box img").remove();
    $("#cover-image-box").hide();
    cover.delete("cover");
    isCover = false;
});

$("#pictures").change(function (e) {
    const files = e.target.files;
    if (files.length) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (checkFormat(file.name)) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function ({ target }) {
                    const li = document.createElement("li");
                    let id = Math.ceil(Math.random() * 5000);
                    li.setAttribute("id", id);
                    pictures.append(`picture${id}`, file);
                    picturesList.push(id);
                    li.onclick = removePictureItem.bind(null, id, false);
                    const img = document.createElement("img");
                    img.src = target.result;
                    li.append(img);
                    $(".pictures-box ul").append(li);
                    $(".pictures-box").show();
                };
            } else {
                Swal.fire({
                    title: "خطا",
                    text: "فرمت تصویر درست نیست",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            }
        }
    }
});

$.validator.addMethod(
    "selectRequired",
    function (value, element, arg) {
        return value != 0;
    },
    "لطفا انتخاب کنید"
);

$(".pictures-box ul li").click(function (e) {
    let id = $(this).attr("id");
    let isSaved = $(this).attr("saved");
    removePictureItem(id, Boolean(isSaved));
});

function removePictureItem(id, isSaved) {
    if (isSaved) deletedPictures.push(id);
    pictures.delete(`picture${id}`);
    $(`.pictures-box ul li#${id}`).remove();
    picturesList = picturesList.filter((item) => item != id);
}

$("#specification-form").validate({
    submitHandler: (form) => {
        const data = {
            title: $("#title").val(),
            state: $("#state").val(),
            city: $("#city").val(),
            atype: $("#atype").val(),
            htype: $("#htype").val(),
            floors: $("#floors").val(),
            unites: $("#unites").val(),
            year_of_construction: $("#year_of_construction").val(),
            document_type: $("#document_type").val(),
            _token: $("#token").val(),
            aid: $("#aid").val(),
            level: 1,
            foundation : $("#foundation").val()
        };
        $.ajax({
            method: "POST",
            url: "/apartment/update/specification",
            data,
            beforeSend: () => {
                $("#sd-loading").show();
            },
            success: (response) => {
                nextForm(form);
                console.log(response);
                $("#sd-loading").hide();
            },

            error: () => {
                $("#sd-loading").hide();
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
            minlength: 3,
            maxlength: 100,
        },
        state: {
            selectRequired: true,
        },
        city: {
            selectRequired: true,
        },
        atype: {
            selectRequired: true,
        },
        htype: {
            selectRequired: true,
        },
        floors: {
            required: true,
            min: 1,
        },
        unites: {
            required: true,
            min: 1,
        },

        document_type: {
            selectRequired: true,
        },
    },

    messages: {
        title: {
            required: "پر کردن این فیلد الزامی میباشد",
            minlength: "حداقل باید 3 کاراکتر داشته باشد",
            maxlength: "حداکثر میتواند 100 کاراکتر داشته باشد",
        },
        floors: {
            required: "پر کردن این فیلد الزامی است",
            min: "حداقل باید 1 طبقه داشته باشد",
        },
        unites: {
            required: "پر کردن این فیلد الزامی است",
            min: "حداقل باید 1 طبقه داشته باشد",
        },
        document_type: {
            selectRequired: true,
        },
    },
});

$("#possibilities-form").validate({
    submitHandler: (form) => {
        const data = {
            heating_systems: JSON.stringify(getAllInputs("#heating_systems")),
            possibilities: JSON.stringify(getAllInputs("#possibilities")),
            cooling_systems: JSON.stringify(getAllInputs("#cooling_systems")),
            _token: $("#token").val(),
            aid: $("#aid").val(),
            level : 2
        };

        $.ajax({
            method: "POST",
            url: "/apartment/update/possibilities",
            data,
            beforeSend: () => {
                $("#pb-loading").show();
            },
            success: () => {
                nextForm(form);
                $("#pb-loading").hide();
                moveToSelectedCity();
            },

            error: () => {
                $("#pb-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    },
});

$("#address-form").validate({
    submitHandler: (form) => {
        const data = {
            address: $("#address").val(),
            lat: latlong[0],
            long: latlong[1],
            aid: $("#aid").val(),
            level : 3 , 
            _token: $("#token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/apartment/update/address",
            data,
            beforeSend: () => {
                $("#ad-loading").show();
            },
            success: (response) => {
                nextForm(form);
                $("#ad-loading").hide();
            },

            error: () => {
                $("#ad-loading").hide();
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
        address: {
            required: true,
            minlength: 10,
        },
    },
    messages: {
        address: {
            required: "آدرس حتما باید وارد شود",
            minlength: "حداقل باید 10 کاراکتر داشته باشد",
        },
    },
});

$("#rent-pricing-form").validate({
    submitHandler: (form) => {
        const data = {
            mortgage: $("#mortgage").val(),
            rent: $("#rent").val(),
            aid: $("#aid").val(),
            level : 4 , 
            _token: $("#token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/apartment/update/rent-pricing",
            data,
            beforeSend: () => {
                $("#rent-loading").show();
            },
            success: () => {
                nextForm(form);
                $("#rent-loading").hide();
            },

            error: () => {
                $("#rent-loading").hide();
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
        mortgage: {
            required: true,
            min: 100,
        },
        rent: {
            required: true,
            min: 100,
        },
    },
    messages: {
        mortgage: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 100 تومان باشد",
        },
        rent: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 100 تومان باشد",   
        },
    },
});

$("#sold-pricing-form").validate({
    submitHandler: (form) => {
        const data = {
            total_price: $("#total_price").val(),
            price_per_meter: $("#price_per_meter").val(),
            aid: $("#aid").val(),
            level : 4 , 
            _token: $("#token").val(),
            agreed_price: $("#agreed_price:checked").length,
        };

        $.ajax({
            method: "POST",
            url: "/apartment/update/sold-pricing",
            data,
            beforeSend: () => {
                $("#sold-loading").show();
            },
            success: () => {
                nextForm(form);
                $("#sold-loading").hide();
            },

            error: () => {
                $("#sold-loading").hide();
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
        total_price: {
            required: true,
            min: 100,
        },
        price_per_meter: {
            required: true,
            min: 100,
        },
    },
    messages: {
        total_price: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 100 تومان باشد",
        },

        price_per_meter: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 100 تومان باشد",
        },
    },
});

$.ajax({
    method: "GET",
    url: "/pictures/apartment/get/" + $("#aid").val(),
    success: (data) => {
        isCover = data.cover;
        picturesList = data.pictures;
        $(".loading-box").hide();
        $(".pictures-box").show();
    },
});

$("#pictures-form").validate({
    submitHandler: (form) => {
        if (!isCover) {
            Swal.fire({
                title: "خطا",
                text: "کاور آگهی را انتخاب نمایید",
                icon: "error",
                confirmButtonText: "باشه",
            });
            return;
        }

        if (picturesList.length < 5) {
            Swal.fire({
                title: "خطا",
                text: "حداقل باید 5 عکس انتخاب کنید",
                icon: "error",
                confirmButtonText: "باشه",
            });
            return;
        }

        $("#pic-loading").show();

        cover.append("_token", $("#token").val());
        cover.append("id", $("#aid").val());
        cover.append("level", "5");

        pictures.append("_token", $("#token").val());
        pictures.append("id", $("#aid").val());
        pictures.append("deleted_pictures", JSON.stringify(deletedPictures));

        const updateCoverPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            url: "/pictures/apartment/cover-update",
            data: cover,
            error: () => {
                console.log(err);
            },
        });

        const updatePicturesPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            beforeSend: () => {
                setProgress(true, "0%", "0%");
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener(
                    "progress",
                    function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            setProgress(
                                true,
                                percentComplete + "%",
                                percentComplete + "0%"
                            );
                        }
                    },
                    false
                );

                return xhr;
            },
            url: "/pictures/apartment/pictures-update",
            data: pictures,
            error: () => {
                console.log(err);
            },
        });

        Promise.all([updateCoverPromise, updatePicturesPromise])
            .then(() => {
                $("#pic-loading").hide();
                nextForm(form);
            })
            .catch(() => {
                $("#pic-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            });
    },
});

$("#finish-form").validate({
    submitHandler: (form) => {
        const url = form.action;
        $.ajax({
            url,
            method: "GET",
            success: () => {
                $("#finish-loading").hide();
                location.href = "/apartment/manage";
            },
            beforeSend: () => {
                $("#finish-loading").show();
            },
            error: () => {
                $("#finish-loading").hide();
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    },
});
