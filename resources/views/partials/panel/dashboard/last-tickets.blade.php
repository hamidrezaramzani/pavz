    <div class="col-11 col-md-6 dashboard-info-item">
        <div class="dashboard-info-item-content p-3">
            <h3>
                تیکت های سیستم

                <a href="/tickets/manage">همه موارد</a>
            </h3>
            <br>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>تاریخ ثبت</th>
                        <th>وضعیت</th>
                        <th>فایل پیوست</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $item)
                        <tr>
                            <td>{{ $item->title  }}</td>
                            <td>{{ jdate($item->created_at)->format('%Y/%m/%d - %A') }}</td>
                            <td>
                                @switch($item->status)
                                    @case("answer")
                                        پاسخ داده شد
                                    @break
                                    @case("closed")
                                        بسته شد
                                    @break
                                    @case("wait")
                                        منتظر پاسخ کاربر
                                    @break
                                    @case("done")
                                        انجام شد
                                    @break
                                    @case("new")
                                        جدید
                                    @break                                    

                                @endswitch
                            </td>
                     
                            <td>
                                @if ($item->attach)
                                <span class="text-success">دارد</span>
                                @else
                                <span class="text-danger">ندارد</span>                                    
                                @endif
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
