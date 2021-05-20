<div class="welcome-box">
    <h1>به 
        <span class="text-info">پاوز</span>
         خوش آمدید</h1>
    <p>سوییت - ویلا - آپارتمان - زمین - مغازه   </p>
    <div class="responsive-register">
        @auth
        <a class="navbar-brand register-ads" href="/panel">
            <i class="fa fa-user"></i>
            پنل کاربری
        </a>
    @endauth
    @guest
        <a class="navbar-brand register-ads" href="/login">
            <i class="fa fa-user"></i>
            ورود / ثبت نام
        </a>
    @endguest
    </div>
    @include('partials.home.search-box')
</div>
