<section class="p-3" style="display: {{$show ? "block" : "none"}};">
    <form action="" class="form" id="possibilities-form">
        <h3>امکانات آپارتمان(اختیاری)</h3>

        <div class="form-group">
            <label>سیستم گرمایشی ملک:</label>
            <div id="heating_systems" class="checkeds-box">
                @if ($data->heating_systems)
                    @foreach (json_decode($data->heating_systems) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text ,
                        "name"
                        => $item->name , "checked" => $item->checked  , "new" => $item->new ? true  : false])
                    @endforeach
                @else

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شوفاژ" , "name" =>
                    "radiator_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری گازی" ,
                    "name" =>
                    "gas_heater_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری هیزمی" ,
                    "name" =>
                    "wood_heater_home"])
                @endif
            </div>

            <br>
            <input type="text" name="new_heating_system_input" id="new_heating_system_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#heating_systems"
                input="#new_heating_system_input" type="button">ثبت مورد جدید +</button>

        </div>



        <br>
        <div class="form-group">
            <label>سیستم سرمایشی ملک:</label>
            <div id="cooling_systems" class="checkeds-box">

                @if ($data->cooling_systems)
                    @foreach (json_decode($data->cooling_systems) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text ,
                        "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else


                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر گازی" ,
                    "name" =>
                    "fan_gas_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر آبی" , "name"
                    =>
                    "fan_water_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پنکه سقفی" ,
                    "name" =>
                    "fan_home"])
                @endif
            </div>
            <br>
            <input type="text" name="new_cooling_system_input" id="new_cooling_system_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#cooling_systems"
                input="#new_cooling_system_input" type="button">ثبت مورد جدید +</button>

        </div>



        <br>
        <div class="form-group">
            <label>امکانات آپارتمان:</label>
            <div id="possibilities" class="checkeds-box">
                @if ($data->possibilities)
                    @foreach (json_decode($data->possibilities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text ,
                        "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach

                @else
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "آسانسور" , "name"
                    =>
                    "asansor"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "انباری" , "name"
                    =>
                    "anbari"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "وای فای رایگان" ,
                    "name" => "free-wifi"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "استخر" , "name" =>
                    "pool"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پارکینگ" , "name"
                    =>
                    "parking"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دوربین مدار بسته"
                    ,
                    "name" => "camera"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سونا" , "name" =>
                    "suna"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جکوزی" , "name" =>
                    "jakuzi"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سالن ورزش" ,
                    "name" =>
                    "sport"])

                @endif

            </div>
            <br>

            <input type="text" name="new_possibilities_input" id="new_possibilities_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#possibilities"
                input="#new_possibilities_input" type="button">ثبت مورد جدید +</button>

        </div>

        <br>
        <br>
        <br>
        <div class="form-group">
            <button class="btn btn-sm btn-primary is" type="submit">ادامه

                <div id="pb-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                  </div>
            </button>
        </div>

    </form>
</section>
