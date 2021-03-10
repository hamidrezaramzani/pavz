<section>
    <form action="" class="form" id="possibilities">
        <h3>امکانات رفاهی</h3>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            امکانات رفاهی از مواردی هستند که مهمانان خیلی به آن ها اهمیت می دهند و آن هارا با دیگر ویلا ها مقایسه میکنند
        </div>
        <input type="hidden" name="p_token" value="{{ csrf_token() }}" id="p_token">
        <div class="all-possibilities" id="welfare_amenities">
            <div id="welfare_amenities_box" class="w-100 d-block float-right">
                @if ($data->welfare_amenities)
                    @foreach (json_decode($data->welfare_amenities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "تلفن ثابت" , "name" =>
                    "static-telephone"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "اقلام بهداشتی" , "name" =>
                    "health-items"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "اتو" , "name" => "otu"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دوربین مدار بسته" , "name" =>
                    "hidden-camera"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سشوار" , "name" =>
                    "main-hairdryer"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "وای فای رایگان" , "name" =>
                    "free-wifi"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "میز ناهارخوری", "name" =>
                    "launch-table"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "ماشین لباسشویی" , "name" =>
                    "washing_machine"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کمد" , "name" =>
                    "closet"])
                @endif

            </div>

            <br>
            <input type="text" name="kichen_item_input" id="welfare_amenities_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#welfare_amenities_box"
                input="#welfare_amenities_input" type="button">ثبت مورد جدید +</button>
        </div>
        <h3>
            امکانات آشپزخانه
        </h3>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            امکانات آشپزخانه میتواند بسیار برای مهمان ها مهم باشد بنابرین به آن اهمیت دهید
        </div>

        <div class="all-possibilities" id="kitchen_facilities">
            <div id="kichen_items" class="w-100 d-block">

                @if ($data->kitchen_facilities)
                    @foreach (json_decode($data->kitchen_facilities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "مایکروفر" , "name" => "microfer"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "یخچال" , "name" =>
                    "refrigerator"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "گاز" , "name" => "oven"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "توستر" , "name" => "tooster"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بشقاب" , "name" => "plate"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "قاشق و چنگال" , "name" =>
                    "spoon_fork"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سماور" , "name" => "samovar"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "چاقو" , "name" => "knife"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "قوری" , "name" => "teapot"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "نمکدان" , "name" =>
                    "salt_shaker"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کتری" , "name" => "kettle"])
                @endif
            </div>
            <br>
            <input type="text" name="kichen_item_input" id="kichen_item_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#kichen_items" input="#kichen_item_input"
                type="button">ثبت مورد جدید +</button>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه

                
                <div id="possibilities-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</section>
