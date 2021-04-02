@if ($data->ads_type == 1)
    
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        قیمت گذاری ویلا
    </h2>

    <br>

    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>
            <tr>
                <td>روز های وسط هفته:</td>
                <td>
                    @if ($data->rentPrices->middweek_discount)
                        <s class="text-danger">{{ $data->rentPrices->middweek }} تومان</s>&nbsp;
                        {{ $data->rentPrices->middweek - $data->rentPrices->middweek *  $data->rentPrices->middweek_discount / 100}} تومان
                    @else
                        {{ $data->rentPrices->middweek }} تومان
                    @endif
                </td>
            </tr>

            <tr>
                <td>روز های آخر هفته:</td>
                <td>
                    @if ($data->rentPrices->endweek_discount)
                        <s class="text-danger">{{ $data->rentPrices->endweek }} تومان</s>&nbsp;
                        {{ $data->rentPrices->endweek - $data->rentPrices->endweek *  $data->rentPrices->endweek_discount / 100}} تومان
                    @else
                        {{ $data->rentPrices->endweek }} تومان
                    @endif
                </td>
            </tr>


        </tbody>
    </table>


    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>

            <tr>
                <td>قیمت ایام پیک:</td>
                <td>
                    @if ($data->rentPrices->peek_discount)
                        <s class="text-danger">{{ $data->rentPrices->peek }} تومان</s>&nbsp;
                        {{ $data->rentPrices->peek - $data->rentPrices->peek *  $data->rentPrices->peek_discount / 100}} تومان
                    @else
                        {{ $data->rentPrices->peek }} تومان
                    @endif
                </td>
            </tr>

            <tr>
                <td>قیمت اضافه به ازای هر نفر:</td>
                <td>{{ $data->rentPrices->price_per_person }} تومان</td>
            </tr>
        </tbody>

    </table>

</div>

@else
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        قیمت گذاری ویلا
    </h2>

    <br>

    <table class="table info-table mt-3 text-center is w-50 float-right">
        <tbody>
            @if ($data->soldVillaPrices->agreed_price)
            <tr>
                <td>قیمت:</td>
                <td>
                    توافقی
                </td>
            </tr>
                
            @else
            <tr>
                <td>قیمت کل:</td>
                <td>
                    {{ $data->soldVillaPrices->total_price }}
                </td>
            </tr>

            <tr>
                <td>قیمت به ازای هر متر:</td>
                <td>
                    {{ $data->soldVillaPrices->price_per_meter }}
                </td>
            </tr>
                
            @endif


        </tbody>
    </table>


</div>

@endif
