@extends('layout.content' , ["title" => "درباره پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')

    <div class="container py-5">
        <div class="row text-center about-us justify-content-center my-5">
            <div class="col-12 col-md-6 p-5 ">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>درباره ما</h2>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                    متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                    شناخت فراوان جامعه و متخصصان را می طلبد.
                </p>
                <br>
                <br>
                <br>
                
                <h2>تماس با ما</h2>
                <p>شماره تلفن : 09300152714</p>
                <p>شماره تلفن : 09010406467</p>
                                                    <ul>
                    <li>
                        <button class="btn btn-sm btn-outline-danger is">
                            <i class="fab fa-instagram"></i>
                        </button>
                    </li>
                    <li>
                        
                        <button class="btn btn-sm btn-outline-info is">
                            <i class="fab fa-twitter"></i>
                        </button>
                    </li>
                    <li>
                        
                        <button class="btn btn-sm btn-outline-primary is">
                            <i class="fab fa-telegram"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 px-5 about-us-bg">
                <img src="{{ asset('images/us.png') }}" width="100%" alt="US">
            </div>
        </div>
    </div>
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
