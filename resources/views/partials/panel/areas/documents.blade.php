<section style="display: {{ $show ? 'block' : 'none' }};">
    <form class="form" id="documents-form">


        <h3>اسناد و امتیازات زمین </h3>


        <div class="form-group">
            <label for="document_type">نوع سند:</label>
            <select name="document_type" id="document_type" name="document_type" class="form-control drafted_input">
                @if ($data->document_type)
                    <option value="{{ $documentTypes[$data->document_type - 1]->id }}">
                        {{ $documentTypes[$data->document_type - 1]->name }}</option>
                    @foreach ($documentTypes as $type)
                        @if ($type->id != $data->document_type)
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
                @if (isset($data->scores) && strlen($data->scores) > 10)
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

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "جواز ساخت", "name" =>
                    "javaz-sakht"])

                @endif

            </div>

            <br>
            <input type="text" name="new_score" id="new_score" class="form-control" placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#scores" input="#new_score" type="button">ثبت مورد
                جدید
                + </button>
        </div>



        <br>
        <br>
        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه
                <div id="d-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>


        <br>
        <br>
        <br>
    </form>
</section>
