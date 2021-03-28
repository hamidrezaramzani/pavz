@extends('layout.panel' , ["title" => "مدیریت زمین | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت آگهی های زمین</h3>
                <br>
                <br>

                <a href="/area/new" class="btn btn-sm btn-primary is m-3">+ ثبت آگهی رایگان</a>
                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="30%">عنوان</th>
                                <th width="20%">کاور</th>
                                <th width="15%">وضعیت</th>
                                <th width="25%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($areas))
                                @foreach ($areas as $area)

                                    <tr>
                                        <td width="10%">{{ $area->id }}</td>
                                        <td width="20%">{{ $area->title }}</td>
                                        <td width="20%">
                                            @if ($area->cover)
                                                <button class="btn btn-warning btn-sm show-area-pic"
                                                    src="{{ asset('covers/' . $area->cover) }}">نمایش تصویر</button>
                                            @else
                                                <span class="text-danger">کاور ندارد</span>
                                            @endif
                                        </td>
                                        <td width="15%">
                                            @switch($area->status)
                                                @case("not-completed")
                                                <span class="text-dark">پیش نویس</span>
                                                @break
                                                @case("checking")
                                                <span class="text-warning">در حال بررسی</span>
                                                @break
                                                @case("published")
                                                <span class="text-warning">انتشار یافت</span>
                                                @break
                                            @endswitch
                                        </td>

                                        <td width="15%">
                                            <a href="/edit-area/{{ $area->id }}" style="font-size: 11px"
                                                class="btn btn-sm btn-warning is">ویرایش</a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-danger is btn-area-delete"
                                                id="{{ $area->id }}">حذف
                                                <span id="area-{{ $area->id }}" class="spinner-grow spinner-grow-sm"
                                                    role="status" aria-hidden="true" style="display: none"></span>

                                            </button>
                                        </td>
                                    </tr>
                                    </thead>
                                @endforeach
                            @else
                                <td colspan="6" class="text-center text-danger is">آگهی ثبت نشده است</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


<div class="modal fade" id="area-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">تصویر زمین</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="area-cover" alt="" width="100%" height="300">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".show-area-pic").click(function() {
            const src = $(this).attr("src");
            $("#area-cover").attr("src", src);
            $("#area-modal").modal("show");
        });

        $(".close").click(function() {
            $("#area-modal").modal("hide");
        })

        $(".btn-area-delete").click(function() {
            Swal.fire({
                title: "حذف آگهی",
                text: "آیا میخواهید این آگهی را حذف کنید؟(با حذف این آگهی تمامی اطلاعات مربوط به آن پاک میشود)",
                icon: "question",
                confirmButtonText: "باشه",
                showCancelButton: true,
                cancelButtonText: "خیر"
            }).then(({
                value
            }) => {
                if (value) {

                    const btn = $(this);
                    const id = btn.attr("id");
                    $(`#area-${id}`).show();
                    btn.prop("disabled", true);

                    $.ajax({
                        method: "GET",
                        url: "/area/delete/" + id,
                        success: (response) => {
                            $(`#area-${id}`).hide();
                            btn.prop("disabled", false);
                            btn.parents("tr").remove()
                        },
                        error: (err) => {
                            console.log(err);
                            $(`#area-${id}`).hide();
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
