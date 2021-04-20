<section style="display: {{$show ? "block" : "none"}};" class="px-3">
    <form action="" id="picture-form" class="form">
        <h3>اضافه کردن تصاویر ملک</h3>
        <div class="alert alert-sm alert-danger is " style="font-size: 13px;text-align: right">
            <i class="far fa-image"></i>
            با کلیک بر روی هر عکس میتوانید آن را از لیست خود حذف نمایید
        </div>
        <div id="cover-image-box" style="display:{{ $data->cover ? 'block' : 'none' }}">

            @if ($data->cover)
                <button class="btn btn-sm btn-danger" id="delete-cover-btn" type="button">
                    <i class="fa fa-trash"></i>
                </button>
                <img class="cover-image" src="{{ asset('covers/' . $data->cover) }}" alt="Villa Cover">
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="cover">انتخاب عکس کاور:</label>
            <input type="file" id="cover" name="cover" class="form-control" />
        </div>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            عکس کاور : عکسایی که کاربران با دیدن آن ملک شما را انتخاب میکنند
        </div>


        <div class="pictures-box" style="display: {{count($data->pictures) ? "block" : "none"}}">
            <div class="alert alert-sm alert-danger is " style="font-size: 13px;text-align: right">
                <i class="far fa-image"></i>
                با کلیک بر روی هر عکس میتوانید آن را از لیست خود حذف نمایید
            </div>    
            <ul>
                @if (count($data->pictures))
                    @foreach ($data->pictures as $picture)
                        <li id="{{$picture->id}}" saved="true">
                            
                            <img src="{{ asset('villa_pictures/'.$picture->url) }}" alt="Villa Picture">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="form-group mb-3">
            <label for="cover">انتخاب عکس های ویلا:</label>
            <input type="file" id="pictures" multiple name="pictures[]" class="form-control" />
        </div>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            سعی کنید حداقل 8 عکس اضافه نمایید و بهترین عکس های ویلا را اضافه کنید
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه

                <div id="pictures-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

        <br>
        <br>
    </form>
</section>
