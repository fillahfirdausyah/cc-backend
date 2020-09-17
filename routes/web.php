<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsControllers;
use App\Http\Controllers\EventControllers;
// use App\Http\Controllers;


Auth::routes();

//Admin routes
Route::get('/admin', function () {return view('auth/login');});

//show news
Route::get('/admin/news', [NewsControllers::class, 'show'])->name('showNews');

//add news
Route::get('/admin/addnews/form', function() {return view('auth/admin_manage/addnews');})->name('storePage');
Route::post('/admin/addnews', [NewsControllers::class, 'store'])->name('storeNews');

//update news
Route::get('/editnews/{id}',[NewsControllers::class, 'edit']);
Route::post('/admin/updatenews/{id}', [NewsControllers::class, 'update'])->name('updateNews');

//delete news
Route::post('/deletenews/{id}', [NewsControllers::class, 'destroy'])->name('deleteNews');

//show event
Route::get('/admin/event', [EventControllers::class, 'show'])->name('showEvent');

//add event
Route::get('/admin/addevent/form', function() {return view('auth/admin_manage/event/addevent');} )->name('storePageEvent');
Route::post('/admin/addevent', [EventControllers::class, 'store'])->name('storeEvent');

//update event
Route::get('/editevent/{id}',[EventControllers::class, 'edit']);
Route::post('admin/updateevent/{id}', [EventControllers::class, 'update'])->name('updateevent');

//delete event
Route::post('/deleteevent/{id}', [EventControllers::class, 'destroy'])->name('deleteEvent');


