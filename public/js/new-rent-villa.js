const data = {};
let specialPlaces = [];
let rooms = [];
let pools = [];
let parkings = [];
// add the rule here
$.validator.addMethod(
    "selectRequired",
    function (value, element, arg) {
        return value != 0;
    },
    "لطفا انتخاب کنید"
);

const showSection = (index) => {
    $(".sections section").hide();
    $(".sections section").eq(index).show();
};

function nextForm(form) {
    const index = $(`#${form.id}`).parents("section").index();
    const nextLi = $(".form-steps ul li").eq(index + 1);
    const hasClass = nextLi.hasClass("active");
    if (!hasClass) {
        nextLi.addClass("active");
    }
    showSection(index + 1);
}

$("#general-specifications").validate({
    submitHandler: function (form) {
        nextForm(form);
    },
    rules: {
        title: {
            required: true,
            minlength: 10,
            maxlength: 150,
        },
        state: {
            selectRequired: true,
        },
        city: {
            selectRequired: true,
        },
        villatype: {
            selectRequired: true,
        },
        estatetype: {
            selectRequired: true,
        },
    },
    messages: {
        title: {
            required: "پر کردن این فیلد الزامی است",
            minlength: "حداقل باید 10 کاراکتر داشته باشد ",
            maxlength: "حداکثر میتواند 150 کاراکتر داشته باشد",
        },
    },
});

$(".sections section").eq(0).show();

$("#select-photos-btn").click(function () {
    $("#photos-input").trigger("click");
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

$("#add-special-place").click(function (e) {
    e.preventDefault();
    $("#specialPlace").appendTo("body").modal("show");
});

function remove(id) {
    specialPlaces = specialPlaces.filter((item) => item.id != id);
    if (!specialPlaces.length) {
        $("#special-places").html(`
        <li>
            <p>مکانی اضافه نکرده اید</p>    
        </li>    `);
    } else {
        renderSpecialPlaces();
    }
}

function renderSpecialPlaces() {
    let itemTemplates = "";
    specialPlaces.forEach((place) => {
        itemTemplates += `
                <li>
                    <h3>
                            ${place.placename}
                        <button type="button" class="btn btn-danger" onclick='remove(${place.id})'><i class="fa fa-trash"></i></button>
                    </h3>
                    <span><i class="fas fa-walking"></i> ${place.distance_by_walking} دقیقه </span>
                    <span><i class="fas fa-car"></i> ${place.distance_by_car} دقیقه </span>
                </li>
            `;
    });
    $("#special-places").html(itemTemplates);
}

function newSpecialPlace(data) {
    specialPlaces.push(data);
    renderSpecialPlaces();
    $("#specialPlace").appendTo("body").modal("hide");
}

$("#specialPlaceForm").validate({
    submitHandler: (form) => {
        const data = {
            id: Math.ceil(Math.random() * 5555),
            placename: $("#placename").val(),
            distance_by_walking: $("#distance_by_walking").val(),
            distance_by_car: $("#distance_by_car").val(),
        };
        newSpecialPlace(data);
    },
    rules: {
        placename: {
            required: true,
            minlength: 5,
        },
        distance_by_walking: {
            required: true,
        },
        distance_by_car: {
            required: true,
        },
    },
    messages: {
        placename: {
            required: "این قسمت نمیتواند خالی باشد",
            minlength: "حداقل باید 5 کاراکتر داشته باشد",
        },
        distance_by_car: {
            required: "این قسمت نمیتواند خالی باشد",
        },
        distance_by_walking: {
            required: "این قسمت نمیتواند خالی باشد",
        },
    },
});

$("#specification-form").validate({
    submitHandler: (form) => {
        nextForm(form);
    },
    rules: {
        floors: {
            required: true,
            min: 1,
            max: 40,
        },
        unite: {
            required: true,
            min: 1,
            max: 40,
        },
        foundationArea: {
            required: true,
            max: 99999,
        },

        foundationHome: {
            required: true,
            max: 99999,
        },
    },
    messages: {
        floors: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید یک طبقه داشته باشد",
            max: "حداکثر میتواند 40 طبقه داشته باشد",
        },
        unite: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 واحد داشته باشد",
            max: "حداکثر میتواند 40 واحد داشته باشد",
        },
        foundationArea: {
            required: "پر کردن این فیلد الزامی است",
            max: "حداکثر میتواند کمتر از 100000 متر باشد",
        },

        foundationHome: {
            required: "پر کردن این فیلد الزامی می باشد",
            max: "حداکثر میتواند کمتر از 100000 متر باشد",
        },
    },
});

function removeRoom(id) {
    rooms = rooms.filter((item) => item.id != id);
    renderRooms();
}

function removePool(id) {
    pools = pools.filter((item) => item.id != id);
    renderPools();
}

function removeParking(id) {
    parkings = parkings.filter((item) => item.id != id);
    renderParkings();
}

function renderRooms() {
    const ul = $("#rooms");
    if (!rooms.length) ul.html("<li><p>اتاقی اضافه نشده است</p></li>");
    else {
        ul.html("");
        rooms.forEach((item) => {
            const li = $("<li></li>");
            li.append(
                `<h3>${item.room_title} <button class="btn btn-danger btn-sm" type="button" onclick="removeRoom(${item.id})"><i class="fa fa-trash"></i></button></h3>`
            );
            if (item.master > 0) {
                li.append(`<h5>این اتاق سرویس بهداشتی دارد(مستر)</h5>`);
            }

            if (item.single_bed) {
                li.append(
                    `<span><i class="fa fa-check text-success"></i>&nbsp;این اتاق ${item.single_bed} تخت تک نفره دارد</span>`
                );
            }

            if (item.double_bed) {
                li.append(
                    `<span><i class="fa fa-check text-success"></i>&nbsp;این اتاق ${item.double_bed} تخت دو نفره دارد</span>`
                );
            }

            item.possibilities.forEach((item2) => {
                li.append(
                    `<span><i class="fa fa-check text-success"></i>&nbsp;${item2.text}</span>`
                );
            });
            ul.append(li);
        });
    }
}

$("#new-room-form").validate({
    submitHandler: () => {
        const data = {
            id: Math.ceil(Math.random() * 5555),
            room_title: $("#room_title").val(),
            single_bed: $("#single_bed").val(),
            double_bed: $("#double_bed").val(),
            master: $("#master:checked").length,
            possibilities: [],
        };
        var selected = [];
        $(".possibilities input:checked").each(function () {
            selected.push({
                name: $(this).attr("name"),
                text: $(this).attr("text"),
            });
        });
        data.possibilities = selected;
        rooms.push(data);
        renderRooms();
        $("#new-room-modal").modal("hide");
    },
    rules: {
        room_title: {
            required: true,
        },
    },
    messages: {
        room_title: "پر کردن این فیلد الزامی میباشد",
    },
});

$(".new-item").click(function () {
    const box = $($(this).attr("box"));
    const input = $($(this).attr("input"));
    if (input.val().length) {
        box.append(`<div class="form-group checkbox-group">
        <label>
            <input type="checkbox" text="${input.val()}"  name="${input.val()}" checked class="option-input checkbox" />
        ${input.val()}
        </label>
    </div>
    `);
    }
});

function changeModalView(btn, status) {
    const id = btn.attr("modal");
    $(id).appendTo("body").modal(status);
}

$(".show-modal").click(function (e) {
    e.preventDefault();
    changeModalView($(this), "show");
});

$(".close-modal").click(function (e) {
    e.preventDefault();
    changeModalView($(this), "hide");
});

function renderPools() {
    const ul = $("#pools");
    const fields = {
        pool_location: "موقعیت استخر",
        heating_system: "سیستم گرمایشی",
        cooling_system: "سیستم سرمایشی",
        width_pool: "عرض استخر",
        length_pool: "طول استخر",
        least_depth: "کمترین عمق",
        max_depth: "بیشترین عمق",
    };
    if (!pools.length) ul.html("<li><p>استخری اضافه نشده است</p></li>");
    else {
        ul.html("");
        pools.forEach((item) => {
            const li = $("<li></li>");
            li.append(
                `<h3>استخر</h3> <button class="btn btn-danger btn-sm" type="button" onclick="removePool(${item.id})"><i class="fa fa-trash"></i></button>`
            );

            li.append(
                `<span>
                    <i class="fas fa-circle"></i>&nbsp;نوع استخر: ${
                        item.pool_type == 1 ? "رو باز" : "رو بسته"
                    }
                </span>`
            );

            for (const key in item) {
                if (Object.keys(fields).includes(key) && item[key] != "") {
                    li.append(
                        `<span>
                            <i class="fas fa-circle"></i>&nbsp;${fields[key]}: ${item[key]}
                        </span>`
                    );
                }
            }
            if (item.water_shower) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;دوش آب: دارد
                </span>`
                );
            }
            if (item.water_slides) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp; سرسره و امکانات تفریحی: دارد
                </span>`
                );
            }
            ul.append(li);
        });
    }
}

$("#new-pool-form").validate({
    submitHandler: () => {
        const data = {
            id: Math.ceil(Math.random() * 5555),
            pool_type: $("#type_pool").val(),
            pool_location: $("#pool_location").val(),
            heating_system: $("#pool_heating_system").val(),
            cooling_system: $("#pool_cooling_system").val(),
            width_pool: $("#width_pool").val(),
            length_pool: $("#length_pool").val(),
            least_depth: $("#least_pool_depth").val(),
            max_depth: $("#max_pool_depth").val(),
            water_slides: $("#water_slides:checked").length,
            water_shower: $("#water_shower:checked").length,
        };
        pools.push(data);
        renderPools();
        $("#new-pool-modal").modal("hide");
    },
    rules: {
        pool_location: {
            required: true,
            minlength: 3,
        },
    },
    messages: {
        pool_location: {
            required: "پر کردن این فیلد الزامی است",
            minlength: "حداقل باید 3 کاراکتر باشد",
        },
    },
});

$("#spaces").validate({
    submitHandler: (form) => {
        const heatingSystemItems = [];
        const coolingSystemItems = [];
        const moreHealthItems = [];
        const morePoolItems = [];
        const courtyard = [];
        const views = [];
        $("#heating_system_items input:checked").each(function () {
            heatingSystemItems.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });

        $("#cooling_system_items input:checked").each(function () {
            coolingSystemItems.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });

        $("#more_health_items input:checked").each(function () {
            moreHealthItems.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });

        $("#more_pools_items input:checked").each(function () {
            morePoolItems.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });

        $("#views input:checked").each(function () {
            views.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });
        $("#courtyard input:checked").each(function () {
            courtyard.push({
                text: $(this).attr("text"),
                name: $(this).attr("name"),
            });
        });
        const data = {
            standard_capacity: $("#standard_capacity").val(),
            max_capacity: $("#max_capacity").val(),
            rooms,
            heating_system_items: heatingSystemItems,
            cooling_system_items: coolingSystemItems,
            count_wc: $("#count_wc").val(),
            count_bathroom: $("#count_bathroom").val(),
            more_health_items: moreHealthItems,
            pools,
            more_pool_items: morePoolItems,
            parkings,
            courtyard,
            more_info: $("#more_info_space").val(),
            views,
        };

        // update data in database
        nextForm(form);
    },
    rules: {
        standard_capacity: {
            required: true,
            min: 1,
            max: 20,
        },
        max_capacity: {
            required: true,
            min: 1,
            max: 110,
        },
    },
    messages: {
        standard_capacity: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 نفر اضافه شود",
            max: "حداکثر میتواند 20 نفر باشد",
        },
        max_capacity: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 نفر اضافه شود",
            max: "حداکثر میتواند 110 نفر باشد",
        },
    },
});

function renderParkings() {
    const ul = $("#parkings");
    if (!parkings.length) ul.html("<li><p>پارکینگی اضافه نشده است</p></li>");
    else {
        ul.html("");
        parkings.forEach((item) => {
            const li = $("<li></li>");
            li.append(
                `<h3>پارکینگ <button class="btn btn-danger btn-sm" type="button" onclick="removeParking(${item.id})"><i class="fa fa-trash"></i></button></h3>`
            );

            li.append(
                `<span>
                <i class="fas fa-circle"></i>&nbsp; نوع پارکینگ: ${
                    item.type_parking == 1 ? "رو باز" : "سر بسته"
                }
            </span>`
            );

            li.append(
                `<span>
                <i class="fas fa-circle"></i>&nbsp; ظرفیت ماشین: ${item.car_capacity}
            </span>`
            );
            ul.append(li);
        });
    }
}

$("#new-parking-form").validate({
    submitHandler: () => {
        const data = {
            id: Math.ceil(Math.random() * 5555),
            type_parking: $("#type_parking").val(),
            car_capacity: $("#car_capacity").val(),
        };

        parkings.push(data);
        renderParkings();
        $("#new-parking-modal").modal("hide");
    },
    rules: {
        car_capacity: {
            required: true,
            min: 1,
            max: 100,
        },
    },
    messages: {
        car_capacity: {
            required: "پر کردن فیلد الزامی می باشد",
            min: "حداقل ظرفیت ماشین 1 عدد می باشد",
            max: "حداکثر ظرفیت ماشین 100 عدد می باشد",
        },
    },
});

function getAllCheckedInputs(id) {
    const checkeds = [];
    $(`${id} input:checked`).each(function () {
        checkeds.push({
            text: $(this).attr("text"),
            name: $(this).attr("name"),
        });
    });
    return checkeds;
}

$("#possibilities").validate({
    submitHandler: () => {
        const welfare_amenities = getAllCheckedInputs("#welfare_amenities");
        const kitchen_facilities = getAllCheckedInputs("#kitchen_facilities");
        const data = {
            welfare_amenities,
            kitchen_facilities,
        };
        console.log(data);
    },
});

let lat = 35.42323874580487;
let long = 52.07075264355467;
let latlong = "";
var mymap = L.map("mapid").setView([lat, long], 15);
L.tileLayer(
    "https://vt.parsimap.com/comapi.svc/tile/parsimap/{x}/{y}/{z}.jpg?token=ee9e06b3-dcaa-4a45-a60c-21ae72dca0bb"
).addTo(mymap);

setInterval(() => {
    mymap.invalidateSize(true);
}, 0);

var marker;
mymap.on("click", function (e) {
    if (marker) mymap.removeLayer(marker);
    latlong = e.latlng;
    marker = L.marker(e.latlng).addTo(mymap);
});

$("#step-address").click(function () {
    const option = $("#city option:selected");
    if (option && option.value != 0) {
        lat = option.attr("lat");
        long = option.attr("long");
        mymap.setView([lat, long]);
    }
});

$("#address-form").validate({
    submitHandler: (form) => {
        const data = {
            latlong,
            address: $("#address").val(),
        };
        console.log(data);
        nextForm(form);
    },
    rules: {
        address: {
            required: true,
            minlength: 10,
        },
    },
    messages: {
        address: {
            required: "آدرس الزامی می باشد",
            minlength: "حداقل باید 10 کاراکتر باشد",
        },
    },
});
