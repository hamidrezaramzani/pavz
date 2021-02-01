<div class="section best-areas">
    <x-title :title="'برترین زمین های ایران'"
        :description="'اینجا برترین زمین های ایران در بهترین جاهای ایران وجود دارد'"></x-title>
    <div class="container-fluid">
        <div class="owl-carousel best-areas-box">
            @include('partials.home.area-item')
            @include('partials.home.area-item')
            @include('partials.home.area-item')
            @include('partials.home.area-item')
            @include('partials.home.area-item')
            @include('partials.home.area-item')
        </div>

    </div>
    <div class="d-block text-center mt-5">
        <a href="/" class="btn btn-sm btn-outline-secondary is">
            برترین زمین های ایران در نقشه
            <i class="fas fa-map"></i>
        </a>
    </div>

</div>
