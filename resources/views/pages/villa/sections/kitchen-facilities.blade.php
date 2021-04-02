
@if ($data->kitchen_facilities)

<br>
<br>
<div class="villa-info-item my-4 float-right w-100">
    <h2>
        <i class="fa fa-circle fa-xs text-warning"></i>
        امکانات آشپزخانه
    </h2>
    <br>

    <table class="table text-center table-striped table-hover is w-100">

        <tbody>
            @foreach (array_chunk(json_decode($data->kitchen_facilities) , 3) as $chunks)
            <tr>

            @foreach ($chunks as $item)
                @if ($item->checked)
                    <td><i class="fa fa-check text-success"></i> {{$item->text}}</td>                
                @else
                <td><i class="fa fa-times text-danger"></i> {{$item->text}}</td>                
                @endif
            @endforeach
        </tr>
                
            @endforeach
        </tbody>
    </table>
</div>



@endif
