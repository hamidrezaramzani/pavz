@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز" , "description" => $data->title])

@section('content')
    @include('partials.loading')
    @include('pages.slideshow' , ["images" => $data->pictures()->get() , "folder" => "villa_pictures"])
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">
            @include('partials.gallery' , ["images" => $data->pictures()->get() , "folder" => "villa_pictures"])
            <div class="col-12 col-md-8">
                @include('pages.villa.sections.main' , ["data" => $data])
                @include('pages.villa.sections.home' , ["data" => $data])
                @include('pages.villa.sections.special-places' , ["data" => $data])
                @include('pages.villa.sections.welfare-possiblities' , ["data" => $data])
                @include('pages.villa.sections.kitchen-facilities' , ["data" => $data])
                @include('pages.villa.sections.temperature-systems' , ["data" => $data])
                @include('pages.villa.sections.spaces' , ["data" => $data])
                @include('pages.villa.sections.rules' , ["data" => $data])
                @include('pages.villa.sections.pricing' , ["data" => $data])
                @include('pages.villa.sections.address' , ["data" => $data])
                @if ($data->ads_type == 1)
                    @include('pages.villa.sections.scores' , ["data" => $data])
                    @include('pages.add-comment' , ["data" => $data])
                    @include('pages.comments' , ["data" => $data])
                @endif

            </div>
            <div class="col-12 col-md-4">

                @include('pages.user' , ["data" => $data])

                @if ($data->ads_type == 1)
                    <div class="mt-3 user-call-info p-4">
                        <form action="" class="form" id="reserve-form">
                            <div class="w-50 float-right p-1">
                                <span>از تاریخ</span>
                                <input name="date-in" class="date-in datepicker form-control bg-white text-right"
                                    id="date-in">
                            </div>

                            <input type="hidden" name="user_id" id="user_id" value="{{ $data->user->id }}">

                            <div class="w-50 float-right form-group p-1">
                                <span>تا تاریخ</span>
                                <input name="date-out" class="form-control datepicker date-out bg-white text-right"
                                    id="date-out">
                            </div>

                            <div class="form-group float-right w-100 mt-2">
                                <label for="guests">تعداد مهمانان:</label>
                                <select name="guests" id="guests" class="form-control bg-white text-right">
                                    @for ($i = 1; $i <= $data->max_capacity; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group float-right w-100">
                                <label for="fullname">نام و نام خانوادگی:</label>
                                <input type="text" name="fullname" id="fullname" class="form-control bg-white text-right"
                                    placeholder="نام و نام خانوادگی را وارد نمایید">
                            </div>



                            <div class="form-group float-right w-100">
                                <label for="phonenumber">شماره تماس:</label>
                                <input type="text" name="phonenumber" id="phonenumber"
                                    class="form-control bg-white text-right" placeholder="شماره تماس را وارد نمایید">
                            </div>

                            <button class="btn my-3 btn-sm btn-block btn-primary is float-right w-100">
                                ثبت درخواست رزرو
                                <div id="reserve-loading" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </form>
                        <br>
                        <br>
                        <a href="" class="text-center text-dark d-block is" id="reserve-faq">رزرو ویلا چگونه انجام
                            میگیرد؟</a>

                    </div>

                    
                <div class="modal fade" id="reserveFaqModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="reserveFaqModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reserveFaqModalLabel">رزرو ویلا چگونه انجام میگیرد؟</h5>
                        </div>
                        <div class="modal-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            رزرو چگونه انجام میگیرد؟
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="is text-right">
                                                شما با پر کردن فیلد های زیر میتوانید درخواست رزرو خود را برای میزبان
                                                ارسال کنید.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            بعد از درخواست رزرو چگونه از وضعیت آن خبردار بشویم؟
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="is text-right">
                                                بعد از ثبت درخواست رزرو شما این درخواست برای میزبان ارسال میشود و میزبان
                                                در صورت آمادگی قبول شدن یا رد شدن درخواست شما را تایید میکند. و پیامی به
                                                شماره شما برای تعیین کردن اینکه رزرو ویلای شما موفقیت آمیز بود یا نه
                                                ارسال میشود.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            چگونه با میزبان تماس بگیرم؟
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="is text-right">
                                                بعد از قبول کردن رزرو شماره تلفن میزبان برای شما ارسال میشود و شما
                                                میتوانید با میزبان تماس بگیرید
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            چگونه میتوانم رزرو را لغو کنم
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="is text-right">
                                                برای لغو میتوانید با میزبان تماس بگیرید و به او بگویید که تغاضای لغو را دارید و میزبان هم درخواست شما را لغو میکند.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary is" data-bs-dismiss="modal">برگشت</button>
                        </div>
                    </div>
                </div>
            </div>

                @endif


            </div>
        </div>
    </div>

    @include('partials.home.footer')
    @include('partials.gototop')

@endsection
@push('scripts')
    <script src="{{ asset('js/RBSlideshow.js') }}"></script>
    <script src="{{ asset('js/myapp.js') }}"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.fa.min.js') }}"></script>
    <script src="{{ asset('js/save.js') }}"></script>
    <script src="{{ asset('js/villa.js') }}"></script>
@endpush
