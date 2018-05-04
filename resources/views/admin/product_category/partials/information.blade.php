<div class="row">
    <div class="col-md-6">
        <p>{!! trans("admin_product_category.form.parent_category") !!}</p>
        <div class="form-group">
            <div class="list-tree">
                {!! $out_put !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p>{!! trans("admin_product_category.form.icon") !!}</p>
        <div class="form-group">
            <div class="single-upload" id="category-icon">
                @if(!empty($category->icon))
                    <div class="out-image">
                        <img src="{!!  assetStorage($category->icon) !!}">
                        <button class="btn_delete_this" data-name="delete_icon" data-value="{!! $category->icon !!}"
                                data-multi="" data-parent=".single-upload">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </div>
                @endif

                <div class="box-upload" @if(!empty($category->icon)) style="display: none;" @endif>
                    <label for="select-photo" class="label-select-images">
                        <span class="glyphicon glyphicon-picture"></span>
                    </label>
                    <input type="file"
                           id="select-photo"
                           data-append="#category-icon"
                           data-name="category_icon"
                           data-template="#photo-template"
                           data-callback="callbackHandlePhoto"
                           class="dz_select_photos"
                           accept="image/*">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($category) ? $category : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
            ["type" => "textarea", "name" => "description"]
        ],
        "translation_file" => "admin_product_category"
    ])
</div>