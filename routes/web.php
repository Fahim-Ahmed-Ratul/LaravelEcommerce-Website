<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
Frontend Produts
*/

Route::get('/', 'frontend\PagesController@index')->name('index');
Route::get('/contact', 'frontend\PagesController@contact')->name('contact');

Route::group(['prefix'=> 'products'],function(){
  Route::get('/','frontend\ProductsController@index')->name('products');
  Route::get('/{slug}','frontend\ProductsController@show')->name('products.show');
  Route::get('new//search','frontend\PagesController@search')->name('search');
  //category routes
  Route::get('/categories','frontend\CategoriesController@index')->name('categories.index');
  Route::get('/category/{id}','frontend\CategoriesController@show')->name('categories.show');
});

//Route::get('/search','frontend\PagesController@search')->name('search');

//Admin Routes
Route::group(['prefix'=> 'admin'],function(){
  Route::get('/','backend\PagesController@index')->name('admin.index');
  //Product Routes
  Route::group(['prefix' => '/products'],function(){
    Route::get('/','backend\ProductsController@index')->name('admin.products');
    Route::get('/create','backend\ProductsController@create')->name('admin.product.create');
    Route::get('/edit/{id}','backend\ProductsController@edit')->name('admin.product.edit');
    Route::post('/store','backend\ProductsController@store')->name('admin.product.store');
    Route::post('/product/delete/{id}','backend\ProductsController@destroy')->name('admin.product.delete');
    Route::post('/product/edit/{id}','backend\ProductsController@update')->name('admin.product.update');
  });

  Route::group(['prefix' => '/categories'],function(){
    Route::get('/','backend\CategoriesController@index')->name('admin.categories');
    Route::get('/create','backend\CategoriesController@create')->name('admin.category.create');
    Route::get('/edit/{id}','backend\CategoriesController@edit')->name('admin.category.edit');
    Route::post('/store','backend\CategoriesController@store')->name('admin.category.store');
    Route::post('/category/delete/{id}','backend\CategoriesController@destroy')->name('admin.category.delete');
    Route::post('/category/edit/{id}','backend\CategoriesController@update')->name('admin.category.update');
  });
  //brand routes
  Route::group(['prefix' => '/brands'],function(){
    Route::get('/','backend\BrandsController@index')->name('admin.brands');
    Route::get('/create','backend\BrandsController@create')->name('admin.brand.create');
    Route::get('/edit/{id}','backend\BrandsController@edit')->name('admin.brand.edit');
    Route::post('/store','backend\BrandsController@store')->name('admin.brand.store');
    Route::post('/brand/delete/{id}','backend\BrandsController@destroy')->name('admin.brand.delete');
    Route::post('/brand/edit/{id}','backend\BrandsController@update')->name('admin.brand.update');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
