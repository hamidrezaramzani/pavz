<div class="section best-apartments">
    <x-title :title="'خرید و رهن و اجاره آپارتمان های برتر'"
        :description="'اینجا میتوانید بهترین آپارتمان های ایران را انتخاب نمایید'"></x-title>


    <div class="container-fluid">
        <div class="my-slider best-apartments-box">
            @foreach ($apartments as $item)
                @include('partials.home.apartment-item' , ["item" => $item])
            @endforeach
        </div>

    </div>
</div>
