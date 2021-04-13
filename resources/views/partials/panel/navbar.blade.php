<div class="row dashboard-navbar">
    <div class="col-12 col-md-3 pt-3">
        <div class="navbar-search-box">
            <button>
                <i class="fa fa-search"></i>
            </button>
            <form action="">
                <input type="text" class="form-control" placeholder="اینجا جستجو کن"11>
            </form>
        </div>
    </div>

    <div class="col-12 col-md-9">
        <ul>
            <li>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="user-options" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('images/user.png') }}" width="40" alt="User Profile Picture">

                    </button>
                    <ul class="dropdown-menu user-options-dropdown" aria-labelledby="user-options">
                        <li><a class="dropdown-item" href="#">
                                <i class="fa fa-home"></i>
                                صفحه اصلی
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fa fa-bars"></i>
                                پیشخوان

                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-dollar-sign"></i>
                                بخش مالی
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fa fa-users"></i>
                                دعوت از دوستان
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fa fa-question"></i>
                                سوالات متداول
                            </a></li>
                        <li><a class="dropdown-item" href="/logout">
                            <i class="fa fa-times" ></i>
                            خروج
                            </a></li>
                    </ul>
                </div>
            </li>


            <li>
                <a href="">
                    <i class="far fa-bell"></i>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="far fa-envelope"></i>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="far fa-flag"></i> 
                </a>
            </li>
        </ul>
    </div>
</div>
