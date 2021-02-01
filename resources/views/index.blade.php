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
    @include('partials.languages')
    @include('partials.gototop')
@endsection
