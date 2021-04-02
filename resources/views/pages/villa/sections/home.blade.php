<div class="villa-info-item info-table float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        اطلاعات مربوط به ملک
    </h2>
    <br>

    <table class="table text-center is w-50 float-right">
        <tbody>
            <tr>
                <td>تعداد طبقات:</td>
                <td>{{ $data->floors }}</td>
            </tr>

            <tr>
                <td>تعداد واحد هر طبقه:</td>
                <td>{{ $data->unites }}</td>
            </tr>

            <tr>
                <td>متراژ کل زمین:</td>
                <td>{{ $data->foundation_area }} متر</td>
            </tr>



            <tr>
                <td>مسیر دسترسی:</td>
                <td>
                    @switch($data->way_type)
                        @case(1)
                        آسفالت
                        @break
                        @case(2)
                        خاکی
                        @break
                        @default
                        مال رو
                    @endswitch
                </td>
            </tr>


        </tbody>
    </table>


    <table class="table text-center is w-50 float-right">
        <tbody>

            <tr>
                <td>متراژ ملک:</td>
                <td>{{ $data->foundation_home }} متر</td>
            </tr>



            <tr>
                <td>سال ساخت:</td>
                <td>{{ $data->year_of_counstruction ?? "وارد نشده" }}</td>
            </tr>


            <tr>
                <td>نوع مالکیت:</td>
                <td>
                    @if ($data->ownership == 1)
                    دربست
                    @else
                    غیر دربست
                    @endif

                </td>
            </tr>


            <tr>
                <td>همسایگی ملک:</td>
                <td>
                    @switch($data->neighbor)
                        @case(1)

                        همسایه وجود ندارد
                        @break
                        @case(2)
                        دیوار به دیوار
                        @break
                        @default
                        پراکنده

                    @endswitch
                </td>
            </tr>



            
            <tr>
                <td>تیپ سازه:</td>
                <td>
                    @switch($data->structure_type)                    
                        @case(1)
                        هم سطح
                        @break
                        @case(2)
                        دوبلکس
                        @break
                        @default
                        تریپلکس
                    @endswitch
                </td>
            </tr>
        </tbody>
    </table>


    @if ($data->about_home)
    <div class="accordion-title mb-3 float-right w-100">
        <i class="fa fa-arrow-down"></i>
توضیحات بیشتر درباره اقامتگاه
    </div>
    <br>
    <p class="mt-3 float-right">{{$data->about_home}}</p>    
    @endif
    
</div>
<br>
<br>