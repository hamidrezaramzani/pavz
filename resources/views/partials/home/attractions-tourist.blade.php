<div class="section attractions-tourist">

    <x-title :title="'جاذبه های گردشگری'" :description="'جاذبه های گردشگری بهترین اهداف برای سفر کردن شما هستند'"
        :mode="'dark'"></x-title>

    <br>
    <br>

    <div class="container">
        <div class="owl-carousel best-villas-slider">
           @include('partials.home.at-item')
           @include('partials.home.at-item')
           @include('partials.home.at-item')
           @include('partials.home.at-item')
        </div>
    </div>
    <div class="d-block text-center mt-5">
        <a href="/" class="btn btn-sm btn-outline-light is">
            جاذبه های گردشگری روی نقشه
            <i class="fas fa-map"></i>
        </a>
    </div>
</div>
