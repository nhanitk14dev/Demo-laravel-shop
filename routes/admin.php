<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ],
    function () {
    Route::group(["prefix" => "admin"], function () {

            Auth::routes();

            //copy file kernel.php trong App\Http
            Route::group(['middleware' => ['auth',"permission:admin.index"]], function () {

                //trang chu
                Route::get('/dashboard', function () {
                    return view("admin.layouts.master");
                })->name("admin.index");

                resourceAdmin('users', 'UserController', 'user');

                resourceAdmin('roles', 'RoleController', 'role');

                resourceAdmin('products', 'ProductController', 'product');

                resourceAdmin('product-categories', 'ProductCategoryController', 'product_category', 'product.category');

                resourceAdmin('sizes', 'SizeController', 'size');

                resourceAdmin('colors', 'ColorController', 'color');

                resourceAdmin('sliders', 'SliderController', 'slider');
            });
        });

});

?>
