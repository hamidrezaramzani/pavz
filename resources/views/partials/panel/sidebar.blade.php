<div class="col-12 col-md-2 sidebar">
    <div class="float-right w-100 h-auto top-sidebar">


        <a href="/">
            <img src="{{ asset('images/dpavz.png') }}" alt="pavz logo" width="100">
        </a>

        <a href="/">
            <i class="fa fa-bars"></i>
        </a>

    </div>
    <br>
    <br>
    <div class="accordion">

        <div class="accordion-title">
            <i class="far fa-circle"></i>
            بخش عمومی
        </div>
        <div class="accordion-item">
            <a href="/panel">
                <img src="{{ asset('images/icons/svg/home.svg') }}" alt="HOME SVG">
                پیشخوان
            </a>

        </div>


        <div class="accordion-title">
            <i class="far fa-circle"></i>
            خدمات پاوز
        </div>
        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/villa.svg') }}" alt="VILLA SVG">
                مدیریت ویلا ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/new-villa">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        ثبت ویلای جدید
                    </a>
                </li>

                <li>
                    <a href="/manage/villas">
                        <i class="far fa-circle"></i>
                        نمایش ویلاهای من
                    </a>
                </li>
            </ul>
        </div>


        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/apartment.svg') }}" alt="AP SVG">
                مدیریت آپارتمان ها
                <i class="fa fa-angle-down"></i>

            </button>
            <ul>
                <li>
                    <a href="/new-apartment">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        ثبت آپارتمان جدید
                    </a>
                </li>


                <li>
                    <a href="/apartment/manage">
                        <i class="far fa-circle"></i>
                        نمایش همه آپارتمان
                    </a>
                </li>
            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/area.svg') }}" alt="AREA SVG">
                مدیریت زمین ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/area/new">
                        <i class="far fa-circle"></i>
                        ثبت زمین</a>
                </li>
                <li>
                    <a href="/area/manage">
                        <i class="far fa-circle"></i>
                        نمایش همه زمین ها</a>
                </li>
            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/shop.svg') }}" alt="AREA SVG">
                مدیریت مغازه ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/shop/new">
                        <i class="far fa-circle"></i>
                        ثبت مغازه جدید</a>
                </li>
                <li>
                    <a href="/shop/manage">
                        <i class="far fa-circle"></i>
                        نمایش همه مغازه ها</a>
                </li>
            </ul>
        </div>


        <div class="accordion-item">
            <a href="/reserves/manage">
                <img src="{{ asset('images/icons/svg/setting.svg') }}" alt="manage reserves">
                مدیریت رزرو ها
            </a>
        </div>



        <div class="accordion-title">
            <i class="far fa-circle"></i>
            تنظیمات حساب
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/money.svg') }}" alt="AREA SVG">
                بخش مالی
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/vip/status">
                        <i class="far fa-circle"></i>
                        وضعیت حساب ویژه
                    </a>
                </li>
                <li>
                    <a href="/vip/buy">
                        <i class="far fa-circle"></i>
                        خرید اشتراک حساب ویژه
                    </a>
                </li>
                <li>
                    <a href="/vip/factories">
                        <i class="far fa-circle"></i>
                        فاکتور های خرید
                    </a>
                </li>
            </ul>
        </div>


        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/ticket.svg') }}" alt="ticket">
                مدیریت تیکت ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/ticket/new">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        تیکت جدید
                    </a>
                </li>

                <li>
                    <a href="/ticket/manage">
                        <i class="far fa-circle"></i>
                        تیکت های من
                    </a>
                </li>
            </ul>
        </div>


        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/user.svg') }}" alt="USER SVG">
                مدیریت حساب
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/profile">
                        ویرایش پروفایل
                    </a>
                </li>
                <li>
                    <a href="">تنظیمات</a>
                </li>

            </ul>
        </div>


        @admin


        <div class="accordion-title">
            <i class="far fa-circle"></i>
            مدیریت سایت
        </div>

        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/user.svg') }}" alt="USER SVG">
                مدیریت کاربران
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="">کل کاربران</a>
                </li>

                <li>
                    <a href="">فاکتور های خرید کاربران</a>
                </li>
            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/ticket.svg') }}" alt="ticket">
                مدیریت نظرات
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/admin/published-comments">
                        نظر های ثبت شده
                    </a>
                </li>
                <li>
                    <a href="/admin/reject-comments">
                        نظر های رد شده
                    </a>
                </li>
                <li>
                    <a href="/admin/new-comments">نظر های جدید</a>
                </li>

            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/ticket.svg') }}" alt="ticket">
                مدیریت جواب نظرات
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="/admin/published-answer-comments">
                        جواب های ثبت شده
                    </a>
                </li>
                <li>
                    <a href="/admin/rejected-answer-comments">
                        جواب های رد شده
                    </a>
                </li>
                <li>
                    <a href="/admin/new-answer-comments">جواب های جدید</a>
                </li>

            </ul>
        </div>

        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/apartment.svg') }}" alt="AP SVG">
                مدیریت آگهی ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="">ویلای های جدید</a>
                </li>

                <li>
                    <a href="">آپارتمان های جدید</a>
                </li>

                <li>
                    <a href="/profile">
                        زمین های جدید
                    </a>
                </li>
                <li>
                    <a href="">مغازه های جدید</a>
                </li>

            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/area.svg') }}" alt="USER SVG">
                مدیریت جاذبه های گردشگری
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="">جاذبه گردشگری جدید</a>
                </li>

                <li>
                    <a href="">مدیریت</a>
                </li>

            </ul>
        </div>



        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/ticket.svg') }}" alt="ticket">
                مدیریت تیکت ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    <a href="">تیکت های اخیر</a>
                </li>

                <li>
                    <a href="">مدیریت</a>
                </li>

            </ul>
        </div>
        @endadmin

    </div>

</div>
@push('scripts')
    <script>
        $(".accordion-item button").click(function() {
            $(this).parent().find("ul").toggleClass("show")
            $(this).parent().find("i").toggleClass("fa-angle-down")
            $(this).parent().find("i").toggleClass("fa-angle-up")
            $(this).toggleClass("sidebar-item-active");
        });

    </script>
@endpush
