<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//with 'match' we can use more the one HTTP verb
//Route::match(['get', 'post'], '/example2', function(){
//    return "oi";
//});

//'any' accepts any HTTP verb
//Route::any('/example', function(){});

//everytime it finds an 'id' as a parameter, it applies this constraint
//this eliminate the need of '->where('id', '[0-9]+')' 
Route::pattern('id', '[0-9]+');

//*** learning how to send parameters ***
//'?' turns the parameter optional
//[0-9] accepts 0-9 digits, '+' minimum one digit
//Route::get('user/{id?}', function($id = null){
//Route::get('user/{id?}', function($id = 123){
//    if($id)
//        return "Olá $id";
//    
//    return "Não possui ID";
//})->where('id', '[0-9]+');

//*** naming a route ***
//Route::get('cool-products', ['as' => 'products', function(){
//    //returns the route been accessed
//    echo Route::currentRouteName();
//    //return 'Products';
//}]);
//
////returns the route: http://localhost:8000/cool-products
//echo route('products'); die;
//
///*** redirects to the route ***
//redirect()->route('produtos');

//*** grouping routes ***
//Route::group(['prefix' => 'admin'], function(){
//    Route::get('products', function(){
//       return 'Products'; 
//    });
//});

//*** route model binding ***
//old way:
//Route::get('/category/{id}',function($id){
//    $category = new \CodeCommerce\Category();
//    $c = $category->find($id);
//    
//    return $c->name;
//});
//right way:
//need to change  the boot function at the RouteServiceProvider
//Route::get('/category/{category}', function(\CodeCommerce\Category $category){
//    
//    dd($category);
//});


Route::get('/','StoreController@index');
//Route::get('/category/{id}', ['as' => 'store.products.by_category', 'uses' => 'StoreController@productsByCategory']);
Route::get('/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('/example','WelcomeController@example');

//Route::get('/categories','CategoriesController@index');

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
//Route::get('/admin/categories','AdminCategoriesController@index');
//Route::get('/admin/products','AdminProductsController@index');
