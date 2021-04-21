@extends('layout.panel' , ["title" => "مدیریت رزرو های شما | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت درخواست های رزرو</h3>
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="10%">شروع</th>
                                <th width="10%">پایان</th>
                                <th width="10%">شماره تلفن</th>
                                <th width="20%">نام و نام خانوادگی</th>
                                <th width="10%">تعداد مهمانان</th>
                                <th width="10%">ویلا</th>
                                <th width="10%">وضعیت</th>
                                <th width="10%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                @foreach ($item->reserves()->get() as $item1)
                                    <tr>
                                        <td width="10%">{{ $item1->id }}</td>
                                        <td width="10%">{{ $item1->start }}</td>
                                        <td width="10%">{{ $item1->end }}</td>
                                        <td width="10%">
                                            <a href="tell://{{ $item1->phonenumber }}">{{ $item1->phonenumber }}</a>
                                        </td>
                                        <td width="10%">{{ $item1->fullname }}</td>
                                        <td width="10%">{{ $item1->guests }}</td>
                                        <td width="10%">
                                            <a href="/villa/{{ $item1->villa_id }}">ویلا</a>
                                        </td>
                                        <td width="10%">
                                            @switch($item1->status)
                                                @case("new")
                                                <span class="text-warning">درخواست جدید</span>
                                                @break
                                                @case("confirm")
                                                <span class="text-success">تایید شد</span>
                                                @break
                                                @case("reject")
                                                <span class="text-danger">رد شد</span>
                                            @endswitch
                                        </td>
                                        <td width="10%">
                                            @if ($item1->status == 'new')
                                                <a href="/reserve/set/confirm/{{ $item1->id }}"
                                                    class="select-reserve-status btn btn-sm btn-success"><i
                                                        class="fa fa-check"></i></a>&nbsp;
                                                <a href="/reserve/set/reject/{{ $item1->id }}"
                                                    class="select-reserve-status btn btn-sm btn-danger"><i
                                                        class="fa fa-times"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".select-reserve-status").click(function(e) {
            e.preventDefault()
            const url = $(this).attr("href");
            Swal.fire({
                title: "انتخاب وضعیت",
                text: "بعد از رد یا قبول رزرو دیگر نمیتوانید آن را تغییر دهید. جهت هماهنگی های بیشتر باید با درخواست دهنده رزرو تماس بگیرید",
                icon: "question",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
                showCancelButton: true
            }).then((values) => {
                if (values.isConfirmed) {
                    location.replace(url);
                }
            })
        });

    </script>
@endpush
