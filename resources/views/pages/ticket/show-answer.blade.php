@extends('layout.panel' , ["title" => "پاسخ های این تیکت | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content p-5">

                <form action="" class="form" id="answer-form">
                    <div class="form-group">
                        <label for="description">پاسخ:</label>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="پاسخ خود را وارد نمایید"></textarea>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id" value="{{ $ticket->id }}">
                    <br>
                    <button class="btn is btn-sm btn-primary">
                        پاسخ
                        <div id="d-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <br>
                    <br>


                </form>
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





                <div class="ticket">
                    <h3>
                        {{ $ticket->title }}
                        <span class="float-left"><span
                                class="text-secondary">{{ jdate($ticket->created_at)->format('%Y/%m/%d - %A') }}</span> -
                            {{ $ticket->id }}#</span>
                    </h3>
                    <br>
                    <p>{{ $ticket->description }}</p>
                    <br>
                    <br>
                    <a href="{{ asset('user/tickets/' . $ticket->attach) }}" class="btn btn-sm btn-primary">دانلود
                        پیوست</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script>
        $("#answer-form").validate({
            submitHandler: () => {
                const data = {
                    description: $("#description").val(),
                    id: $("#id").val(),
                    _token: $("#token").val()
                };

                $.ajax({
                    method: "POST",
                    url: "/ticket/answer-user",
                    data,
                    beforeSend: () => {
                        $("#d-loading").show();
                    },
                    success: () => {
                        $("#d-loading").hide();
                        Swal.fire({
                            title: "انجام شد",
                            text: "پاسخ شما ارسال شد",
                            icon: "success",
                            confirmButtonText: "باشه",
                            onClose: () => {
                                location.reload()
                            }
                        });


                    },
                    error: (err) => {
                        console.log(err);
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
                description: {
                    required: true,
                    minlength: 10
                },
            },
            messages: {
                description: {
                    required: "پر کردن این فیلد الزامی میباشد",
                    minlength: "حداقل باید 10 کاراکتر داشته باشد"
                },
            }
        });

    </script>
@endpush
