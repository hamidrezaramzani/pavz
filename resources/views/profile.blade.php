@extends('layout.panel' ,["title" => "تغییر پروفایل | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard-info mt-5">
            <div class="col-11 col-md-12 dashboard-info-item-content p-4 h-auto">
                @include('partials.panel.items.title' , ["title" => "تغییر پروفایل" , "description" => "در این بخش میتوانید
                پروفایل خود را تغییر دهید."])
                <div class="change-profile-image-box text-center">
                    <h3 class="text-light">تصویر کاربر</h3>
                    <div class="user-image">
                        @if ($image)
                            <img src="{{ asset('upload/' . $image) }}" id="user-image" alt="User Profile Picture">

                        @else
                            <img src="{{ asset('images/user.png') }}" id="user-image" alt="User Profile Picture">

                        @endif

                        <button id="btn-profile" class="btn btn-sm my-3 btn-light is">
                            <i class="fa fa-pen" aria-hidden="true"></i>
                        </button>
                    </div>
                    <br>
                    <span id="picture-name"></span>
                    <form action="/submit-profile-picture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="image" style="display: none">
                        <button type="submit" class="is  btn btn-sm  btn-outline-light">ثبت پروفایل</button>

                    </form>
                </div>

                <br>
                <br>
                <br>


                <h3>اطلاعات تکمیلی</h3>
                <br>
                <div class="alert alert-block is notes alert-danger">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    برای ثبت آگهی باید اطلاعاتی که با * قرمز مشخص شده اند کامل شده باشند
                </div>
                <form action="/submit-user-info" method="POST" class="user-profile-form form" id="profile-form">


                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="fullname">نام و نام خانوادگی:</label>
                        <input name="fullname" id="fullname" class="form-control"
                            placeholder="نام و نام خانوادگی خود را بنویسید" value="{{ $user->fullname ?? null }}" />
                    </div>


                    <div class="form-group">
                        <label for="phonenumber">شماره تلفن:</label>
                        <input name="phonenumber" id="phonenumber" class="form-control" disabled
                            value="{{ $user->user->phonenumber ?? null }}">
                    </div>

                    <div class="form-group">
                        <label for="telegram_id">شناسه تلگرام:</label>
                        <input name="telegram_id" id="telegram_id" class="form-control"
                            value="{{ $user->telegram_id ?? null }}">
                    </div>

                    <div class="form-group">
                        <label for="instagram_id">شناسه اینستاگرام:</label>
                        <input name="instagram_id" id="instagram_id" class="form-control"
                            value="{{ $user->instagram_id ?? null }}">
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="bio">درباره:</label>
                        <textarea name="bio" id="bio" class="form-control"
                            placeholder="اطلاعاتی را درباره خود و ... بنویسید">{{ $user->bio ?? null }}</textarea>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-sm is btn-primary">ویرایش اطلاعات
                        <div id="p-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        $('#btn-profile').on('click', function() {
            $('#image').trigger('click');
        });

        $("#image").change(function(e) {
            const files = e.target.files;
            const count = files.length;
            if (count) {
                const name = files[0].name;
                const format = name.split(".")[1].toLowerCase();
                const SUPPORTED_FORMATS = ["png", "jpeg", "jpg", "gif"];
                if (!SUPPORTED_FORMATS.includes(format)) {

                    Swal.fire({
                        title: 'خطا',
                        text: 'فرمت عکس صحیح نیست.',
                        icon: 'error',
                        confirmButtonText: 'باشه'
                    })
                } else {

                    const reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onload = function({
                        target
                    }) {
                        $("#picture-name").text(files[0].name)
                        $("#user-image").attr("src", target.result);
                    }
                }
            }
        })



        $.validator.addMethod(
            "regex_telegram",
            function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "شناسه تلگرام صحیح نمی باشد"
        );

        $.validator.addMethod(
            "regex_instagram",
            function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "شناسه اینستاگرام صحیح نمی باشد"
        );


        $("#profile-form").validate({   
            submitHandler: () => {

                const data = {
                    fullname: $("#fullname").val(),
                    telegram_id: $("#telegram_id").val(),
                    instagram_id: $("#instagram_id").val(),
                    bio: $("#bio").val(),
                    _token: $("#token").val()
                }

                $.ajax({
                    method: "POST",
                    data,
                    url: "/user/change-profile",
                    beforeSend: () => {
                        $("#p-loading").parents("button").prop("disabled", true);
                        $("#p-loading").show()
                    },
                    success: (res) => {
                        $("#p-loading").parents("button").prop("disabled", false);
                        $("#p-loading").hide()
                        Swal.fire({
                            title: "انجام شد",
                            text: "پروفایل شما با موفقیت تغییر یافت",
                            icon: "success",
                            confirmButtonText: "باشه",
                        });
                    },
                    errorr: () => {
                        $("#p-loading").parents("button").prop("disabled", false);
                        $("#p-loading").hide()
                        Swal.fire({
                            title: "خطا",
                            text: "مشکلی در سرور وجود دارد",
                            icon: "error",
                            confirmButtonText: "باشه",
                        });
                    }
                });
            },
            rules: {

                fullname: {
                    required: true,
                    minlength: 3,
                    maxlength: 150
                },
                telegram_id: {
                    regex_telegram: /^[A-Za-z]{2,}[_-]?[A-Za-z0-9]{2,}$/
                },
                instagram_id: {
                    regex_instagram: /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/
                },

            },
            messages: {
                fullname: {
                    required: "پر کردن این فیلد الزامی میباشد",
                    minlength: "حداقل باید 3 کاراکتر داشته باشد",
                    maxlength: "حداکثر میتواند 150 کاراکتر داشته باشد"
                }
            }
        });

    </script>

    @if (session('profile'))
        <script src="{{ asset('js/notify.min.js') }}"></script>
        <script>
            $.notify("تصویر پروفایل شما با موفقیت تغییر یافت", "success");

        </script>
    @endif



    @if (session('user-info'))
        <script src="{{ asset('js/notify.min.js') }}"></script>

        <script>
            $.notify("اطلاعات پروفایل شما تغییر یافت", "success");

        </script>
    @endif
@endpush
