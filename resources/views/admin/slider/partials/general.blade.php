<div class="row">
  <div class="col-md-4">
        <p>{!! trans("admin_banner.form.image") !!}</p>
        <div class="form-group">
            <div class="single-upload" id="background-photo">
                @if(!empty($slider->image))
                    <div class="out-image">
                        <img src="{!!  assetStorage($slider->image) !!}">
                        <button class="btn_delete_this" data-name="delete_image" data-value="{!! $slider->image !!}" data-multi="" data-parent=".single-upload">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </div>
                @endif

                <div class="box-upload" @if(!empty($slider->image)) style="display: none;" @endif>
                    <label for="select-photo" class="label-select-images">
                        <span class="glyphicon glyphicon-picture"></span>
                    </label>
                    <input type="file"
                           id="select-photo"
                           data-append="#background-photo"
                           data-name="banner_image"
                           data-template="#photo-template"
                           data-callback="callbackHandlePhoto"
                           class="dz_select_photos"
                           accept="image/*">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_slider.form.key") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input class="key_slider" type="text" class="form-control" name="key" required value="{{ $slider->key ?? null }}">
            </div>
            <p>{!! trans("admin_slider.form.key_description") !!}</p>
        </div>

    </div>

    @php
        $hidden = (!isset($slider) || !(in_array($slider->key, config('constants.slider.has_expr')))) ? 'hidden' : '';
    @endphp

    <div class="col-md-2 exprdate {{ $hidden }}">
        <div class="font-bold col-green">{!! trans("admin_slider.form.fromDate") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input class="key_slider" type="text" class="form-control" name="expr_from" required value="{{ $slider->expr_from ?? null }}">
            </div>

        </div>

    </div>

    <div class="col-md-2 exprdate {{ $hidden }}">
        <div class="font-bold col-green">{!! trans("admin_slider.form.toDate") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input class="key_slider" type="text" class="form-control" name="expr_to" required value="{{ $slider->expr_to ?? null }}" >
            </div>

        </div>

    </div>

</div>
