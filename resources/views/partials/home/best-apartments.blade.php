<div class="section best-apartments">
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

    </div>
    <div class="d-block text-center mt-5">
        <a href="/" class="btn btn-sm btn-outline-light is">
            برترین ویلا های ایران در نقشه
            <i class="fas fa-map"></i>
        </a>
    </div>
</div>
