<div class="section best-villas" id="villas">
    <x-title :title="'برترین اقامتگاه های ایران'"
        :description="'میتوانید برترین ویلا ها و سوئیت های دنج و ویژه ما را در این بخش پیدا کنید'"></x-title>
    <br>
    <div class="container-fluid">
        <div class="my-slider">
            @foreach ($villas as $item)
                @include('partials.home.villa-item' , ["item" => $item])
            @endforeach
        </div>
    </div>
</div>
