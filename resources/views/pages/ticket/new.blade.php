@extends('layout.panel' , ["title" => "مدیریت زمین | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>ساخت تیکت جدید</h3>
                <br>
                <br>
                <a href="/ticket/manage" class="btn btn-sm btn-primary is m-3">لیست تیکت ها</a>
                <form action="" class="form" id="new-ticket-form">
                    <div class="form-group">
                        <label for="title">عنوان:</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="عنوان تیکت را وارد نمایید">
                    </div>


                    <div class="form-group">
                        <label for="priority">اولویت:</label>
                        <select name="priority" id="priority" name="priority" class="form-control drafted_input">
                            <option value="1">معمولی</option>
                            <option value="2">مهم</option>
                            <option value="3">خیلی مهم</option>
                        </select>
                    </div>

                    <input type="hidden" value="{{ csrf_token() }}" id="token" />


                    <div class="form-group">
                        <label for="description">متن تیکت:</label>
                        <textarea name="description" id="description" class="form-control"
                            style="height: 150px;resize: none"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="attach" style="height: 40px">فایل پیوست:</label>
                        <input type="file" id="attach" name="attach" class="form-control" />
                    </div>

                    <button class="btn btn-sm btn-primary float-left is">
                        ثبت تیکت
                        <div id="ticket-loading" class="spinner-border spinner-border-sm" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>

                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        function checkFormat(name) {
            const SUPPORTED_FORMATS = ["zip", "jpg", "jpeg", "png"];
            const format = name.split(".")[1].toLowerCase();
            return SUPPORTED_FORMATS.includes(format.toLowerCase());
        }
        const data = new FormData();
        $("#attach").change(function(e) {
            const file = e.target.files[0];
            if (checkFormat(file.name)) {
                if (data.has("attach")) {
                    data.delete("attach");
                }
                data.append("attach", file);
            } else if (data.has("attach")) {
                data.delete("attach")
            }
        })
        $("#new-ticket-form").validate({
            submitHandler: (form) => {
                data.append("title", $("#title").val());
                data.append("priority", $("#priority").val());
                data.append("description", $("#description").val());
                data.append("_token", $("#token").val());
                $.ajax({
                    method: "POST",
                    processData: false,
                    contentType: false,
                    url: "/ticket/create",
                    data,
                    success: () => {
                        Swal.fire({
                            title: "انجام شد",
                            text: "تیکت شما ارسال شد و در اسرع وقت رسیدگی میشود",
                            icon: "success",
                            confirmButtonText: "باشه",
                            onClose: () => {
                                location.href = "/ticket/manage";
                            }
                        });
                    },
                    error: () => {
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
                title: {
                    required: true,
                    minlength: 10,
                    maxlength: 255
                },
                description: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000
                },
                attach: {
                    extension: "zip|jpg|jpeg|png"
                }

            },
            messages: {
                title: {
                    required: "عنوان تیکت الزامی می باشد",
                    minlength: "عنوان تیکت باید حداقل 10 کاراکتر باشد",
                    maxlength: "عنوان تیکت نمیتواند بیشتر از 255 کاراکتر باشد"
                },
                description: {
                    required: "متن تیکت الزامی می باشد",
                    minlength: "متن تیکت باید حداقل 10 کاراکتر باشد",
                    maxlength: "متن تیکت نمیتواند بیشتر از 10000 کاراکتر باشد"
                },
                attach: {
                    extension: "فرمت فایل پیوست باید zip , jpg , jpeg , png باشد"
                }
            }
        });

    </script>
@endpush
