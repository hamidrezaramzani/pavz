@extends('layout.panel' , ["title" => "ویرایش ویلای جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            @isfullready
            @if ($data->status == 'checking')
                <div class="col-12 col-md-12 text-center dashboard-info-item-content is-checking">
                    <br>
                    <img src="{{ asset('images/icons/warning.png') }}" alt="Warning Icon">
                    <br>
                    <h2>این آگهی در دست بررسی است.</h2>
                    <p>در زمان بررسی آگهی نمیتوان آن را ویرایش کرد</p>
                    <br>
                    <br>
                    <a href="{{ '/manage/villas/' . $data->id }}" class="btn btn-sm btn-primary is">مدیریت ویلا ها</a>
                </div>
            @else
                <div class="col-12 col-md-12 dashboard-info-item-content new-villa">
                    @include('partials.panel.items.title' , ["title" => $data->ads_type != 1 ? "ویرایش آگهی فروش ویلا" :
                    "ویرایش
                    آگهی اجاره ویلا" , "description" => "از این بخش
                    میتوانید ویلای خود را ویرایش کنید برای دسترسی به همه ویلاهای ثبت شده به بخش همه ویلا ها بروید"])
                    <br>
                    @include('partials.panel.villa.new-villa.form-steps')
                    <div class="p-3 sections">
                        @foreach ($forms as $key => $form)
                            @if ($key == $data->level)
                                @include('partials.panel.villa.new-villa.' . $form , ["show" => true])
                            @else
                                @include('partials.panel.villa.new-villa.' . $form , ["show" => false])
                            @endif
                        @endforeach
                    </div>
                    @include('partials.panel.villa.new-villa.new-pool')
                    @include('partials.panel.villa.new-villa.new-room')
                    @include('partials.panel.villa.new-villa.new-parking')
                    @include('partials.panel.villa.new-villa.new-special-place')
                </div>
        </div>
        @endif

    @else
        @include('partials.panel.complete-profile')
        @endisfullready
    </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/new-rent-villa.js') }}"></script>
@endpush
