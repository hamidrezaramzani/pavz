<br>
<br>
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        قیمت گذاری آپارتمان
    </h2>

    <br>

    @if ($data->ads_type == 1)
    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>
            <tr>
                <td>قیمت کلی:</td>
                <td>{{$data->total_price}} تومان</td>
            </tr>


        </tbody>
    </table>


    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>

            <tr>
                <td>قیمت به ازای هر متر:</td>
                <td>{{$data->price_per_meter}} تومان</td>
            </tr>

        </tbody>    
    @else
    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>
            <tr>
                <td>رهن:</td>
                <td>{{$data->mortgage}} تومان</td>
            </tr>


        </tbody>
    </table>


    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>

            <tr>
                <td>اجاره:</td>
                <td>{{$data->rent}} تومان</td>
            </tr>

        </tbody>
    @endif
    

    </table>

</div>
