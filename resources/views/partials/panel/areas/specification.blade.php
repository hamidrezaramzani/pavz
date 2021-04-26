<section class="p-3" style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="specification-form">
        <h3>اطلاعات کلی</h3>

        <input type="hidden" name="aid" id="aid" value="{{ $data->id }}">
        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">عنوان آگهی:</label>
            <input type="text" name="title" id="title" class="form-control"
                placeholder="عنوان آگهی خود را وارد نمایید" value="{{ $data->title ?? null }}">
        </div>

        <br>
        <div class="accordion-title">
            <i class="far fa-circle"></i>
            برای عنوان سعی کنید از امتیازات مهم زمین خود نام ببرید
        </div>

        <div class="form-group">
            <label for="state">استان:</label>
            <select name="state" id="state" name="state" class="form-control">
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
            <select name="city" id="city" name="city" class="form-control">
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

        <div class="form-group">
            <label for="state">نوع کاربری:</label>

            <select name="area_type" id="area_type" name="area_type" class="form-control">
                @if ($data->area_type)
                    @foreach ($areaTypes as $item)
                        @if ($item->id == $data->state)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                    @foreach ($areaTypes as $item)
                        @if ($item->id != $data->state)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                    <option value="0">نوع کاربری زمین خود را وارد نمایید</option>

                @else
                    <option value="0">نوع کاربری زمین خود را وارد نمایید</option>
                    @foreach ($areaTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>


        
        <br>
        <div class="form-group">
            <label for="foundation">متراژ:</label>
            <input type="number" name="foundation" id="foundation" class="form-control"
                placeholder="متراژ زمین خود را وارد نمایید" value="{{ $data->foundation ?? null }}">
        </div>


        <br>
        <div class="form-group">
            <label for="count_of_border">تعداد بر:</label>
            <input type="number" name="count_of_border" id="count_of_border" class="form-control"
                placeholder="تعداد بر زمین خود را وارد نمایید" value="{{ $data->count_of_border ?? null }}">
        </div>


        <br>
        <div class="form-group">
            <label for="main_border_width">طول بر اصلی:</label>
            <input type="number" name="main_border_width" id="main_border_width" class="form-control"
                placeholder="طول بر اصلی خود را وارد نمایید" value="{{ $data->main_border_width ?? null }}">
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
