<section>
    
    <form action="" id="general-specifications" method="POST" class="form">
    
    
        <h3>اطلاعات کلی ملک</h3>

        <div class="form-group">
            <label for="title">عنوان:</label>
            <input type="text" name="title" id="title" class="form-control"
                placeholder="مثال (اجاره ویلا با دید عالی)">
        </div>
        <br>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            برای عنوان بهتر است برای جذاب تر بودن آگهی شما برای مهمان ها از مزیت ها و امکانات خوب ملک خود مانند استخر و ... در نظر بگیرید
        </div>


        <div class="form-group">
            <label for="state">استان:</label>

            <select name="state" id="state" name="state" class="form-control">
                <option value="0">استان مورد نظر خود را انتخاب کنید</option>
                @foreach ($states as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="city">شهر:</label>
            <select name="city" id="city" name="city" class="form-control">
                <option   value="0">شهر مورد نظر را انتخاب کنید</option>
            </select>
        </div>


        <div class="form-group">
            <label for="villatype">نوع ملک:</label>
            <select name="villatype" id="villatype" name="villatype" class="form-control">

                <option value="0">نوع ملک را انتخاب کنید</option>
                @foreach ($villaTypes as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>




        <div class="form-group">
            <label for="estatetype">نوع اقامتگاه:</label>
            <select name="estatetype" id="estatetype" name="estatetype" class="form-control">
                <option value="0">نوع اقامتگاه را انتخاب کنید</option>
                <option value="1">ویلا</option>
                <option value="2">سوییت - آپارتمان</option>
            </select>
        </div>



        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
        </div>

    </form>
</section>