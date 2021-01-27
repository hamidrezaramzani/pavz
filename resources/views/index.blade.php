@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    <div id="home">
        @include('partials.home.header')
        @include('partials.home.services')
        @include('partials.home.best-villas')
        @include('partials.languages')
    </div>
    
@endsection
