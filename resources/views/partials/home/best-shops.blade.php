<div class="section best-apartments">
    <x-title :title="'خرید و رهن مغازه های برتر ایران'"
        :description="'اینجا میتوانید بهترین مغازه های ایران را انتخاب نمایید'"></x-title>


    <div class="container-fluid">
        <div class="owl-carousel best-apartments-box">
            @foreach ($shops as $item)
                @include('partials.home.shop-item' , ["item" => $item])
            @endforeach
        </div>

    </div>
</div>
