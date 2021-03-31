@extends('layout.content' , ["title" => "اجاره و خرید ویلا زمین و آپارتمان و پیدا کردن پیمانکار های حرفه ای | پاوز"])
@section('content')
    @include('partials.navbar')
    @include('partials.home.header')
    <div class="container my-5">
        <div class="row justify-content-center villa-content">
            @include('partials.gallery')
            <div class="col-12 col-md-8">
                <div class="villa-info-item">
                    <h2>
                        اجاره ویلا استخر دار همراه با جکوزی
                        <div class="my-rating"></div>
                    </h2>
                    <h5>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        مازندران / رامسر
                    </h5>
                    <br>
                    <span class="d-inline btn btn-sm btn-warning">کد ملک : 11</span>
                    <br>
                    <br>
                    <span>
                        <i class="fa fa-circle"></i>
                        درباره اقامتگاه
                    </span>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته
                        حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان
                        رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                        داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل
                        حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                        گیرد.
                    </p>
                </div>

                <div class="villa-info-item">
                    <ul>
                        <li>
                            <i class="fa fa-home"></i>
                            خانه دربست
                        </li>
                        <li>
                            <i class="fas fa-door-open"></i>
                            4 اتاق
                        </li>
                        <li>
                            <i class="fas fa-building"></i>
                            1000 متر زیربنا ملک
                        </li>
                        <li>
                            <i class="fa fa-tree"></i>
                            جنگلی
                        </li>
                    </ul>
                </div>
                <br>
                <br>
                <div class="villa-info-item info-table float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        اطلاعات مربوط به ملک
                    </h2>
                    <br>

                    <table class="table text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>تعداد طبقات:</td>
                                <td>4</td>
                            </tr>

                            <tr>
                                <td>تعداد واحد هر طبقه:</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>متراژ کل زمین:</td>
                                <td>1500</td>
                            </tr>



                            <tr>
                                <td>مسیر دسترسی:</td>
                                <td>مال رو</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>متراژ ملک:</td>
                                <td>120</td>
                            </tr>



                            <tr>
                                <td>سال ساخت:</td>
                                <td>1400</td>
                            </tr>


                            <tr>
                                <td>نوع مالکیت:</td>
                                <td>دربست</td>
                            </tr>


                            <tr>
                                <td>همسایگی ملک:</td>
                                <td>پراکنده</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="villa-info-item special-table my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        مکان های خاص
                    </h2>

                    <br>
                    <table class="table text-center table-striped table-hover is w-100">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>فاصله زمانی پیاده</th>
                                <th>فاصله زمانی ماشین</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>پمب بزنین</td>
                                <td>5 دقیقه</td>
                                <td>2 دقیقه</td>
                            </tr>
                        </tbody>
                    </table>
                </div>




                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        امکانات رفاهی
                    </h2>
                    <br>

                    <table class="table text-center table-striped table-hover is w-100">

                        <tbody>
                            <tr>
                                <td>تلفن ثابت</td>
                                <td>اقلام بهداشتی</td>
                                <td>اتو</td>
                            </tr>

                            <tr>
                                <td>دوربین مدار بسته</td>
                                <td>سشوار</td>
                                <td>وای فای رایگان</td>
                            </tr>


                            <tr>
                                <td>دوربین مدار بسته</td>
                                <td>سشوار</td>
                                <td>وای فای رایگان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        امکانات آشپزخانه
                    </h2>
                    <br>
                    <table class="table text-center table-striped table-hover is w-100">

                        <tbody>
                            <tr>
                                <td>مایکروفر</td>
                                <td>یخچال</td>
                                <td>گاز</td>
                            </tr>

                            <tr>
                                <td>توستر</td>
                                <td>بشقاب</td>
                                <td>قاشق چنگال</td>
                            </tr>


                            <tr>
                                <td>سماور</td>
                                <td>چاقو</td>
                                <td>قوریl</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        ظرفیت ویلا
                    </h2>
                    <br>

                    <table class="table info-table text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>ظرفیت استاندارد:</td>
                                <td>4</td>
                            </tr>

                            <tr>
                                <td>حداکثر ظرفیت:</td>
                                <td>6</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>تعداد سرویس های بهداشتی:</td>
                                <td>2</td>
                            </tr>

                            <tr>
                                <td>تعداد حمام:</td>
                                <td>3</td>
                            </tr>
                        </tbody>

                    </table>

                </div>





                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        سیستم های گرمایشی و سرمایشی ملک
                    </h2> <br>


                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        سیستم های گرمایشی ویلا
                    </div>


                    <table class="table mt-3 float-right text-center  table-hover is w-100">

                        <tbody>
                            <tr>
                                <td>شوفاژ</td>
                                <td><s>بخاری گازی</s></td>
                                <td><s>بخاری هیزمی</s></td>
                            </tr>
                        </tbody>
                    </table>


                    <br>
                    <br>
                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        سیستم های سرمایشی ویلا
                    </div>
                    <table class="table mt-3 float-right text-center  table-hover is w-100">

                        <tbody>
                            <tr>
                                <td>کولر</td>
                                <td><s>پنکه</s></td>
                                <td><s>کولر آبی</s></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        فضاهای ویلا
                    </h2> <br>


                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        اتاق های ویلا
                    </div>


                    <table class="table text-center mt-3 float-right special-table table-striped table-hover is w-100">

                        <thead>
                            <tr>
                                <th width="25%">عنوان</th>
                                <th width="25%">تخت خواب یک نفره</th>
                                <th width="25%">تخت خواب دو نفره</th>
                                <th width="25%">امکانات</th>
                                <th width="25%">مستر</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>اتاق 1</td>
                                <td>3 عدد</td>
                                <td>2 عدد</td>
                                <td><button class="btn btn-sm btn-outline-primary  is"><i
                                            class="fa fa-eye fa-xs"></i></button></td>
                                <td>نیست</td>
                            </tr>

                            <tr>
                                <td>اتاق 2</td>
                                <td>5 عدد</td>
                                <td>3 عدد</td>
                                <td><button class="btn btn-sm btn-outline-primary  is"><i
                                            class="fa fa-eye fa-xs"></i></button></td>
                                <td>است</td>
                            </tr>
                        </tbody>
                    </table>








                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        استخر های ویلا
                    </div>



                    <div class="table-responsive float-right w-100">

                        <table class="table text-center mt-3 float-right special-table table-hover is w-100">

                            <thead>
                                <tr>
                                    <th>نوع</th>
                                    <th>موقعیت</th>
                                    <th>سیستم گرمایشی</th>
                                    <th>سیستم سرمایشی</th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ک عمق</th>
                                    <th>ب عمق</th>
                                    <th>امکانات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>روباز</td>
                                    <td>حیاط</td>
                                    <td>ندارد</td>
                                    <td>ندارد</td>
                                    <td>1 متر</td>
                                    <td>1 متر</td>
                                    <td>1 متر</td>
                                    <td>1 متر</td>
                                    <td><button class="btn btn-sm btn-outline-primary  is"><i
                                                class="fa fa-eye fa-xs"></i></button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        دیگر موارد مربوط به استخر
                    </div>

                    <table class="table mt-3 float-right text-center  table-hover is w-100">

                        <tbody>
                            <tr>
                                <td>سرسره و امکانات تفریحی</td>
                                <td>دوش آب</td>
                                <td>نردبان</td>
                            </tr>
                        </tbody>
                    </table>











                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        پارکینگ های ویلا
                    </div>



                    <div class="table-responsive float-right w-100">

                        <table class="table text-center mt-3 float-right special-table table-hover is w-100">

                            <thead>
                                <tr>
                                    <th>نوع پارکینگ</th>
                                    <th>ظرفیت ماشین</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>رو باز</td>
                                    <td>5 عدد</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>








                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        ویژگی های حیاط
                    </div>



                    <div class="table-responsive float-right w-100">

                        <table class="table mt-3 float-right text-center  table-hover is w-100">

                            <tbody>
                                <tr>
                                    <td>باغچه</td>
                                    <td>حوض</td>
                                    <td>آلاچیق</td>
                                    <td>زمین بازی</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>












                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        توضیحات بیشتر درباره فضاهای ملک
                    </div>

                    <br>
                    <br>
                    <p class="float-right w-100 mt-3">

                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد
                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد
                        گذشته
                        حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد.
                    </p>









                </div>







                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        مقررات ویلا
                    </h2>

                    <br>


                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        مقررات زمانی ملک
                    </div>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>ساعت تحویل:</td>
                                <td>08:00 AM</td>
                            </tr>

                            <tr>
                                <td>ساعت تخلیه:</td>
                                <td>08:00 PM</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>حداقل اقامت:</td>
                                <td>5 روز</td>
                            </tr>

                            <tr>
                                <td>توضیحات بیشتر:</td>
                                <td>ندارد</td>
                            </tr>
                        </tbody>

                    </table>



                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        دیگر مقررات ملک
                    </div>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>آوردن حیوان خانگی:</td>
                                <td>در بیرون ملک</td>
                            </tr>

                            <tr>
                                <td>استعمال دخانیات:</td>
                                <td>در بیرون ملک</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>برگذاری جشن:</td>
                                <td>هماهنگ با صاحبخانه</td>
                            </tr>

                            <tr>
                                <td>توضیحات بیشتر:</td>
                                <td>ندارد</td>
                            </tr>
                        </tbody>

                    </table>
                </div>





                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        قیمت گذاری ویلا
                    </h2>

                    <br>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>روز های وسط هفته:</td>
                                <td>120000 تومان</td>
                            </tr>

                            <tr>
                                <td>روز های آخر هفته:</td>
                                <td>150000 تومان</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>قیمت ایام پیک:</td>
                                <td>200000 تومان</td>
                            </tr>

                            <tr>
                                <td>قیمت اضافه به ازای هر نفر:</td>
                                <td>30000 تومان</td>
                            </tr>
                        </tbody>

                    </table>

                </div>



                <br>
                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        آدرس ویلا
                    </h2>

                    <br>

                    <p>رامسر - ساداتشهر - اربکله - کوچه امین 1 - طبقه سوم</p>
                </div>


                <div id="mapid"></div>
                <br>

                <br>
                <br>
                <div class="villa-info-item info-table float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        امتیاز های مهمان
                    </h2>
                    <br>

                    <table class="table text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>صحت مطالب:</td>
                                <td>
                                    <div class="accuracy_of_content"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>تحویل به موقع:</td>
                                <td>
                                    <div class="timely_delivery"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>برخورد میزبان:</td>
                                <td>
                                    <div class="host_encounter"></div>
                                </td>
                            </tr>





                        </tbody>
                    </table>


                    <table class="table text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>کیفیت نسبت به قیمت:</td>
                                <td>
                                    <div class="quality"></div>
                                </td>
                            </tr>



                            <tr>
                                <td>پاکیزگی اقامتگاه:</td>
                                <td>
                                    <div class="purity"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>آدرس اقامتگاه:</td>
                                <td>
                                    <div class="address"></div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <br>
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        درج نظر
                    </h2>

                    <br>

                    <form action="" class="form">

                        <div class="form-group">
                            <label for="title">عنوان:</label>
                            <input type="text" name="title" id="title" class="form-control bg-white"
                                placeholder="عنوان نظر خود درباره این ویلا را وارد نمایید">
                        </div>



                        <div class="form-group">
                            <label for="email">پست الکترونیکی:</label>
                            <input type="text" name="email" id="email" class="form-control bg-white"
                                placeholder="پست الکترونیکی خود را وارد نمایید">
                        </div>

                        <div class="form-group">
                            <label for="address">آدرس:</label>
                            <textarea name="address" style="height: 200px" id="address" class="form-control bg-white"
                                placeholder="نظر خود را وارد نمایید"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-sm btn-primary is">ثبت نظر</button>
                    </form>
                </div>


                <div class="comments w-100 d-block">
                    <ul>
                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>


                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="user-img">
                                <img src="{{ asset('images/user.png') }}" alt="User Logo">
                            </div>
                            <div class="user-title">
                                <h4>
                                    حمیدرضا رمضانی

                                    <button class="btn btn-sm  float-left text-secondary">
                                        <i class="fa fa-share"></i>
                                    </button>


                                    <button class="btn btn-sm  float-left text-danger">
                                        5
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </h4>
                                <span>4 روز پیش</span>
                            </div>
                            <div class="comment-text">
                                <p>
                                    موقعیت مکانیش عالی بود بسیار زیبا و بکر و جذاب ولی خونه خونه قدیمی سرویس بهداشتی بسیار
                                    کثیف آب در کف سرویس جمع می‌شود دوش خراب مشکل داشت و امکان استحمام وجود نداشت.

                                </p>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
            <div class="col-12 col-md-4">
                <div class="user-call-info">
                    <img src="{{ asset('upload/1617049251.jpg') }}" alt="">
                    <h3>حمیدرضا رمضانی</h3>
                    <br>
                    <div class="call-ways">
                        <button class="btn btn-sm btn-primary is">
                            <i class="fa fa-phone"></i>&nbsp;
                            تماس
                        </button>
                        <button class="btn btn-sm mx-2 btn-primary is">
                            <i class="fab fa-telegram"></i>&nbsp;
                            تلگرام
                        </button>

                        <button class="btn btn-sm mx-2 btn-primary is">
                            <i class="fa fa-envelope"></i>&nbsp;
                            پیامک
                        </button>

                    </div>
                    <br>
                    <br>
                </div>


                <br>
                <br>
                <div class="mt-3 user-call-info p-3">
                    <div class="w-50 float-right p-1">
                        <span>از تاریخ</span>
                        <input type="text" name="date-in" class="date-in reserve-input" id="date-in">
                    </div>
                    <div class="w-50 float-right p-1">
                        <span>تا تاریخ</span>
                        <input type="text" name="date-out" class="date-out reserve-input" id="date-out">


                    </div>
                    <form action="" class="form">
                        <div class="form-group float-right w-100 mt-2">
                            <label for="guests">تعداد مهمانان:</label>
                            <input type="number" name="guests" id=guests" class="form-control bg-white text-right"
                                placeholder="تعداد مهمانان را مشخص کنید">
                        </div>



                        <div class="form-group float-right w-100">
                            <label for="fullname">نام و نام خانوادگی:</label>
                            <input type="text" name="fullname" id=fullname" class="form-control bg-white text-right"
                                placeholder="نام و نام خانوادگی را وارد نمایید">
                        </div>




                        <div class="form-group float-right w-100">
                            <label for="phonenumber">شماره تماس:</label>
                            <input type="text" name="phonenumber" id=phonenumber" class="form-control bg-white text-right"
                                placeholder="شماره تماس را وارد نمایید">
                        </div>

                        <button class="btn my-3 btn-sm btn-block btn-primary is float-right w-100">ثبت درخواست رزرو</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @include('partials.home.footer')

@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('styles/persian-datepicker.min.css') }}" />
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>

    <script>
        let lat = 35.6892;
        let long = 51.3890;
        let latlong = [lat, long];
        var mymap = L.map("mapid").setView([lat, long], 15);
        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }
        ).addTo(mymap);

        setInterval(() => {
            mymap.invalidateSize(true);
        }, 0);


        $(".date-in").pDatepicker({
            minDate: new persianDate().unix(),
            initialValue: false
        });



        $(".date-out").pDatepicker({
            minDate: new persianDate().unix(),
            initialValue: false
        });

        $(document).ready(function() {

            $(".my-rating").starRating({
                initialRating: 4,
                starSize: 20,

            });


            function setScore(name, score) {
                const url = `/scores/${name}/9/${score}`;
                $.ajax({
                    method: "GET",
                    url,
                    success: () => {
                        Swal.fire({
                            title: "انجام شد",
                            text: "امتیاز ثبت شد",
                            icon: "success",
                            confirmButtonText: "باشه",
                        });
                    },
                    error: (err) => {
                        if (err.status == 401) {
                            Swal.fire({
                                title: "خطا",
                                text: "برای امتیاز دادن باید به حساب خود ورود کنید",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });
                            return
                        } else {
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "باشه",
                            });
                        }

                    }
                });
            }

            $(".accuracy_of_content").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-accuracy-of-content", score)
                }
            });



            $(".timely_delivery").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-timely-delivery", score)
                }
            });



            $(".host_encounter").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-host-encounter", score);
                }
            });



            $(".quality").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-quality", score);
                }
            });




            $(".purity").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-purity", score);
                }
            });


            

            $(".address").starRating({
                initialRating: 4,
                starSize: 20,
                callback: (score) => {
                    setScore("set-address", score);
                }
            });





        });

    </script>
@endpush
