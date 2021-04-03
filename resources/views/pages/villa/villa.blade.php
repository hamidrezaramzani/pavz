@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">

            @include('partials.gallery' , ["images" => $data->pictures()->get()])
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
                @include('pages.villa.sections.scores' , ["data" => $data])
                @include('pages.villa.sections.add-comment' , ["data" => $data])
                @include('pages.villa.sections.comments' , ["data" => $data])
                

            </div>
            <div class="col-12 col-md-4">
                
                @include('pages.villa.sections.user' , ["data" => $data])

                <div class="mt-3 user-call-info p-3">
                    <div class="w-50 float-right p-1">
                        <span>از تاریخ</span>
                        <input type="text" name="date-in" class="date-in reserve-input" id="date-in">
                    </div>
                    <div class="w-50 float-right p-1">
                        <span>تا تاریخ</span>
                        <input type="text" name="date-out" class="date-out reserve-input" id="date-out">


                    </div>
                    <form action="" class="form">
                        <div class="form-group float-right w-100 mt-2">
                            <label for="guests">تعداد مهمانان:</label>
                            <input type="number" name="guests" id=guests" class="form-control bg-white text-right"
                                placeholder="تعداد مهمانان را مشخص کنید">
                        </div>



                        <div class="form-group float-right w-100">
                            <label for="fullname">نام و نام خانوادگی:</label>
                            <input type="text" name="fullname" id=fullname" class="form-control bg-white text-right"
                                placeholder="نام و نام خانوادگی را وارد نمایید">
                        </div>




                        <div class="form-group float-right w-100">
                            <label for="phonenumber">شماره تماس:</label>
                            <input type="text" name="phonenumber" id=phonenumber" class="form-control bg-white text-right"
                                placeholder="شماره تماس را وارد نمایید">
                        </div>

                        <button class="btn my-3 btn-sm btn-block btn-primary is float-right w-100">ثبت درخواست رزرو</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('styles/persian-datepicker.min.css') }}" />
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/villa.js') }}"></script>
        
    
@endpush
