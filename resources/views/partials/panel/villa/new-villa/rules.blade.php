<section>
    <form action="" id="rules-form" class="form">
        <h3>مقررات زمانی ملک</h3>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            مقررات زمانی که مهمانان آن ها را در نظر می گیرند
        </div>

        <div class="form-group">
            <label for="delivery_time">ساعت تحویل ویلا به مشتری:</label>
            <input type="time" name="delivery_time" id="delivery_time" class="form-control without_ampm"
                placeholder="زمانی که شما یا کلیددار اقامتگاه را به مهمان تحویل می دهید">
        </div>



        <div class="form-group">
            <label for="discharge_time">ساعت تخلیه:</label>
            <input type="time" name="discharge_time" id="discharge_time" class="form-control without_ampm"
                placeholder="زمانی که مهمانان باید تخلیه کنند">
        </div>



        <div class="form-group">
            <label for="min_residence">حداقل اقامت:</label>
            <input type="number" name="min_residence" id="min_residence" class="form-control"
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
    </form>
</section>
