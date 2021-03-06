@extends('layout.panel' , ["title" => "مدیریت مغازه ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">                
                <h3>مدیریت آگهی های مغازه</h3>
                <br>
                <br>

                <a href="/shop/new" class="btn btn-sm btn-primary is m-3">+ ثبت آگهی رایگان</a>
                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="20%">عنوان</th>
                                <th width="10%">کاور</th>
                                <th width="10%">لایک</th>
                                <th width="10%">نوع آگهی</th>
                                <th width="10%">بازدید</th>
                                <th width="15%">وضعیت</th>
                                <th width="15%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data))
                                @foreach ($data as $item)

                                    <tr>
                                        <td width="10%">{{ $item->id }}</td>
                                        <td width="20%">{{ $item->title }}</td>
                                        <td width="20%">
                                            @if ($item->cover)
                                                <button class="btn btn-warning btn-sm show-villa-pic"
                                                    src="{{ asset('user/covers/' . $item->cover) }}">نمایش تصویر</button>
                                            @else
                                                <span class="text-danger">کاور ندارد</span>
                                            @endif
                                        </td>
                                        <td>{{$item->likes()->count()}}</td>
                                        <td width="10%">{{ $item->ads_type == '1' ? "فروش مغازه" : "اجاره مغازه" }}</td>
                                        <td width="10%">{{$item->view_count}}</td>
                                        <td width="15%">
                                            @switch($item->status)
                                                @case("not-completed")
                                                <span class="text-dark">پیش نویس</span>
                                                @break
                                                @case("checking")
                                                <span class="text-warning">در حال بررسی</span>
                                                @break
                                                @case("published")
                                                <span class="text-success">انتشار یافت</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td width="15%">
                                            <a href="/shop/edit/{{ $item->id }}" style="font-size: 11px"
                                                class="btn btn-sm btn-warning is">ویرایش</a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-danger is btn-villa-delete"
                                                id="{{ $item->id }}">حذف
                                                <span id="villa-{{ $item->id }}" class="spinner-grow spinner-grow-sm"
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


<div class="modal fade" id="villa_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">تصویر مغازه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modal_villa_pic_dom" alt="" width="100%" height="300">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".show-villa-pic").click(function() {
            $("#modal_villa_pic_dom").attr("src", $(this).attr("src"));
            $("#villa_pic_modal").modal("show");
        });


        $(".close").click(function() {
            $("#villa_pic_modal").modal("hide");
        });

        function setBtnStatus(btn, status = "hide") {
            if (status == "show") {
                btn.prop("disabled", true)
                btn.find("span").show()

            } else {
                btn.prop("disabled", false)
                btn.find("span").hide()

            }
        }

        $(".btn-villa-delete").click(function() {
            const id = $(this).attr("id");
            const thisBtn = $(this);
            Swal.fire({
                title: "حذف مغازه",
                text: "آیا واقعا میخواهید این آگهی را حذف کنید؟",
                icon: "question",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
                showCancelButton: true

            }).then(({
                isConfirmed
            }) => {
                if (isConfirmed) {
                    $.ajax({
                        method: "GET",
                        url: "/shop/delete/" + id,
                        beforeSend: () => {
                            setBtnStatus(thisBtn, "show")
                        },
                        success: () => {
                            setBtnStatus(thisBtn)
                            thisBtn.parents("tr").remove();                            
                        },
                        error: () => {
                            setBtnStatus(thisBtn)
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "بله",

                            })
                        }
                    });
                }

            })

        });

    </script>
@endpush
