<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
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

//show news
Route::get('/admin/news', [NewsController::class, 'show'])->name('showNews');

//add news
Route::get('/admin/addnews/form', function() {return view('auth/admin_manage/addnews');})->name('storePage');
Route::post('/admin/addnews', [NewsController::class, 'store'])->name('storeNews');

//update news
Route::get('/editnews/{id}',[NewsController::class, 'edit']);
Route::post('/admin/updatenews/{id}', [NewsController::class, 'update'])->name('updateNews');

//delete news
Route::post('/deletenews/{id}', [NewsController::class, 'delete'])->name('deleteNews');

//show event
Route::get('/admin/event', [EventController::class, 'show'])->name('showEvent');

//add event
Route::get('/admin/addevent/form', function() {return view('auth/admin_manage/event/addevent');} )->name('storePageEvent');
Route::post('/admin/addevent', [EventController::class, 'store'])->name('storeEvent');

//update event
Route::get('/editevent/{id}',[EventController::class, 'edit']);
Route::post('admin/updateevent/{id}', [EventController::class, 'update'])->name('updateevent');

//delete event
Route::post('/deleteevent/{id}', [EventController::class, 'delete'])->name('deleteEvent');


