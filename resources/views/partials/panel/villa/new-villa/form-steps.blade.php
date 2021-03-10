<div class="form-steps px-3">
    <ul>
        <li class="active">
            <i class="fa fa-file"></i>
            <span>اطلاعات کلی</span>
        </li>



        <li class="active">
            <i class="fa fa-home"></i>
            <span>مشخصات ملک</span>
        </li>



        <li class="active">
            <i class="fa fa-vote-yea"></i>
            <span>فضای های ملک</span>
        </li>



        <li class="active">
            <i class="fa fa-check"></i>
            <span>امکانات ملک</span>
        </li>

        <li id="step-address" class="active">
            <i class="fa fa-address-card"></i>
            <span>آدرس ها</span>
        </li>


        <li id="rules-or-documents" class="active">
            @if ($data->ads_type == '1')
                <i class="fa fa-gavel"></i>
                <span>قوانین و مقررات</span>
            @else
                <i class="fa fa-word-o"></i>
                <span>اسناد و امتیازات</span>
            @endif

        </li>



        <li class="active">
            <i class="fa fa-dollar-sign"></i>
            <span>قیمت گذاری</span>
        </li>


        <li class="active">
            <i class="fa fa-image"></i>
            <span>تصاویر ملک</span>
        </li>



        <li class="active">
            <i class="fa fa-flag-checkered" aria-hidden="true"></i>
            <span>مرحله نهایی</span>
        </li>

    </ul>
</div>
