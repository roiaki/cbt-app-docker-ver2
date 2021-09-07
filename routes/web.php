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



Route::get('columns/index', 'App\Http\Controllers\ColumnsController@index');

//Route::get('columns/index', 'App\Http\Controllers\ColumnsController@index');

Route::resource('columns', 'App\Http\Controllers\ColumnsController');

// ユーザ登録
Route::get('signup', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'App\Http\Controllers\Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.post');
// ログアウト
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout.get');

// ユーザー退会確認画面遷移
Route::get('users/delete_confirm', 'App\Http\Controllers\UserController@delete_confirm')->name('users.delete_confirm');

// ユーザー退会処理
Route::delete('users/delete', 'App\Http\Controllers\UserController@userDelete')->name('users.delete');

// ログイン認証
Route::group(['middleware' => ['auth']], function () {
    Route::resource('columns', 'App\Http\Controllers\ColumnsController', ['only' => ['index', 'create', 'edit', 'show', 'store']]);
    
});
