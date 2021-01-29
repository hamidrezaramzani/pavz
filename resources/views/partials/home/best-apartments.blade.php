<div class="section best-apartments">

    <div class="bgeffect"></div>


    <div class="blurbg">
        <img src="{{ asset('images/apartments.jpg') }}" alt="Apartment image">
    </div>

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


</div>
