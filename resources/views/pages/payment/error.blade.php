@extends('layout.content' , ["title" => "خطا در انجام تراکنش"])
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 error-payment">
            @switch($status)
                @case(1)
                    <h1>پرداخت انجام نشده است</h1>
                @break
                @case(2)
                    <h1>پرداخت ناموفق بوده است</h1>
                @break
                @case(3)
                    <h1>خطا رخ داده است</h1>
                @break
                @case(4)
                    <h1>بلوکه شده است</h1>
                @break
                @case(5)
                    <h1>برگشت به پرداخت کننده</h1>
                @break

                @case(6)
                    <h1>برگشت خورده سیستمی</h1>
                @break

                @case(7)
                    <h1>انصراف از پرداخت</h1>
                @break

                @case(8)
                    <h1>به درگاه پرداخت منتقل شد</h1>
                @break

                @case(400)
                    <h1>مشکلی در تایید پرداخت وجود دارد</h1>
                @break
                @default
                <h1>این رسید قبلا اعتبار سنجی شده است</h1>
                @break;
            

            @endswitch
            <br>
            <a href="/panel" class="is d-block text-center btn btn-sm btn-primary">بازگشت به داشبورد</a>
        </div>
    </div>
@endsection
