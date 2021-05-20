<section class="p-3"  style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="pictures-form">
        <div class="loading-box position-relative" style="display: block">
            <div  class="pic-first-loading spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="pictures-box" style="display: none">
            
        <h3>تصاویر مغازه</h3>
        <div class="alert alert-sm alert-danger is " style="font-size: 13px;text-align: right">
            <i class="far fa-image"></i>
            با کلیک بر روی هر عکس میتوانید آن را از لیست خود حذف نمایید
        </div>
        <br>
        <br>
        <div id="cover-image-box" style="display:{{ $data->cover ? 'block' : 'none' }}">
            @if ($data->cover)
                <img class="cover-image" src="{{ asset('user/covers/' . $data->cover) }}" alt="Villa Cover">
            @endif
        </div>

        <div class="form-group mb-3">

            <label for="cover" style="height: 40px">انتخاب عکس کاور:</label>
            <input type="file" id="cover" data-is-cover="{{ $data->cover }}" name="cover" class="form-control" />
        </div>


        <div class="pictures-box">

            <ul>
                @if (count($data->pictures))
                    @foreach ($data->pictures as $picture)
                        <li id="{{ $picture->id }}" saved="true">
                            <img src="{{ asset('user/shop_pictures/' . $picture->url) }}"
                                alt="Shop Picture">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <br>
        <br>
        <div class="form-group mb-3 w-100 float-right">
            <label for="pictures">انتخاب عکس های آپارتمان:</label>
            <input type="file" id="pictures" multiple name="pictures" class="form-control" />
        </div>


        <br>
            <br>
            <div class="form-group">
                <button class="btn btn-sm btn-primary is" type="submit">ادامه
                    <div id="pic-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>


            <br>
            <br>
        <div class="progress" style="display: none">
            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;direction:ltr"></div>
        </div>
        </div>
    </form>
</section>
