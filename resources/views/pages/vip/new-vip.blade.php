@extends('layout.panel' , ["title" => "خرید اشتراک ویژه | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>خرید اشتراک ویژه</h3>
                <br>
                <br>
                @include("partials.vip-advantage")
                <input type="hidden" id="token" value="{{ csrf_token() }}">


                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>

                                <th width="25%">کد</th>
                                <th width="25%">عنوان</th>
                                <th width="25%">قیمت</th>
                                <th width="25%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>

                                    <td width="25%">{{ $index + 1 }}</td>
                                    <td width="25%">{{ $item->title }}</td>
                                    <td width="25%">{{ $item->price }} ریال</td>
                                    <td width="25%">
                                        <button class="btn btn-sm btn-primary is" data-code="" data-id="{{ $item->id }}"
                                            onclick="buy(this)">
                                            <span>خرید</span>
                                            <div class="spinner-border spinner-border-sm" role="status"
                                                style="display: none">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form action="" class="form" id="apply-discount-form">
                    <div class="form-group">
                        <label for="code">کد تخفیف دارید؟ وارد کنید:</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="کد تخفیف را وارد نمایید">
                    </div>
                    <br>
                    <button class="btn btn btn-primary is">
                        اعمال
                        <div id="apply-loading" class="spinner-border spinner-border-sm" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </form>
                <br>
                <br>
            </div>

        </div>
    </div>
@endsection
@push('scripts')

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>

    <script>
        let code = "";
        
        function buy(e) {
            let code = e.getAttribute("data-code");
            let id = e.getAttribute("data-id");

            $.ajax({
                method: "POST",
                url: "/discount/get-price",
                data: {
                    id,
                    code,
                    _token: $("#token").val()
                },
                beforeSend: () => {
                    e.setAttribute("disabled", true);
                    e.querySelector("span").innerText = "در حال انتقال به درگاه"
                    e.querySelector("div").style.display = "inline-block";

                },
                success: (response) => {
                    let res = JSON.parse(response);
                    location.href = res.link;               
                },
                error: (err) => {
                    e.setAttribute("disabled", false);
                    e.querySelector("span").innerText = "خرید"
                    e.querySelector("div").style.display = "none";
                    Swal.fire({
                        title: "خطا",
                        text: "مشکلی در سرور وجود دارد",
                        icon: "error",
                        confirmButtonText: "باشه",
                    });
                }
            });
        }

        $("#apply-discount-form").validate({
            submitHandler: () => {
                code = $("#code").val();
                $.ajax({
                    method: "GET",
                    url: "/discount/apply/" + $("#code").val(),
                    beforeSend: () => {
                        $("#apply-loading").show();
                    },
                    success: (response) => {
                        $("#apply-loading").hide();
                        $("tbody").html("");

                        response.data.forEach(item => {
                            $("tbody").append(`
                                                                                                                <tr>
                                                                                                                    <td width="25%">${item.id}</td>
                                                                                                                    <td width="25%">${item.title}</td>
                                                                                                                    <td width="25%"><s class="text-danger">${item.prevPrice} ریال</s> &nbsp; ${item.price} ریال</td>
                                                                                                                    <td width="25%">
                                                                                                                        <button class="btn btn-sm btn-primary is" data-code="${code}" data-id="${item.id}" onclick="buy(this)">
                                                                                                                            <span>خرید</span>
                                                                                                                                <div class="spinner-border spinner-border-sm" role="status"
                                                                                                                                    style="display: none">
                                                                                                                                    <span class="sr-only">Loading...</span>
                                                                                                                                </div>
                                                                                                                            </button>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                `);
                        });
                    },
                    error: (err) => {
                        $("#apply-loading").hide();
                        if (err.status == 400) {
                            Swal.fire({
                                title: "خطا",
                                text: "این کد تخفیف وجود ندارد",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });

                        } else {
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });

                        }
                    }
                });
            },
            rules: {
                code: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                code: {
                    required: "پر کردن این فیلد الزامی می باشد",
                    minlength: "حداقل باید 3 حرف باشد"
                }
            }
        });

    </script>

@endpush
