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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// users
Route::get('/users', 'UsersController@index')->name('profile');
Route::get('/users/create-new', 'UsersController@create_page')->name('create');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('index');
Route::get('/categories/create-new', 'CategoriesController@create_page')->name('create_page');
Route::post('/categories/create-new', 'CategoriesController@save_page')->name('create_page');
Route::get('/categories/update/{categories}', 'CategoriesController@update_page')->name('edit');
Route::post('/categories/update/{categories}', 'CategoriesController@update_save')->name('update');
Route::delete('/categories/delete/{categories}', 'CategoriesController@delete')->name('delete');
Route::get('/categories/view/{categories}', 'CategoriesController@view_categories')->name('view');

// production house
Route::get('/productions', 'ProductionhouseController@index')->name('index');
Route::get('/productions/create-new', 'ProductionhouseController@create_page')->name('create_page');
Route::post('/productions/create-new', 'ProductionhouseController@save_page')->name('create_page');
Route::get('/productions/update/{production}', 'ProductionhouseController@update_page')->name('edit');
Route::post('/productions/update/{production}', 'ProductionhouseController@save_update')->name('edit');
Route::delete('/productions/delete/{production}', 'ProductionhouseController@delete')->name('delete');

Route::get('/movie', 'movieController@index')->name('index');
Route::get('/movie/create-new', 'movieController@create_page')->name('create_page');
Route::post('/movie/create-new', 'movieController@save_page')->name('create_page');
Route::get('/movie/update/{movie}', 'movieController@update_page')->name('edit');
Route::post('/movie/update/{movie}', 'movieController@update_save')->name('edit');
Route::delete('/movie/delete/{movie}', 'movieController@delete')->name('delete');
