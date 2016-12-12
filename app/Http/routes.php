<?php

//everytime it finds an 'id' as a parameter, it applies this constraint
//this eliminate the need of '->where('id', '[0-9]+')' 
Route::pattern('id', '[0-9]+');

Route::get('/','StoreController@index');
Route::get('/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('/product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('/tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
Route::get('/cart', ['as' => 'store.cart', 'uses' => 'CartController@index']);
Route::get('/cart/add/{id}', ['as' => 'store.cart.add', 'uses' => 'CartController@add']);
Route::get('/cart/destroy/{id}', ['as' => 'store.cart.destroy', 'uses' => 'CartController@destroy']);
Route::get('/cart/item/qty/increase/{id}', ['as' => 'store.cart.item.qty.increase', 'uses' => 'CartController@increaseQtyItem']);
Route::get('/cart/item/qty/decrease/{id}', ['as' => 'store.cart.item.qty.decrease', 'uses' => 'CartController@decreaseQtyItem']);
Route::get('/cart/item/qty/update/{id}/{qty}', ['as' => 'store.cart.item.qty.update', 'uses' => 'CartController@updateQtyItem']);

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as' => 'admin.products.index', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'ProductsController@create']);
        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('update/{id}', ['as' => 'admin.products.update', 'uses' => 'ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'ProductsController@destroy']);
        
        Route::group(['prefix'=>'images'], function(){
            Route::get('product/{id}', ['as' => 'admin.products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/product/{id}', ['as' => 'admin.products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/product/{id}', ['as' => 'admin.products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/product/{id}', ['as' => 'admin.products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
        });
    });
    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);   
        Route::get('create', ['as' => 'admin.categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('store', ['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'CategoriesController@destroy']);
    });    
});
