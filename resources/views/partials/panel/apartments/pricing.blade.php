<section class="p-3" style="display: {{$show ? "block" : "none"}};">


    @if ($data->ads_type == 1)

        <form action="" class="form" id="sold-pricing-form">
            <h3>قیمت گذاری</h3>
            <br>
            <div class="accordion-title">
                <i class="far fa-circle"></i>
                قیمت ها را با توجه به امکاناتی که در آپارتمان خود میبینید وارد نمایید
            </div>
            <br>
            
            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "قیمت توافقی" , "name" =>
            "agreed_price"  , "checked" => $data->agreed_price ])

            <br>
            <div class="form-group">
                <label for="total_price">قیمت کل:</label>
                <input type="number" name="total_price" id="total_price" class="form-control drafted_input"
                    placeholder="قیمت کل ملک را وارد نمایید - به تومان" 
                    {{$data->agreed_price ? "disabled" : ""}} 
                    value="{{ $data->total_price ?? null }}">
            </div>

            <div class="form-group">
                <label for="price_per_meter">قیمت هر متر:</label>
                <input type="number" name="price_per_meter" id="price_per_meter" class="form-control drafted_input"
                    placeholder="قیمت هر متر را وارد نمایید - به تومان"
                    {{$data->agreed_price ? "disabled" : ""}} 
                    value="{{ $data->price_per_meter ?? null }}">
            </div>

            <br>
            <br>
            <div class="form-group">
                <button class="btn btn-sm btn-primary is" type="submit">ادامه
                    <div id="sold-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>

        </form>
    @else




        <form action="" class="form" id="rent-pricing-form">
            <h3>قیمت گذاری</h3>
            <br>
            <div class="accordion-title">
                <i class="far fa-circle"></i>
                قیمت ها را با توجه به امکاناتی که در آپارتمان خود میبینید وارد نمایید
            </div>
            <br>
            <div class="form-group">
                <label for="mortgage">رهن:</label>
                <input type="number" name="mortgage" id="mortgage" class="form-control drafted_input"
                    placeholder="رهن را وارد نمایید - به تومان" value="{{ $data->mortgage ?? null }}">
            </div>

            <div class="form-group">
                <label for="rent">اجاره:</label>
                <input type="number" name="rent" id="rent" class="form-control drafted_input"
                    placeholder="اجاره را وارد نمایید - به تومان" value="{{ $data->rent ?? null }}">
            </div>


            <br>
            <br>
            <div class="form-group">
                <button class="btn btn-sm btn-primary is" type="submit">ادامه
                    <div id="rent-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>

        </form>
    @endif

</section>
