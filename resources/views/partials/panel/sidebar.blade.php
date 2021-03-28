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
                خانه
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
            <a href="/">
                <img src="{{ asset('images/icons/svg/setting.svg') }}" alt="SETTING">
                مدیریت رزرو ها
            </a>
        </div>



        <div class="accordion-title">
            <i class="far fa-circle"></i>
            تنظیمات حساب
        </div>




        <div class="accordion-item">
            <button>
                <img src="{{ asset('images/icons/svg/ticket.svg') }}" alt="ticket">
                مدیریت تیکت ها
                <i class="fa fa-angle-down"></i>
            </button>
            <ul>
                <li>
                    ثبت ویلای جدید
                </li>
                <li>
                    نمایش ویلاهای من
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
