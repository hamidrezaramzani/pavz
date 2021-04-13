<div class="row top-header" id="my-header">

    <div class="col-12 col-md-9">
        <nav class="navbar navbar-expand-lg" style="direction: rtl">
            <a class="navbar-brand register-ads" href="#">
                <i class="fa fa-plus"></i>
                ثبت آگهی رایگان
            </a>
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>

            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#Villas">ویلا</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#Areas">زمین</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#Apartments">آپارتمان</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#AT">جاذبه گردشگری</a>
                    </li>





                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/about-us">درباره ما</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/about-us">تماس با ما</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/faq">سوالات متداول</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
    <div class="col-12 col-md-3">
        <img src="{{ asset('images/pavz.png') }}" width="100" alt="pavz logo">
    </div>
</div>
