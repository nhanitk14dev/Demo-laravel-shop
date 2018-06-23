<?php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localizationRedirect' ]
],
function(){
	//--------------custom ------------------------
	Route::get('/', 'ProductController@index')->name('page.home');
	//products
	Route::get(LaravelLocalization::transRoute('routes.product'),'ProductController@index')->name('product');
	Route::get(LaravelLocalization::transRoute('routes.product_show'), 'ProductController@show')->name("front.product.show");
	//checkout
	Route::get(LaravelLocalization::transRoute('routes.cart'),'ShoppingCartController@viewCart')->name('cart.view');
	Route::get(LaravelLocalization::transRoute('routes.checkout'), 'ShoppingCartController@showcart')->name('cart.checkout');

  Route::get('cap-nhat-gio/{id}',[
			'as'=>'updateCart',
			'uses'=>'ShoppingCartController@updateCart'
			]);
  Route::get('removeCart/{id}',[
			'as'=>'removecart',
			'uses'=>'ShoppingCartController@removeItem'
			]);
	//contact
	Route::get(LaravelLocalization::transRoute('routes.contact_us'), 'PageController@contact')->name('page.contact');
	Route::get(LaravelLocalization::transRoute('routes.faqs'), 'PageController@faqs')->name('page.faqs');
	Route::get(LaravelLocalization::transRoute('routes.about_us'), 'PageController@about')->name('page.about');

  Route::post('addCart/{id}',[
			'as'=>'addcart',
			'uses'=>'ShoppingCartController@addCart'
			]);

});
