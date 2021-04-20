<section style="display: {{ $show ? 'block' : 'none' }};">

    @if ($data->ads_type == 1)
        <form action="" id="pricing-form" class="form">
            <div id="rent-pricing">

                <h3>قیمت گذاری</h3>

                <input type="hidden" name="rent_price_token" id="rent_price_token" value="{{ csrf_token() }}">
                <div class="accordion-title">
                    <i class="far fa-circle"></i>
                    با توجه امکاناتی که در اختیار مهمان ها قرار میدهید قیمت را تعیین کنید.
                </div>
                <div class="form-group">

                    <label for="midweek_price">روز های وسط هفته:(به تومان)</label>
                    <input type="number" value="{{ $data->rentPrices->middweek ?? null }}" name="midweek_price"
                        id="midweek_price" class="form-control price-counter"
                        placeholder="قیمت روز های شنبه تا سه شنبه">
                    <br>
                    <span class="is price-text"></span>

                </div>



                <div class="form-group">
                    <label for="endweek_price">روز های آخر هفته:(به تومان)</label>
                    <input type="number" name="endweek_price" id="endweek_price"
                        value="{{ $data->rentPrices->endweek ?? null }}" class="form-control price-counter"
                        placeholder="قیمت روز های شنبه تا سه شنبه">
                    <br>
                    <span class="is price-text"></span>

                </div>



                <div class="form-group">
                    <label for="peek_price">قیمت ایام پیک:(به تومان)</label>
                    <input type="number" name="peek_price" id="peek_price" class="form-control price-counter"
                        value="{{ $data->rentPrices->peek ?? null }}" placeholder="برای روز های خاص و تعطیل">

                    <span class="is price-text"></span>

                </div>
                <div class="form-group">
                    <label for="price_per_person">قیمت اقامت به ازای هر نفر اضافه:(به تومان)</label>
                    <input type="number" name="price_per_person" id="price_per_person"
                        class="form-control price-counter" value="{{ $data->rentPrices->price_per_person ?? null }}"
                        placeholder="هر نفر که اضافه شود بر روی قیمت میرود">
                    <span class="is price-text"></span>

                </div>





                <br>
                <h3>تخفیف گذاری</h3>
                <br>

                <div class="form-group">
                    <label for="midweek_discount">تخفیف برای روز های وسط هفته</label>
                    <input type="number" name="midweek_discount" id="midweek_discount" class="form-control"
                        placeholder="تخفیف روز های شنبه تا سه شنبه"
                        value="{{ $data->rentPrices->middweek_discount ?? null }}">
                </div>


                <div class="form-group">
                    <label for="endweek_discount">تخفیف برای روز های آخر هفته</label>
                    <input type="number" name="endweek_discount" id="endweek_discount" class="form-control"
                        placeholder="تخفیف روز های شنبه تا سه شنبه"
                        value="{{ $data->rentPrices->endweek_discount ?? null }}">
                </div>



                <div class="form-group">
                    <label for="peek_discount">تخفیف قیمت ایام پیک</label>
                    <input type="number" name="peek_discount" id="peek_discount" class="form-control"
                        placeholder="تخفیف برای روز های خاص و تعطیل"
                        value="{{ $data->rentPrices->peek_discount ?? null }}">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
                </div>
            </div>
        </form>
    @else

        <form class="form" action="" id="sold-pricing-form">

            <h3>قیمت گذاری</h3>

            <br>
            <div class="accordion-title">
                <i class="far fa-circle"></i>
                قیمت ها را به تومان وارد نمایید
            </div>



            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "قیمت توافقی" , "name" =>
            "agreed_price" , "checked" => $data->soldVillaPrices->agreed_price ?? null])



            <div id="sold-pricing">
                <div class="form-group">
                    <label for="total_price">قیمت کل:</label>
                    <input type="number" name="total_price"
                        value="{{ $data->soldVillaPrices ? $data->soldVillaPrices->total_price : null }}"
                        {{ $data->soldVillaPrices && $data->soldVillaPrices->agreed_price ? 'disabled' : '' }}
                        id="total_price" class="form-control" placeholder="قیمت کل ملک برای فروش را وارد نمایید">
                </div>
            </div>


            <div>
                <div class="form-group">
                    <label for="price_per_meter">قیمت به ازای هر متر:</label>
                    <input type="number" name="price_per_meter" id="price_per_meter" class="form-control"
                        value="{{ $data->soldVillaPrices ? $data->soldVillaPrices->price_per_meter : null }}"
                        {{ $data->soldVillaPrices && $data->soldVillaPrices->agreed_price ? 'disabled' : '' }}
                        placeholder="قیمت کل ملک برای فروش را وارد نمایید">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary is">ادامه

                    <div id="sold-villa-prices-loading" class="spinner-border spinner-border-sm" role="status"
                        style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>

        </form>

    @endif

</section>
