<div class="section best-villas">
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
        {{-- <br> --}}
        <div class="d-block text-center">
            <a href="" class="btn btn-sm btn-warning is">تمام ویلا های پاوز</a>
            <a href="" class="btn btn-sm btn-warning is">ویلا های ویژه روی نقشه</a>
        </div>
    </div>
</div>
