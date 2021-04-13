<div class="villa-info-item">
    <h2>
        {{ $data->title }}
    </h2>
    <h5>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        {{ $state[$data->state - 1]->name }} / {{ $city[$data->city - 1]->name }}
    </h5>
    <br>
    <span class="d-inline btn btn-sm btn-warning" style="font-size: 12px">کد ملک : {{ $data->id }}</span>
</div>

<br>
<br>
