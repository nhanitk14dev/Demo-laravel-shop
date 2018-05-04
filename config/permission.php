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

    
    
];
