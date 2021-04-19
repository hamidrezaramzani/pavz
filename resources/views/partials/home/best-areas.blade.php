<div class="section best-areas">
    <x-title :title="'برترین زمین های ایران'"
        :description="'اینجا برترین زمین های ایران در بهترین جاهای ایران وجود دارد'"></x-title>
    <div class="container-fluid">
        <div class="my-slider best-areas-box">
            @foreach ($areas as $item)
                @include('partials.home.area-item' , ["item" => $item])
            @endforeach
        </div>

    </div>
</div>
