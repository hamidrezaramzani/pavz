<div class="section best-villas">
    <div class="bgeffect"></div>
    <div class="blurbg">
        <img src="{{ asset('images/villas.jpg') }}" alt="Villas image">
    </div>

    <x-title :title="'برترین اقامتگاه های ایران'"
        :description="'میتوانید برترین اقامتگاه های دنج و ویژه ما را در این بخش پیدا کنید'" :link="'/villas'"
        :linkTitle="'ویلا های بیشتر'"></x-title>


    <div class="container-fluid">
        <div class="owl-carousel best-villas-slider">
            @include('partials.home.villa-item')
            @include('partials.home.villa-item')
            @include('partials.home.villa-item')
            @include('partials.home.villa-item')
            @include('partials.home.villa-item')
            @include('partials.home.villa-item')
        </div>
    </div>
    <div class="d-block text-center mt-5">
        <a href="/" class="btn btn-sm btn-outline-light is">
            برترین ویلا های ایران در نقشه
            <i class="fas fa-map"></i>
        </a>
    </div>
</div>
