<section>

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
                <input type="number" name="midweek_price" id="midweek_price" class="form-control"
                    placeholder="قیمت روز های شنبه تا سه شنبه">
            </div>



            <div class="form-group">
                <label for="endweek_price">روز های آخر هفته:(به تومان)</label>
                <input type="number" name="endweek_price" id="endweek_price" class="form-control"
                    placeholder="قیمت روز های شنبه تا سه شنبه">
            </div>



            <div class="form-group">
                <label for="peek_price">قیمت ایام پیک:(به تومان)</label>
                <input type="number" name="peek_price" id="peek_price" class="form-control"
                    placeholder="برای روز های خاص و تعطیل">



                <div class="form-group">
                    <label for="price_per_person">قیمت اقامت به ازای هر نفر اضافه:(به تومان)</label>
                    <input type="number" name="price_per_person" id="price_per_person" class="form-control"
                        placeholder="هر نفر که اضافه شود بر روی قیمت میرود">



                </div>


                <br>
                <h3>تخفیف گذاری</h3>
                <br>

                <div class="form-group">
                    <label for="midweek_discount">تخفیف برای روز های وسط هفته</label>
                    <input type="text" name="midweek_discount" id="midweek_discount" class="form-control"
                        placeholder="تخفیف روز های شنبه تا سه شنبه">
                </div>


                <div class="form-group">
                    <label for="endweek_discount">تخفیف برای روز های آخر هفته</label>
                    <input type="text" name="endweek_discount" id="endweek_discount" class="form-control"
                        placeholder="تخفیف روز های شنبه تا سه شنبه">    
                </div>



                <div class="form-group">
                    <label for="peek_discount">تخفیف قیمت ایام پیک</label>
                    <input type="text" name="peek_discount" id="peek_discount" class="form-control"
                        placeholder="تخفیف برای روز های خاص و تعطیل">
                </div>
                <br>
            </div>
        </div>
        {{-- <div id="sold-pricing">
            <div class="form-group">
                <label for="total-price">قیمت کل:</label>
                <input type="number" name="total-price" id="total-price" class="form-control"
                placeholder="قیمت کل ملک برای فروش را وارد نمایید">
            </div>
    
        </div> --}}

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
        </div>

    </form>
</section>
