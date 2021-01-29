@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    <div id="home">
        @include('partials.home.header')
        {{-- @include('partials.home.services') --}}
        @include('partials.home.best-places')
        @include('partials.home.best-villas')
        @include('partials.home.best-apartments')
    </div>
    @include('partials.languages')
    @include('partials.gototop')
@endsection
