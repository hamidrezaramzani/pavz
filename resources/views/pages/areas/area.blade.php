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
                        فروش زمین با دید عالی و مناسب
                        <div class="my-rating"></div>
                    </h2>
                    <h5>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        مازندران / رامسر
                    </h5>
                    <br>
                    <span class="d-inline btn btn-sm btn-warning">کد ملک : 11</span>
                    <br>
                    <br>
                    <span>
                        <i class="fa fa-circle"></i>
                        درباره زمین
                    </span>
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
                            سند شش دانگ
                        </li>
                        <li>
                            <i class="fas fa-door-open"></i>
                            100 متر زیر بنا
                        </li>
                        <li>
                            <i class="fas fa-building"></i>
                            استان مازندران
                        </li>
                        <li>
                            <i class="fa fa-tree"></i>
                            شهر رامسر
                        </li>
                    </ul>
                </div>
                <br>
                <br>
                <div class="villa-info-item info-table float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        اطلاعات مربوط به زمین
                    </h2>
                    <br>

                    <table class="table text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>سند:</td>
                                <td>شش دانگ</td>
                            </tr>

                            <tr>
                                <td>متراژ:</td>
                                <td>1500 متر</td>
                            </tr>

                            <tr>
                                <td>نوع کاربری:</td>
                                <td>کشاورزی</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>تعداد بر:</td>
                                <td>3</td>
                            </tr>

                            <tr>
                                <td>طول بر اصلی:</td>
                                <td>140 متر</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        قیمت گذاری زمین
                    </h2>

                    <br>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>قیمت کلی:</td>
                                <td>120000 تومان</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>قیمت به ازای هر متر:</td>
                                <td>200000 تومان</td>
                            </tr>

                        </tbody>

                    </table>

                </div>



                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        آدرس زمین
                    </h2>

                    <br>

                    <p>رامسر - ساداتشهر - اربکله - کوچه امین 1 - طبقه سوم</p>
                </div>


                <div id="mapid"></div>
                <br>

                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        درج نظر
                    </h2>

                    <br>

                    <form action="" class="form">

                        <div class="form-group">
                            <label for="title">عنوان:</label>
                            <input type="text" name="title" id="title" class="form-control bg-white"
                                placeholder="عنوان نظر خود درباره این ویلا را وارد نمایید">
                        </div>



                        <div class="form-group">
                            <label for="email">پست الکترونیکی:</label>
                            <input type="text" name="email" id="email" class="form-control bg-white"
                                placeholder="پست الکترونیکی خود را وارد نمایید">
                        </div>

                        <div class="form-group">
                            <label for="address">آدرس:</label>
                            <textarea name="address" style="height: 200px" id="address" class="form-control bg-white"
                                placeholder="نظر خود را وارد نمایید"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-sm btn-primary is">ثبت نظر</button>
                    </form>
                </div>


                <div class="comments w-100 d-block">
                    <ul>
                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>


                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
            <div class="col-12 col-md-4">
                <div class="user-call-info">
                    <img src="{{ asset('upload/1617049251.jpg') }}" alt="">
                    <h3>حمیدرضا رمضانی</h3>
                    <br>
                    <div class="call-ways">
                        <button class="btn btn-sm btn-primary is">
                            <i class="fa fa-phone"></i>&nbsp;
                            تماس
                        </button>
                        <button class="btn btn-sm mx-2 btn-primary is">
                            <i class="fab fa-telegram"></i>&nbsp;
                            تلگرام
                        </button>

                        <button class="btn btn-sm mx-2 btn-primary is">
                            <i class="fa fa-envelope"></i>&nbsp;
                            پیامک
                        </button>

                    </div>
                    <br>
                    <br>
                </div>


            </div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('styles/persian-datepicker.min.css') }}" />
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>

    <script>
        let lat = 35.6892;
        let long = 51.3890;
        let latlong = [lat, long];
        var mymap = L.map("mapid").setView([lat, long], 15);
        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }
        ).addTo(mymap);

        setInterval(() => {
            mymap.invalidateSize(true);
        }, 0);


        $(".date-in").pDatepicker({
            minDate: new persianDate().unix(),
            initialValue: false
        });



        $(".date-out").pDatepicker({
            minDate: new persianDate().unix(),
            initialValue: false
        });

        $(document).ready(function() {



            $(".my-rating").starRating({
                initialRating: 4,
                starSize: 20,
            });
        });

    </script>
@endpush
