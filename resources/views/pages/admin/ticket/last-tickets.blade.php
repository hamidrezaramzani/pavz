@extends('layout.panel' , ["title" => "همه تیکت ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>همه تیکت های جدید</h3>
                <br>
                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="20%">عنوان</th>
                                <th width="10%">وضعیت</th>
                                <th width="10%">پیوست</th>
                                <th width="50%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($data))
                                @foreach ($data as $item)
                                    <tr>
                                        <td width="10%">{{ $item->id }}</td>
                                        <td width="20%">{{ $item->title }}</td>
                                        <td width="10%">
                                            @switch($item->status)
                                                @case("new")
                                                جدید
                                                @break
                                                @case("answer")
                                                پاسخ داده شد
                                                @break
                                                @case("closed")
                                                بسته شد
                                                @break
                                            @endswitch
                                        </td>
                                        <td width="10%">{{ $item->attach ? 'دارد' : 'ندارد' }}</td>
                                        <td width="50%">
                                            <a href="/admin/answer-ticket/{{$item->id}}" class="btn btn-sm btn-dark is">تماشای جزئیات و پاسخ</a>
                                        </td>
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
