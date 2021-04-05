<section class="p-3" style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="specification-form">
        <h3>اطلاعات کلی</h3>

        <input type="hidden" name="aid" id="aid" value="{{ $data->id }}">
        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">عنوان آگهی:</label>
            <input type="text" name="title" id="title" class="form-control drafted_input"
                placeholder="عنوان آگهی خود را وارد نمایید" value="{{ $data->title ?? null }}">
            <div class="draft-icon" style="display: none">
                <span class="spinner-border text-primary spinner-border-sm" style="display: none" role="status"
                    aria-hidden="true"></span>
                <span style="display: none"><i class="fa fa-check text-success"></i></span>
            </div>
        </div>
        <br>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            برای عنوان سعی کنید از امکانات مهم و اصلی آپارتمان خود برای جلب توجه استفاده کنید
        </div>

        <div class="form-group">
            <label for="state">استان:</label>

            <select name="state" id="state" name="state" class="form-control drafted_input">
                @if ($data->state)
                    @foreach ($states as $item)
                        @if ($item->id == $data->state)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                    <option value="0">استان مورد نظر خود را انتخاب کنید</option>
                    @foreach ($states as $item)
                        @if ($item->id != $data->state)
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
            <select name="city" id="city" name="city" class="form-control drafted_input">
                @if ($data->state)
                    @if ($data->city && $data->city != 0)
                        <option value="{{ $cities[$data->city - 1]->id }}"
                            lat="{{ $cities[$data->city - 1]->latitude }}"
                            long="{{ $cities[$data->city - 1]->longitude }}">
                            {{ $cities[$data->city - 1]->name }}</option>
                    @else
                        @foreach ($cities as $item)
                            <option long="{{ $item->longitude }}" lat="{{ $item->latitude }}"
                                value="{{ $item->id }}">{{ $item->name }}</option>
                            <option value="0">شهر خود را وارد نمایید</option>

                        @endforeach
                    @endif
                @endif
            </select>
        </div>



        <div class="form-group">
            <label for="atype">نوع کاربری:</label>
            <select name="atype" id="atype" name="atype" class="form-control drafted_input">
                @if ($data->atype)
                    @foreach ($accountTypes as $item)
                        @if ($item->id == $data->atype)
                            <option value="{{ $data->atype }}">{{ $item->name }}</option>
                        @endif
                    @endforeach

                    @foreach ($accountTypes as $item)
                        @if ($item->id != $data->atype)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="1">مسکونی</option>
                    <option value="2">تجاری</option>
                    <option value="3">اداری</option>
                    <option value="4">صنعتی</option>
                @endif
            </select>
        </div>


        

        <div class="form-group">
            <label for="htype">نوع ملک:</label>
            <select name="htype" id="htype" name="htype" class="form-control drafted_input">
                @if ($data->atype)
                    @foreach ($apartmentTypes as $type)
                        @if ($type->id == $data->htype)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                    @foreach ($apartmentTypes as $type)
                        @if ($type->id != $data->htype && $type->atype_id == $data->atype)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach ($apartmentTypes as $type)
                        @if ($type->atype_id == 1)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>


        <div class="form-group">
            <label for="floors">تعداد طبقه:</label>
            <input type="text" name="floors" id="floors" class="form-control drafted_input"
                placeholder="تعداد طبقه خود را وارد نمایید" value="{{ $data->floors ?? null }}">
        </div>


        <div class="form-group">
            <label for="unites">تعداد واحد هر طبقه:</label>
            <input type="text" name="unites" id="unites" class="form-control drafted_input"
                placeholder="تعداد واحد در هر طبقه را وارد نمایید" value="{{ $data->unites ?? null }}">
        </div>



        <div class="form-group">
            <label for="foundation">متراژ:</label>
            <input type="text" name="foundation" id="foundation" class="form-control drafted_input"
                placeholder="متراژ خود را به متر وارد نمایید" value="{{ $data->foundation ?? null }}">
        </div>


        <div class="form-group">
            <label for="year_of_construction">سال ساخت(اختیاری):</label>
            <input type="text" name="year_of_construction" id="year_of_construction" class="form-control drafted_input"
                placeholder="عنوان آگهی خود را وارد نمایید" value="{{ $data->year_of_construction ?? null }}">
        </div>




        @if ($data->ads_type == 1)
            <div class="form-group">
                <label for="document_type">نوع سند:</label>
                <select name="document_type" id="document_type" name="document_type" class="form-control drafted_input">
                    @if ($data->document_type)
                        <option value="{{ $documentTypes[$data->document_type - 1]->id }}">
                            {{ $documentTypes[$data->document_type - 1]->name }}</option>
                        @foreach ($documentTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
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


        @endif


        <br>
        <br>
        <div class="form-group">
            <button class="btn btn-sm btn-primary is" type="submit">ادامه
                <div id="sd-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

    </form>
</section>
