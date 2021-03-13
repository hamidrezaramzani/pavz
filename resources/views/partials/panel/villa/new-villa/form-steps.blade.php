<div class="form-steps px-3">
    <ul>
        @foreach ($formSteps as $key => $item)
            @if ($data->level >= $key)
            <li class="active" id="{{$item['id'] ?? null}}">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </li>        
            @else
            <li id="{{$item['id'] ?? null}}">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </li>        
            @endif            
        @endforeach    
    </ul>
</div>
