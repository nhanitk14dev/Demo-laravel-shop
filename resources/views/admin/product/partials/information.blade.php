<div class="row">
    <div class="col-md-6">
        <p>{!! trans("admin_product.form.categories") !!}</p>
        <div class="form-group">
            <div class="list-tree">
              {!! $out_put_categories !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-4">
        <p> </p>
        <div class="form-group form-float">
            <div class="form-group">
                <input type="checkbox" id="is_new" name="is_new" value="1" {!! !empty($product) && $product->is_new ? "checked" : null !!}>
                <label for="is_new">{!! trans("admin_product.form.is_new") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p> </p>
        <div class="form-group form-float">
            <div class="form-group">
                <input type="checkbox" id="active" name="active" value="1" {!! !empty($product) && $product->active ? "checked" : null !!}>
                <label for="active">{!! trans("admin_product.form.active") !!}</label>
            </div>
        </div>
    </div>
</div>


<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($product) ? $product : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
            ["type" => "text", "name" => "remark"],
        ],
        "translation_file" => "admin_product"
    ])
</div>