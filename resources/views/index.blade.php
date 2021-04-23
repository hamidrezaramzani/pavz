@extends('layout.content' , ["title" => "اجاره و خرید ویلا و سوییت و خرید و رهن آپارتمان و مغازه و خرید زمین | پاوز" ,
"description" => " بهترین سایت خرید و فروش ویلا و سوییت و همچنین خرید زمین و رهن و فروش آپارتمان و مغازه در ایران با ثبت
آگهی رایگان"])
@section('content')


  
    @include('partials.share')
    @include('partials.loading')
    @include('partials.navbar')
    @include('partials.home.header')
    @include('partials.home.best-places')
    @include('partials.home.best-villas')
    @include('partials.home.possibilities')
    @include('partials.home.best-apartments')
    @include('partials.home.best-areas')
    @include('partials.home.best-shops')
    @include('partials.home.footer')
    @include('partials.gototop')
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
