<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::post('show', 'Api\ApiController@show');
});


Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

// Route::get('show', 'Api\ApiController@show');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('news/show', 'Api\ApiController@news');
    Route::get('/member/detail', 'Api\UserController@detail');
});