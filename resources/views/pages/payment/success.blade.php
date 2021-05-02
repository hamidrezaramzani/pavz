@extends('layout.content' , ["title" => "تراکنش با موفقیت انجام شد"])
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 success-payment">
            @switch($id)
                @case(1)
                    <h1>پرداخت انجام شد - اشتراک 1 ماهه شما فعال شد</h1>
                @break
                @case(2)
                    <h1>پرداخت انجام شد - اشتراک 3 ماهه شما فعال شد</h1>
                @break
                @case(3)
                    <h1>پرداخت انجام شد - اشتراک 6 ماهه شما فعال شد</h1>
                @break

            @endswitch
            <br>
            <a href="/panel" class="is d-block text-center btn btn-sm btn-primary">بازگشت به داشبورد</a>
        </div>
    </div>
@endsection
