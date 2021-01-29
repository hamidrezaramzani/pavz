<div class="section best-places">
    <x-title :title="'برترین آپارتمان های ایران'"
        :description="'اینجا میتوانید بهترین آپارتمان های ایران را انتخاب نمایید'"></x-title>
    <div class="container-fluid">
        <div class="owl-carousel best-apartments-box">
            @include('partials.home.apartment-item')
            @include('partials.home.apartment-item')
            @include('partials.home.apartment-item')
            @include('partials.home.apartment-item')
            @include('partials.home.apartment-item')
            @include('partials.home.apartment-item')
        </div>
        <br>
        <br>

        <div class="d-block text-center">
            <a href="" class="btn btn-sm btn-warning is">تمام آپارتمان های پاوز</a>
            <a href="" class="btn btn-sm btn-warning is">نمایش آپارتمان های پاوز بر  روی نقشه</a>
        </div>
    </div>

</div>
