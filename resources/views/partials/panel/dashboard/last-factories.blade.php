<div class="col-11 col-md-8">
    <div class="dashboard-info-item-content p-3">
        <h3>

            آخرین تراکنش ها
            <a href="/payment/all">همه موارد</a>
        </h3>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>زمان تراکنش</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($payments))
                        @foreach ($payments as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->vip->title }}</td>
                                <td>{{ jdate($item->created_at)->format('%Y/%m/%d - %A') }}</td>
                                <td>
                                    @if ($item->status == 100)
                                        <span class="text-success">موفق</span>
                                    @else
                                        <span class="text-danger">ناموفق</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="4" class="text-danger">تراکنشی ثبت نشده است</td>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
