<section class="p-3" style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="specification-form">
        <h3>اطلاعات کلی</h3>

        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">عنوان آگهی:</label>
            <input type="text" name="title" id="title" class="form-control drafted_input"
                placeholder="عنوان آگهی خود را وارد نمایید" value="{{ $data->title ?? null }}">

        </div>

        <br>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            برای عنوان سعی کنید از امتیازات مهم زمین خود نام ببرید
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
                        @foreach ($cities as $item)
                            @if ($item->id != $data->city)
                                <option long="{{ $item->longitude }}" lat="{{ $item->latitude }}"
                                    value="{{ $item->id }}">{{ $item->name }}</option>

                            @endif
                        @endforeach
                    @else
                        @foreach ($cities as $item)
                            <option long="{{ $item->longitude }}" lat="{{ $item->latitude }}"
                                value="{{ $item->id }}">{{ $item->name }}</option>
                            <option value="0">شهر خود را وارد نمایید</option>

                        @endforeach
                    @endif
                @else
                    <option value="0">شهر خود را وارد نمایید</option>

                @endif
            </select>
        </div>

        <br>




        <br>
        <div class="form-group">
            <label for="foundation">متراژ:</label>
            <input type="number" name="foundation" id="foundation" class="form-control"
                placeholder="متراژ مغازه خود را به متر وارد نمایید" value="{{ $data->foundation ?? null }}">
        </div>


        <br>
        <div class="form-group">
            <label for="border_width">طول بر اصلی:</label>
            <input type="number" name="border_width" id="border_width" class="form-control"
                placeholder="طول بر اصلی خود را به متر وارد نمایید" value="{{ $data->border_width ?? null }}">
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



            <br>
            <br>

            <div class="form-group mb-3">
                <label>امتیازات :</label>

                <div id="scores">
                    @if (isset($data->scores))
                        @foreach (json_decode($data->scores) as $item)
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
                <button class="btn btn-sm btn-warning is new-item" box="#scores" input="#new_score" type="button">ثبت
                    مورد جدید + </button>
            </div>



            <br>
            <br>

        @endif



        <br>
        <div class="form-group">
            <label for="height">ارتفاع:</label>
            <input type="number" name="height" id="height" class="form-control"
                placeholder="ارتفاع مغازه خود را به متر وارد نمایید" value="{{ $data->height ?? null }}">
        </div>

        <br>
        <div class="form-group">
            <label for="description">توضیحات بیشتر:</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="توضیحات بیشتر درباره آگهی را وارد کنید" value="{{ $data->description ?? null }}">
        </div>



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
