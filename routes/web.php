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
// Route::get('/admin', function(){
//     return view('admin.dashboard');
// });

// Admin
Route::get('/news', 'NewsController@index');
Route::get('/user/list', 'UserController@index');
Route::get('/user/add', 'UserController@create');
Route::post('/user/add', 'UserController@store');


Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified')->name('home');
