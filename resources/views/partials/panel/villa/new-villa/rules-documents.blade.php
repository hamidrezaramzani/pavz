<section>

    @if ($data->ads_type == 1)

        <div id="rules">
            <form action="" id="rules-form" class="form">

                <input type="hidden" id="rules_token" value="{{ csrf_token() }}">
                <h3>مقررات زمانی ملک</h3>
                <div class="accordion-title">
                    <i class="far fa-circle"></i>
                    مقررات زمانی که مهمانان آن ها را در نظر می گیرند
                </div>

                <div class="form-group">
                    <label for="delivery_time">ساعت تحویل ویلا به مشتری:</label>
                    <input type="time" name="delivery_time" id="delivery_time" class="form-control"
                        placeholder="زمانی که شما یا کلیددار اقامتگاه را به مهمان تحویل می دهید">
                </div>



                <div class="form-group">
                    <label for="discharge_time">ساعت تخلیه:</label>
                    <input type="time" name="discharge_time" id="discharge_time" class="form-control"
                        placeholder="زمانی که مهمانان باید تخلیه کنند">
                </div>



                <div class="form-group">
                    <label for="min_stay">حداقل اقامت:</label>
                    <input type="number" name="min_stay" id="min_stay" class="form-control"
                        placeholder="حداقل روزی که مهمانان میتواند در ملک شما اقامت داشته باشند">
                </div>



                <div class="form-group">
                    <label for="more_info_time_rules">توضیحات بیشتر:</label>
                    <textarea name="more_info_time_rules" id="more_info_time_rules" class="form-control"
                        placeholder="توضیحات بیشتر در مورد مقررات زمانی ملک را بنویسید"></textarea>
                </div>

                <br>
                <br>
                <h3>دیگر مقررات</h3>



                <div class="form-group">
                    <label for="animal">آوردن حیوان خانگی:</label>
                    <select name="animal" id="animal" name="animal" class="form-control">
                        <option value="0">مجاز نیست</option>
                        <option value="1">مجاز است</option>
                        <option value="2">در بیرون ملک</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="smoke">استعمال دخانیات:</label>
                    <select name="smoke" id="smoke" name="smoke" class="form-control">
                        <option value="0">مجاز نیست</option>
                        <option value="1">مجاز است</option>
                        <option value="2">در بیرون ملک</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="party">برگزاری جشن:</label>
                    <select name="party" id="party" name="party" class="form-control">
                        <option value="0">مجاز نیست</option>
                        <option value="1">مجاز است</option>
                        <option value="2">باید با صاحبخانه هماهنگ شود
                        </option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="more_info_rules">توضیحات بیشتر:</label>
                    <textarea name="more_info_rules" id="more_info_rules" class="form-control"
                        placeholder="توضیحات بیشتر در مورد مقررات ملک را بنویسید"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
                </div>

            </form>

        </div>

    @else

        <div id="documents">
            <form action="" class="form" id="document-form">
            <div class="form-group">
                <label for="document_type">نوع سند:</label>
                <select name="document_type" id="document_type" name="document_type" class="form-control">
                    <option value="0">نوع سند را انتخاب نمایید</option>
                    <option value="1">سند شش دانگ</option>
                    <option value="2">سند ملکی مشاع</option>
                    <option value="3">سند ملکی مفروز</option>
                    <option value="4">سند منگوله دار</option>
                    <option value="5">سند تک برگ</option>
                    <option value="6">سند اعیان</option>
                    <option value="7">سند عرصه</option>
                    <option value="8">سند وقفی</option>
                    <option value="9">سند ورثه ای</option>
                    <option value="10">سند المثنی</option>
                    <option value="11">سند معارض</option>
                    <option value="12">سند شورایی</option>
                    <option value="13">سند وکالتی</option>
                    <option value="14">سند بنچاق</option>
                    <option value="15">سند رهنی</option>
                    <option value="16">سند دو برگ</option>
                </select>
            </div>



            <div class="form-group mb-3">
                <label>امتیازات :</label>
    
                <div id="scores">
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امتیاز آب" , "name" => "score_water"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امتیاز برق" , "name" => "score_water"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امتیاز گاز" , "name" => "score_water"])
                    
                </div>
    
                <br>
                <input type="text" name="new_view" id="new_view" class="form-control" placeholder="اضافه کردن مورد جدید">
                <br>
                <button class="btn btn-sm btn-warning is new-item" box="#views" input="#new_view" type="button">ثبت مورد
                    جدید +</button>
            </div>
    


            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
            </div>
            </form>
        </div>

    @endif





</section>




