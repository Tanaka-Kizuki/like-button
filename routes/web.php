<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;

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
Route::get('/posts/{post?}/check', 'LikeController@check')->name('like.check');
Route::get('/posts/{post?}/firstcheck', 'LikeController@firstcheck')->name('like.firstcheck');
Route::resource('posts.likes', 'LikeController', [
     'only' => ['store'],
]);
Route::get('/','PostController@index');
Route::post('/add','PostController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
