@foreach($composer_locales as $key => $value)
    <div role="tabpanel" class="tab-pane fade {{ $key === $default_tab ? 'active in' : null }}" id="{{ !empty($tab_id) ? $tab_id : 'trans' }}_{{ $key }}">
        @if(!empty($form_fields))
            <div class="row">
                <div class="col-sm-12">
                    @foreach($form_fields as $field)
                        @php
                            $input_name = !empty($field['default_name']) ? str_replace('LOCALE', $key, $field['default_name']) : "{$key}[{$field["name"]}]";

                            $input_id = str_slug($input_name, '');// !empty($field['default_name']) ? str_replace('LOCALE', $key, $field['default_name']) : "{$key}_{$field["name"]}";
                        @endphp

                        @if($field["type"] === "text")
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                <div class="form-line">
                                    <input type="text" id="{!! $input_id !!}" class="form-control"
                                           name="{!! $input_name !!}"
                                           value="{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}">
                                </div>
                            </div>
                        @elseif($field["type"] === "textarea")
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                <div class="form-line">
                                    <textarea rows="4" id="{!! $input_id !!}"
                                              class="form-control no-resize"
                                              name="{!! $input_name !!}">{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}</textarea>
                                </div>
                            </div>
                        @elseif($field["type"] === "ckeditor")
                            <div class="form-group">
                                <div class="font-bold col-green m-b-5">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                <div class="form-line">
                                    <textarea rows="6" id="{!! $input_id !!}"
                                              name="{!! $input_name !!}">{!! !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") !!}</textarea>
                                </div>
                            </div>
                        @elseif($field["type"] === "ace")
                            <div class="form-group">
                                <div class="font-bold col-green m-b-5">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                <div class="form-line">
                                    <div class="form-group">
                                        <div style="position: relative; height: 500px;">
                                            <pre class="ace-editor"
                                                 id="{!! "ace_{$input_id}" !!}">{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}</pre>
                                            <textarea id="{!! $input_id !!}"
                                                      name="{!! $input_name !!}"
                                                      class="hidden">{!! !empty($object_trans)  ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        @if(!empty($tab_seo))
            <h3>SEO</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="font-bold col-green">{!! trans("admin_seo.form.title") !!}</div>
                        <div class="form-line">
                            <input type="text" class="form-control" name="metadata[{{ $key }}][title]"
                                   value="{{ !empty($metadata) ? $metadata->{"title:{$key}"} : old("metadata.{$key}.title") }}">
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="font-bold col-green">{!! trans("admin_seo.form.description") !!}</div>
                        <div class="form-line">
                            <textarea rows="3" class="form-control no-resize"
                                      name="metadata[{{ $key }}][description]">{{ !empty($metadata) ? $metadata->{"description:{$key}"} : old("metadata.{$key}.title") }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="font-bold col-green">{!! trans("admin_seo.form.key_word") !!}</div>
                        <div class="form-line">
                            <textarea rows="3" class="form-control no-resize"
                                      name="metadata[{{ $key }}][key_word]">{{ !empty($metadata) ? $metadata->{"key_word:{$key}"} : old("metadata.{$key}.title") }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endforeach

@push('add_script')
    @if(!empty($form_fields))
        @php $collection = collect($form_fields); @endphp

        @if($collection->contains('type', 'ckeditor'))
            <script type="text/javascript" src="/assets/plugins/ckeditor/ckeditor.js?v=1.0"></script>
            <script type="text/javascript" src="/assets/plugins/ckfinder/ckfinder.js"></script>
        @endif

        @if($collection->contains('type', 'ace'))
            <script src="/assets/plugins/ace-builds/src-noconflict/ace.js" type="text/javascript"
                    charset="utf-8"></script>
        @endif

        <script>
            jQuery(function ($) {
                var options = {
                    filebrowserBrowseUrl: '/assets/plugins/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '/assets/plugins/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '/assets/plugins/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                };
                @foreach($collection as $rs)
                    @if($rs['type'] === 'ckeditor')
                        @foreach($composer_locales as $key => $value)
                            @php
                                $input_name = !empty($rs['default_name']) ? str_replace('LOCALE', $key, $rs['default_name']) : "{$key}[{$rs["name"]}]";
                                $input_id = str_slug($input_name, '');
                            @endphp

                            var {{ $input_id }} = CKEDITOR.replace('{{ $input_id }}', options);
                            CKFinder.setupCKEditor({{ $input_id }}, '../');
                        @endforeach
                    @elseif($rs['type'] === 'ace')
                        @foreach($composer_locales as $key => $value)
                            @php
                                $input_name = !empty($rs['default_name']) ? str_replace('LOCALE', $key, $rs['default_name']) : "{$key}[{$rs["name"]}]";
                                $input_id = str_slug($input_name, '');
                            @endphp

                            var textarea_{{ $input_id }} = $('#{{ $input_id }}');
                            var editor_{{ $input_id }} = ace.edit('ace_{{ $input_id }}');
                            editor_{{ $input_id }}.setTheme("ace/theme/monokai");
                            editor_{{ $input_id }}.getSession().setMode("ace/mode/html");
                            editor_{{ $input_id }}.getSession().on('change', function () {
                                textarea_{{ $input_id }}.val(editor_{{ $input_id }}.getSession().getValue());
                            });
                        @endforeach
                    @endif
                @endforeach
            });
        </script>
    @endif
@endpush