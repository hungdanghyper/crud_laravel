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
use App\Category;
use App\Type;
use App\Post;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'category'], function() {
    Route::get('getcate','CategoryController@getcate')->name('getcate');
    Route::get('create','CategoryController@createcate')->name('createcate');
    Route::post('store','CategoryController@storecate')->name('storecate');
    Route::post('update/{id}','CategoryController@updatecate')->name('updatecate');
    Route::get('show/{id}','CategoryController@showcate')->name('showcate');
    Route::get('edit/{id}','CategoryController@editcate')->name('editcate');
    Route::get('destroy/{id}','CategoryController@destroycate')->name('destroycate');
});

Route::group(['prefix' => 'type'], function() {
    Route::get('gettype','TypeController@gettype')->name('gettype');
    Route::get('create','TypeController@createtype')->name('createtype');
    Route::post('store','TypeController@storetype')->name('storetype');
    Route::post('update/{id}','TypeController@updatetype')->name('updatetype');
    Route::get('show/{id}','TypeController@showtype')->name('showtype');
    Route::get('edit/{id}','TypeController@edittype')->name('edittype');
    Route::get('destroy/{id}','TypeController@destroytype')->name('destroytype');
});

Route::group(['prefix'=>'post'], function(){
    Route::get('getpost','PostController@getpost')->name('getpost');
    Route::get('create','PostController@createpost')->name('createpost');
    Route::get('show/{id}','PostController@showpost')->name('showpost');
    Route::post('store','PostController@storepost')->name('storepost');
    Route::get('edit/{id}','PostController@editpost')->name('editpost');
    Route::post('update/{id}','PostController@updatepost')->name('updatepost');
    Route::get('destroy/{id}','Postcontroller@destroypost')->name('destroypost');
});
