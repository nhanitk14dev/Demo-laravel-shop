<?php
return [
	"admin" => [
        "model" => "Admin",
        "permissions" => [
            "admin.index" => "Admin index"
        ]
    ],

    "user" => [
        "model" => "User",
        "permissions" => [
            "admin.user.index" => "User index",
            "admin.user.create" => "Create user",
            "admin.user.edit" => "Edit user",
            "admin.user.destroy" => "Delete user",
            "admin.user.set.permission" => "Set permissions"
        ]
    ],

    "role" => [
        "model" => "Role",
        "permissions" => [
            "admin.role.index" => "Role index",
            "admin.role.create" => "Create role",
            "admin.role.edit" => "Edit role",
            "admin.role.destroy" => "Delete role"
        ]
    ],

    "product" => [
        "model" => "Product",
        "permissions" => [
            "admin.product.index" => "Product index",
            "admin.product.create" => "Create product",
            "admin.product.edit" => "Edit product",
            "admin.product.destroy" => "Delete product"
        ]
    ],

    "product_category" => [
        "model" => "ProductType",
        "permissions" => [
            "admin.product.category.index" => "Product category index",
            "admin.product.category.create" => "Create product category",
            "admin.product.category.edit" => "Edit product category",
            "admin.product.category.destroy" => "Delete product category",
        ]
    ],
    //da phuong tien
    "product_category" => [
        "model" => "ProductType",
        "permissions" => [
            "admin.product.category.index" => "Product category index",
            "admin.product.category.create" => "Create product category",
            "admin.product.category.edit" => "Edit product category",
            "admin.product.category.destroy" => "Delete product category",
        ]
    ],

    "size" => [
        "model" => "Size",
        "permissions" => [
            "admin.size.index" => "Size index",
            "admin.size.create" => "Create size",
            "admin.size.edit" => "Edit size",
            "admin.size.destroy" => "Delete size"
        ]
    ],

    "color" => [
        "model" => "Color",
        "permissions" => [
            "admin.color.index" => "Color index",
            "admin.color.create" => "Create color",
            "admin.color.edit" => "Edit color",
            "admin.color.destroy" => "Delete color"
        ]
    ],

		"sliders" => [
        "model" => "Sliders",
        "permissions" => [
            "admin.slider.index" => "Slider index",
            "admin.slider.create" => "Create Slider",
            "admin.slider.edit" => "Edit Slider",
            "admin.slider.destroy" => "Delete Slider"
        ]
    ],

];
