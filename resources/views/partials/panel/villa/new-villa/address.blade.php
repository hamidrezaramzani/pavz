<section style="display: {{$show ? "block" : "none"}};">
    <form action="" class="form" id="address-form">
        <h3>آدرس ملک</h3>
        <input type="hidden" value="{{ csrf_token() }}" id="address_token">
        <input type="hidden" value="{{ $data->lat }}" id="lat">
        <input type="hidden" value="{{ $data->long }}" id="long">
        <div class="form-group">
            <label for="address">آدرس:</label>
            <textarea name="address" id="address" class="form-control"
                placeholder="آدرس کامل ملک خود را بنویسید">{{ $data->address }}</textarea>
        </div>
        <br>

        
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            آدرس ملک خود را در GPS پیدا کرده و بر روی ملک خود کلیک کنید تا آدرس آن ثبت شود 
        </div>
        <br>
        <div id="mapid"></div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
        </div>
    </form>
</section>