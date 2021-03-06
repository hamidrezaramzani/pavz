<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        فضاهای ویلا
    </h2> <br>


    @if ($data->rooms()->count())
        <div class="accordion-title mb-3 float-right w-100">
            <i class="fa fa-arrow-down"></i>
            اتاق های ویلا
        </div>


        @foreach ($data->rooms()->get() as $item)

            <div class="space-item">
                <h6>
                    <i class="fa fa-xs text-dark fa-circle"></i>
                    {{ $item->room_title }}
                </h6>
                <span>
                    <i class="fa fa-xs text-dark fa-bed"></i>
                    یک نفره : {{ $item->single_bed }} عدد
                </span>
                <span>
                    <i class="fa fa-xs text-dark fa-bed"></i>
                    دو نفره : {{ $item->double_bed }} عدد
                </span>
                <br>
                <span>
                    امکانات :
                </span>
                @foreach (json_decode($item->possibilities) as $item1)
                    @if ($item1->checked)
                        <span>
                            <i class="fa fa-xs text-success fa-check"></i>
                            {{ $item1->text }}
                        </span>
                    @else
                        <span>
                            <i class="fa fa-xs text-danger fa-times"></i>
                            {{ $item1->text }}
                        </span>
                    @endif
                @endforeach

            </div>
        @endforeach

    @else
        <div class="bg-white text-danger accordion-title mb-3 mt-3 float-right w-100">
            <i class="fa fa-times"></i>
            اقامتگاه اتاقی ندارد
        </div>
    @endif




    @if ($data->pools()->count())
        <div class="accordion-title mb-3 mt-3 float-right w-100">
            <i class="fa fa-arrow-down"></i>
            استخر های ویلا
        </div>



        <div class="table-responsive float-right w-100">
            {{-- <table class="table text-center mt-3 float-right special-table table-hover is w-100">

                <thead>
                    <tr>
                        <th>نوع</th>
                        <th>موقعیت</th>
                        <th>سیستم گرمایشی</th>
                        <th>سیستم سرمایشی</th>
                        <th>طول</th>
                        <th>عرض</th>
                        <th>ک عمق</th>
                        <th>ب عمق</th>
                        <th>امکانات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->pools()->get() as $item)
                        <tr>
                            <td>{{ $item->pool_type == 1 ? 'سرپوشیده' : 'روباز' }}</td>
                            <td>{{ $item->pool_location }}</td>
                            <td>{{ $item->heating_systems }}</td>
                            <td>{{ $item->cooling_systems }}</td>
                            <td>{{ $item->length }} متر</td>
                            <td>{{ $item->width }} متر</td>
                            <td>{{ $item->min_depth }} متر</td>
                            <td>{{ $item->max_depth }} متر</td>
                            <td><button class="btn btn-sm btn-outline-primary  is"><i
                                        class="fa fa-eye fa-xs"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>



            </table> --}}



            @foreach ($data->pools()->get() as $index => $item)

                <div class="space-item">
                    <h6>
                        <i class="fa fa-xs text-dark fa-circle"></i>
                        استخر {{ $index + 1 }}
                    </h6>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        نوع استخر : {{ $item->pool_type == 1 ? 'روباز' : 'سرپوشیده' }}
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-map-marker"></i>
                        موقعیت استخر : {{ $item->pool_location }}
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        عرض استخر : {{ $item->width }} متر
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        طول استخر : {{ $item->length }} متر
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        کمترین عمق : {{ $item->min_depth }} متر
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        بیشترین عمق : {{ $item->max_depth }} متر
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                        سیستم گرمایشی : {{ $item->heating_systems }}
                    </span>
                    <span>
                        <i class="fa fa-xs text-dark fa-square"></i>
                    سیستم سرمایشی : {{ $item->cooling_systems }}
                    </span>
                    <br>
                    <span>
                        امکانات :
                    </span>
                    @foreach (json_decode($item->possibilities) as $item1)
                        @if ($item1->checked)
                            <span>
                                <i class="fa fa-xs text-success fa-check"></i>
                                {{ $item1->text }}
                            </span>
                        @else
                            <span>
                                <i class="fa fa-xs text-danger fa-times"></i>
                                {{ $item1->text }}
                            </span>
                        @endif
                    @endforeach

                </div>
            @endforeach

        </div>

        <div class="accordion-title mb-3 float-right w-100">
            <i class="fa fa-arrow-down"></i>
            دیگر موارد مربوط به استخر
        </div>

        <table class="table mt-3 float-right text-center  table-hover is w-100">

            <tbody>
                <tr>
                    @foreach (json_decode($data->more_pool_possibilities) as $item)
                        @if ($item->checked)
                            <td><i class="fa fa-check text-success"></i> {{ $item->text }}</td>
                        @else
                            <td><i class="fa fa-times text-danger"></i> {{ $item->text }}</td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>


    @else
        <div class="bg-white text-danger accordion-title mb-3 mt-3 float-right w-100">
            <i class="fa fa-times"></i>
            اقامتگاه استخری ندارد
        </div>
    @endif










    @if ($data->parkings()->count())


        <div class="accordion-title mb-3 float-right w-100">
            <i class="fa fa-arrow-down"></i>
            پارکینگ های ویلا
        </div>



        <div class="table-responsive float-right w-100">

            <table class="table text-center mt-3 float-right special-table table-hover is w-100">

                <thead>
                    <tr>
                        <th>نوع پارکینگ</th>
                        <th>ظرفیت ماشین</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->parkings()->get() as $item)
                        <tr>
                            <td>{{ $item->type == 1 ? 'روباز' : 'سر بسته' }}</td>
                            <td>{{ $item->capacity }} عدد</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    @else
        <div class="bg-white text-danger accordion-title mb-3 mt-3 float-right w-100">
            <i class="fa fa-times"></i>
            اقامتگاه پارکینگ ندارد
        </div>

    @endif






    <div class="accordion-title mb-3 float-right w-100">
        <i class="fa fa-arrow-down"></i>
        ویژگی های حیاط
    </div>



    <div class="table-responsive float-right w-100">

        <table class="table mt-3 float-right text-center  table-hover is w-100">

            <tbody>
                <tr>

                    @foreach (json_decode($data->courtyard) as $item)
                        @if ($item->checked)
                            <td><i class="fa fa-check text-success"></i> {{ $item->text }}</td>
                        @else
                            <td><i class="fa fa-times text-danger"></i> {{ $item->text }}</td>
                        @endif
                    @endforeach

                </tr>
            </tbody>
        </table>


    </div>








    <div class="accordion-title mb-3 float-right w-100">
        <i class="fa fa-arrow-down"></i>
        دید اقامتگاه
    </div>



    <div class="table-responsive float-right w-100">

        <table class="table mt-3 float-right text-center  table-hover is w-100">

            <tbody>
                <tr>
                    @foreach (json_decode($data->views) as $item)
                        @if ($item->checked)
                            <td><i class="fa fa-check text-success"></i> {{ $item->text }}</td>
                        @else
                            <td><i class="fa fa-times text-danger"></i> {{ $item->text }}</td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>


    </div>




    @if ($data->about_space_home)

        <div class="accordion-title mb-3 float-right w-100">
            <i class="fa fa-arrow-down"></i>
            توضیحات بیشتر درباره فضاهای ملک
        </div>

        <br>
        <br>
        <p class="float-right w-100 mt-3">

            {{ $data->about_space_home }}
        </p>


    @endif

</div>
<br>
<br>
