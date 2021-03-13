<section style="display: {{$show ? "block" : "none"}};">

    <form action="" method="POST" class="form" id="home-info">
        <h3>اطلاعات مربوط به ملک</h3>

        <input type="hidden" id="hi_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="floors">تعداد طبقات:</label>
            <input type="number" name="floors" id="floors" class="form-control" value="{{ $data->floors }}"
                placeholder="5">
        </div>


        <div class="form-group">
            <label for="unites">تعداد واحد هر طبقه:</label>
            <input type="number" name="unites" id="unites" class="form-control" placeholder="5"
                value="{{ $data->unites }}">
        </div>


        <div class="form-group">
            <label for="foundation_area">متراژ کل زمین:</label>
            <input type="number" name="foundation_area" id="foundation_area" class="form-control" placeholder="متر مربع"
                value="{{ $data->foundation_area }}">
        </div>

        <div class="form-group">
            <label for="foundation_home">متراژ ملک:</label>
            <input type="number" name="foundation_home" id="foundation_home" value="{{ $data->foundation_home }}"
                class="form-control" placeholder="متر مربع">
        </div>



        <div class="form-group">
            <label for="year_of_counstraction">سال ساخت(اختیاری):</label>
            <input type="number" name="year_of_counstraction" id="year_of_counstraction" class="form-control"
                placeholder="مثلا 1385" value="{{ $data->year_of_counstraction }}">
        </div>

        <div class="form-group">
            <label for="ownership">نوع مالکیت:</label>
            <select name="ownership" id="ownership" name="ownership" class="form-control">
                @if ($data->ownership == 1)
                    <option value="1">دربست(تمام فضا های آن به طور کامل به مهمان تعلق خواهد گرفت)</option>
                    <option value="2">غیر دربست(تعدای از فضاهای آن با دیگران مشترک است)</option>
                @else
                    <option value="2">غیر دربست(تعدای از فضاهای آن با دیگران مشترک است)</option>
                    <option value="1">دربست(تمام فضا های آن به طور کامل به مهمان تعلق خواهد گرفت)</option>
                @endif

            </select>
        </div>


        <div class="form-group">
            <label for="structure_type">تیپ سازه:</label>
            <select name="structure_type" id="structure_type" name="structure_type" class="form-control">

                @switch($data->structure_type)
                    @case(1)
                    <option value="1">هم سطح</option>
                    <option value="2">دوبلکس</option>
                    <option value="3">تریپلکس</option>
                    @break
                    @case(2)
                    <option value="2">دوبلکس</option>
                    <option value="1">هم سطح</option>
                    <option value="3">تریپلکس</option>
                    @break
                    @default
                    <option value="3">تریپلکس</option>
                    <option value="2">دوبلکس</option>
                    <option value="1">هم سطح</option>
                @endswitch
            </select>
        </div>

        <br>
        <br>
        <h3>اطلاعات مربوط به محیط</h3>

        <div class="form-group">
            <label for="way_type">مسیر دسترسی:</label>
            <select name="way_type" id="way_type" name="way_type" class="form-control">


                @switch($data->way_type)
                    @case(1)
                    <option value="1">آسفالت</option>
                    <option value="2">خاکی</option>
                    <option value="3">مال رو</option>
                    @break
                    @case(2)
                    <option value="2">خاکی</option>
                    <option value="1">آسفالت</option>
                    <option value="3">مال رو</option>
                    @break
                    @default
                    <option value="3">مال رو</option>
                    <option value="2">خاکی</option>
                    <option value="1">آسفالت</option>
                @endswitch
            </select>
        </div>


        <div class="form-group">
            <label for="neighbor">همسایگی ملک:</label>
            <select name="neighbor" id="neighbor" name="neighbor" class="form-control">

                @switch($data->neighbor)
                    @case(1)
                    <option value="1">همسایه وجود ندارد</option>
                    <option value="2">دیوار به دیوار</option>
                    <option value="3">پراکنده</option>
                    @break
                    @case(2)
                    <option value="2">دیوار به دیوار</option>
                    <option value="1">همسایه وجود ندارد</option>
                    <option value="3">پراکنده</option>

                    @break
                    @default
                    <option value="3">پراکنده</option>
                    <option value="1">همسایه وجود ندارد</option>
                    <option value="2">دیوار به دیوار</option>

                @endswitch
            </select>
        </div>





        <div class="form-group">
            <label>
                مکان های خاص:(اختیاری)
                <a href="" class="float-left" id="add-special-place">اضافه کردن مکان خاص</a>
            </label>
            <ul id="special-places" class="my-modal-items">
                @if (count($data->specialPlaces))
                    @foreach ($data->specialPlaces as $item)
                        <li>
                            <h3>
                                {{ $item->title }}
                                <button type="button" class="btn btn-danger"
                                    onclick='removeSpecialPlace({{ $item->id }})'><i
                                        class="fa fa-trash"></i></button>
                            </h3>
                            <span><i class="fas fa-walking"></i> {{ $item->distance_by_walking }} دقیقه </span>
                            <span><i class="fas fa-car"></i> {{ $item->distance_by_car }} دقیقه </span>
                        </li>

                    @endforeach
                @else

                    <li>
                        <p>مکانی اضافه نکرده اید</p>
                    </li>
                @endif

            </ul>
        </div>

        <div class="form-group">
            <label for="about_home">درباره ملک(اختیاری):</label>
            <textarea name="about_home" id="about_home" class="form-control"
                placeholder="توضیحات بیشتر در مورد اقامتگاه">{{ $data->about_home }}</textarea>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه
                <div id="hi-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

    </form>


</section>
