<div class="responsive-menu">
    <div class="responsive-menu-header">
        <button class="btn-sm btn float-left text-dark" id="close-responsive-menu-header">
            <i class="fa fa-times"></i>
        </button>
        <a href="/">
            <img src="{{ asset('images/dpavz.png') }}"  width="80px" alt="Dark Pavz Logo">
        </a>
    </div>
    <br>
    <br>
    <ul>
        <li>
            <a href="/">
                <i class="fa fa-home"></i>

                برگشت به خانه
            </a>
        </li>

        <li>
            <a href="/#villas">
                <i class="fa fa-home"></i>
                آگهی های ویلا
            </a>
        </li>

        <li>
            <a href="/#apartments">
                <i class="fa fa-industry" aria-hidden="true"></i>
                آگهی های آپارتمان
            </a>
        </li>


        
        <li>
            <a href="/#areas">
                <i class="fa fa-bars" aria-hidden="true"></i>
                آگهی های زمین
            </a>
        </li>

        <li>
            <a href="/#shops">
                <i class="fas fa-shopping-cart"></i>
                آگهی های مغازه
            </a>
        </li>

        @auth
        <li>
            <a href="/panel">
                <i class="fa fa-user"></i>
                پنل کاربری
            </a>
        </li>
    @endauth

        
        @guest
        <li>
            <a href="/panel">
                <i class="fa fa-plus"></i>
                ثبت رایگان آگهی
            </a>
        </li>

        <li>
            <a href="/login">
                <i class="fa fa-user"></i>
                ورود و ثبت نام
            </a>
        </li>


    @endguest
    </ul>
</div>
<div class="row top-header" id="my-header">
    <div class="col-12 col-md-9">
        <nav class="navbar navbar-expand-lg" style="direction: rtl">
            <div class="d-none d-md-inline-block w-100">
                <a class="navbar-brand register-ads" href="/panel">
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
            </div>
            <a href="/" class="d-block d-md-none">
                <img src="{{ asset('images/pavz.png') }}" id="responsive-navbar-logo" width="100" alt="pavz logo">
            </a>

            <button class="navbar-toggler" id="navbar-menu-btn" type="button" data-bs-toggle="collapse"
                data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>

            </button>

            <div class="d-none d-md-block navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/#villas">ویلا</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/#areas">زمین</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/#apartments">آپارتمان</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/#shops">مغازه</a>
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
        <a href="/" class="d-none d-md-block">
            <img src="{{ asset('images/pavz.png') }}" id="navbar-logo" data-light-src="{{ asset('images/pavz.png') }}" data-dark-src="{{ asset('images/dpavz.png') }}" width="100" alt="pavz logo">
        </a>
    </div>
</div>
