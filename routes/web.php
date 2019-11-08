<?php
# Pages

use App\Http\Controllers\ShopController;

//(name is for the breadcrumbs)


#Shop
Route::prefix('shop')->group(function () {
  Route::name('shop')->get('/', 'ShopController@categories');
  Route::get('remove-item', 'ShopController@removeItem');
  Route::get('order-now', 'ShopController@orderNow');
  Route::get('clear-cart', 'ShopController@clearCart');
  Route::get('update-cart', 'ShopController@updateCart');
  Route::name('checkout')->get('checkout', 'ShopController@checkout');
  Route::get('add-to-cart', 'ShopController@addToCart');
  Route::name('products')->get('{curl}', 'ShopController@products');
  Route::name('item')->get('{curl}/{purl}', 'ShopController@item');
});

Route::get('search', 'ShopController@search');
Route::get('search-result', 'ShopController@getSearchedProduct');

#user
Route::prefix('user')->group(function () {
  Route::name('signin')->get('signin', 'UserController@getSignin');
  Route::post('signin', 'UserController@postSignin');
  Route::name('signup')->get('signup', 'UserController@getSignup');
  Route::post('signup', 'UserController@postSignup');
  Route::get('logout', 'UserController@logout');
});

#cms
Route::middleware('adminguard')->group(function () {
  Route::prefix('cms')->group(function () {
    Route::get('dashboard', 'CMSController@dashboard');
    Route::resource('menu', 'MenuController');
    Route::resource('content', 'ContentController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('products', 'ProductsController');
    Route::get('orders', 'CMSController@orders');
  });
});



#pages
//the routes for the pages controller pages should be at the end  
Route::name('home')->get('/', 'PagesController@home');

//now the about will be in menus table on the database 
//Route::name('about')->get('about', 'PagesController@about');

Route::name('content')->get('{url}', 'PagesController@content');
