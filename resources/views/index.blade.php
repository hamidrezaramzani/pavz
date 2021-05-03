@extends('layout.content' , ["title" => "اجاره و فروش ویلا و آپارتمان به همراه رهن مغازه و فروش زمین | پاوز" ,
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
        <script src="{{ asset('js/myapp.js') }}"></script>
    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- End Google Analytics -->
@endpush
