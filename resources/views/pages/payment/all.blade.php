@extends('layout.panel' , ["title" => "مدیریت پرداخت ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>پرداخت های اخیر</h3>
                <br>
                <div class="table-resposive">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>زمان تراکنش</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $item)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{ $item->vip->title }}</td>
                                    <td>{{ jdate($item->created_at)->format('%Y/%m/%d - %A') }}</td>
                                    <td>
                                        @if ($item->status == 10)
                                            <span class="text-success">موفق</span>
                                        @else
                                            <span class="text-danger">ناموفق</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
        
                        </tbody>
                </div>
            </div>

        </div>
    </div>
@endsection
