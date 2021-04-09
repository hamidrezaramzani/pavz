
function saveAds(btn, type) {
    $.ajax({
        method: "GET",
        url: `/save/${type}/${$("#id").val()}`,
        beforeSend: () => {
            btn.prop("disabled", true);
        },
        success: (res) => {
            if (res.action == "delete") {
                Swal.fire({
                    title: "انجام شد",
                    text: "این آگهی از لیست ذخیره های شما حذف شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
                btn.find("span").text("ذخیره آگهی");
                btn.prop("disabled", false);
                btn.removeClass("btn-dark");
                btn.addClass("btn-outline-dark");
            } else {
                Swal.fire({
                    title: "انجام شد",
                    text: "این آگهی شما به لیست ذخیره ها اضافه شد",
                    icon: "success",
                    confirmButtonText: "باشه",
                });
                btn.find("span").text("ذخیره شده");
                btn.prop("disabled", false);
                btn.removeClass("btn-outline-dark");
                btn.addClass("btn-dark");
            }
        },
        error: (err) => {
            if (err.status == 401) {
                Swal.fire({
                    title: "خطا",
                    text: "برای ذخیره این آگهی باید به حساب خود ورود کنید",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
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

