<section>

    <form action="" class="form" id="spaces">
        <h3 class="d-block mb-3">اتاق و پذیرایی</h3>

        <div class="form-group">
            <label for="standard_capacity">ظرفیت استاندارد:</label>
            <input type="number" name="standard_capacity" id="standard_capacity" class="form-control"
                placeholder="ظرفیت استاندارد اقامتگاه خود را وارد نمایید">
        </div>


        <div class="form-group">
            <label for="max_capacity">حداکثر ظرفیت:</label>
            <input type="number" name="max_capacity" id="max_capacity" class="form-control"
                placeholder="حداکثر ظرفیت اقامتگاه خود را وارد نمایید">
        </div>


        <div class="accordion-title">
            <i class="far fa-circle"></i>
            ظرفیت استاندارد را متناسب با با امکانات ملک خود وارد نمایید. حداکثر ظرفیت مجموع ظرفیت استاندار و ظرفیت اضافه
            است.
        </div>

        <br>
        <br>
        <div class="form-group">
            <label for="standard_capacity">اتاق ها:<a href="" class="show-modal" modal="#new-room-modal">اضافه کردن
                    اتاق</a></label>
            <ul id="rooms" class="my-modal-items">
                <li>
                    <p>اتاقی اضافه نکرده اید</p>
                </li>
            </ul>
        </div>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            مشخصات مربوط به اتاق خواب های ملک خود را وارد نمایید.
        </div>

        <br>
        <br>
        <div class="form-group">
            <label>سیستم گرمایشی ملک:</label>
            <div id="heating_system_items">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شوفاژ" , "name" =>
                "radiator_home"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری گازی" , "name" =>
                "gas_heater_home"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری هیزمی" , "name" =>
                "wood_heater_home"])
            </div>
            <br>
            <input type="text" name="new_heating_system_input" id="new_heating_system_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">

            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#heating_system_items"
                input="#new_heating_system_input" type="button">ثبت مورد جدید +</button>
        </div>


        <br>
        <div class="form-group">
            <label>سیستم سرمایشی ملک:</label>
            <div id="cooling_system_items">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر گازی" , "name" =>
                "fan_gas_home"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر آبی" , "name" =>
                "fan_water_home"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پنکه سقفی" , "name" =>
                "fan_home"])
            </div>
            <br>
            <input type="text" name="new_cooling_system_input" id="new_cooling_system_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#cooling_system_items"
                input="#new_cooling_system_input" type="button">ثبت مورد جدید +</button>

        </div>




        <br>
        <br>
        <h3 class="d-block mb-3">امکانات بهداشتی(اختیاری)</h3>
        <div class="form-group mb-3">
            <label for="count_wc">تعداد سرویس های بهداشتی:</label>
            <input type="number" id="count_wc" name="count_wc" class="form-control"
                placeholder="تعداد دستشویی های ملک خود را وارد نمایید">
        </div>


        <div class="form-group mb-3">
            <label for="count_bathroom">تعداد حمام:</label>
            <input type="number" id="count_bathroom" name="count_bathroom" class="form-control"
                placeholder="تعداد دستشویی های ملک خود را وارد نمایید">
        </div>



        <div class="form-group">
            <label>سایر امکانات بهداشتی:</label>
            <div id="more_health_items">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "صابون" , "name" =>
                "soap"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "ماشین دستشویی" , "name" =>
                "washing_liquid"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شامپو" , "name" =>
                "fan_home"])
            </div>
        </div>


        <br>
        <br>
        <h3 class="d-block mb-3">سایر فضا ها(اختیاری)</h3>


        <div class="form-group mb-3">
            <label>استخر:(<a href="" class="show-modal" modal="#new-pool-modal">اضافه کردن استخر
                    جدید</a>)</label>
            <ul id="pools" class="my-modal-items">
                <li>
                    <p>استخری اضافه نکرده اید</p>
                </li>
            </ul>
        </div>


        <div class="form-group mb-3">
            <label>دیگر موارد:</label>
            <div id="more_pools_items">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سونا خشک" , "name" =>
                "dry_sauna"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سونا بخار" , "name" =>
                "steam_sauna"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جکوزی" , "name" =>
                "jacuzzi"])
            </div>
            <br>
            <input type="text" name="new-pool-item" id="new-pool-item" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#more_pools_items" input="#new-pool-item" type="button">ثبت
                مورد جدید +</button>
        </div>


        <div class="form-group mb-3">
            <label>ویژگی های حیاط :</label>

            <div id="courtyard">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "باغچه" , "name" =>
                "courtyard_1"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "حوض" , "name" =>
                "courtyard_2"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "آلاچیق" , "name" =>
                "courtyard_3"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "زمین بازی" , "name" =>
                "courtyard_4"])

                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "منقل" , "name" =>
                "courtyard_5"])

            </div>

            <br>
            <input type="text" name="new-courtyard-item" id="new-courtyard-item" class="form-control" placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#courtyard" input="#new-courtyard-item" type="button">ثبت مورد
                جدید +</button>
        </div>


        <div class="form-group mb-3">
            <label>پارکینگ:(<a href="" class="show-modal" modal="#new-parking-modal">اضافه کردن پارکینگ
                    جدید</a>)</label>
            <ul id="parkings" class="my-modal-items">
                <li>
                    <p>پارکینگی اضافه نکرده اید</p>
                </li>
            </ul>
        </div>


      

        <div class="form-group mb-3">
            <label>ویو اقامتگاه رو به :</label>

            <div id="views">
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دریا" , "name" =>
                "sea"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جنگل" , "name" =>
                "forest"])
                @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کوه" , "name" =>
                "muntain"])
            </div>

            <br>
            <input type="text" name="new_view" id="new_view" class="form-control" placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#views" input="#new_view" type="button">ثبت مورد
                جدید +</button>
        </div>



        <div class="form-group">
            <label for="more_info_space">اطلاعات باقی مانده از دیگر فضاهای ویلای خود را میتوانید اینجا وارد نمایید
                بنویسید:</label>
            <textarea name="more_info_space" id="more_info_space" class="form-control"
                placeholder="توضیحات بیشتر در مورد اقامتگاه"></textarea>
        </div>



        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
        </div>

    </form>


</section>
@include('partials.panel.villa.new-villa.new-pool')
@include('partials.panel.villa.new-villa.new-room')
@include('partials.panel.villa.new-villa.new-parking')
