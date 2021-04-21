@extends('layout.panel' , ["title" => "خرید اشتراک ویژه | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>خرید اشتراک ویژه</h3>
                <br>
                <br>
                @include("partials.vip-advantage");

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

                                    <th width="25%">{{ $index + 1 }}</th>
                                    <th width="25%">{{ $item->title }}</th>
                                    <th width="25%">{{ $item->price }} تومان</th>
                                    <th width="25%">
                                        <a href="/zarinpall">
                                            خرید
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                {{-- <div class="alert alert-info vip-advantages">
                    <h4>
                        <i class="fa fa-circle fa-xs"></i>
                        مزایای خرید اشتراک ویژه
                    </h4>
                    <br>
                    <span></span>
                </div> --}}
            </div>

        </div>
    </div>
@endsection
