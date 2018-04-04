<?php

/*
|--------------------------------------------------------------------------
| 后台路由
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){
    Route::get('/v_info', function () { // => /admin/v_info
        return [
            'php_version' => phpversion(),
            'laravel_version'   =>  5.4,
            'mysql_version'     =>  5.6,
            'vue_version'       =>  2.0,
        ];
    });
    Route::get('/testuploadForm','TestController@uploadForm');
    Route::post('/testupload','TestController@upload');
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');
    Route::get('/index','EntryController@index');
    Route::get('/','EntryController@index');
    Route::get('/logout','EntryController@logout');
    Route::get('/changePassword','MyController@passwordForm');
    Route::post('/changePassword','MyController@changePassword');
    Route::resource('/tag','TagController');
    Route::resource('/video','VideoController');
});
