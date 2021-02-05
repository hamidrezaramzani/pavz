@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')
    @include('partials.home.best-places')
    @include('partials.home.best-villas')
    @include('partials.home.counts')
    @include('partials.home.best-apartments')
    @include('partials.home.best-areas')
    @include('partials.home.best-contractors')
    @include('partials.home.attractions-tourist')
    @include('partials.home.footer')
    @include('partials.languages')
    @include('partials.gototop')
@endsection
@push('scripts')
<script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/multi-animated-counter.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endpush