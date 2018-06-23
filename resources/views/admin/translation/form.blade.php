@php $locales = config("laravellocalization.supportedLocales"); @endphp

@foreach($locales as $key => $value)
    <div class="col-md-6">
        <h2 class="card-inside-title">{!! $value["name"] !!}</h2>

        @foreach($form_fields as $field)
            @if($field["type"] === "text")
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="{!! "{$key}_{$field["name"]}" !!}" class="form-control" name="{!! $key !!}[{!! $field["name"] !!}]" value="{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}">
                        <label class="form-label">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</label>
                    </div>
                </div>
            @elseif($field["type"] === "textarea")
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea rows="6" id="{!! "{$key}_{$field["name"]}" !!}" class="form-control no-resize" name="{!! $key !!}[{!! $field["name"] !!}]">{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}</textarea>
                        <label class="form-label">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</label>
                    </div>
                </div>
            @elseif($field["type"] === "ckeditor")
                <div class="form-group">
                    <p>{!! trans("{$translation_file}.form.{$field["name"]}") !!}</p>
                    <div class="form-line">
                        <textarea rows="6" id="{!! "{$key}_{$field["name"]}" !!}" name="{!! $key !!}[{!! $field["name"] !!}]">{!! !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") !!}</textarea>
                    </div>
                </div>
            @elseif($field["type"] === "ace")
                <div class="form-group">
                    <p>{!! trans("{$translation_file}.form.{$field["name"]}") !!}</p>
                    <div class="form-line">
                        <div class="form-group">
                            <div style="position: relative; height: 500px;">
                                <pre class="ace-editor" id="{!! "ace_{$key}_{$field["name"]}" !!}">{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}</pre>
                                <textarea id="{!! "{$key}_{$field["name"]}" !!}" name="{!! $key !!}[{!! $field["name"] !!}]" class="hidden">{!! !empty($object_trans)  ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


            @endif
        @endforeach
    </div>
@endforeach