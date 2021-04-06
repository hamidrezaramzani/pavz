<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        قیمت گذاری زمین
    </h2>

    <br>
    @if ($data->agreed_price)
    <table class="table info-table mt-3 text-center is w-50 float-right">

        <tbody>
            <tr>
                <td>قیمت:</td>
                <td>توافقی</td>
            </tr>
        </tbody>
    </table>

    @else
        <table class="table info-table mt-3 text-center is w-50 float-right">

            <tbody>
                <tr>
                    <td>قیمت کلی:</td>
                    <td>{{ $data->total_price }} تومان</td>
                </tr>


            </tbody>
        </table>


        <table class="table info-table mt-3 text-center is w-50 float-right">
            <tbody>
                <tr>
                    <td>قیمت به ازای هر متر:</td>
                    <td>{{ $data->price_per_meter }} تومان</td>
                </tr>
            </tbody>

        </table>

    @endif

</div>



<br>
<br>
