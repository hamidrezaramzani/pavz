<div class="villa-item" data-aos="zoom-in">
    <div class="villa-item-content">
        <a href="/shop/{{$item->id}}">
            <div class="villa-item-img">

                <img src="{{ asset('covers/' . $item->cover) }}" alt="this is villa alt test">
                @if ($item['is_vip'])
                    <div class="vip-lable">ویژه</div>
                @else
                    <div class="normal-lable">عادی</div>

                @endif
                <div class="type-lable">{{ $item->ads_type == 2 ? 'اجاره' : 'فروش' }}</div>
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
                            <div class="my-rating-{{$item->id}}"></div>
                        </li>
                    </ul>
                </div>

            </div>
            <h2>{{ $item->title }}</h2>
            <p>
                @if ($item->ads_type == 2)
                    {{ $item->mortgage }}
                    تومان
                    <span>/ رهن</span>
                @else
                    @if ($item->agreed_price)
                        قیمت توافقی
                    @else
                        {{ $item->total_price }}

                    @endif
                @endif

            </p>


            <div class="villa-properties">
                <ul>
                    <li>
                        <i class="fa fa-hotel"></i>
                        {{ $item->border_width }} متر بر
                    </li>

                    <li>
                        <i class="fa fa-chart-area"></i>
                        {{ $item->foundation }} متر
                    </li>

                    <li>
                        <i class="fa fa-home"></i>
                        {{ $item->height }} متر ارتفاع
                    </li>

                </ul>
            </div>

        </a>
    </div>


</div>