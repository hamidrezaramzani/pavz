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
                    <button type="submit">ثبت نام</button>
                    <br>
                    <ul>
                        <li><a href="/">قبلا ثبت نام کرده ام</a></li>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title is" id="exampleModalLongTitle">فعال سازی حساب</h5>

                </div>
                <div class="modal-body acm-body">
                    <h3>کد تایید</h3>
                    <p id="sent-code-p"></p>
                    <br>
                    <form action="" id="activationForm">
                        <input type="number" placeholder="کد چهار رقمی ارسال شده">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-primary btn-sm is">تایید</button>
                </div>
            </div>
        </div>
    </div>
    @include('partials.home.footer')
    @include('partials.languages')
    @include('partials.gototop')
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
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



        $('#register-form').validate({
            submitHandler: function(form) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // $("#sent-code-p").text(`کد ارسالی به شماره تلفن ${$("#phonenumber").val()} را وارد نمایید`)
                // $("#activeAccountModal").modal("show")

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
                        console.log(response);
                    },
                    error: (err) => {
                        console.log(err);
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
                }
            },
            messages: {
                phonenumber: {
                    required: "شماره تلفن نمیتواند خالی باشد"
                },
                password: {
                    required: "رمز عبور نمیتواند خالی باشد",
                    minlength: "رمز عبور حداقل باید 6 کاراکتر داشته باشد",
                    maxlength: "رمز عبور حداکثر میتواند 40 کاراکتر داشته باشد"
                }
            }
        });

        $('#activationForm').validate({
            submitHandler: function(form) {
                console.log(form);
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
