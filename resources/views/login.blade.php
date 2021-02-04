@extends('layout.content' , ["title" => "ورود به پنل | پاوز"])
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row justify-content-center login-box">
            <div class="col-md-4 col-11 login-form">
                <img src="{{ asset('images/dpavz.png') }}" alt="PAVZ logo">
                <h3>ورود به حساب</h3>
                <p>با ورود به سایت میتوانید به تمامی امکانات سایت دسترسی پیدا کنید.</p>
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
                        خوشحالیم که شما را دوباره ببینم. با ورود به سایت میتوانید به تمامی خدمات سایت در پنل کاربری دسترسی داشته باشید.
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
