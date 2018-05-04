<ul id="sortable-galleries" class="list-photos">
    @if(!empty($product))
        @foreach($product->_galleries as $rs)
            <li data-id="{{ $rs->id }}">
                <div class="box-image">
                    <img src="{{ $rs->arrayPath(true)["medium"] }}" alt="{{ $product->name }}">
                    <button type="button"
                            class="btn_delete_this"
                            data-parent ="li"
                            data-multi="1"
                            data-name="delete_galleries[]"
                            data-value="{{ $rs->id }}">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
            </li>
        @endforeach
    @endif
</ul>
<div class="clearfix"></div>
<div class="multi-upload">
    <div class="box-upload">
        <label for="select-galleries" class="label-select-images">
            <span class="glyphicon glyphicon-picture"></span>
        </label>
        <input type="file"
               multiple
               id="select-galleries"
               data-append="#sortable-galleries"
               data-name="galleries[]"
               data-template="#photos-template"
               data-callback="callbackHandlePhotos"
               class="dz_select_photos"
               accept="image/*">
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-float">
            <div class="form-group">
                <input type="checkbox" id="has_gallery_qr" name="has_gallery_qr" value="1" {!! !empty($product) && $product->gallery_qr ? "checked" : null !!}>
                <label for="has_gallery_qr">{!! trans("admin_product.form.gallery_qr") !!}</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        @if(!empty($product) && $product->gallery_qr)
            <img src="{{ assetStorage($product->gallery_qr) }}" width="100">
        @endif
    </div>
</div>