<div class="ads-item">
    <div class="vip-label">ویژه</div>
    <div class="type-label">فروش</div>
    <img src="{{ asset('covers/' . $item->cover) }}" alt="{{ $item->title }}">
    <div class="ads-item-content">
        <div class="ads-item-header">
            <span class="float-right ads-item-location">
                <i class="fas fa-map-marker-alt"></i>
                {{ $states[$item->state - 1]->name }} / {{$cities[$item->city - 1]->name}}
            </span>
            <span class="float-left">
                <button class="btn p-0 share-item"  data-type="area" data-id="{{ $item->id }}">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                </button>
            </span>
            <span class="float-left mx-2">                
                @auth
                @if ($item->likes()->where('user_id', auth()->user()->id)->count())
                    <button class="btn p-0 btn-area-like" data-id="{{ $item->id }}">
                        <i class="fas fa-heart text-danger" aria-hidden="true"></i>
                    </button>
                @else
                    <button class="btn p-0 btn-area-like" data-id="{{ $item->id }}">
                        <i class="far fa-heart text-danger" aria-hidden="true"></i>
                    </button>
                @endif
            @else

                <button class="btn p-0 btn-area-like" data-id="{{ $item->id }}">
                    <i class="far fa-heart text-danger" aria-hidden="true"></i>
                </button>
            @endauth
            </span>
        </div>
        <div class="ads-item-body">
            <a href="/area/{{ $item->id }}">

                <h2>{{ $item->title }}</h2>

                @if ($item->agreed_price)
                    <h4 class="text-danger">قیمت توافقی</h4>
                @else
                    <h4>قیمت کل <span class="text-danger">{{ $item->total_price }}</span> تومان
                    </h4>
                @endif
            </a>

        </div>
        <br>
        <br>
        <div class="ads-item-user">
            <img src="{{ asset($item->user->profile->image ? 'upload/' . $item->user->profile->image : 'images/user.png') }}"
                width="50" height="50" alt="{{ $item->user->profile->fullname }}">
            <h6>{{ $item->user->profile->fullname }}</h6>
            <span>+ {{ $item->user->areas()->where('status', 'published')->count() }} ثبت آگهی زمین</span>
        </div>
    </div>

</div>
