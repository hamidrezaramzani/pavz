<div class="form-group checkbox-group">
    <label>
        <input type="checkbox" text="{{ $title }}"  id="{{ $name }}" name="{{ $name }}" class="option-input checkbox" {!! isset($checked) && $checked ? "checked" : null !!} />
    {{ $title }}
    </label>
</div>
