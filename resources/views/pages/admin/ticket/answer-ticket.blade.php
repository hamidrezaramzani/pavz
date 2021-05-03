@extends('layout.panel' , ["title" => "پاسخ به تیکت | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h5 class="is d-block text-right">عنوان : {{ $data->title }}</h5>
                <br>
                <span class="is d-block text-right text-danger" style="font:12px is">توضیحات:</span>
                <p class="is d-block text-right" style="text-align: right!important">{{ $data->description }}</p>
                <br>
                @if ($data->attach)
                    <a class="is" href="{{ asset('user/tickets/' . $data->attach) }}">دانلود فایل پوست</a>
                @else
                    <span class="text-danger">فایل پیوست ندارد</span>
                @endif
                <hr>
                @foreach ($answers as $item)
                @if ($item->type == 'admin')
                    <div class="answer-ticket">
                        <h3>
                            پاسخ از : {{ $item->user->profile->fullname }}
                            <span class="float-left"><span
                                    class="text-secondary">{{ jdate($item->created_at)->format('%Y/%m/%d - %H:i') }}</span>
                                - #{{ $item->id }}</span>
                        </h3>
                        <br>
                        <p>{{ $item->description }}</p>
                    </div>
                @else
                    <div class="answer-ticket user-answer">
                        <h3>
                            پاسخ از : {{ $item->user->profile->fullname }}
                            <span class="float-left"><span
                                    class="text-secondary">{{ jdate($item->created_at)->format('%Y/%m/%d - %H:i') }}</span>
                                - #{{ $item->id }}</span>
                        </h3>
                        <br>
                        <p>{{ $item->description }}</p>
                    </div>
                @endif
            @endforeach


                <br>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <form action="" class="form" id="answer-ticket-form">


                        <div class="form-group">
                            <label for="description">متن پاسخ:</label>
                            <textarea name="description" id="description" class="form-control"
                                style="height: 150px;resize: none"></textarea>
    
                        </div>
                        <br>
    
                        <input type="hidden" id="id" value="{{ $data->id }}">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="status">وضعیت:</label>
                            <select name="status" id="status" name="status" class="form-control">
                                <option value="answer">پاسخ پشتیبان</option>
                                <option value="closed">بسته شد</option>
                                <option value="wait">منتظر پاسخ کاربر</option>
                                <option value="done">انجام شد</option>
                            </select>
                        </div>
    
    
                        <br>
                        <button id="btn-send-ticket" class="btn btn-sm btn-primary is">
                            تایید
                            <div id="sd-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                                <span class="sr-only">Loading...</span>
                            </div>
    
                        </button>
                    </form>

                </div>
           
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        $("#answer-ticket-form").validate({
            submitHandler: () => {
                $.ajax({
                    url: "/admin/answer-to-ticket",
                    method: "POST",
                    data: {
                        description: $("#description").val(),
                        status: $("#status").val(),
                        id: $("#id").val(),
                        _token: $("#token").val()
                    },
                    beforeSend: () => {
                        $("#btn-send-ticket").prop("disabled", true);
                        $("#btn-send-ticket").find("sd-loading").show();
                    },
                    success: (response) => {
                        
                        Swal.fire({
                            title: "انجام شد",
                            text: "پاسخ ارسال شد",
                            icon: "success",
                            confirmButtonText: "باشه",
                            onClose: () => {
                                location.href = "/admin/new-tickets"
                            }
                        });
                    },
                    error: (err) => {
                        $("#btn-send-ticket").prop("disabled", false);
                        $("#btn-send-ticket").find("sd-loading").hide();
                        Swal.fire({
                            title: "خطا",
                            text: "مشکلی در سرور وجود دارد",
                            icon: "error",
                            confirmButtonText: "باشه",
                        });
                    }
                });
            },
            rules: {
                description: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000
                }
            },
            messages: {
                description: {
                    required: "پر کردن این فیلد الزامی می باشد",
                    minlength: "حداقل باید 10 کاراکتر داشته باشد",
                    maxlength: "حداکثر می تواند 10000 کاراکتر داشته باشد"
                }
            }

        });

    </script>
@endpush
