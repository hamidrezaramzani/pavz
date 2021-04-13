<div class="villa-item" data-aos="zoom-in">
    <div class="villa-item-content">
        <a href="/area/{{$item->id}}">
            <div class="villa-item-img">

                <img src="{{ asset('covers/' . $item->cover) }}" alt="this is villa alt test">
                @if ($item['is_vip'])
                    <div class="vip-lable">ویژه</div>
                @else
                    <div class="normal-lable">عادی</div>

                @endif
                <div class="type-lable">فروش</div>
            </div>
            <div class="villa-top-info">
                <div class="w-50">
                    <span>
                        <i class="fas fa-map-marker"></i>
                        مازندران - رامسر
                    </span>
                </div>
                <div class="w-50">
                    <ul>
                        <li>
                            <div class="my-rating"></div>
                        </li>
                    </ul>
                </div>

            </div>
            <h2>{{ $item->title }}</h2>
            <p>
                {{ $item->total_price }}
                تومان
            </p>


            <div class="villa-properties">
                <ul>
                    <li>
                        <i class="fa fa-hotel"></i>
                        {{ $item->count_of_border }} بر
                    </li>

                    <li>
                        <i class="fa fa-chart-area"></i>
                        {{ $item->foundation }} متر متراژ
                    </li>

                    <li>
                        <i class="fa fa-home"></i>
                        {{$item->main_border_width}} متر بر اصلی
                    </li>


                    <li>
                        <i class="fa fa-users"></i>
                        {{$item->areaType->name}}
                    </li>
                </ul>
            </div>

        </a>
    </div>


</div>
