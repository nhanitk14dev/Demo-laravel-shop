@foreach($form_fields as $field)
    @if($field["type"] === "text")
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" id="{!! $field["name"] !!}" class="form-control" name="{!! $field["name"] !!}" value="{!! !empty($object_trans) ? $object_trans->{"{$field['name']}"} : old("{$field["name"]}") !!}">
                <label class="form-label">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</label>
            </div>
        </div>
    @elseif($field["type"] === "textarea")
        <div class="form-group form-float">
            <div class="form-line">
                <textarea rows="6" id="{!! $field["name"] !!}" class="form-control no-resize" name="{!! $field["name"] !!}">{!! !empty($object_trans) ? $object_trans->{"{$field['name']}"} : old("{$field["name"]}") !!}</textarea>
                <label class="form-label">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</label>
            </div>
        </div>
    @elseif($field["type"] === "ckeditor")
        <div class="form-group">
            <p>{!! trans("{$translation_file}.form.{$field["name"]}") !!}</p>
            <div class="form-line">
                <textarea rows="6" id="{!! $field["name"] !!}" name="{!! $field["name"] !!}">{!! !empty($object_trans) ? $object_trans->{"{$field['name']}"} : old("{$field["name"]}") !!}</textarea>
            </div>
        </div>
    @elseif($field["type"] === "ace")
        <div class="form-group">
            <p>{!! trans("{$translation_file}.form.{$field["name"]}") !!}</p>
            <div class="form-line">
                <div class="form-group">
                    <div style="position: relative; height: 500px;">
                        <pre class="ace-editor" id="{!! "ace_{$field["name"]}" !!}">{{ !empty($object_trans) ? $object_trans->{"{$field['name']}"} : old("{{$field["name"]}") }}</pre>
                        <textarea id="{!! "{$field["name"]}" !!}" name="{!! $field["name"] !!}" class="hidden">{!! !empty($object_trans)  ? $object_trans->{"{$field['name']}"} : old("{$field["name"]}") !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach