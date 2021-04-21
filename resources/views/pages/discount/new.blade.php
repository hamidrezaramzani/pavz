@extends('layout.panel' , ["title" => "کد تخفیف جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>کد تخفیف جدید</h3>
                <br>
                <br>

                <form action="" id="new-discount-form" class="form">

                    <div class="form-group">
                        <label for="code">کد تخفیف:</label>
                        <input type="text" name="code" id="code" class="form-control"
                            placeholder="کد تخفیف خود را وارد نمایید" />
                    </div>


                    <div class="form-group">
                        <label for="percent">درصد تخفیف:</label>
                        <input type="text" name="percent" id="percent" class="form-control"
                            placeholder="درصد تخفیف خود را وارد نمایید" />
                    </div>
                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <br>
                    <button class="btn btn-sm btn-primary is">تایید
                        <div id="d-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
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
        $("#new-discount-form").validate({
            submitHandler: () => {
                const data = {
                    code: $("#code").val(),
                    percent: $("#percent").val() , 
                    _token: $("#token").val()
                };

                $.ajax({
                    method: "POST",
                    url: "/discount/create",
                    data,
                    beforeSend: () => {
                        $("#d-loading").show();
                    },
                    success: () => {
                        $("#d-loading").hide();
                        Swal.fire({
                            title: "انجام شد",
                            text: "این کد تخفیف با موفقیت اضافه شد",
                            icon: "success",
                            confirmButtonText: "باشه",
                        });
                    },
                    error: () => {
                        $("#d-loading").hide();
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
                code: {
                    required: true,
                    minlength: 3
                },
                percent: {
                    required: true,
                    min: 1,
                    max: 100
                }
            },
            messages: {
                code: {
                    required: "پر کردن این فیلد الزامی می باشد",
                    minlength: "حداقل باید 3 کاراکتر داشته باشد"
                },
                percent: {
                    required: "پر کردن این فیلد الزامی می باشد",
                    min: "حداقل باید 1 درصد باشد",
                    max: "حداکثر میتواند 100 درصد باشد"
                }
            }
        });

    </script>
@endpush
