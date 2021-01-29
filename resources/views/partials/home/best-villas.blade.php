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
</div>
