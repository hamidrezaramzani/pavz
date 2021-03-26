<section class="p-3" style="display: {{$show ? "block" : "none"}};">
    <form action="" class="form" id="address-form">
        <h3>آدرس ملک</h3>
        <div class="form-group">
            <label for="address">آدرس:</label>
            <textarea name="address" rows="40" id="address" class="form-control"
                placeholder="آدرس کامل ملک خود را بنویسید">{{ $data->address }}</textarea>
        </div>

        <br>
        <br>
        <div id="mapid"></div>

        
        <br>
        <br>        
        <div class="form-group">
            <button class="btn btn-sm btn-primary is" type="submit">ادامه
                <div id="ad-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                  </div>
            </button>
        </div>
    </form>
</section>
