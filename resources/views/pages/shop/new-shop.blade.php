@extends('layout.panel' , ["title" => "ثبت مغازه جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3 dashboard-info-item-content">
            @isfullready
            <div class="col-12 col-md-12 dashboard-info-item-content p-3">

                @include('partials.panel.items.title' , ["title" => "ثبت مغازه جدید" , "description" => "میتوانید از این بخش
                آگهی مغازه خود را ثبت کنید."])
                <br>

                <form action="/shop/create" method="POST" class="form">
                    @csrf
                    <div class="form-group" id="first-s-input">
                        <label for="ads_type">این آگهی جهت :</label>
                        <select name="ads_type" id="ads_type" name="ads_type" class="form-control">
                            <option value="1">فروش مغازه است</option>
                            <option value="2">اجاره مغازه است</option>

                        </select>
                    </div>
                    <br>
                    <div class="accordion-title">
                        <i class="far fa-circle"></i>
                        این مورد را بعدن نمیتوانید تغییر دهید بنابرین با دقت تغییر دهید
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary is text-center">ادامه</button>
                </form>
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
@endpush
