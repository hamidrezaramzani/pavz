@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    <input type="hidden" id="lat" value="{{ $lat }}">
    <input type="hidden" id="long" value="{{ $long }}">
    <input type="hidden" id="type" value="{{ $type }}">
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="row justify-content-center">
        <div class="col-12 col-md-5">
            <div id="mapid"></div>
        </div>
        <div class="col-12 col-md-7 p-4">
            @switch($type)
                @case(1)
                @case(2)
                @case(3)
                @case(4)
                    <div class="row">
                        <h2 class="isbold">جستجوی سوییت و ویلا</h2>
                        @foreach ($data as $item)
                            <div class="col-12 col-md-5 mb-4">
                                @include('partials.home.villa-item' , ["item" => $item])
                            </div>
                        @endforeach
                    </div>
                @break
            @case(5)
            @case(6)
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-12 col-md-5 mb-4">
                            @include('partials.home.apartment-item' , ["item" => $item])
                        </div>
                    @endforeach
                </div>
            @break
        @case(7)
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-12 col-md-5 mb-4">
                        @include('partials.home.area-item' , ["item" => $item])
                    </div>
                @endforeach
            </div>
        @break
    @case(8)
    @case(9)
        <div class="row">
            @foreach ($data as $item)
                <div class="col-12 col-md-5 mb-4">
                    @include('partials.home.shop-item' , ["item" => $item])
                </div>
            @endforeach
        </div>
    @break    

@endswitch
<br>
<br>
<br>
<br>
<br>
</div>
</div>

@include('partials.home.footer')

@endsection
@push('scripts')
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/multi-animated-counter.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
<script src="{{ asset('js/mobiscroll.jquery.min.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/persian-date.min.js') }}"></script>
<script>
let lat = $("#lat").val();
let long = $("#long").val();
let latlong = [lat, long];
var mymap = L.map("mapid").setView([lat, long], 15);
L.tileLayer(
"https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
maxZoom: 15,
minZoom: 5
}
).addTo(mymap);

setInterval(() => {
mymap.invalidateSize(true);
}, 0);


function setPriceTemplate(item, price) {
return `<a href="/villa/${item.id}" class="map-item-link">
<div class="map-item">
<img src='{{ asset('covers/${item.cover}') }}' alt='maptime logo gif' width='150px'/>
<br/>
<h3 class="map-item-title">${item.title}</h3>
<br/>
<h4>                                                    
${price} 
</h4>
</div>
</a>    
`;
}

function getTemplate(type, item) {
let template = ``;
switch (type) {
case 1:
template = setPriceTemplate(item, item.sold_villa_prices.agreed_price ? "قیمت توافقی" : item
.sold_villa_prices.total_price + " تومان")
break;
case 2:
template = setPriceTemplate(item, item.rentPrices.midweek + " / هرشب")
break
case 3:
template = setPriceTemplate(item, item.sold_villa_prices.agreed_price ? "قیمت توافقی" : item
.sold_villa_prices.total_price + " تومان")
break
case 4:
template = setPriceTemplate(item, item.rentPrices.midweek + " / هرشب")
break;
case 5:
template = setPriceTemplate(item, item.agreed_price ? "قیمت توافقی" : item.total_price + " تومان")
break;
case 6:
template = setPriceTemplate(item, item.mortgage + "تومان / رهن")
break;
case 7:
template = setPriceTemplate(item, item.total_price + " تومان")
break;
case 8:
template = setPriceTemplate(item, item.agreed_price ? "قیمت توافقی" : item.total_price + " تومان")
break;
case 9:
template = setPriceTemplate(item, item.mortgage + "تومان / رهن ")
break;

}

return template;
}

$.ajax({
method: "GET",
url: "/search/get-all/" + $("#type").val(),
success: ({
type,
data
}) => {
data.forEach(item => {
const marker = L.marker([item.lat, item.long]).on("click", function(e) {
let lat = e.latlng.lat;
let lng = e.latlng.lng;
var customPopup = getTemplate(type, item);
var customOptions = {
'maxWidth': '400',
'width': '400',
'className': 'popupCustom'
}
marker.bindPopup(customPopup, customOptions);
}).addTo(mymap);
});
}
});

</script>
@endpush
