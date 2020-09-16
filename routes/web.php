<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
// use App\Http\Controllers;

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

Auth::routes();

//Admin routes
Route::get('/admin', function () {return view('auth/login');});

//News routes
Route::get('admin/news', function () { return view('auth/admin_manage/addnews'); });
Route::post('/addnews', [NewsController::class, 'store'])->name('storeNews');

//endAdmin routes

//View routes
Route::get('/news', [NewsController::class, 'show']);
//endView routes
