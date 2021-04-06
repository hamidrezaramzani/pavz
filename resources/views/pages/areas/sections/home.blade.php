<div class="villa-info-item info-table float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        اطلاعات مربوط به زمین
    </h2>
    <br>

    <table class="table text-center is w-50 float-right">
        <tbody>
            <tr>
                <td>سند:</td>
                <td>{{$data->document->name}}</td>
            </tr>

            <tr>
                <td>متراژ:</td>
                <td>{{$data->foundation}} متر</td>
            </tr>

            <tr>
                <td>نوع کاربری:</td>
                <td>{{$data->areaType->name}}</td>
            </tr>


        </tbody>
    </table>


    <table class="table text-center is w-50 float-right">
        <tbody>

            <tr>
                <td>تعداد بر:</td>
                <td>{{$data->count_of_border}} عدد</td>
            </tr>

            <tr>
                <td>طول بر اصلی:</td>
                <td>{{$data->main_border_width}} متر</td>
            </tr>

        </tbody>
    </table>
</div>
<br>
<br>