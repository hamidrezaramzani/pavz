@extends('layout.panel' ,["title" => "تغییر پروفایل | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard-info mt-5">
            <div class="col-11 col-md-12 dashboard-info-item-content h-auto">
                <div class="change-profile-image-box text-center">
                    <div class="user-image">
                        @if ($image)
                            <img src="{{ asset('upload/' . $image) }}" id="user-image" alt="User Profile Picture">

                        @else
                            <img src="{{ asset('images/user.png') }}" id="user-image" alt="User Profile Picture">

                        @endif
                    </div>
                    <span id="picture-name"></span>

                    <button id="btn-profile" class="btn btn-sm my-3 btn-warning is">انتخاب پروفایل</button>
                    <form action="/submit-profile-picture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="image" style="display: none">
                        <button type="submit" class="is w-100 btn btn-sm btn-block btn-primary ">ثبت پروفایل</button>
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
                <form action="/submit-user-info" method="POST" class="user-profile-form">

                    @csrf
                    <label for="fullname">
                        <span class="text-danger">*</span>
                        نام و نام خانوادگی:</label>
                    <input type="text" id="fullname" placeholder="نام و نام خانوادگی خود را وارد نمایید" name="fullname"
                        value="{{ $fullname }}">


                    <label for="phonenumber">شماره تلفن:</label>
                    <input type="text" disabled value="{{ $phonenumber }}">


                    <label for="address">
                        <span class="text-danger">*</span>
                        آدرس:</label>
                    <input type="text" id="address" name="address" value="{{ $address }}">


                    <label for="telegram_id">
                        شناسه تلگرام شما:</label>
                    <input type="text" id="telegram_id" name="telegram_id" value="{{ $telegram_id }}">
                    <br>
                    <button type="submit" class="btn btn-sm is btn-primary">ویرایش اطلاعات</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
