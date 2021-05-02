@extends('layout.panel' , ["title" => "مدیریت تیکت ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت تیکت ها</h3>
                <br>
                <br>

                <a href="/ticket/new" class="btn btn-sm btn-primary is m-3">+ ثبت تیکت جدید</a>
                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="25%">عنوان</th>
                                <th width="25%">وضعیت</th>
                                <th width="25%">تاریخ ثبت</th>
                                <th width="25%">تعداد پاسخ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($data))
                                @foreach ($data as $item)
                                    <tr>
                                        <td width="10%">{{ $item->id }}</td>
                                        <td width="25%"><a href="/tickets/show-answer/{{ $item->id }}">{{ $item->title }}</a></td>
                                        <td width="25%">
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
                                        <td width="25%">{{ jdate($item->created_at)->format("%d %B %Y %H:%M")}}</td>
                                        
                                    </tr>
                                @endforeach

                            @else
                                <td colspan="6" class="text-center text-danger is">تیکتی ثبت نشده است</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
