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

//add news
Route::get('/admin/addnews/form', function () {return view('auth/admin_manage/addnews');})->name('storePage');
Route::post('/admin/addnews', [NewsController::class, 'store'])->name('storeNews');

//update news
Route::get('/admin/editnews/{id}',[NewsController::class, 'edit']);
Route::post('/admin/updatenews/{id}', [NewsController::class, 'update'])->name('updateNews');

//delete news
Route::post('/admin/deletenews/{id}', [NewsController::class, 'delete'])->name('deleteNews');

//show news
Route::get('/news', [NewsController::class, 'show'])->name('showNews');

