<div class="font-bold col-green">{{ $label }}</div>
<div class="form-group">
    <div class="form-line">
        <select id="{{ str_slug($name) }}" name="{{ $name }}" class="form-control">
            <option value="">---</option>
            @foreach($options as $key => $value)
                <option value="{{ $key }}" @if(!empty($default) && $default === $key) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>