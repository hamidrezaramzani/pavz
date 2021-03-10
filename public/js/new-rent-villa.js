const data = {};
const cover = new FormData();
const pictures = new FormData();
let picturesList = [];
let isCover = false;
const deletedPictures = [];
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

function updateSpecificationForm(data, callback) {
    $.ajax({
        url: "/update-specification-form",
        method: "POST",
        data,
        success: () => {
            callback();
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
}

$("#general-specifications").validate({
    submitHandler: function (form) {
        const data = {
            title: $("#title").val(),
            state: $("#state").val(),
            city: $("#city").val(),
            villa_type: $("#villa_type").val(),
            estate_type: $("#estate_type").val(),
            _token: $("#s_csrf").val(),
            id: $("#id_").val(),
        };
        $("#sd-loading").show();
        updateSpecificationForm(data, function () {
            $("#sd-loading").hide();
            nextForm(form);
        });
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
        villa_type: {
            selectRequired: true,
        },
        estate_type: {
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

function removeSpecialPlace(id) {
    $.ajax({
        method: "GET",
        url: "/special-place/remove/" + id + "/" + $("#id_").val(),
        success: (specialPlaces) => {
            if (!specialPlaces.length) {
                $("#special-places").html(`
        <li>
            <p>مکانی اضافه نکرده اید</p>    
        </li>    `);
            } else {
                renderSpecialPlaces(specialPlaces);
            }
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
}

function renderSpecialPlaces(specialPlaces) {
    let itemTemplates = "";
    specialPlaces.forEach((place) => {
        itemTemplates += `
                <li>
                    <h3>
                            ${place.title}
                        <button type="button" class="btn btn-danger" onclick='removeSpecialPlace(${place.id})'><i class="fa fa-trash"></i></button>
                    </h3>
                    <span><i class="fas fa-walking"></i> ${place.distance_by_walking} دقیقه </span>
                    <span><i class="fas fa-car"></i> ${place.distance_by_car} دقیقه </span>
                </li>
            `;
    });
    $("#special-places").html(itemTemplates);
}

function addNewSpecialPlace(data) {
    $.ajax({
        method: "POST",
        url: "/special-place/new",
        data,
        success: (specialPlaces) => {
            Swal.fire({
                title: "انجام شد",
                text: "با موفقیت اضافه شد",
                icon: "success",
                confirmButtonText: "باشه",
            });
            createNewSpecialPlaceItem(specialPlaces);
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
}

function createNewSpecialPlaceItem(specialPlaces) {
    renderSpecialPlaces(specialPlaces);
    $("#specialPlace").appendTo("body").modal("hide");
}

$("#specialPlaceForm").validate({
    submitHandler: () => {
        const data = {
            id: Math.ceil(Math.random() * 5555),
            title: $("#placename").val(),
            distance_by_walking: $("#distance_by_walking").val(),
            distance_by_car: $("#distance_by_car").val(),
            villa_id: $("#id_").val(),
            _token: $("#new_special_csrf").val(),
        };
        addNewSpecialPlace(data);
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

$("#home-info").validate({
    submitHandler: (form) => {
        const data = {
            floors: $("#floors").val(),
            unites: $("#unites").val(),
            foundation_area: $("#foundation_area").val(),
            foundation_home: $("#foundation_home").val(),
            year_of_counstraction: $("#year_of_counstraction").val(),
            ownership: $("#ownership").val(),
            structure_type: $("#structure_type").val(),
            way_type: $("#way_type").val(),
            neighbor: $("#neighbor").val(),
            about_home: $("#about_home").val(),
            _token: $("#hi_token").val(),
            id: $("#id_").val(),
        };
        $("#hi-loading").show();
        $.ajax({
            method: "POST",
            data,
            url: "/villa/update/home-info",
            success: () => {
                $("#hi-loading").hide();
                nextForm(form);
            },
            error: () => {
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
        floors: {
            required: true,
            min: 1,
            max: 40,
        },
        unites: {
            required: true,
            min: 1,
            max: 40,
        },
        foundation_area: {
            required: true,
            max: 99999,
        },

        foundation_home: {
            required: true,
            max: 99999,
        },
        year_of_counstraction: {
            min: 1200,
            max: 1399,
        },
    },
    messages: {
        floors: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید یک طبقه داشته باشد",
            max: "حداکثر میتواند 40 طبقه داشته باشد",
        },
        unites: {
            required: "پر کردن این فیلد الزامی می باشد",
            min: "حداقل باید 1 واحد داشته باشد",
            max: "حداکثر میتواند 40 واحد داشته باشد",
        },
        foundation_area: {
            required: "پر کردن این فیلد الزامی است",
            max: "حداکثر میتواند کمتر از 100000 متر باشد",
        },

        foundation_home: {
            required: "پر کردن این فیلد الزامی می باشد",
            max: "حداکثر میتواند کمتر از 100000 متر باشد",
        },

        year_of_counstraction: {
            min: "نباید کمتر از سال 1200 باشد",
            max: "نباید بیشتر از سال 1399 باشد",
        },
    },
});

function removeRoom(id) {
    $.ajax({
        method: "GET",
        url: "/room/delete/" + id + "/" + $("#id_").val(),
        success: (rooms) => {
            renderRooms(rooms);
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
    renderRooms();
}

function removePool(id) {
    $.ajax({
        method: "GET",
        url: "/pool/delete/" + id + "/" + $("#id_").val(),
        success: (pools) => {
            renderPools(pools);
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
}

function removeParking(id) {
    $.ajax({
        method: "GET",
        url: "/parking/remove/" + id + "/" + $("#id_").val(),
        success: (parkings) => {
            renderParkings(parkings);
        },
        error: () => {
            Swal.fire({
                title: "خطا",
                text: "مشکلی در سرور وجود دارد",
                icon: "error",
                confirmButtonText: "باشه",
            });
        },
    });
    renderParkings();
}

function renderRooms(rooms) {
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

            let possibilities = JSON.parse(item.possibilities);
            possibilities.forEach((item2) => {
                if (item2.checked) {
                    li.append(
                        `<span><i class="fa fa-check text-success"></i>&nbsp;${item2.name}</span>`
                    );
                }
            });
            ul.append(li);
        });
    }
}

$("#new-room-form").validate({
    submitHandler: () => {
        const selected = [];
        $(".possibilities input:checked").each(function () {
            selected.push({
                name: $(this).attr("text"),
                checked: $(this).prop("checked"),
            });
        });
        const data = {
            id: Math.ceil(Math.random() * 5555),
            room_title: $("#room_title").val(),
            single_bed: $("#single_bed").val(),
            double_bed: $("#double_bed").val(),
            is_master: $("#master:checked").length,
            possibilities: JSON.stringify(selected),
            villa_id: $("#id_").val(),
            _token: $("#nr_token").val(),
        };

        $.ajax({
            method: "POST",
            url: "/room/new",
            data,
            success: (rooms) => {
                renderRooms(rooms);
                $("#new-room-modal").modal("hide");
            },
            error: () => {
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

function renderPools(pools) {
    const ul = $("#pools");

    if (!pools.length) ul.html("<li><p>استخری اضافه نشده است</p></li>");
    else {
        ul.html("");
        pools.forEach((item, index) => {
            const li = $("<li></li>");
            li.append(
                `<h3>
                <button class="btn btn-danger btn-sm" type="button" onclick="removePool(${
                    item.id
                })"><i class="fa fa-trash"></i></button>
                استخر ${index + 1}
                </h3>`
            );

            li.append(
                `<span>
                    <i class="fas fa-circle"></i>&nbsp;نوع استخر: ${
                        item.pool_type == 1 ? "رو باز" : "رو بسته"
                    }
                </span>`
            );

            li.append(
                `<span>
                <i class="fas fa-circle"></i>&nbsp;مکان استخر: ${item.pool_location}
            </span>`
            );

            if (item.width) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;عرض استخر: ${item.width}
                </span>`
                );
            }

            if (item.length) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;طول استخر: ${item.length}
                </span>`
                );
            }

            if (item.min_depth) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;کمترین عمق استخر: ${item.min_depth}
                </span>`
                );
            }

            if (item.max_depth) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;بیشترین عمق استخر: ${item.max_depth}
                </span>`
                );
            }

            if (item.heating_systems) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;سیستم گرمایشی : ${item.heating_systems}
                </span>`
                );
            }

            if (item.cooling_systems) {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;سیستم سرمایشی: ${item.cooling_systems}
                </span>`
                );
            }

            let possibilities = JSON.parse(item.possibilities);
            possibilities.forEach((item2) => {
                li.append(
                    `<span>
                    <i class="fas fa-circle"></i>&nbsp;: ${item2.text}
                </span>`
                );
            });

            ul.append(li);
        });
    }
}

$("#new-pool-form").validate({
    submitHandler: () => {
        let possibilities = getAllCheckedInputs("#more_pool_items");
        const data = {
            id: Math.ceil(Math.random() * 5555),
            pool_type: $("#type_pool").val(),
            pool_location: $("#pool_location").val(),
            heating_systems: $("#pool_heating_system").val(),
            cooling_systems: $("#pool_cooling_system").val(),
            width: $("#width_pool").val(),
            length: $("#length_pool").val(),
            min_depth: $("#least_pool_depth").val(),
            max_depth: $("#max_pool_depth").val(),
            possibilities: JSON.stringify(possibilities),
            _token: $("#np_token").val(),
            villa_id: $("#id_").val(),
        };

        $.ajax({
            method: "POST",
            data,
            url: "/pool/new",
            success: (pools) => {
                renderPools(pools);
                $("#new-pool-modal").modal("hide");
            },
            error: () => {
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

function getAllInputs(id) {
    let inputs = [];
    $(`${id} input`).each(function () {
        inputs.push({
            text: $(this).attr("text"),
            name: $(this).attr("name"),
            checked: $(this).prop("checked"),
        });
    });
    return inputs;
}

$("#spaces").validate({
    submitHandler: (form) => {
        const data = {
            standard_capacity: $("#standard_capacity").val(),
            max_capacity: $("#max_capacity").val(),
            heating_systems: JSON.stringify(
                getAllInputs("#heating_system_items")
            ),
            cooling_systems: JSON.stringify(
                getAllInputs("#cooling_system_items")
            ),
            number_of_wc: $("#number_of_wc").val(),
            number_of_bathroom: $("#number_of_bathroom").val(),
            more_health_possibilities: JSON.stringify(
                getAllInputs("#more_health_items")
            ),
            more_pool_possibilities: JSON.stringify(
                getAllInputs("#pool_items")
            ),
            courtyard: JSON.stringify(getAllInputs("#courtyard")),
            about_space_home: $("#more_info_space").val(),
            views: JSON.stringify(getAllInputs("#views")),
            _token: $("#space_token").val(),
            id: $("#id_").val(),
        };

        $("#space-loading").show();
        $.ajax({
            method: "POST",
            data,
            url: "/villa/update/spaces",
            success: (response) => {
                console.log(response);
                $("#space-loading").hide();
                nextForm(form);
            },
            error: () => {
                $("#space-loading").hide();
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
        number_of_bathroom: {
            min: 1,
        },
        number_of_wc: {
            min: 1,
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
        number_of_bathroom: {
            min: "حداقل باید 1 عدد باشد",
        },
        number_of_wc: {
            min: "حداقل باید 1 عدد باشد",
        },
    },
});

function renderParkings(parkings = []) {
    const ul = $("#parkings");
    if (!parkings.length) ul.html("<li><p>پارکینگی اضافه نشده است</p></li>");
    else {
        ul.html("");
        parkings.forEach((item, index) => {
            const li = $("<li></li>");
            li.append(
                `<h3> پارکینگ ${
                    index + 1
                } <button class="btn btn-danger btn-sm" type="button" onclick="removeParking(${
                    item.id
                })"><i class="fa fa-trash"></i></button></h3>`
            );

            li.append(
                `<span>
                <i class="fas fa-circle"></i>&nbsp; نوع پارکینگ: ${
                    item.type == 1 ? "رو باز" : "سر بسته"
                }
            </span>`
            );

            li.append(
                `<span>
                <i class="fas fa-circle"></i>&nbsp; ظرفیت ماشین: ${item.capacity}
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
            type: $("#type_parking").val(),
            capacity: $("#car_capacity").val(),
            _token: $("#npg_token").val(),
            villa_id: $("#id_").val(),
        };

        $.ajax({
            url: "/parking/new",
            data,
            method: "POST",
            success: (parkings) => {
                renderParkings(parkings);
                $("#new-parking-modal").modal("hide");
            },
            error: () => {
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
    submitHandler: (form) => {
        const welfare_amenities = getAllInputs("#welfare_amenities_box");
        const kitchen_facilities = getAllInputs("#kichen_items");
        const data = {
            welfare_amenities: JSON.stringify(welfare_amenities),
            kitchen_facilities: JSON.stringify(kitchen_facilities),
            _token: $("#p_token").val(),
            id: $("#id_").val(),
        };
        $("#possibilities-loading").hide();
        $.ajax({
            method: "POST",
            data,
            url: "/villa/update/possibilities",
            success: () => {
                $("#possibilities-loading").show();
                nextForm(form);
            },
            error: () => {
                $("#possibilities-loading").show();
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

let lat = 35.42323874580487;
let long = 52.07075264355467;
let latlong = [lat, long];
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
    latlong[0] = e.latlng.lat;
    latlong[1] = e.latlng.lng;
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
        console.log(latlong);
        const data = {
            lat: latlong[0],
            long: latlong[1],
            address: $("#address").val(),
            _token: $("#address_token").val(),
            id: $("#id_").val(),
        };
        $.ajax({
            method: "POST",
            url: "/villa/update/address",
            data,
            success: () => {
                nextForm(form);
            },
            error: () => {
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
        // nextForm(form);
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

$("#rules-form").validate({
    submitHandler: (form) => {
        const data = {
            delivery_time: $("#delivery_time").val(),
            discharge_time: $("#discharge_time").val(),
            min_stay: $("#min_stay").val(),
            more_time_rules_description: $("#more_info_time_rules").val(),
            animal: $("#animal").val(),
            smoke: $("#smoke").val(),
            party: $("#party").val(),
            more_rules_description: $("#more_info_rules").val(),
            villa_id: $("#id_").val(),
            _token: $("#rules_token").val(),
        };
        $.ajax({
            method: "POST",
            url: "/rule/update",
            data,
            success: () => {
                nextForm(form);
            },
            error: () => {
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

$("#pricing-form").validate({
    submitHandler: (form) => {
        const data = {
            middweek: $("#midweek_price").val(),
            endweek: $("#endweek_price").val(),
            peek: $("#peek_price").val(),
            price_per_person: $("#price_per_person").val(),
            middweek_discount: $("#midweek_discount").val(),
            endweek_discount: $("#endweek_discount").val(),
            peek_discount: $("#peek_discount").val(),
            villa_id: $("#id_").val(),
            _token: $("#rent_price_token").val(),
        };
        $.ajax({
            method: "POST",
            url: "/rent-price/update",
            data,
            success: () => {
                nextForm(form);
            },
            error: () => {
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
        midweek_price: {
            required: true,
        },
        endweek_price: {
            required: true,
        },
        peek_price: {
            required: true,
        },
        price_per_person: {
            required: true,
        },
        midweek_discount: {
            min: 0,
            max: 100,
        },
        endweek_discount: {
            min: 0,
            max: 100,
        },
        peek_discount: {
            min: 0,
            max: 100,
        },
    },
    messages: {
        midweek_price: {
            required: "پر کردن این فیلد الزامی است",
        },
        endweek_price: {
            required: "پر کردن این فیلد الزامی است",
        },
        peek_price: {
            required: "پر کردن این فیلد الزامی است",
        },
        price_per_person: {
            required: "پر کردن این فیلد الزامی است",
        },
        midweek_discount: {
            min: "حداقل میتواند 0 درصد باشد",
            max: "حداکثر می تواند 100 درصد باشد",
        },
        endweek_discount: {
            min: "حداقل میتواند 0 درصد باشد",
            max: "حداکثر می تواند 100 درصد باشد",
        },
        peek_discount: {
            min: "حداقل میتواند 0 درصد باشد",
            max: "حداکثر می تواند 100 درصد باشد",
        },
    },
});

$("#cover").change(function (e) {
    const files = e.target.files;
    console.log($(".cover-image").length);
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

$("#delete-cover-btn").click(function () {
    $("#cover-image-box img").remove();
    $("#cover-image-box").hide();
    cover.delete("cover");
    isCover = false;
});

function removePictureItem(id, isSaved) {
    console.log(picturesList);
    if (isSaved) deletedPictures.push(id);
    pictures.delete(`picture${id}`);
    $(`.pictures-box ul li#${id}`).remove();
    picturesList = picturesList.filter((item) => item != id);
}

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

$.ajax({
    method: "GET",
    url: "/pictures/villa/get/" + $("#id_").val(),
    success: (data) => {
        isCover = data.cover;
        picturesList = data.pictures;
    },
});

$("#picture-form").validate({
    submitHandler : (form) => {
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
    
        cover.append("_token", $("#hi_token").val());
        cover.append("id", $("#id_").val());
    
        pictures.append("_token", $("#hi_token").val());
        pictures.append("id", $("#id_").val());
        pictures.append("deleted_pictures", JSON.stringify(deletedPictures));
        const updateCoverPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            url: "/pictures/villa/cover-update",
            data: cover,
            error: () => {
                console.log(err);
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    
        const updatePicturesPromise = $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            url: "/pictures/villa/pictures-update",
            data: pictures,
    
            error: () => {
                console.log(err);
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            },
        });
    
        Promise.all([updateCoverPromise, updatePicturesPromise])
            .then(() => {
                nextForm(form);
            })
            .catch(() => {
                Swal.fire({
                    title: "خطا",
                    text: "مشکلی در سرور وجود دارد",
                    icon: "error",
                    confirmButtonText: "باشه",
                });
            });
    }
});