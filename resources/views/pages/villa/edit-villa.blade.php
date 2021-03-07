@extends('layout.panel' , ["title" => "ویرایش ویلای جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            @isfullready
            <div class="col-12 col-md-12 dashboard-info-item-content new-villa">
                @include('partials.panel.items.title' , ["title" => "ویرایش آگهی ویلا" , "description" => "از این بخش
                میتوانید ویلای خود را ویرایش کنید برای دسترسی به همه ویلاهای ثبت شده به بخش همه ویلا ها بروید"])
                <br>
                @include('partials.panel.villa.new-villa.form-steps')
                <div class="p-3 sections">
                    @include('partials.panel.villa.new-villa.specification-data')
                    @include('partials.panel.villa.new-villa.home-info')
                    @include('partials.panel.villa.new-villa.spaces')
                    @include('partials.panel.villa.new-villa.possibilities')
                    @include('partials.panel.villa.new-villa.address')
                    @include('partials.panel.villa.new-villa.rules-documents')
                    @include('partials.panel.villa.new-villa.pricing')
                    @include('partials.panel.villa.new-villa.pictures')
                </div>
                @include('partials.panel.villa.new-villa.new-pool')
                @include('partials.panel.villa.new-villa.new-room')
                @include('partials.panel.villa.new-villa.new-parking')
                @include('partials.panel.villa.new-villa.new-special-place')
            </div>
        </div>
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
