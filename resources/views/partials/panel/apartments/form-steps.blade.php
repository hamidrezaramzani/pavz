{{-- <div class="form-steps px-3">
    <ul>
        <li class="active">
            <i class="fa fa-home"></i>
            <span>اطلاعات کلی</span>
        </li>

        <li class="active">
            <i class="fa fa-tools"></i>
            <span>امکانات</span>
        </li>


        <li class="active" id="address-step">
            <i class="fa fa-map"></i>
            <span>آدرس</span>
        </li>


        <li class="active">
            <i class="fa fa-dollar-sign"></i>
            <span>قیمت گذاری</span>
        </li>



        <li class="active">
            <i class="fa fa-images"></i>
            <span>تصاویر</span>
        </li>


        <li class="active">
            <i class="fa fa-flag"></i>
            <span>مرحله نهایی</span>
        </li>


    </ul>
</div> --}}


<div class="form-steps px-3">
    <ul>
        @foreach ($formSteps as $key => $item)
            @if ($data->level >= $key)
            <li class="active" id="{{$item['id'] ?? null}}">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </li>        
            @else
            <li id="{{$item['id'] ?? null}}">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </li>        
            @endif            
        @endforeach    
    </ul>
</div>