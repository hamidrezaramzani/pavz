<section class="p-3" style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="specification-form">
        <h3>اطلاعات کلی</h3>

        <input type="hidden" name="aid" id="aid" value="{{ $data->id }}">
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
            <button class="btn btn-sm btn-primary is" type="submit">ادامه
                <div id="sd-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

    </form>
</section>
