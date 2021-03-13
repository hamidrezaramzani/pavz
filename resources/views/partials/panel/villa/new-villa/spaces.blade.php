<section style="display: {{$show ? "block" : "none"}};">

    <form action="" class="form" id="spaces">
        <h3 class="d-block mb-3">ظرفیت</h3>

        <input type="hidden" id="space_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="standard_capacity">ظرفیت استاندارد:</label>
            <input type="number" value="{{ $data->standard_capacity }}" name="standard_capacity"
                id="standard_capacity" class="form-control" placeholder="ظرفیت استاندارد اقامتگاه خود را وارد نمایید">
        </div>


        <div class="form-group">
            <label for="max_capacity">حداکثر ظرفیت:</label>
            <input type="number" name="max_capacity" id="max_capacity" value="{{ $data->max_capacity }}"
                class="form-control" placeholder="حداکثر ظرفیت اقامتگاه خود را وارد نمایید">
        </div>
        <br>


        <div class="accordion-title">
            <i class="far fa-circle"></i>
            ظرفیت استاندارد را متناسب با با امکانات ملک خود وارد نمایید. حداکثر ظرفیت مجموع ظرفیت استاندار و ظرفیت اضافه
            است.
        </div>

        <br>
        <br>
        <div class="form-group">
            <label>اتاق ها:<a href="" class="show-modal" modal="#new-room-modal">اضافه کردن
                    اتاق</a></label>
            <ul id="rooms" class="my-modal-items">
                @if (count($data->rooms))
                    @foreach ($data->rooms as $item)
                        <li>
                            <h3><button class="btn btn-danger btn-sm" type="button"
                                    onclick="removeRoom({{ $item->id }})"><i
                                        class="fa fa-trash"></i></button>{{ $item->room_title }}</h3>
                            @if ($item->is_master)
                                <h5>این اتاق مستر است</h5>
                            @endif

                            @if ($item->single_bed == 0 || $item->double_bed == 0)
                                <span>این اتاق کف خواب است(زمانی که تعداد تخت ها 0 باشد اتاق کف خواب در نظر گرفته
                                    میشود)</span>
                            @else
                                <span>این اتاق {{ $item->single_bed }} تخت خواب یک نفره دارد</span>
                                <span>این اتاق {{ $item->double_bed }} تخت خواب دو نفره دارد</span>
                            @endif

                            @foreach (json_decode($item->possibilities) as $item2)
                                <span><i class="fa fa-check text-success"></i>&nbsp;{{ $item2->name }}</span>
                            @endforeach
                        </li>
                    @endforeach

                @else
                    <li>
                        <p>اتاقی اضافه نکرده اید</p>
                    </li>
                @endif

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
                @if ($data->heating_systems)
                    @foreach (json_decode($data->heating_systems) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شوفاژ" , "name" =>
                    "radiator_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری گازی" , "name" =>
                    "gas_heater_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری هیزمی" , "name" =>
                    "wood_heater_home"])
                @endif
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

                @if ($data->more_pool_possibilities)
                    @foreach (json_decode($data->cooling_systems) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else


                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر گازی" , "name" =>
                    "fan_gas_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر آبی" , "name" =>
                    "fan_water_home"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پنکه سقفی" , "name" =>
                    "fan_home"])
                @endif
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
            <label for="number_of_wc">تعداد سرویس های بهداشتی:</label>
            <input type="number" id="number_of_wc" name="number_of_wc" class="form-control"
                placeholder="تعداد دستشویی های ملک خود را وارد نمایید" value="{{ $data->number_of_wc }}">
        </div>


        <div class="form-group mb-3">
            <label for="number_of_bathroom">تعداد حمام:</label>
            <input type="number" id="number_of_bathroom" name="number_of_bathroom" class="form-control"
                placeholder="تعداد حمام های ملک خود را وارد نمایید" value="{{ $data->number_of_bathroom }}">
        </div>



        <div class="form-group">
            <label>سایر امکانات بهداشتی:</label>
            <div id="more_health_items">

                @if ($data->more_health_possibilities)
                    @foreach (json_decode($data->more_health_possibilities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "صابون" , "name" =>
                    "soap"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "ماشین دستشویی" , "name" =>
                    "washing_liquid"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شامپو" , "name" =>
                    "fan_home"])


                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "ژل ضد عفونی کننده" , "name" =>
                    "fan_home"])
                @endif


            </div>
            <input type="text" name="new_health_input" id="new_health_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#more_health_items" input="#new_health_input"
                type="button">ثبت
                مورد جدید +</button>

        </div>


        <br>
        <br>
        <h3 class="d-block mb-3">سایر فضا ها(اختیاری)</h3>


        <div class="form-group mb-3">
            <label>استخر:(<a href="" class="show-modal" modal="#new-pool-modal">اضافه کردن استخر
                    جدید</a>)</label>
            <ul id="pools" class="my-modal-items">
                @if (count($data->pools))
                    @foreach ($data->pools as $index => $item)
                        <li>
                            <h3>
                                <button class="btn btn-danger btn-sm" type="button"
                                    onclick="removePool({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                استخر {{ $index + 1 }}
                            </h3>
                            <span><i class="fa fa-circle"></i>&nbsp;نوع استخر :
                                {{ $item->pool_type == 1 ? 'سر پوشیده' : 'رو باز' }}</span>
                            <span><i class="fa fa-circle"></i>&nbsp;مکان استخر : {{ $item->pool_location }}</span>

                            <x-if-is-not-null :title="$item->length"
                                :message="'طول استخر : ' . $item->length . ' متر '" />
                            <x-if-is-not-null :title="$item->width"
                                :message="'عرض استخر : ' . $item->width . ' متر '" />
                            <x-if-is-not-null :title="$item->min_depth"
                                :message="'کمترین عمق استخر : ' . $item->min_depth . ' متر '" />
                            <x-if-is-not-null :title="$item->max_depth"
                                :message="'بیشترین عمق استخر : ' . $item->max_depth . ' متر '" />
                            <x-if-is-not-null :title="$item->heating_systems"
                                :message="'سیستم گرمایشی : ' . $item->heating_systems" />
                            <x-if-is-not-null :title="$item->cooling_systems"
                                :message="'سیستم سرمایشی : ' . $item->cooling_systems" />

                            @foreach (json_decode($item->possibilities) as $item2)
                                <x-if-is-not-null :title="$item2->text" :message="$item2->text" />
                            @endforeach
                        </li>
                    @endforeach
                @else
                    <li>
                        <p>استخری اضافه نکرده اید</p>
                    </li>
                @endif

            </ul>
        </div>


        <div class="form-group mb-3">
            <label>دیگر موارد:</label>
            <div id="pool_items">
                @if ($data->more_pool_possibilities)
                    @foreach (json_decode($data->more_pool_possibilities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سونا خشک" , "name" =>
                    "dry_sauna"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سونا بخار" , "name" =>
                    "steam_sauna"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جکوزی" , "name" =>
                    "jacuzzi"])
                @endif

            </div>
            <br>
            <input type="text" name="new-pool-item" id="new-pool-item" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#pool_items" input="#new-pool-item"
                type="button">ثبت
                مورد جدید +</button>
        </div>


        <div class="form-group mb-3">
            <label>ویژگی های حیاط :</label>

            <div id="courtyard">


                @if ($data->courtyard)
                    @foreach (json_decode($data->courtyard) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else

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
                @endif


            </div>

            <br>
            <input type="text" name="new-courtyard-item" id="new-courtyard-item" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#courtyard" input="#new-courtyard-item"
                type="button">ثبت مورد
                جدید +</button>
        </div>


        <div class="form-group mb-3">
            <label>پارکینگ:(<a href="" class="show-modal" modal="#new-parking-modal">اضافه کردن پارکینگ
                    جدید</a>)</label>
            <ul id="parkings" class="my-modal-items">

                @if (count($data->parkings))
                    @foreach (json_decode($data->parkings) as $index => $item)
                        <li>
                            <h3>
                                استخر {{ $index + 1 }}
                                <button class="btn btn-danger btn-sm" type="button"
                                    onclick="removeParking({{ $item->id }})"><i class="fa fa-trash"></i></button>
                            </h3>

                            @if ($item->type)
                                <span>
                                    <i class="fa fa-circle"></i>
                                    نوع استخر : {{ $item->type == 1 ? 'رو باز' : 'سر بسته' }}
                                </span>
                            @endif


                            @if ($item->capacity)
                                <span>
                                    <i class="fa fa-circle"></i>
                                    ظرفیت ماشین : {{ $item->capacity }}
                                </span>
                            @endif
                        </li>
                    @endforeach
                @else
                    <li>
                        <p>پارکینگی اضافه نکرده اید</p>
                    </li>
                @endif

            </ul>
        </div>




        <div class="form-group mb-3">
            <label>ویو اقامتگاه رو به :</label>

            <div id="views">



                @if ($data->views)
                    @foreach (json_decode($data->views) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                        => $item->name , "checked" => $item->checked] )
                    @endforeach
                @else

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دریا" , "name" =>
                    "sea"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جنگل" , "name" =>
                    "forest"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کوه" , "name" =>
                    "muntain"])
                @endif


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
                placeholder="توضیحات بیشتر در مورد اقامتگاه">{{ $data->about_space_home }}</textarea>
        </div>



        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه

                <div id="space-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>

            </button>
        </div>

    </form>


</section>
