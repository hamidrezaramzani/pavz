<div class="villa-item" data-aos="zoom-in">
    <div class="villa-item-content">
        <a href="/villa/{{ $item->id }}">
            <div class="villa-item-img">

                <img src="{{ asset('covers/' . $item->cover) }}" alt="this is villa alt test">
                @if ($item['is_vip'])
                    <div class="vip-lable">ویژه</div>
                @else
                    <div class="normal-lable">عادی</div>

                @endif
                <div class="type-lable">{{ $item->ads_type == 1 ? 'اجاره' : 'فروش' }}</div>
            </div>
            <div class="villa-top-info">
                <div class="w-50">
                    <span>
                        <i class="fas fa-map-marker"></i>
                        {{-- {{$state->name}} - {{$city->name/}} --}}
                        مازندران / رامسر
                    </span>
                </div>            
            </div>
            <h2>{{ $item->title }}</h2>
            <p>
                @if ($item->ads_type == 1)
                    {{ $item->rentPrices->middweek }}
                    تومان
                    <span>/ هر شب</span>
                @else
                    {{ $item->soldVillaPrices->agreed_price ? 'قیمت توافقی' : $item->soldVillaPrices->total_price . " تومان" }}
                @endif

            </p>


            <div class="villa-properties">
                <ul>
                    <li>
                        <i class="fa fa-hotel"></i>
                        {{ $item->rooms()->count() }} اتاق
                    </li>

                    <li>
                        <i class="fa fa-chart-area"></i>
                        {{ $item->foundation_home }} متر
                    </li>

                    <li>
                        <i class="fa fa-home"></i>
                        {{ $item->ownership == 1 ? 'دربست' : 'غیردربست' }}
                    </li>


                    <li>
                        <i class="fa fa-users"></i>
                        تا {{ $item->max_capacity }} مهمان
                    </li>
                </ul>
            </div>

        </a>
    </div>


</div>
