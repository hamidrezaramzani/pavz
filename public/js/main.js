$("#state").change(function (props) {
    const id = props.target.value.trim();
    $.ajax({
        method: "GET",
        url: "/get-cities/" + id,
        success: (response) => {
            if (response) {
                $("#city").html("");
                for (const city in response) {
                    const o = new Option(
                        response[city].name,
                        response[city].id
                    );
                    o.setAttribute("lat", response[city].latitude);
                    o.setAttribute("long", response[city].longitude);
                    $("#city").append(o);
                }
            }
        },
    });
});

$(".form-steps ul li").click(function () {
    let index = $(this).index();
    const hasClass = $(this).hasClass("active");
    if (hasClass) {
        $(".sections section").hide();
        $(".sections section").eq(index).show();
        $(this).addClass("active");
    } else {
        Swal.fire({
            title: "خطا",
            text: "فرم های قبلی را پر نمایید و ادامه را بزنید   ",
            icon: "error",
            confirmButtonText: "باشه",
        });
    }
});

const showSection = (index) => {
    $(".sections section").hide();
    $(".sections section").eq(index).show();
};

function nextForm(form) {
    const index = $(`#${form.getAttribute("id")}`)
        .parents("section")
        .index();
    const nextLi = $(".form-steps ul li").eq(index + 1);
    const hasClass = nextLi.hasClass("active");
    if (!hasClass) {
        nextLi.addClass("active");
    }
    showSection(index + 1);
}

$.validator.addMethod(
    "selectRequired",
    function (value, element, arg) {
        return value != 0;
    },
    "لطفا انتخاب کنید"
);

function getAllInputs(id) {
    let inputs = [];
    $(`${id} input`).each(function () {
        inputs.push({
            text: $(this).attr("text"),
            name: $(this).attr("name"),
            checked: $(this).prop("checked"),
            new: $(this).attr("data-new") ? true : false,
        });
    });
    return inputs;
}

// https://vt.parsimap.com/comapi.svc/tile/parsimap/{x}/{y}/{z}.jpg?token=ee9e06b3-dcaa-4a45-a60c-21ae72dca0bb
let lat = 35.6892;
let long = 51.389;
let latlong = [lat, long];
var mymap = L.map("mapid").setView([lat, long], 15);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(mymap);

setInterval(() => {
    mymap.invalidateSize(true);
}, 0);

let marker;
mymap.on("click", function (e) {
    if (marker) mymap.removeLayer(marker);
    latlong[0] = e.latlng.lat;
    latlong[1] = e.latlng.lng;
    marker = L.marker(e.latlng).addTo(mymap);
});

function moveToSelectedCity() {
    const option = $("#city option:selected");
    if (option && option.value != 0) {
        lat = option.attr("lat");
        long = option.attr("long");
        mymap.setView([lat, long]);
    }
}

$("#address-step").click(function () {
    const lat = $(this).attr("data-lat");
    const long = $(this).attr("data-long");
    moveToSelectedCity();
    marker = L.marker([lat, long]).addTo(mymap);
});

function setPriceInputsStatus(input, inputIds = []) {
    const isChecked = input.prop("checked");

    if (isChecked) {
        inputIds.forEach((id) => {
            $(`#${id}`).prop("disabled", true);
        });
    } else {
        inputIds.forEach((id) => {
            $(`#${id}`).prop("disabled", false);
        });
    }
}

$("#agreed_price").click(function (e) {
    setPriceInputsStatus($(this), ["total_price", "price_per_meter"]);
});

function removeCheckboxInput(e) {
    e.closest(".form-group").remove();
}

$(".new-item").click(function () {
    const box = $($(this).attr("box"));
    const input = $($(this).attr("input"));
    const id = "checkbox" + Math.ceil(Math.random() * 99999);
    if (input.val().length) {
        box.append(`<div class="form-group checkbox-group" id="${id}">
        
        <label>
        <button class="btn  btn-sm text-danger is" type="button" onclick="removeCheckboxInput(${id})">
        <i class="fa fa-xs fa-trash"></i>
    </button>            
            <input type="checkbox" text="${input.val()}" data-new="true" name="${input.val()}" checked class="option-input checkbox" />
        ${input.val()}
        </label>
    </div>
    `);
    }
});

$.validator.addMethod(
    "selectRequired",
    function (value, element, arg) {
        return value != 0;
    },
    "لطفا انتخاب کنید"
);

$(".price-counter").keyup(function () {
    const price = $(this).val();
    const text = Num2persian(price);
    $(this).parents(".form-group").find("span").text(text);
});
