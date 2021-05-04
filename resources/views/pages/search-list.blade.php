@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')    
    <input type="hidden" id="lat" value="{{ $lat }}">
    <input type="hidden" id="long" value="{{ $long }}">
    <input type="hidden" id="type" value="{{ $type }}">
    <input type="hidden" id="name" value="{{ $name }}">
    <input type="hidden" id="for" value="{{ $for }}">
    @include('partials.loading')
    @include('partials.navbar')
    @include('partials.gototop')
    @include('partials.home.header')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div id="mapid"></div>
            </div>
            <div class="col-12 col-md-7 p-4">                
                @switch($for)
                    @case("Villa")               
                        <div class="row">
                            <h2 class="isbold">جستجوی سوییت و ویلا</h2>
                            @foreach ($data as $item)
                                <div class="col-12 col-md-5 mb-4">
                                    @include('partials.home.villa-item' , ["item" => $item])
                                </div>
                            @endforeach
                        </div>
                    @break
                @case("Apartment")                
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-12 col-md-5 mb-4">
                                @include('partials.home.apartment-item' , ["item" => $item])
                            </div>
                        @endforeach
                    </div>
                @break
            @case("Area")
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-12 col-md-5 mb-4">
                            @include('partials.home.area-item' , ["item" => $item])
                        </div>
                    @endforeach
                </div>
            @break
        @case("Shop")        
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
</div>


@include('partials.home.footer')

@endsection
@push('scripts')
<script src="{{ asset('js/leaflet.js') }}"></script>
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




var popup = L.popup();

function onMapClick(item) {
    
    popup
        .setLatLng([item.lat  , item.long])
        .setContent("<a href='/" + $("#for").val().toLowerCase() +"/" + item.id +"' class='more-info-link'>جزئیات بیشتر</a>")
        .openOn(mymap);
}

$.ajax({
    method: "GET",
    url: "/search/get-all?name=" + $("#name").val()+"&type=" + $("#type").val() + "&for=" + $("#for").val(),
    success: (response) => {
        response.forEach(item => {
            L.marker([item.lat , item.long]).addTo(mymap).on("click" , onMapClick.bind(this ,item));
        });   
    }
});

</script>
@endpush
