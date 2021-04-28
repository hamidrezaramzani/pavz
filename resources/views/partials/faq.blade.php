@extends('layout.content' , ["title" => "سوالات متداول" , "description" => "سوالات متداولی که درباره سایت پاوز دارید را میتوانید در اینجا مشاهده نمایید"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')

    <div class="container py-5">
        <div class="row text-center about-us justify-content-center my-5">
            <div class="col-12 col-md-8 p-5 faq">
                <br>
                <br>
                <h2>سوالات متداول</h2>
                <br>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                چه امکاناتی در سایت ارائه میشود؟
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                در این سایت امکاناتی مثل ثبت آگهی ویلا اعم از فروش و اجاره ، ثبت آگهی سوییت اعم از فروش و
                                اجاره ، ثبت آگهی آپارتمان اعم از فروش و رهن ، ثبت آگهی زمین و ثبت آگهی مغازه اعم از فروش و
                                اجاره را داراست
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                آیا تمامی امکانات و خدمات سایت رایگان است؟
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                بله.شما میتوانید تمامی آگهی های خود را به صورت رایگان و نامحدود ایجاد نمایید و از تمامی
                                امکانات سایت به صورت رایگان استفاده نمایید.اما در صورتی که بخواهید آگهی ویژه ثبت کنید باید
                                اشتراک ویژه بخرید
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                در صورت داشتن سوال یا بیان مشکل چه کنیم؟
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                شما میتوانید با ثبت نام و تیکت زدن یا تماس گرفتن با ما از طریق یکی از راه های ارتباطی این
                                کار رو انجام بدین
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    @include('partials.home.footer')
    @include('partials.gototop')
@endsection
