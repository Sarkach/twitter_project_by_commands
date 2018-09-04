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
    return view('welcome');
});

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('roles', 'RoleController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('roles/{role}/remove', 'RoleController@remove')
     ->name('roles.remove');
	 
/*-----------------------------------------------------------------*/

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('publications', 'PublicationController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('publications/{publication}/remove', 'PublicationController@remove')
     ->name('publications.remove');
	 
	 /*-----------------------------------------------------------------*/
// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('pictures', 'PictureController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('pictures/{picture}/remove', 'PictureController@remove')
     ->name('pictures.remove');
	 
	 /*-----------------------------------------------------------------*/
// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('genders', 'GenderController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('genders/{gender}/remove', 'GenderController@remove')
     ->name('genders.remove');
	 
	 /*-----------------------------------------------------------------*/
// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('comments', 'RoleController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('comments/{comment}/remove', 'CommentController@remove')
     ->name('comments.remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
