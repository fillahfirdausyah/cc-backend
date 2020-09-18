<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('index');
});


// Admin //
// News
Route::get('/admin/news', 'NewsController@index');
Route::get('/admin/news/add', 'NewsController@create');
// User
Route::get('/admin/user/list', 'UserController@index');
Route::get('/admin/user/add', 'UserController@create');
Route::get('/admin/user/store', 'UserController@store');
Route::get('/admin/user/edit/{id}', 'UserController@show');
Route::post('/admin/user/update', 'UserController@update');
Route::get('/admin/user/delete/{id}', 'UserController@destroy');




Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified', 'cekrole')->name('home');
