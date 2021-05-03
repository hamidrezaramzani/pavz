<div class="row dashboard-navbar">    
    
    <div class="col-12">
        <ul>

            <li>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="user-options" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset($loginUser->profile->image ? "user/upload/" . $loginUser->profile->image : 'images/user.png') }}" height="40" width="40" alt="User Profile Picture">
                        <h6 class="float-right mx-2">{{$loginUser->profile->fullname}}
                            <br>
                            <span class="float-right">{{$loginUser->level == "admin" ? "مدیر سایت" : "کاربر"}}</span>
                        </h6>
                        
                    </button>
                    <ul class="dropdown-menu user-options-dropdown" aria-labelledby="user-options">
                        <li><a class="dropdown-item" href="/">
                                <i class="fa fa-home"></i>
                                صفحه اصلی
                            </a></li>
                            <li><a class="dropdown-item" href="/profile">
                                <i class="fa fa-user"></i>
                                تغییر پروفایل

                            </a></li>
                        <li><a class="dropdown-item" href="/panel">
                                <i class="fa fa-bars"></i>
                                پیشخوان

                            </a></li>
                        <li><a class="dropdown-item" href="/faq">
                                <i class="fa fa-question"></i>
                                سوالات متداول
                            </a></li>
                        <li><a class="dropdown-item" href="/logout">
                                <i class="fa fa-times"></i>
                                خروج
                            </a></li>
                    </ul>
                </div>
            </li>


            <li>
                <div class="dropdown">
                    <button class="btn-default btn pulse-item dropdown-toggle" type="button" id="notification-dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($notifications->count())
                            <div></div>
                        @endif
                        <i class="far fa-bell"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        @if ($notifications->count())
                            @foreach ($notifications as $item)
                                <li>
                                    <a class="dropdown-item" href="{{ $item->link }}">
                                        <div class="notification-status">
                                            <img src="{{ asset('images/status/' . $item->icon . '.png') }}" width="20"
                                                height="20" alt="Danger">
                                        </div>
                                        <div class="notification-title">
                                            {{ mb_substr($item->text, 0, 45) }} ...
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        @else
                            <li class="d-block text-center text-dark is pt-4">اعلانی یافت نشد</li>
                        @endif

                        <br>
                        <li>
                            <a class="dropdown-item view-all-notifications" href="/notification/all">
                                نمایش همه
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="d-block float-right d-md-none">
                <button class="btn" id="sidebar-toggle">
                    <i class="fa fa-bars"></i>
                </button>
            </li>
        </ul>
    </div>
</div>
