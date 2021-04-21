<section class="p-3" style="display: {{ $show ? 'block' : 'none' }};">

    <form action="" class="form" id="pricing-form">
        <h3>قیمت گذاری</h3>
        <br>


        @include('partials.panel.villa.new-villa.checkbox' , ["title" => "قیمت توافقی" , "name" =>
        "agreed_price" , "checked" => $data->agreed_price ])

        <br>


        <div class="form-group">
            <label for="total_price">قیمت کل:</label>
            <input type="number" name="total_price" id="total_price" class="form-control price-counter"
                placeholder="قیمت کل زمین را وارد نمایید - به تومان" {{ $data->agreed_price ? 'disabled' : '' }}
                value="{{ $data->total_price ?? null }}">
                
                <span class="is price-text"></span>

        </div>

        <div class="form-group">
            <label for="price_per_meter">قیمت هر متر:</label>
            <input type="number" name="price_per_meter" id="price_per_meter" class="form-control price-counter"
                placeholder="قیمت هر متر را وارد نمایید - به تومان" {{ $data->agreed_price ? 'disabled' : '' }}
                value="{{ $data->price_per_meter ?? null }}">
                <span class="is price-text"></span>
            </div>

        <br>
        <br>
        <div class="form-group">
            <button class="btn btn-sm btn-primary is" type="submit">ادامه
                <div id="p-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

    </form>
</section>
