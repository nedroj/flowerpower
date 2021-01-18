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
//Route::post('modified', 'LoginController@modified');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'ProductController@index')->name('home');

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', 'Controller@sendmail');

Route::get('/account', 'HomeController@edit')->middleware('verified');

Route::get('account/delete/{id}', 'HomeController@deleteReservation')->middleware('verified');

Route::get('delete-account', 'HomeController@deleteaccount')->middleware('verified');

Route::delete('delete-account', 'HomeController@deleteconfirm')->middleware('verified');

Route::get('/account/{user}',
    ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('verified');

Route::patch('/account/{user}',
    ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('verified');

// Admin routes
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('employee')->middleware('verified');

Route::get('/beheer/gebruikers',
    'UserController@index')->middleware('employee')->middleware('verified');

Route::patch('/beheer/gebruikers', 'UserController@index')->middleware('employee')->middleware('verified');

Route::get('/beheer/gebruiker/toevoegen',
    'UserController@adminCreate')->middleware('employee')->middleware('verified');

Route::post('/beheer/gebruiker/toevoegen',
    'UserController@adminAdd')->middleware('employee')->middleware('verified');

Route::get('/beheer/gebruikers/{user}',
    ['as' => 'users.adminEdit', 'uses' => 'UserController@adminEdit'])->middleware('verified')->middleware('employee');

Route::patch('/beheer/gebruikers/{user}',
    ['as' => 'users.adminUpdate', 'uses' => 'UserController@adminUpdate'])->middleware('verified')->middleware('employee');

Route::delete('/beheer/gebruikers/{user}',
    ['as' => 'users.adminDelete', 'uses' => 'UserController@adminDelete'])->middleware('verified')->middleware('employee');

Route::get('/beheer/producten',
    'ProductController@adminindex')->middleware('employee')->middleware('verified');

Route::get('/beheer/producten/toevoegen',
    'ProductController@createProduct')->middleware('employee')->middleware('verified');

Route::post('/beheer/producten/toevoegen',
    'ProductController@addProduct')->middleware('employee')->middleware('verified');

Route::get('/beheer/producten/{product}',
    ['as' => 'products.adminEdit', 'uses' => 'ProductController@editProduct'])->middleware('verified')->middleware('employee');

Route::patch('/beheer/producten/{product}',
    ['as' => 'products.adminUpdate', 'uses' => 'ProductController@updateProduct'])->middleware('verified')->middleware('employee');

Route::get('/beheer/producten/delete/{product}',
    ['as' => 'products.adminDelete', 'uses' => 'ProductController@deleteProduct'])->middleware('verified')->middleware('employee');
