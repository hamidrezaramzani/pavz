@extends('layout.panel' , ["title" => "ثبت ویلای جدید | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            @isfullready
            <div class="col-11 col-md-9 dashboard-info-item-content new-villa">
                <h2>ثبت ویلا</h2>
                <p>چنانچه میخواهید ویلای جدید ثبت آگهی نمایید میتوانید از فرم های زیر اقدام نمایید</p>
                <br>
                <div class="form-part-nav">
                    <div class="form-part-nav-item active">
                        <i class="fa fa-book"></i>
                        <span>اطلاعات اولیه</span>
                    </div>
                    <div class="form-part-nav-item">
                        <i class="fa fa-picture-o"></i>
                        <span>عکس ها</span>
                    </div>
                    <div class="form-part-nav-item">
                        <i class="fa fa-home"></i>
                        <span>اطلاعات اولیه</span>
                    </div>
                    <div class="form-part-nav-item">
                        <i class="fa fa-home"></i>
                        <span>اطلاعات اولیه</span>
                    </div>


                </div>
            </div>
        @else
            <div class="col-11 col-md-9 dashboard-info-item-content text-center position-relative new-villa ">
                <div class="center">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <img src="{{ asset('images/icons/warning.png') }}" alt="Warning icon in pavz">
                    <h2>پروفایل شما کامل نیست</h2>
                    <p>پروفایل شما کامل نیست. جهت ثبت ویلا باید پروفایل خود را کامل پر کنید.</p>
                    <br>
                    <br>
                    <a href="/profile" class="btn btn-sm btn-block btn-warning is">تغییر پروفایل</a>
                </div>

            </div>
            @endisfullready
        </div>
    </div>
@endsection
