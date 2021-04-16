@extends('layout.panel' , ["title" => "مدیریت آپارتمان ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت آگهی های آپارتمان ثبت شده</h3>
                <br>
                <br>
                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="20%">عنوان</th>
                                <th width="20%">کاور</th>
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
                                                    <span class="text-warning">انتشار یافت</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td width="15%">
                                    
                                            <a href="{{ $apartment->id }}" data-user-id="{{ $apartment->user_id }}"
                                                id="reject-btn" class="btn btn-sm btn-danger is">رد</a>
                                            &nbsp;
                                            <a href="/admin/show-apartment/{{ $apartment->id }}"
                                                class="btn btn-sm btn-primary is">تماشا</a>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    </thead>
                                @endforeach
                            @else
                                <td colspan="7" class="text-center text-danger is">آگهی ثبت نشده است</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
<div class="modal fade" id="notification-form-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">متن اطلاع رسانی را بفرستید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form" id="send-notification-form">

                    <div class="form-group">
                        <label for="description">متن اطلاع رسانی:</label>
                        <textarea name="description" id="description" class="form-control"
                            style="height: 150px;resize: none"></textarea>
                    </div>
                    <br>
                    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                    <button class="btn btn-sm btn-primary is" id="set-status-btn">
                        ارسال
                        <div class="spinner-border spinner-border-sm" role="status" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        $(".show-villa-pic").click(function() {
            const src = $(this).attr("src");
            $("#ap-pic-modal").attr("src", src);
            $("#ap-modal").modal("show");
        });

        $(".close").click(function() {
            $("#ap-modal").modal("hide");
        })

        let status = null;
        let id = null;
        let userId = null;
        let url = "";

        $("#reject-btn").click(function name(e) {
            e.preventDefault();
            status = "rejected";
            id = $(this).attr("href");
            userId = $(this).attr("data-user-id");
            url = "/admin/reject-apartment";
            $("#notification-form-modal").modal("show");

        });


        $("#send-notification-form").validate({
            submitHandler: () => {

                $.ajax({
                    method: "POST",
                    url,
                    data: {
                        id,
                        status,
                        user_id: userId,
                        description: $("#description").val(),
                        _token: $("#token").val()
                    },
                    beforeSend: () => {
                        $("#set-status-btn").prop("disabled", true);
                        $("#set-status-btn").find("div").show();
                    },
                    success: () => {
                        $("#set-status-btn").prop("disabled", false);
                        $("#set-status-btn").find("div").hide();
                        if (status == "published") {
                            Swal.fire({
                                title: "انجام شد",
                                text: "این آگهی منتشر شد",
                                icon: "success",
                                confirmButtonText: "باشه",
                                onClose: () => {
                                    $("#notification-form-modal").modal("hide")
                                    location.reload();
                                },
                            });
                        } else {
                            Swal.fire({
                                title: "انجام شد",
                                text: "این آگهی رد شد",
                                icon: "success",
                                confirmButtonText: "باشه",
                                onClose: () => {
                                    $("#notification-form-modal").modal("hide")
                                    location.reload();
                                },
                            });
                        }

                    },
                    error: () => {
                        $("#set-status-btn").prop("disabled", false);
                        $("#set-status-btn").find("div").hide();
                        Swal.fire({
                            title: "خطا",
                            text: "مشکلی در سرور وجود دارد",
                            icon: "error",
                            confirmButtonText: "باشه",
                        });
                    },
                });
            },
            rules: {
                description: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                description: {
                    required: "پر کردن این فیلد الزامی است",
                    minlength: "حداقل باید 10 کاراکتر باشد"
                }
            }

        })

    </script>
@endpush