<div class="row dashboard-navbar">
    <div class="col-12 col-md-3 p-2">
        <ul>
            <li>
                {{-- <a href="">
                </a> --}}
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="user-options" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('images/user.png') }}" width="40" alt="User Profile Picture">

                    </button>
                    <ul class="dropdown-menu user-options-dropdown" aria-labelledby="user-options">
                        <li><a class="dropdown-item" href="#">
                                صفحه اصلی
                                <i class="fa fa-home"></i>

                            </a></li>
                        <li><a class="dropdown-item" href="#">پیشخوان
                                <i class="fa fa-bars"></i>
                            </a></li>
                        <li><a class="dropdown-item" href="#">بخش مالی
                                <i class="fas fa-dollar-sign"></i>
                            </a></li>
                        <li><a class="dropdown-item" href="#">دعوت از دوستان
                                <i class="fa fa-users"></i>
                            </a></li>
                        <li><a class="dropdown-item" href="#">سوالات متداول
                                <i class="fa fa-question"></i>
                            </a></li>
                        <li><a class="dropdown-item" href="#">خروج
                                <i class="fas fa-sign-out" aria-hidden="true"></i>
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
                    <i class="fa fa-search"></i>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="far fa-moon"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-12 col-md-9"></div>
</div>
