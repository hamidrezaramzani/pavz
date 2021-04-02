@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">

            @include('partials.gallery' , ["images" => $data->pictures()->get()])
            <div class="col-12 col-md-8">
                @include('pages.villa.sections.main' , ["data" => $data])
                @include('pages.villa.sections.home' , ["data" => $data])
                @include('pages.villa.sections.special-places' , ["data" => $data])
                @include('pages.villa.sections.welfare-possiblities' , ["data" => $data])
                @include('pages.villa.sections.kitchen-facilities' , ["data" => $data])
                @include('pages.villa.sections.temperature-systems' , ["data" => $data])
                @include('pages.villa.sections.spaces' , ["data" => $data])
                @include('pages.villa.sections.rules' , ["data" => $data])
                @include('pages.villa.sections.pricing' , ["data" => $data])
                @include('pages.villa.sections.address' , ["data" => $data])
                @include('pages.villa.sections.scores' , ["data" => $data])
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
                
                @include('pages.villa.sections.user' , ["data" => $data])

                <div class="mt-3 user-call-info p-3">
                    <div class="w-50 float-right p-1">
                        <span>از تاریخ</span>
                        <input type="text" name="date-in" class="date-in reserve-input" id="date-in">
                    </div>
                    <div class="w-50 float-right p-1">
                        <span>تا تاریخ</span>
                        <input type="text" name="date-out" class="date-out reserve-input" id="date-out">


                    </div>
                    <form action="" class="form">
                        <div class="form-group float-right w-100 mt-2">
                            <label for="guests">تعداد مهمانان:</label>
                            <input type="number" name="guests" id=guests" class="form-control bg-white text-right"
                                placeholder="تعداد مهمانان را مشخص کنید">
                        </div>



                        <div class="form-group float-right w-100">
                            <label for="fullname">نام و نام خانوادگی:</label>
                            <input type="text" name="fullname" id=fullname" class="form-control bg-white text-right"
                                placeholder="نام و نام خانوادگی را وارد نمایید">
                        </div>




                        <div class="form-group float-right w-100">
                            <label for="phonenumber">شماره تماس:</label>
                            <input type="text" name="phonenumber" id=phonenumber" class="form-control bg-white text-right"
                                placeholder="شماره تماس را وارد نمایید">
                        </div>

                        <button class="btn my-3 btn-sm btn-block btn-primary is float-right w-100">ثبت درخواست رزرو</button>
                    </form>


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
        let lat = $("#lat").val();
        let long = $("#lng").val();
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

        L.marker({
            lat: $("#lat").val(),
            lng: $("#lng").val()
        }).addTo(mymap);


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


            function setScore(name, score) {
                const url = `/scores/${name}/${$("#id").val()}/${score}`;
                $.ajax({
                    method: "GET",
                    url,
                    success: () => {
                        Swal.fire({
                            title: "انجام شد",
                            text: "امتیاز ثبت شد",
                            icon: "success",
                            confirmButtonText: "باشه",
                        });
                    },
                    error: (err) => {
                        if (err.status == 401) {
                            Swal.fire({
                                title: "خطا",
                                text: "برای امتیاز دادن باید به حساب خود ورود کنید",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });
                            return
                        } else {
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });
                        }

                    }
                });
            }


            $.ajax({
                method: "GET",
                url: "/scores/get/" + $("#id").val(),
                success: (response) => {
                    $(".accuracy_of_content").starRating({
                        initialRating: response.accuracyOfContent,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-accuracy-of-content", score)
                        }
                    });



                    $(".timely_delivery").starRating({
                        initialRating: response.timelyDelivery,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-timely-delivery", score)
                        }
                    });



                    $(".host_encounter").starRating({
                        initialRating: response.hostEncounter,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-host-encounter", score);
                        }
                    });



                    $(".quality").starRating({
                        initialRating: response.quality,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-quality", score);
                        }
                    });




                    $(".purity").starRating({
                        initialRating: response.purity,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-purity", score);
                        }
                    });




                    $(".address").starRating({
                        initialRating: response.address,
                        starSize: 20,
                        callback: (score) => {
                            setScore("set-address", score);
                        }
                    });

                }
            })






        });

    </script>
@endpush
