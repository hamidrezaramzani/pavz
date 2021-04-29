<div class="col-11 col-md-6 dashboard-info-item">
    <div class="dashboard-info-item-content p-3">
        <h3>
            آخرین درخواست های رزرو
            <a href="/reserves/manage">همه موارد</a>
        </h3>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>نام و نام خانوادگی</th>
                        <th>از تاریخ</th>
                        <th>تا تاریخ</th>
                        <th>شماره تلفن</th>
                        <th>تعداد میهمانان</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reserves as $reserve)
                        <tr>
                            <td>{{ $reserve->fullname }}</td>
                            <td>{{ $reserve->start }}</td>
                            <td>{{ $reserve->end }}</td>
                            <td>{{ $reserve->phonenumber }}</td>
                            <td>{{ $reserve->guests }} نفر</td>
                            <td>
                                @switch($reserve->status)
                                    @case(" new")
                                        <span class="text-warning">جدید</span>
                                    @break
                                    @case(" confirm")
                                        <span class="text-success">قبول شده</span>
                                    @break
                                    @default
                                        <span class="text-danger">رد شده</span>
                            @break

                        @endswitch
                        </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
