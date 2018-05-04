@php $locales = config("laravellocalization.supportedLocales"); @endphp

@foreach($locales as $key => $value)
    <div class="col-md-6">
        <h2 class="card-inside-title">{!! $value["name"] !!}</h2>

        @foreach($form_fields as $field)
            @if($field["type"] === "text")
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="{!! "{$key}_{$field["name"]}" !!}" class="form-control noEnterSubmit" name="{!! $key !!}[{!! $field["name"] !!}]" value="{!! !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") !!}">
                        <label class="form-label">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</label>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endforeach