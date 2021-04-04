<div class="form-group checkbox-group">
    <label>
        
        @if (isset($new) && $new)
        <button class="btn btn-sm text-danger is" onclick="removeCheckboxInput(this)" type="button">
            <i class="fa fa-xs fa-trash"></i>
        </button>            
        @endif
        <input type="checkbox" text="{{ $title }}"  id="{{ $name }}" name="{{ $name }}" class="option-input checkbox" {!! isset($checked) && $checked ? "checked" : null !!}  {!! isset($new) && $new ? "data-new='true'" : null !!} />
    {{ $title }}
    </label>
</div>
