{{--
/**
 * $default_tabs: các tab mặc định sẽ được truyền vào trước tab ngôn ngữ
 * $languages_fields: lưu các input id, type của từng ngôn ngữ lại để sử dụng cho plugin
 * $default_tab: kiêm tra tab mặc định hiện thị đầu tiên của các ngôn ngữ
 * $composer_locales: danh sách ngôn ngữ đã enable trong hệ thống
 * $form_fields: dánh sách các fields ngôn ngữ
 * $form_plugins: danh sách js plugin
 * $is_ajax_request: kiem tra nó có phải là ajax ko, vì ajax nó sẽ ko sử dụng dc @push, nên mình phải insert code js bên ngoài
 * $tab_seo: có thêm seo fileds vào form hay ko?
 */
--}}
  <?php $composer_locales = \LaravelLocalization::getSupportedLocales() ?>
<ul class="nav nav-tabs tab-nav-right" role="tablist">
    @if(!empty($default_tabs))
        @foreach($default_tabs as $key => $value)
            <li role="presentation" class="{{ $key === 0 ? 'active': null }}">
                <a href="#{{ $value['id'] }}" data-toggle="tab" aria-expanded="false">
                    <span class="font-17">{{ $value['name'] }}</span>
                </a>
            </li>
        @endforeach
    @endif

    @foreach($composer_locales as $key => $locale)

    <?php $key_trans = $key ?>
        <li role="presentation" class="{{ empty($default_tabs) && $key === $composer_locale ? 'active' : null }}">
            <a href="#{{ !empty($tab_id) ? $tab_id : 'trans' }}_{{ $key }}" data-toggle="tab" aria-expanded="false">
                <span class="font-17">{!! trans("admin_translation.tab.{$key}") !!}</span>
            </a>
        </li>
    @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content p-t-20">
    @if(!empty($default_tabs))
        @foreach($default_tabs as $key => $value)
            <div role="tabpanel" class="tab-pane fade {{ $key === 0 ? 'active in': null }}" id="{{ $value['id'] }}">
                @include($value['path'])
            </div>
        @endforeach
    @endif

    @php $languages_fields = []; @endphp

    @foreach($composer_locales as $key => $value)
        <div role="tabpanel" class="tab-pane fade {{ $key === $default_tab ? 'active in' : null }}" id="{{ !empty($tab_id) ? $tab_id : 'trans' }}_{{ $key }}">
            @if(!empty($form_fields))
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($form_fields as $field)
                            @php
                                $input_name = !empty($field['default_name']) ? str_replace('LOCALE', $key, $field['default_name']) : "{$key}[{$field["name"]}]";
                                $input_id = str_slug($input_name, '');

                                $key_trans = $key;

                                $languages_fields[] = [
                                        'input_name' => $input_name,
                                        'input_id' => $input_id,
                                        'type' => $field["type"]
                                ];
                            @endphp
                            @if($field["type"] === "photo_translation")
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="font-bold col-green">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                        <div class="form-group">
                                            @component('admin.layouts.components.upload_photo', [
                                                'image' => !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}"),
                                                'name' => $input_name,
                                            ])
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>

                            @elseif($field["type"] === "image_map_translation")
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-bold col-green">{{ trans('admin_product_block.select_image_map') }}</div>
                                        <select class="form-control" name="{{ $input_name }}">
                                            <option value="">---</option>
                                            @foreach($image_map as $rs)
                                                <option value="{{$rs->id}}"
                                                    {{  !empty($object_trans) ? checkSelectedOption($rs->id, getImageMapID($object_trans, $key_trans)) : '' }}
                                                     />
                                                     {{$rs->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            @elseif($field["type"] === "text")
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{!! trans("{$translation_file}.form.{$field["name"]}") !!}</div>
                                    <div class="form-line">
                                        <input type="text" id="{!! $input_id !!}" class="form-control"
                                               name="{!! $input_name !!}"
                                               value="{{ !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}") }}">
                                        @if($field["name"] === 'url' || $field["name"] === 'guide_file')
                                            <button type="button" class="btn btn-primary btn_select_a_file" data-append="#{!! $input_id !!}" style="position: absolute; top: 2px; right:2px">{{ trans('button.or_select_a_file') }}</button>
                                        @endif
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
                <h3>{!! trans("admin_seo.seo") !!}</h3>
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
</div>

@if(!empty($is_ajax_request))
    @if(!empty($form_plugins))
        @if(in_array('ckeditor', $form_plugins))
            <script type="text/javascript" src="/assets/plugins/ckeditor/ckeditor.js?v=0.1"></script>
        @endif

        @if(in_array('ace', $form_plugins))
            <script src="/assets/plugins/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
        @endif

        <script>
            {
                let languages_fields = @json($languages_fields);
                jQuery(function ($) {
                    for (var i = 0, len = languages_fields.length; i < len; i++) {
                        switch (languages_fields[i]['type']) {
                            case 'ckeditor':
                                installCkeditor(languages_fields[i]['input_id']);
                                break;

                            case 'ace':
                                installAce(languages_fields[i]['input_id']);
                                break;
                        }
                    }
                });
            }
        </script>
    @endif
@else
    @push('add_script')
        @if(!empty($form_plugins))
            @if(in_array('ckeditor', $form_plugins))
                <script type="text/javascript" src="/assets/plugins/ckeditor/ckeditor.js?v=1.0"></script>
            @endif

            @if(in_array('ace', $form_plugins))
                <script src="/assets/plugins/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
            @endif

            <script>
                {
                    let languages_fields = @json($languages_fields);
                    jQuery(function ($) {
                        for (var i = 0, len = languages_fields.length; i < len; i++) {
                            switch (languages_fields[i]['type']) {
                                case 'ckeditor':
                                    installCkeditor(languages_fields[i]['input_id']);
                                    break;

                                case 'ace':
                                    installAce(languages_fields[i]['input_id']);
                                    break;
                            }
                        }
                    });
                }
            </script>
        @endif
    @endpush
@endif
