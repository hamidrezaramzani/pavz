@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('pages.slideshow' , ["images" => $data->pictures()->get() , "folder" => "apartment_pictures"])

    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">
            @include('partials.gallery' , ["images" => $data->pictures()->get() , "folder" => "apartment_pictures"])
            <div class="col-12 col-md-8">
                @include('pages.apartment.sections.main');
                @include('pages.apartment.sections.home');
                @include('pages.apartment.sections.possibilities');
                @include('pages.apartment.sections.temp');
                @include('pages.apartment.sections.prices');
                @include('pages.apartment.sections.address');


            </div>
            <div class="col-12 col-md-4">
                @include('pages.user');
            </div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('styles/persian-datepicker.min.css') }}" />
    <script src="{{ asset('js/RBSlideshow.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>

    <script>
        let lat = $("#lat").val();
        let long = $("#lng").val();
        let latlong = [lat, long];
        var mymap = L.map("mapid").setView([lat, long], 15);
        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }
        ).addTo(mymap);

        L.marker([lat, long]).addTo(mymap);

        setInterval(() => {
            mymap.invalidateSize(true);
        }, 0);



        $(".show-more-images").click(function(e) {
            e.preventDefault();
            $(".slideshow").show();
        });


        $("#close-slideshow").click(function(e) {
            $(".slideshow").hide();
        });

    </script>
@endpush
