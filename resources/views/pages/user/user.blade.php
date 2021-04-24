@extends('layout.content' , ["title" => "پروفایل کاربری | پاوز"])
@section('content')
    @include('partials.loading')
    @include('partials.home.header')
    @include('partials.navbar')
    @include('partials.share')
    <div class="row user-profile-header py-5">
        <div class="col-12 col-md-8 px-5 py-5">
            <h2>{{ $user->profile->fullname }}</h2>
            <p>{{$user->profile->bio}}</p>
        </div>
        <div class="col-12 col-md-4 px-5 py-5">
            <a href="https://t.me/{{$user->profile->telegram_id}}" class="btn btn-sm btn-info is text-light float-left mx-3">

                تلگرام
                <i class="fab fa-telegram"></i>
            </a>
            <a href="https://instagram.com/{{$user->profile->instagram_id}}" class="btn btn-sm btn-danger is float-left ">اینستاگرام
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="container-fluid">
        <div class="row user-profile-content justify-content-center">
            <div class="col-12 col-md-3 px-3 my-3 my-md-0">
                <div class="profile-details">
                    <div class="profile-details-img">
                        <img src="{{ asset($user->profile->image ? 'upload/' . $user->profile->image : 'images/user.png') }}"
                            alt="">
                    </div>
                    <div class="profile-details-count">
                        <ul>
                            <li>
                                <span>{{$user->comments()->count()}}</span>
                                <span>نظرات</span>
                            </li>
                            <li>
                                <span>{{
                                    $villas->count()  + $apartments->count() + $areas->count() + $shops->count()
                                    }}</span>
                                <span>آکهی ها</span>
                            </li>
                            <li>
                                <span>{{$likes}}</span>
                                <span>پسند ها</span>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>تاریخ عضویت</th>
                                <td>{{jdate($user->created_at)->format("%d %B %Y")}}</td>
                            </tr>

                            <tr>
                                <th>اینستاگرام</th>
                                <td>
                                    <a href="https://instagram.com/{{$user->profile->instagram_id}}" class="btn btn-sm btn-danger">ارتباط</a>
                                </td>
                            </tr>

                            <tr>
                                <th>تلگرام</th>
                                <td>
                                    <a href="https://t.me/{{$user->profile->telegram_id}}" class="btn btn-sm btn-info">ارتباط</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-7 px-3">
                <div>
                    <h3>آگهی های کاربر</h3>
                    <br>
                    <ul class="nav nav-tabs is" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa"
                                type="button" role="tab" aria-controls="home" aria-selected="true">ویلا</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="apartment-tab" data-bs-toggle="tab" data-bs-target="#apartment"
                                type="button" role="tab" aria-controls="apartment" aria-selected="false">آپارتمان</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="area-tab" data-bs-toggle="tab" data-bs-target="#area" type="button"
                                role="tab" aria-controls="area" aria-selected="false">زمین</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shop-tab" data-bs-toggle="tab" data-bs-target="#shop" type="button"
                                role="tab" aria-controls="shop" aria-selected="false">مغازه</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="villa" role="tabpanel" aria-labelledby="villa-tab">

                            <div class="row">
                                @if ($villas->count())
                                    @foreach ($villas as $item)
                                        <div class="col-12 col-md-5">
                                            @include('partials.home.villa-item' , ["item" => $item])
                                        </div>
                                    @endforeach
                                @else
                                    <p class="d-block py-5 my-5 text-danger is text-center d-block w-100">کاربر آگهی
                                        ویلایی
                                        منتشر نکرده است</p>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="apartment" role="tabpanel" aria-labelledby="apartment-tab">

                            <div class="row">

                                @if ($apartments->count())
                                    @foreach ($apartments as $item)
                                        <div class="col-12 col-md-5">
                                            @include('partials.home.apartment-item' , ["item" => $item])
                                        </div>
                                    @endforeach
                                @else
                                    <p class="d-block py-5 my-5 text-danger is text-center d-block w-100">کاربر آگهی
                                        آپارتمانی
                                        منتشر نکرده است</p>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
                            <div class="row">

                                @if ($areas->count())
                                    @foreach ($areas as $item)
                                        <div class="col-12 col-md-5">
                                            @include('partials.home.area-item' , ["item" => $item])
                                        </div>
                                    @endforeach
                                @else
                                    <p class="d-block py-5 my-5 text-danger is text-center d-block w-100">کاربر آگهی زمینی
                                        منتشر نکرده است</p>
                                @endif


                            </div>

                        </div>
                        <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            @if ($shops->count())
                                @foreach ($shops as $item)
                                    <div class="col-12 col-md-5">
                                        @include('partials.home.shop-item' , ["item" => $item])
                                    </div>
                                @endforeach
                            @else
                                <p class="d-block py-5 my-5 text-danger is text-center d-block w-100">کاربر آگهی مغازه ای
                                    منتشر نکرده است</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.home.footer')
@endsection
@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
