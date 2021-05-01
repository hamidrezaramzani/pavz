@extends('layout.content' , ["title" => "درباره پاوز" , "description" => "درباره وبسایت پاوز"])
@section('content')

    <div class="container py-5">
        <div class="row text-center about-us justify-content-center my-5">
            <div class="col-12 col-md-6 p-5 ">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>درباره ما</h2>
                <p>
                    ما در پاوز سعی کردیم تا برترین امکاناتی که شما میخواهید را به بهترین شکل برای شما آماده کنیم. این
                    امکانات شامل خرید و فروش ویلا و سوییت و رهن و اجاره و فروش آپارتمان و فروش زمین میباشند .
                </p>
                <br>
                <br>
                <br>

                <h2>تماس با ما</h2>
                <p>شماره تلفن : 09300152714</p>
                <p>شماره تلفن : 09010406467</p>
                <ul>
                    <li>
                        <button class="btn btn-sm btn-outline-danger is">
                            <i class="fab fa-instagram"></i>
                        </button>
                    </li>
                    <li>

                        <button class="btn btn-sm btn-outline-info is">
                            <i class="fab fa-twitter"></i>
                        </button>
                    </li>
                    <li>

                        <button class="btn btn-sm btn-outline-primary is">
                            <i class="fab fa-telegram"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 px-5 about-us-bg">
                <img src="{{ asset('images/us.png') }}" width="100%" alt="US">
            </div>
        </div>
    </div>
@endsection
