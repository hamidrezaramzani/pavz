@extends('layout.panel' , ["title" => "مدیریت آپارتمان ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت آگهی های آپارتمان</h3>
                <br>
                <br>
                <a href="/new-apartment" class="btn btn-sm btn-primary is m-3">+ ثبت آگهی رایگان</a>
                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="20%">عنوان</th>
                                <th width="10%">کاور</th>
                                <th width="10%">تعداد لایک</th>
                                <th width="10%">نوع آگهی</th>
                                <th width="10%">بازدید</th>
                                <th width="15%">وضعیت</th>
                                <th width="15%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($apartments))
                                @foreach ($apartments as $apartment)

                                    <tr>
                                        <td width="10%">{{ $apartment->id }}</td>
                                        <td width="20%">{{ $apartment->title }}</td>
                                        <td width="20%">
                                            @if ($apartment->cover)
                                                <button class="btn btn-warning btn-sm show-villa-pic"
                                                    src="{{ asset('covers/' . $apartment->cover) }}">نمایش تصویر</button>
                                            @else
                                                <span class="text-danger">کاور ندارد</span>
                                            @endif
                                        </td>
                                        <td width="10%">{{$apartment->likes()->count()}}</td>
                                        <td width="10%">
                                            {{ $apartment->ads_type == '1' ? 'فروش آپارتمان' : 'رهن و اجاره آپارتمان' }}
                                        </td>
                                        <td>{{ $apartment->view_count }}</td>
                                        <td width="15%">
                                            @switch($apartment->status)
                                                @case("not-completed")
                                                    <span class="text-dark">پیش نویس</span>
                                                @break
                                                @case("checking")
                                                    <span class="text-warning">در حال بررسی</span>
                                                @break
                                                @case("published")
                                                    <span class="text-success">انتشار یافت</span>
                                                @break
                                                @case("rejected")
                                                    <span class="text-danger">رد شد</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td width="15%">
                                            <a href="/edit-apartment/{{ $apartment->id }}" style="font-size: 11px"
                                                class="btn btn-sm btn-warning is">ویرایش</a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-danger is btn-apartment-delete"
                                                id="{{ $apartment->id }}">حذف
                                                <span id="ap-{{ $apartment->id }}" class="spinner-grow spinner-grow-sm"
                                                    role="status" aria-hidden="true" style="display: none"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    </thead>
                                @endforeach
                            @else
                                <td colspan="8" class="text-center text-danger is">آگهی ثبت نشده است</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


<div class="modal fade" id="ap-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">تصویر آپارتمان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="ap-pic-modal" alt="" width="100%" height="300">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".show-villa-pic").click(function() {
            const src = $(this).attr("src");
            $("#ap-pic-modal").attr("src", src);
            $("#ap-modal").modal("show");
        });

        $(".close").click(function() {
            $("#ap-modal").modal("hide");
        })

        $(".btn-apartment-delete").click(function() {
            const btn = $(this);
            const id = btn.attr("id");


            Swal.fire({
                title: "حذف آپارتمان",
                text: "آیا واقعا میخواهید این آگهی را حذف کنید؟",
                icon: "question",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
                showCancelButton: true

            }).then(({
                isConfirmed
            }) => {
                if (isConfirmed) {
                    $(`#ap-${id}`).show();
                    btn.prop("disabled", true);
                    $.ajax({
                        method: "GET",
                        url: "/apartment/delete/" + id,
                        success: (response) => {
                            $(`#ap-${id}`).hide();
                            btn.prop("disabled", false);
                            btn.parents("tr").remove()
                        },
                        error: (err) => {
                            console.log(err);
                            $(`#ap-${id}`).hide();
                            btn.prop("disabled", false);
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });
                        }
                    });
                }

            })

        })

    </script>
@endpush
