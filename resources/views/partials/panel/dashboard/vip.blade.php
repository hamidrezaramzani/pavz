<div class="col-11 col-md-4 my-3">
    <input type="hidden" name="days" id="days" value="{{$days ?? 0}}">
    <div class="dashboard-info-item-content p-3">
        <div id="chart5"></div>
        <table class="table table-hover text-center">
            <tbody>
                <tr>
                    <td class="text-success">{{$days ? "فعال" : "غیرفعال"}}</td>
                    <td>وضعیت</td>
                </tr>
                <tr>
                    <td class="text-primary" dir="rtl">{{$days ? $days . " روز" : "0 روز"}}</td>
                    <td >زمان باقی مانده</td>
                </tr>
           
            </tbody>
        </table>

    </div>
</div>