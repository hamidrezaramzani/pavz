let picturesList = [];
let isCover = false;
let pictures = new FormData();
let deletedPictures = [];
const cover = new FormData();


$("#specification-form").validate({
    submitHandler: (form) => {
        const data = {
            title: $("#title").val(),
            state: $("#state").val(),
            city: $("#city").val(),
            foundation: $("#foundation").val(),
            border_width: $("#border_width").val(),
            height: $("#height").val(),
            description: $("#description").val(),
            document_type: $("#document_type").val(),
            scores: JSON.stringify(getAllInputs("#scores")),
            id: $("#id").val(),
            level: 1,
            _token: $("#token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/shop/update/specification",
            data,
            beforeSend: () => {
                $("#sd-loading").show();
            },
            success: () => {
                $("#sd-loading").hide();
                nextForm(form);
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
            minlength: 5,
        },
        state: {
            selectRequired: true,
        },
        city: {
            selectRequired: true,
        },
        foundation: {
            required: true,
            min: 1,
        },
        border_width: {
            required: true,
            min: 1,
        },
        height: {
            required: true,
            min: 1,
        },
        description: {
            required: true,
        },
        document_type: {
            selectRequired: true,
        },
    },

    messages: {
        title: {
            required: "پر کردن این فیلد الزامی می باشد",
            minlength: 5,
        },
        foundation: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 باشد",
        },
        border_width: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 باشد",
        },
        height: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 باشد",
        },
        description: {
            required: "پر کردن این فیلد الزامی می باشد",
        },
        document_type: {
            required: "پر کردن این فیلد الزامی می باشد",
        },
    },
});

$("#possibilities-form").validate({
    submitHandler: (form) => {
        const data = {
            possibilities: JSON.stringify(getAllInputs("#possibilities")),
            id: $("#id").val(),
            level : 2 , 
            _token: $("#token").val(),
        };
        $.ajax({
            method: "POST",
            url: "/shop/update/possibilities",
            data,
            beforeSend: () => {
                $("#pb-loading").show();
            },
            success: () => {
                $("#pb-loading").hide();
                moveToSelectedCity();
                nextForm(form);
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
            id: $("#id").val(),
            _token: $("#token").val(),
            level: 3,
        };

        $.ajax({
            method: "POST",
            url: "/shop/update/address",
            data,
            beforeSend: () => {
                $("#ad-loading").show();
            },
            success: () => {
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
            id: $("#id").val(),
            level : 4 , 
            _token: $("#token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/shop/update/rent-pricing",
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
            id: $("#id").val(),
            level : 4 , 
            _token: $("#token").val(),
            agreed_price: $("#agreed_price:checked").length,
        };

        $.ajax({
            method: "POST",
            url: "/shop/update/sold-pricing",
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
    url: "/pictures/shop/get/" + $("#id").val(),
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
        cover.append("id", $("#id").val());
        cover.append("level", "5");

        pictures.append("_token", $("#token").val());
        pictures.append("id", $("#id").val());
        pictures.append("deleted_pictures", JSON.stringify(deletedPictures));

        const updateCoverPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            url: "/pictures/shop/cover-update",
            data: cover,
            error: () => {
                console.log(err);
            },
        });

        const updatePicturesPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            url: "/pictures/shop/pictures-update",
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


function checkFormat(name) {
    const SUPPORTED_FORMATS = ["png", "jpg", "jpeg"];
    const format = name.split(".")[1].toLowerCase();
    return SUPPORTED_FORMATS.includes(format.toLowerCase());
}

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


$("#finish-form").validate({
    submitHandler: (form) => {
        const url = form.action;
        $.ajax({
            url,
            method: "GET",
            success: () => {
                $("#finish-loading").hide();
                location.href = "/shop/manage";
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
