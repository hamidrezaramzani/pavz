@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])

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


                    </div>
                @endif

            </div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <script src="{{ asset('js/RBSlideshow.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
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
