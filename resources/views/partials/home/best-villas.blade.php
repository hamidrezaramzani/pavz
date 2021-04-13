<div class="section best-villas">

    <x-title :title="'برترین اقامتگاه های ایران'"
        :description="'میتوانید برترین ویلا ها و سوئیت های دنج و ویژه ما را در این بخش پیدا کنید'" :link="'/villas'"
        :linkTitle="'ویلا های بیشتر'"></x-title>
    <br>
    <br>

    <div class="container-fluid">
        <div class="owl-carousel best-villas-slider">
            @foreach ($villas as $item)
                @include('partials.home.villa-item' , ["item" => $item])
            @endforeach
        </div>
    </div>    
</div>
