const locationBox = $(".locations");
locationBox.hide();

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
})