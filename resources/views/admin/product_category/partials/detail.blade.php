<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($category) ? $category : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
            ["type" => "text", "name" => "alias_name"],
            ["type" => "textarea", "name" => "short_description"],
            ["type" => "ace", "name" => "description"]
        ],
        "translation_file" => "admin_product_category"
    ])
</div>