@extends('layout.content' , ["title" => "ورود به پنل | پاوز" , "description" => "خوشحالیم که شما را دوباره ببینم. با ورود به سایت میتوانید به تمامی خدمات سایت در پنل کاربری دسترسی داشته باشید."])
@section('content')

{{-- <div class="login-back-background d-block d-md-none"></div> --}}
    @include('partials.loading')
    <div class="row justify-content-center login-box">
        <div class="col-md-4 col-11 login-form">
            <div class="login-form-content">                
                <img src="{{ asset('images/person.png') }}" alt="Person image" width="350">
                <h3>ورود به حساب</h3>
                <p>با ورود به سایت میتوانید به تمامی امکانات سایت دسترسی پیدا کنید.</p>
                <br>
                <br>
                <form action="" id="login-form" method="POST" class="form">
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
                    <button type="submit">ورود به حساب
                        <div id="login-loading" class="spinner-border spinner-border-sm" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <br>
                    <ul>
                        <li><a href="/register">حسابی در پاوز ندارم</a></li>
                        <li><a href="/" id="lost-password">رمز عبور خود را فراموش کرده اید؟</a></li>
                    </ul>
                    <br>
                    <br>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-11 d-none d-md-flex  right">
            <h3>خوش برگشتید
                <br>
                <p>
                    خوشحالیم که شما را دوباره ببینم. با ورود به سایت میتوانید به تمامی خدمات سایت در پنل کاربری دسترسی
                    داشته باشید.
                </p>
                <a href="/register" class="btn btn-sn btn-outline-light is">ثبت نام</a>
                <a href="/" class="btn btn-sn btn-outline-light is">صفحه اصلی</a>
            </h3>
        </div>
    </div>
    <div class="modal fade" id="lost-password-modal" tabindex="-1" aria-labelledby="loastPasswordModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title is" id="loastPasswordModal">فراموشی رمز عبور</h5>
                </div>
                <div class="modal-body">
                    <div id="lost-phonenumber-box">
                        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                        <form method="POST" class="form" action="" id="lost-phonenumber-form">
                            <h6 class="text-center text-dark is d-block">شماره تلفن حسابی که رمز آن را یادتان رفته است را
                                وارد نمایید</h6>
                            <div class="form-group">
                                <label for="lostPhoneNumber">شماره تلفن:</label>
                                <input type="number" name="lostPhoneNumber" id="lostPhoneNumber" class="form-control"
                                    placeholder="شماره تلفن را وارد نمایید" />
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary is">تایید
                                <div id="first-loading" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div id="set-password-box">
                        <form method="POST" class="form" action="" id="reset-password-form">
                            <h6 class="text-center text-dark is d-block">کد بازیابی ارسال شده را با رمز عبور جدید ارسال
                                نمایید</h6>
                            <div class="form-group">
                                <label for="code">کد بازیابی:</label>
                                <input type="number" name="code" id="code" class="form-control"
                                    placeholder="کد بازیابی جدید ارسال شده را وارد نمایید" />
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="newPassword">رمز عبور جدید:</label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control"
                                    placeholder="رمز عبور را وارد نمایید" />
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary is">تایید
                                <div id="second-loading" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary is" data-bs-dismiss="modal">برگشت</button>
                </div>
            </div>
        </div>
    </div>


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

        $("#reset-password-form").validate({
            submitHandler: () => {
                const data = {
                    phonenumber: $("#lostPhoneNumber").val(),
                    code: $("#code").val(),
                    password: $("#newPassword").val(),
                    _token: $("#token").val()
                };

                $.ajax({
                    url: "/user/reset-password",
                    method: "POST",
                    data,
                    beforeSend: () => {
                        $("#second-loading").parent().prop("disabled", true);
                        $("#second-loading").show();
                    },
                    success: (response) => {
                        $("#second-loading").parent().prop("disabled", false);
                        $("#second-loading").hide();
                        Swal.fire({
                            title: 'انجام شد',
                            text: 'رمز عبور تغییر یافت',
                            icon: 'success',
                            confirmButtonText: 'باشه',
                            onClose: () => {
                                $("#lost-phonenumber-box").show()
                                $("#set-password-box").hide()
                                $("#lost-password-modal").modal("hide")
                            }
                        })
                    },
                    error: (err) => {
                        $("#second-loading").parent().prop("disabled", false);
                        $("#second-loading").hide();
                        if (err.status == 401) {
                            Swal.fire({
                                title: 'خطا',
                                text: 'کد بازیابی اشتباه است',
                                icon: 'error',
                                confirmButtonText: 'باشه'
                            })
                        } else {
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
                code: {
                    required: true,
                    minlength: 4
                },
                newPassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 40
                }
            },
            messages: {
                code: {
                    required: "پر کردن این فیلد الزامی است",
                    minlength: "این فیلد حداقل باید 4 کاراکتر داشته باشد"
                },
                newPassword: {
                    required: "پر کردن این فیلد الزامی است",
                    minlength: "این فیلد حداقل باید 6 کاراکتر داشته باشد",
                    maxlength: "این فیلد حداکثر میتواند 40 کاراکتر داشته باشد"
                }
            }
        });


        $("#lost-phonenumber-form").validate({
            submitHandler: () => {
                $.ajax({
                    url: "/user/send-new-code",
                    method: "POST",
                    data: {
                        phonenumber: $("#lostPhoneNumber").val(),
                        _token: $("#token").val()
                    },
                    beforeSend: () => {
                        $("#first-loading").parent().prop("disabled", true);
                        $("#first-loading").show();
                    },
                    success: (response) => {

                        Swal.fire({
                            title: 'انجام شد',
                            text: 'کد بازیابی ارسال شد',
                            icon: 'success',
                            confirmButtonText: 'باشه',
                            onClose: () => {
                                $("#lost-phonenumber-box").hide()
                                $("#set-password-box").show()
                            }
                        })
                    },
                    error: (err) => {
                        $("#first-loading").parent().prop("disabled", false);
                        $("#first-loading").hide();
                        if (err.status == 401) {
                            Swal.fire({
                                title: 'خطا',
                                text: 'این شماره تلفن ثبت نشده است',
                                icon: 'error',
                                confirmButtonText: 'باشه'
                            })
                        } else {
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
                lostPhoneNumber: {
                    required: true,
                    regex: /^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/
                }
            },
            messages: {
                lostPhoneNumber: {
                    required: "پر کردن این فیلد الزامی می باشد",
                }
            }

        });


        $("#lost-password").click(function(e) {
            e.preventDefault();
            $("#lost-password-modal").modal("show");
        })

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
                    beforeSend: () => {
                        $("#login-loading").parents("button").prop("disabled", true);
                        $("#login-loading").show();
                    },
                    success: (response) => {

                        $("#login-loading").parent().prop("disabled", false);
                        $("#login-loading").hide();
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

                        $("#login-loading").parents("button").prop("disabled", false);
                        $("#login-loading").hide();
                        if (err.status == 401) {
                            Swal.fire({
                                title: 'خطا',
                                text: 'نام کاربری یا رمز عبور اشتباه است',
                                icon: 'error',
                                confirmButtonText: 'باشه'
                            })
                        } else {
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
