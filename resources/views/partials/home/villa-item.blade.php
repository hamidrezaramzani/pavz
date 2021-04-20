{{-- <div class="villa-item" data-aos="zoom-in">
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


</div> --}}

<div class="ads-item">
    <div class="vip-label">ویژه</div>
    <div class="type-label">{{ $item->ads_type == 1 ? 'اجاره' : 'فروش' }}</div>
    <img src="{{ asset('covers/' . $item->cover) }}" alt="{{ $item->title }}">
    <div class="ads-item-content">
        <div class="ads-item-header">
            <span class="float-right ads-item-location">
                <i class="fas fa-map-marker-alt"></i>
                مازندران / رامسر
            </span>
            <span class="float-left">
                <button class="btn p-0">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                </button>
            </span>
            <span class="float-left mx-2">
                @auth
                    @if ($item->likes()->where('user_id', auth()->user()->id)->count())
                        <button class="btn p-0 btn-villa-like" data-id="{{ $item->id }}">
                            <i class="fas fa-heart text-danger" aria-hidden="true"></i>
                        </button>
                    @else
                        <button class="btn p-0 btn-villa-like" data-id="{{ $item->id }}">
                            <i class="far fa-heart text-danger" aria-hidden="true"></i>
                        </button>
                    @endif
                @else

                    <button class="btn p-0 btn-villa-like" data-id="{{ $item->id }}">
                        <i class="far fa-heart text-danger" aria-hidden="true"></i>
                    </button>
                @endauth

            </span>
        </div>
        <div class="ads-item-body">
            <a href="/villa/{{ $item->id }}">

                <h2>{{ $item->title }}</h2>
                @if ($item->ads_type == 1)
                    <h4>هر شب <span class="text-danger">{{ $item->rentPrices->middweek }}</span> تومان</h4>

                @else
                    @if ($item->soldVillaPrices->agreed_price)
                        <h4 class="text-danger">قیمت توافقی</h4>
                    @else
                        <h4>قیمت کل <span class="text-danger">{{ $item->soldVillaPrices->total_price }}</span> تومان
                        </h4>
                    @endif
                @endif
            </a>

        </div>
        <br>
        <br>
        <div class="ads-item-user">
            <img src="{{ asset($item->user->profile->image ? 'upload/' . $item->user->profile->image : 'images/user.png') }}"
                width="50" height="50" alt="{{ $item->user->profile->fullname }}">
            <h6>{{ $item->user->profile->fullname }}</h6>
            <span>+ {{ $item->user->villas()->where('status', 'published')->count() }} ثبت آگهی ویلا</span>
        </div>
    </div>

</div>
