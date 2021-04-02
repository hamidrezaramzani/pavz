<section style="display: {{ $show ? 'block' : 'none' }};">

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
                    <input type="time" value="{{ $data->rules->delivery_time ?? null }}" name="delivery_time"
                        id="delivery_time" class="form-control"
                        placeholder="زمانی که شما یا کلیددار اقامتگاه را به مهمان تحویل می دهید">
                </div>



                <div class="form-group">
                    <label for="discharge_time">ساعت تخلیه:</label>
                    <input type="time" name="discharge_time" id="discharge_time"
                        value="{{ $data->rules->discharge_time ?? null }}" class="form-control"
                        placeholder="زمانی که مهمانان باید تخلیه کنند">
                </div>



                <div class="form-group">
                    <label for="min_stay">حداقل اقامت:</label>
                    <input type="number" name="min_stay" id="min_stay" class="form-control"
                        value="{{ $data->rules->min_stay ?? null }}"
                        placeholder="حداقل روزی که مهمانان میتواند در ملک شما اقامت داشته باشند">
                </div>



                <div class="form-group">
                    <label for="more_info_time_rules">توضیحات بیشتر:</label>
                    <textarea name="more_info_time_rules" id="more_info_time_rules" class="form-control"
                        placeholder="توضیحات بیشتر در مورد مقررات زمانی ملک را بنویسید">{{ $data->rules->more_time_rules_description ?? null }}</textarea>
                </div>

                <br>
                <br>
                <h3>دیگر مقررات</h3>



                <div class="form-group">
                    <label for="animal">آوردن حیوان خانگی:</label>
                    <select name="animal" id="animal" name="animal" class="form-control">
                        @if (isset($data->rules->animal))
                            @switch($data->rules->animal)
                                @case(0)

                                <option value="0">مجاز نیست</option>
                                <option value="1">مجاز است</option>
                                <option value="2">در بیرون ملک</option>
                                @break
                                @case(1)
                                <option value="1">مجاز است</option>
                                <option value="0">مجاز نیست</option>
                                <option value="2">در بیرون ملک</option>
                                @break
                                @default
                                <option value="2">در بیرون ملک</option>
                                <option value="0">مجاز نیست</option>
                                <option value="1">مجاز است</option>
    
                            @endswitch

                        @else
                            <option value="2">در بیرون ملک</option>
                            <option value="0">مجاز نیست</option>
                            <option value="1">مجاز است</option>

                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="smoke">استعمال دخانیات:</label>
                    <select name="smoke" id="smoke" name="smoke" class="form-control">
                        @if (isset($data->rules->smoke))

                            @switch($data->rules->smoke)
                                @case(0)

                                <option value="0">مجاز نیست</option>
                                <option value="1">مجاز است</option>
                                <option value="2">در بیرون ملک</option>
                                @break
                                @case(1)
                                <option value="1">مجاز است</option>

                                <option value="0">مجاز نیست</option>
                                <option value="2">در بیرون ملک</option>
                                @break
                                @default                            
                                    <option value="2">در بیرون ملک</option>
                                    <option value="0">مجاز نیست</option>
                                    <option value="1">مجاز است</option>
                                
                            @endswitch
                        @else
                            <option value="2">در بیرون ملک</option>
                            <option value="0">مجاز نیست</option>
                            <option value="1">مجاز است</option>

                        @endif
                    </select>
                </div>


                <div class="form-group">
                    <label for="party">برگزاری جشن:</label>
                    <select name="party" id="party" name="party" class="form-control">
                        @if (isset($data->rules->party))
                            @switch($data->rules->party)
                                @case(0)
                                <option value="0">مجاز نیست</option>
                                <option value="1">مجاز است</option>
                                <option value="2">باید با صاحبخانه هماهنگ شود</option>
                                @break
                                @case(1)
                                <option value="1">مجاز است</option>
                                <option value="0">مجاز نیست</option>
                                <option value="2">باید با صاحبخانه هماهنگ شود</option>
                                @break
                                @default                            
                                    <option value="2">باید با صاحبخانه هماهنگ شود</option>
                                    <option value="0">مجاز نیست</option>
                                    <option value="1">مجاز است</option>
                            @endswitch
                        @else
                            <option value="2">باید با صاحبخانه هماهنگ شود</option>
                            <option value="0">مجاز نیست</option>
                            <option value="1">مجاز است</option>

                        @endif
                    </select>
                </div>


                <div class="form-group">
                    <label for="more_info_rules">توضیحات بیشتر:</label>
                    <textarea name="more_info_rules" id="more_info_rules" class="form-control"
                        placeholder="توضیحات بیشتر در مورد مقررات ملک را بنویسید">{{ $data->rules->more_rules_description ?? null }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
                </div>

            </form>

        </div>

    @else

        <div id="documents">
            <form action="" class="form" id="document-form">
                <h3>اسناد و امتیازات ملک</h3>
                <div class="accordion-title">
                    <i class="far fa-circle"></i>
                    اسناد و امتیازات از مهم ترین بخش ها برای خریداران هستند
                </div>

                <input type="hidden" name="document-token" id="document-token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="document_type">نوع سند:</label>
                    <select name="document_type" id="document_type" name="document_type" class="form-control">
                        @if ($data->documents)
                            <option value="{{ $data->documents->type }}">
                                {{ $documentTypes[$data->documents->type - 1]->name }}</option>
                            @foreach ($documentTypes as $type)
                                @if ($type->id != $data->documents->id)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endif
                            @endforeach
                            <option value="0">نوع سند را انتخاب نمایید</option>
                        @else
                            <option value="0">نوع سند را انتخاب نمایید</option>
                            @foreach ($documentTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif

                    </select>
                </div>



                <div class="form-group mb-3">
                    <label>امتیازات :</label>

                    <div id="scores">
                        @if (isset($data->documents->scores))
                            @foreach (json_decode($data->documents->scores) as $item)
                                @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text , "name"
                                => $item->name , "checked" => $item->checked] )
                            @endforeach
                        @else
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امیتاز آب", "name" =>
                            "water_score"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امیتاز گاز", "name" =>
                            "gas_score"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "امیتاز برق", "name" =>
                            "electricity_score"])

                        @endif
                    </div>

                    <br>
                    <input type="text" name="new_score" id="new_score" class="form-control"
                        placeholder="اضافه کردن مورد جدید">
                    <br>
                    <button class="btn btn-sm btn-warning is new-item" box="#scores" input="#new_score"
                        type="button">ثبت مورد جدید + </button>
                </div>



                <br>
                <br>
                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary is">ادامه
                        <div id="documents-loading" class="spinner-border spinner-border-sm" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>


                <br>
                <br>
                <br>
            </form>
        </div>

    @endif





</section>
