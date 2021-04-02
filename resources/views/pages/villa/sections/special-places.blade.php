@if ($data->specialPlaces->count())

<div class="villa-info-item special-table my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        مکان های خاص
    </h2>

    <br>
    <table class="table text-center table-striped table-hover is w-100">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>فاصله زمانی پیاده</th>
                <th>فاصله زمانی ماشین</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->specialPlaces()->get() as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->distance_by_walking }} دقیقه</td>
                <td>{{ $item->distance_by_car }} دقیقه</td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
    
@endif
