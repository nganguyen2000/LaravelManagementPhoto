<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/categories',"Admin\CategoryController@index");
Route::get('/admin/photos',"Admin\PhotoController@index")->name('admin.photos');
Route::get('/auth/login',"Auth\LoginController@index");
Route::post('/auth/login',"Auth\LoginController@login");

Route::get('/home',"User\HomeController@index")->name('home');
Route::get('/admin/dashboard','Admin\DashBoardController@index')->name('admin.dashboard');
Route::get('admin/categories/create',"Admin\CategoryController@create");

Route::delete('/admin/photos/{id}',"Admin\PhotoController@delete");
Route::get('/admin/create',"Admin\PhotoController@create");
Route::post('/admin/create',"Admin\PhotoController@store");
