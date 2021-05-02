<section style="display: {{ $show ? 'block' : 'none' }};">
    <form action="/shop/set-status/{{ $data->id }}" class="form" id="finish-form">
        <h3>مرحله نهایی</h3>
        <div class="accordion-title">
            <i class="far fa-circle"></i>

            بعد از صحت اطمینان از اطلاعات مغازه آن را برای بررسی بفرستید. در زمان بررسی نمیتواند این بخش را تغییر
            دهید
        </div>
        <br>
        <br>
        @unless($isVip)
            @include("partials.vip-advantage");
        @endunless

        @if ($data->status == 'not-completed')
            <button type="submit" class="btn btn-primary btn-sm is">ارسال برای بررسی و انتشار در سایت
                <div id="finish-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        @elseif($data->status == "published")
            <button type="submit" disabled class="btn btn-success btn-sm is">
                منتشر شده است
                <div id="finish-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>

        @endif
    </form>
</section>
