@extends('layout.panel' , ["title" => "مدیریت تیکت ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت تیکت ها</h3>
                <br>
                <br>

                <a href="/ticket/new" class="btn btn-sm btn-primary is m-3">+ ثبت تیکت جدید</a>
                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="40%">عنوان</th>
                                <th width="25%">وضعیت</th>
                                <th width="25%">پیوست</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($data))
                                @foreach ($data as $item)
                                    <tr>
                                        <td width="10%">{{ $item->id }}</td>
                                        <td width="40%">{{ $item->title }}</td>
                                        <td width="25%">
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
                                        <td width="25%">{{ $item->attach ? 'دارد' : 'ندارد' }}</td>
                                    </tr>
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
