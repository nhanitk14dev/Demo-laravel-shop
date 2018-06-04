<?php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localizationRedirect' ]
],
function(){
	//--------------custom ------------------------
	Route::get(LaravelLocalization::transRoute('routes.register'), 'UserController@register')->name("front.register");

	Route::get('/', 'PageController@pagehome')->name("frontend.page.trangchu");

	Route::get(LaravelLocalization::transRoute('routes.product'), 'ProductController@index')->name("front.product.index");

	Route::get(LaravelLocalization::transRoute('routes.product_show'), 'ProductController@show')->name("front.product.show");

	Route::get(LaravelLocalization::transRoute('routes.about_us'), 'PageController@about')->name("front.about");

	Route::get(LaravelLocalization::transRoute('routes.contact_us'), 'PageController@contact')->name("front.contact");

	Route::get(LaravelLocalization::transRoute('routes.faq'), 'PageController@faq')->name("front.faq"); 
	Route::get(LaravelLocalization::transRoute('routes.compare_product'), 'ProductController@compare')->name("front.compare");

	Route::get(LaravelLocalization::transRoute('routes.cart'), 'ShoppingCartController@viewCart')->name("front.cart");

});


