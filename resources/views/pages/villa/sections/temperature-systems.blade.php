<br>
<br>
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        سیستم های گرمایشی و سرمایشی ملک
    </h2> <br>


    <div class="accordion-title mb-3 float-right w-100">
        <i class="fa fa-arrow-down"></i>
        سیستم های گرمایشی ویلا
    </div>


    <table class="table mt-3 float-right text-center  table-hover is w-100">

        <tbody>
            <tr>
                @foreach (json_decode($data->heating_systems) as $item)
                    @if ($item->checked)
                        <td><i class="fa fa-check text-success"></i> {{ $item->text }}</td>
                    @else
                        <td><i class="fa fa-times text-danger"></i> {{ $item->text }}</td>
                    @endif
                @endforeach
            </tr>
        </tbody>
    </table>


    <br>
    <br>
    <div class="accordion-title mb-3 float-right w-100">
        <i class="fa fa-arrow-down"></i>
        سیستم های سرمایشی ویلا
    </div>
    <table class="table mt-3 float-right text-center  table-hover is w-100">

        <tbody>
            <tr>

                @foreach (json_decode($data->cooling_systems) as $item)
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

<br>
<br>
