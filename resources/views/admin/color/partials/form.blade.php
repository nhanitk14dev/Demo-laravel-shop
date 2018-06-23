<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($color) ? $color : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
        ],
        "translation_file" => "admin_color"
    ])
</div>