@extends('layout.content' , ["title" => "ثبت نام | پاوز"])
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row justify-content-center login-box">
            <div class="col-md-4 col-11 login-form">
                <img src="{{ asset('images/dpavz.png') }}" alt="PAVZ logo">
                <h3>ثبت نام حساب</h3>
                <p>با ثبت نام میتوانید به تمامی امکانات سایت دسترسی پیدا کنید.</p>
                <br>
                <br>
                <form action="" method="POST">
                    <div class="inpg">
                        <input type="text" name="phonenumber" placeholder="شماره تلفن خود را وارد نمایید">
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="inpg">
                        <input type="password" name="password" placeholder="رمز عبور خود را وارد نمایید">
                        <span>
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="inpg">
                        <input type="text" name="code" placeholder="کد معرف را وارد نمایید(اختیاری)">
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
    @include('partials.home.footer')
    @include('partials.languages')
    @include('partials.gototop')
@endsection
