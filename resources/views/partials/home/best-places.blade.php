<div class="section best-places">
    <x-title :title="'برترین شهر های ایران'"
        :description="'برترین شهر های ایران که بهترین ویلا ها را میتوانید در آن پیدا کنید'"></x-title>
    <div class="container-fluid">
        <div class="owl-carousel best-places-box">
            @include('partials.home.place-item')
            @include('partials.home.place-item')
            @include('partials.home.place-item')
            @include('partials.home.place-item')
            @include('partials.home.place-item')
            @include('partials.home.place-item')
        </div>
        <br>
        <br>

        <div class="d-block text-center">
            <a href="" class="btn btn-sm btn-warning is">تمام ویلا های پاوز</a>
            <a href="" class="btn btn-sm btn-warning is">ویلا های ویژه روی نقشه</a>
        </div>
    </div>

</div>
