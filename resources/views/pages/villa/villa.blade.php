@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">
            @include('partials.gallery')
            <div class="col-12 col-md-8">
                <div class="villa-info-item">
                    <h2>
                        اجاره ویلا استخر دار همراه با جکوزی
                        <div class="my-rating"></div>

                    </h2>
                    <h5>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        مازندران / رامسر
                    </h5>
                    <br>
                    <span class="text-info  d-inline">کد ملک : 11</span>
                    <br>
                    <br>
                    <span>درباره اقامتگاه</span>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته
                        حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان
                        رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                        داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل
                        حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                        گیرد.
                    </p>
                </div>

                <div class="villa-info-item">
                    <ul>
                        <li>
                            <i class="fa fa-home"></i>
                            خانه دربست
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-12 col-md-4"></div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(".my-rating").starRating({
                initialRating: 4,
                starSize: 20,
            });
        });

    </script>
@endpush
