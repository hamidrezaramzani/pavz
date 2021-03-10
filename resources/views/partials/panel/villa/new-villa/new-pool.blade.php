<div class="modal fade" id="new-pool-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is" id="staticBackdropLabel">اضافه کردن استخر جدید</h5>
            </div>
            <div class="modal-body">
                <form action="" id="new-pool-form" class="form">

                    <input type="hidden" id="np_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="type_pool">نوع استخر:</label>
                        <select name="type_pool" id="type_pool" name="type_pool" class="form-control">
                            <option value="1">سر پوشیده</option>
                            <option value="2">استخر روباز</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pool_location">موقعیت استخر:</label>
                        <input type="text" name="pool_location" id="pool_location" class="form-control"
                            placeholder="موقعیت استخر را وارد نمایید(حیاط - داخل)">
                    </div>



                    <div class="form-group  w-50 p-1 float-right">
                        <label for="pool_heating_system">سیستم گرمایشی استخر(اختیاری):</label>
                        <input type="text" name="pool_heating_system" id="pool_heating_system" class="form-control"
                            placeholder="بخاری ، شوفاز و ...">
                    </div>


                    <div class="form-group  w-50 p-1 float-right">
                        <label for="pool_cooling_system">سیستم سرمایشی استخر(اختیاری):</label>
                        <input type="text" name="pool_cooling_system" id="pool_cooling_system" class="form-control"
                            placeholder="کولر و ....">
                    </div>


                    <div class="form-group w-50 p-1 float-right">
                        <label for="length_pool">طول استخر(اختیاری):</label>
                        <input type="number" name="length_pool" id="length_pool" class="form-control"
                            placeholder="3 متر">
                    </div>


                    <div class="form-group  p-1 w-50 float-right">
                        <label for="width_pool">عرض استخر(اختیاری):</label>
                        <input type="number" name="width_pool" id="width_pool" class="form-control" placeholder="3 متر">
                    </div>


                    <div class="form-group w-50 p-1 float-right">
                        <label for="least_pool_depth">کمترین عمق(اختیاری):</label>
                        <input type="number" name="least_pool_depth" id="least_pool_depth" class="form-control"
                            placeholder="1 متر">
                    </div>


                    <div class="form-group p-1 w-50 float-right">
                        <label for="max_pool_depth">بیشترین عمق(اختیاری):</label>
                        <input type="number" name="max_pool_depth" id="max_pool_depth" class="form-control"
                            placeholder="5 متر">
                    </div>



                    <div class="d-block float-right w-100" id="more_pool_items">

                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سرسره و امکانات تفریحی" ,
                        "name" =>
                        "water_slides"])


                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دوش آب" ,
                        "name" =>
                        "water_shower"])

                    </div>
                    <div class="w-100 float-right mt-3">
                        <input type="text" name="new_pool_input" id="new_pool_input" class="form-control"
                            placeholder="اضافه کردن مورد جدید">
                        <br>
                        <button class="btn btn-sm btn-warning is new-item" box="#more_pool_items" input="#new_pool_input"
                            type="button">ثبت
                            مورد جدید +</button>
                    </div>




                    <div class="d-block my-3 float-right w-100">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="تایید">
                        <button type="button" modal="#new-pool-modal" class="close-modal btn btn-danger is">لغو</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
