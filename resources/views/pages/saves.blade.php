@extends('layout.panel' , ["title" => "آگهی های ذخیره شده | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>آگهی های ذخیره شده</h3>
                <br>
                <br>
                <ul class="nav nav-tabs is" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="villa-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">ویلا</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="apartment-tab" data-bs-toggle="tab" data-bs-target="#apartment"
                            type="button" role="tab" aria-controls="apartment" aria-selected="false">آپارتمان</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="area-tab" data-bs-toggle="tab" data-bs-target="#area"
                            type="button" role="tab" aria-controls="area" aria-selected="false">زمین</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shop-tab" data-bs-toggle="tab" data-bs-target="#shop"
                            type="button" role="tab" aria-controls="shop" aria-selected="false">مغازه</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                        <div class="table-responsive">
                            <table class="table text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50%">کد</th>
                                        <th width="50%">آگهی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$villas->count())
                                        <td colspan="2" class="is text-danger text-center">چیزی از ویلا ها ذخیره نکردید</td>
                                    @endif
                                    @foreach ($villas as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="/villa/{{ $item->saveable_id }}">نمایش آگهی</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="apartment" role="tabpanel" aria-labelledby="apartment-tab">
                        <div class="table-responsive">
                            <table class="table text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50%">کد</th>
                                        <th width="50%">آگهی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$apartments->count())
                                        <td colspan="2" class="is text-danger text-center">چیزی از آپارتمان ها ذخیره نکردید
                                        </td>
                                    @endif
                                    @foreach ($apartments as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="/apartment/{{ $item->saveable_id }}">نمایش آگهی</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
                        <div class="table-responsive">
                            <table class="table text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50%">کد</th>
                                        <th width="50%">آگهی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$areas->count())
                                        <td colspan="2" class="is text-danger text-center">چیزی از زمین ها ذخیره نکردید</td>
                                    @endif
                                    @foreach ($areas as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="/area/{{ $item->saveable_id }}">نمایش آگهی</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                        <div class="table-responsive">
                            <table class="table text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50%">کد</th>
                                        <th width="50%">آگهی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$shops->count())
                                        <td colspan="2" class="is text-danger text-center">چیزی از مغازه ها ذخیره نکردید
                                        </td>
                                    @endif
                                    @foreach ($shops as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="/shop/{{ $item->saveable_id }}">نمایش آگهی</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
