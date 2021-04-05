<br>
<br>
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        آدرس آپارتمان
    </h2>

    <br>

    {{-- <input type="hidden" id="city-lat" value="{{$city[$data->city - 1]->latitude}}"> --}}
    <input type="hidden" id="id" value="{{$data->id}}">
    {{-- <input type="hidden" id="token" value="{{ csrf_token() }}"> --}}
    {{-- <input type="hidden" id="city-lng" value="{{$city[$data->city - 1]->longitude}}"> --}}
    <input type="hidden" id="lat" value="{{$data->lat}}">
    <input type="hidden" id="lng" value="{{$data->long}}">
    <p>{{$data->address}}</p>

    
</div>


<div id="mapid"></div>
<br>
<br>
