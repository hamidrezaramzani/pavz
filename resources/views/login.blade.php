@extends('layout.content' , ["title" => "ورود به پنل | پاوز"])
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row justify-content-center login-box">
            <div class="col-md-4 col-11 login-form">
                {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

                <img src="{{ asset('images/dpavz.png') }}" alt="PAVZ logo">
                <h3>ورود به حساب</h3>
                <p>با ورود به سایت میتوانید به تمامی امکانات سایت دسترسی پیدا کنید.</p>
                <br>
                <br>
                <form action="" id="login-form" method="POST">
                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <div class="inpg">
                        <input type="text" id="phonenumber" name="phonenumber" placeholder="شماره تلفن خود را وارد نمایید">
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="inpg">
                        <input type="password" name="password" id="password" placeholder="رمز عبور خود را وارد نمایید">
                        <span>
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <button type="submit">ورود به حساب</button>
                    <br>
                    <ul>
                        <li><a href="/">حسابی در پاوز ندارم</a></li>
                        <li><a href="/">رمز عبور خود را فراموش کرده اید؟</a></li>
                    </ul>
                </form>
            </div>
            <div class="col-md-8 col-11 right">
                <div class="effect"></div>
                <h3>خوش برگشتید
                    <br>
                    <p>
                        خوشحالیم که شما را دوباره ببینم. با ورود به سایت میتوانید به تمامی خدمات سایت در پنل کاربری دسترسی
                        داشته باشید.
                    </p>
                    <a href="/register" class="btn btn-sn btn-outline-light is">ثبت نام</a>
                </h3>
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
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "شماره تلفن صحیح نمیباشد"
        );

        $("#login-form").validate({
            submitHandler: function(form) {
                const data = {
                    phonenumber: $("#phonenumber").val(),
                    password: $("#password").val(),
                    _token: $("#token").val()
                };
                $.ajax({
                    method: "POST",
                    url: "/login-user",
                    data: data,
                    success: (response) => {
                        Swal.fire({
                            title: 'انجام شد',
                            text: 'ورود با موفقیت انجام شد',
                            icon: 'success',
                            confirmButtonText: 'باشه',
                            onClose: () => {
                                location.href = "/panel";
                            }
                        })
                    },
                    error: (err) => {
                       if(err.status == 401){
                        Swal.fire({
                            title: 'خطا',
                            text: 'نام کاربری یا رمز عبور اشتباه است',
                            icon: 'error',
                            confirmButtonText: 'باشه'
                        })
                       }else{
                        Swal.fire({
                            title: 'خطا',
                            text: 'مشکلی در سرور وجود دارد',
                            icon: 'error',
                            confirmButtonText: 'باشه'
                        })
                       }
                    }
                });
            },
            rules: {
                phonenumber: {
                    required: true,
                    regex: /^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/,
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

    </script>
@endpush
