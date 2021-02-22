@extends('layout.panel' , ["title" => "ثبت ویلای جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            @isfullready
            <div class="col-11 col-md-12 dashboard-info-item-content new-villa">
                @include('partials.panel.items.title' , ["title" => "ثبت ویلای جدید" , "description" => "میتوانید از این بخش
                آگهی ویلای خود را ثبت کنید."])
                <br>
                @include('partials.panel.villa.new-villa.form-steps')        
                <div class="p-3 sections">
                    @include('partials.panel.villa.new-villa.specification-data')
                    @include('partials.panel.villa.new-villa.home-info')
                    @include('partials.panel.villa.new-villa.spaces')                    
                    @include('partials.panel.villa.new-villa.possibilities')                    
                    @include('partials.panel.villa.new-villa.address')                    
                    @include('partials.panel.villa.new-villa.rules')                    
                    <section>HI 7</section>
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
