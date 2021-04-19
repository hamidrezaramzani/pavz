@extends('layout.content' , ["title" => "ثبت نام | پاوز"])
@section('content')
    @include('partials.home.header')
    @include('partials.navbar')
    <div class="container">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="row justify-content-center login-box">
            <div class="col-md-4 col-11 login-form">
                <img src="{{ asset('images/dpavz.png') }}" alt="PAVZ logo">
                <h3>ثبت نام حساب</h3>
                <p>با ثبت نام میتوانید به تمامی امکانات سایت دسترسی پیدا کنید.</p>
                <br>
                <br>
                <form action="" id="register-form" method="POST">
                    <div class="inpg">
                        <input type="text" id="phonenumber" name="phonenumber" placeholder="شماره تلفن خود را وارد نمایید">
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="inpg">
                        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد نمایید">
                        <span>
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="inpg">
                        <input type="text" id="identifier-code" name="code" placeholder="کد معرف را وارد نمایید(اختیاری)">
                        <span>
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="agreement" id="agreement">
                        <label class="form-check-label" id="agree-label">تمامی <a href="/rules" id="rules-link">قوانین
                                سایت</a> را خوانده و قبول دارم</label>
                    </div>
                    <br>
                    <br>

                    <button type="submit">ثبت نام</button>
                    <br>
                    <ul>
                        <li><a href="/login">قبلا ثبت نام کرده ام</a></li>
                    </ul>
                </form>
            </div>
            <div class="col-md-8 col-11 right">
                <div class="effect"></div>
                <h3>حساب جدید
                    <br>
                    <p>
                        با ورود به سایت میتوانید به تمامی خدمات سایت در پنل کاربری دسترسی
                        داشته باشید.
                    </p>
                    <a href="/login" class="btn btn-sn btn-outline-light is">ورود</a>
                </h3>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade show" id="activeAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title is" id="exampleModalLongTitle">فعال سازی حساب</h5>

                </div>
                <div class="modal-body acm-body">
                    <form action="" id="activationForm">
                        <h3>کد تایید</h3>
                        <p id="sent-code-p"></p>
                        <br>
                        <input type="number" name="code" id="code" placeholder="کد چهار رقمی">
                        <br>
                        <p>کد شما <span class="text-danger" id="acm-time">120 ثانیه</span> دیگر منقضی خواهد شد.</p>
                        <br>
                        <button class="btn btn-sm btn-primary btn-block is text-center" type="submit">تایید</button>
                    </form>

                </div>

            </div>
        </div>
    </div>


    @include('partials.rules')
    @include('partials.home.footer')
    @include('partials.languages')
    @include('partials.gototop')
@endsection
@push('scripts')
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        $("#rules-link").click(function(e) {
            e.preventDefault();
            $("#rules").modal("show");
        })

        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "شماره تلفن صحیح نمیباشد"
        );

        $.validator.addMethod(
            "isDuplicate",
            function(value, element, regexp) {
                let result = null;
                $.ajax({
                    type: "GET",
                    url: "/is-phonenumber-duplicate/" + value,
                    async: false,
                    success: (data) => {
                        result = data;
                    }
                })
                return result != 1;
            },
            "این شماره تلفن قبلا استفاده شده است"
        );



        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('#register-form').validate({
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "/store-user",
                    data: {
                        _token: CSRF_TOKEN,
                        phonenumber: $("#phonenumber").val(),
                        password: $("#password").val(),
                        identifierCode: $("#identifier-code").val()
                    },
                    success: (response) => {
                        $("#sent-code-p").text(
                            `کد ارسالی به شماره تلفن ${$("#phonenumber").val()} را وارد نمایید`)
                        $("#activeAccountModal").modal("show");
                        let secound = 120;
                        const timer = setInterval(() => {

                            secound -= 1;
                            if (secound == 0) {
                                clearInterval(timer);
                                $("#activeAccountModal").modal("hide");
                            }
                            $("#acm-time").html(`${secound} ثانیه `);
                        }, 1000);

                    },
                    error: (err) => {
                        Swal.fire({
                            title: 'خطا',
                            text: 'خطایی به وجود آمده است. به سرور اطلاع دهید',
                            icon: 'error',
                            confirmButtonText: 'باشه'
                        })
                    }
                })
            },
            rules: {
                phonenumber: {
                    required: true,
                    regex: /^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/,
                    isDuplicate: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 40
                },
                agreement: {
                    required: true
                }
            },
            messages: {
                phonenumber: {
                    required: "شماره تلفن نمیتواند خالی باشد"
                },
                agreement : "قوانین و مقررات را قبول کنید" , 
                password: {
                    required: "رمز عبور نمیتواند خالی باشد",
                    minlength: "رمز عبور حداقل باید 6 کاراکتر داشته باشد",
                    maxlength: "رمز عبور حداکثر میتواند 40 کاراکتر داشته باشد"
                }
            }
        });

        $('#activationForm').validate({
            submitHandler: function(form) {
                const data = {
                    phonenumber: $("#phonenumber").val(),
                    code: $("#code").val(),
                    _token: CSRF_TOKEN
                };
                $.ajax({
                    type: "POST",
                    url: "/active-user",
                    data,
                    success: (response) => {
                        Swal.fire({
                            title: 'انجام شد',
                            text: 'ثبت نام با موفقیت انجام شد',
                            icon: 'success',
                            confirmButtonText: 'باشه',
                            onClose: () => {
                                location.href = "/login";
                            }
                        })
                    },
                    error: (error) => {
                        if (error.status != 401) {
                            Swal.fire({
                                title: 'خطا',
                                text: 'خطایی به وجود آمده است',
                                icon: 'error',
                                confirmButtonText: 'باشه',
                                onClose: () => {
                                    $("#activeAccountModal").modal("hide");
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'خطا',
                                text: 'کد اشتباه است',
                                icon: 'error',
                                confirmButtonText: 'باشه'
                            })
                        }
                    }
                })
            },
            rules: {
                code: {
                    required: true,
                    minlength: 4,
                    maxlength: 4
                }
            },
            messages: {
                code: {
                    required: "کد را باید وارد نمایید",
                    minlength: "باید 4 کاراکتر باشد",
                    maxlength: "باید 4 کاراکتر باشد"
                }
            }
        })

    </script>
@endpush
