<section>

    <form action="" id="general-specifications" method="POST" class="form">

        <input type="hidden" name="s_csrf" value="{{ csrf_token() }}" id="s_csrf">
        <input type="hidden" name="id_" value="{{ $data->id }}" id="id_">
        <h3>اطلاعات کلی ملک</h3>
        <br>
        <div class="form-group">
            <label for="title">عنوان:</label>
            <input type="text" name="title" id="title" value="@if ($data->title) {{ $data->title }} @endif" class="form-control"
            placeholder="مثال (اجاره ویلا با دید عالی)">
        </div>
        <br>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            برای عنوان بهتر است برای جذاب تر بودن آگهی شما برای مهمان ها از مزیت ها و امکانات خوب ملک خود مانند استخر و
            ... در نظر بگیرید
        </div>


        <div class="form-group">
            <label for="state">استان:</label>

            <select name="state" id="state" name="state" class="form-control">
                @if ($state[0])
                    @foreach ($states as $item)
                        @if ($item->id == $state[0])
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                    <option value="0">استان مورد نظر خود را انتخاب کنید</option>
                    @foreach ($states as $item)
                        @if ($item->id != $state[0])
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                @else
                    <option value="0">استان مورد نظر خود را انتخاب کنید</option>
                    @foreach ($states as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach
                @endif

            </select>
        </div>




        <div class="form-group">
            <label for="city">شهر:</label>
            <select name="city" id="city" name="city" class="form-control">
                @if ($state[0])
                    @foreach ($state[1] as $item)
                        @if ($item->id == $data->city)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                    <option value="0">شهر مورد نظر خود را انتخاب کنید</option>
                    @foreach ($state[1] as $item)
                        @if ($item->id != $data->city)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                @else
                    <option value="0">شهر مورد نظر را انتخاب کنید</option>
                    @foreach ($state[1] as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>


        <div class="form-group">
            <label for="villa_type">نوع ملک:</label>
            <select name="villa_type" id="villa_type" name="villa_type" class="form-control">



                @if ($data->villa_type)
                    @foreach ($villaTypes as $item)
                        @if ($item->id == $data->villa_type)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                    <option value="0">نوع ملک را انتخاب کنید</option>
                    @foreach ($villaTypes as $item)
                        @if ($item->id != $data->villa_type)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach ($villaTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>




        <div class="form-group">
            <label for="estate_type">نوع اقامتگاه:</label>
            <select name="estate_type" id="estate_type" name="estate_type" class="form-control">
                @if ($data->estate_type)
                    @if ($data->estate_type == 1)
                        <option value="1">ویلا</option>
                        <option value="2">سوییت - آپارتمان</option>
                        <option value="0">نوع اقامتگاه را انتخاب کنید</option>

                    @else
                    <option value="2">سوییت - آپارتمان</option>
                    <option value="1">ویلا</option>
                    <option value="0">نوع اقامتگاه را انتخاب کنید</option>
                    @endif

                @else
                    <option value="0">نوع اقامتگاه را انتخاب کنید</option>
                    <option value="1">ویلا</option>
                    <option value="2">سوییت - آپارتمان</option>
                @endif

            </select>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه
                <div id="sd-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                  </div>
            </button>
            
        </div>
        <br>

    </form>
</section>
