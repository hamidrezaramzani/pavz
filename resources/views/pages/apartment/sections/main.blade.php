<div class="villa-info-item">
    <h2>
        {{ $data->title }}
    </h2>
    <h5>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        {{$state[array_key_first($state)]->name}} / {{$city[array_key_first($city)]->name}}
    </h5>
    <br>
    <span class="d-inline btn btn-sm btn-warning" style="font-size: 12px">کد ملک : {{ $data->id }}</span>
</div>

<br>
<br>
