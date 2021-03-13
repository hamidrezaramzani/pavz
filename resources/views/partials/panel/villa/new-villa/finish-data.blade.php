<section style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="finish-form">
        <h3>مرحله نهایی</h3>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            بعد از صحت اطمینان از اطلاعات ویلا آن را برای بررسی بفرستید. در زمان بررسی نمیتواند این بخش را تغییر دهید
        </div>
        <br>
        <br>


        @if ($data->status == 'not-completed')
            <button type="submit" class="btn btn-primary btn-sm is">ارسال برای بررسی و انتشار در سایت</button>
        @elseif($data->status == "published")
            <button type="submit" class="btn btn-warning btn-sm is">ثبت ویرایش و بررسی برای اعمال(در زمان بررسی آگهی در سایت قابل مشاهده نخواهد بود)</button>

        @endif
    </form>
</section>
