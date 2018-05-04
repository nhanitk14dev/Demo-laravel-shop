<div class="row">
    <div class="col-md-6">
        <h2 class="card-inside-title">English</h2>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="metadata[en][title]" value="{!! !empty($metadata) && $metadata->hasTranslation("en") ? $metadata->translate("en")->title : old("metadata.en.title") !!}">
                <label class="form-label">{!! trans("admin_seo.form.title") !!}</label>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line focused">
                <textarea rows="4" class="form-control no-resize" name="metadata[en][description]">{!! !empty($metadata) && $metadata->hasTranslation("en") ? $metadata->translate("en")->description : old("metadata.en.description") !!}</textarea>
                <label class="form-label">{!! trans("admin_seo.form.description") !!}</label>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line">
                <textarea rows="4" class="form-control no-resize" name="metadata[en][key_word]">{!! !empty($metadata) && $metadata->hasTranslation("en") ? $metadata->translate("en")->key_word : old("metadata.en.key_word") !!}</textarea>
                <label class="form-label">{!! trans("admin_seo.form.key_word") !!}</label>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <h2 class="card-inside-title">Vietnamese</h2>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="metadata[vi][title]" value="{!! !empty($metadata) && $metadata->hasTranslation("vi") ? $metadata->translate("vi")->title : old("metadata.vi.title") !!}">
                <label class="form-label">{!! trans("admin_seo.form.title") !!}</label>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line">
                <textarea rows="4" class="form-control no-resize" name="metadata[vi][description]">{!! !empty($metadata) && $metadata->hasTranslation("vi") ? $metadata->translate("vi")->description : old("metadata.vi.description") !!}</textarea>
                <label class="form-label">{!! trans("admin_seo.form.description") !!}</label>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line">
                <textarea rows="4" class="form-control no-resize" name="metadata[vi][key_word]">{!! !empty($metadata) && $metadata->hasTranslation("vi") ? $metadata->translate("vi")->key_word : old("metadata.vi.key_word") !!}</textarea>
                <label class="form-label">{!! trans("admin_seo.form.key_word") !!}</label>
            </div>
        </div>
    </div>
</div>