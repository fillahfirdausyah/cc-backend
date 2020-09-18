<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*-----------------------------------------------------------------------------------*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
//Admin routes
Route::get('/admin', function () {return view('auth/login');});

/*Bagian admin edit News*/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//admin show news
Route::get('/admin/news', 'NewsControllers@show')->name('showNews');
//admin add news
Route::get('/admin/news/form', function() {return view('auth/admin_manage/addnews');})->name('storePage');
Route::post('/admin/news/add', 'NewsControllers@store')->name('storeNews');
//admin update news
Route::get('/admin/news/edit/{id}','NewsControllers@edit');
Route::post('/admin/news/update/{id}', 'NewsControllers@update')->name('updateNews');
//admin delete news
Route::post('/admin/news/delete/{id}', 'NewsControllers@destroy')->name('deleteNews');
//+++++++++++++++++++++++++++++++END+++++++++++++++++++++++++++++++++++++++++++++++++


/*Bagian admin edit event*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//admin show event
Route::get('/admin/event', 'EventControllers@show')->name('showEvent');
//admin add event
Route::get('/admin/event/form', function() {return view('auth/admin_manage/Event/addevent');} )->name('storePageEvent');
Route::post('/admin/event/add', 'EventControllers@store')->name('storeEvent');
//admin update event
Route::get('/admin/event/edit/{id}','EventControllers@edit');
Route::post('/admin/event/update/{id}', 'EventControllers@update')->name('updateevent');
//admin delete event
Route::post('/admin/event/delete/{id}', 'EventControllers@destroy')->name('deleteEvent');
//+++++++++++++++++++++++++++++++END+++++++++++++++++++++++++++++++++++++++++++++++++

/*Bagian admin edit user*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//admin show user
Route::get('/admin/user', 'UserControllers@show');
//admin update user
Route::get('admin/user/edit/{id}', 'UserControllers@edit');
Route::post('admin/user/update/{id}', 'UserControllers@update');
//admin delete user
Route::post('admin/user/delete/{id}', 'UserControllers@destroy');
//+++++++++++++++++++++++++++++++END+++++++++++++++++++++++++++++++++++++++++++++++++

