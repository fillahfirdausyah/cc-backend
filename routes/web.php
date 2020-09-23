<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*-----------------------------------------------------------------------------------*/








//layouts
Route::get('/user/',function(){ return view('/social_network/timeline'); });
Route::get('/user/chat/',function(){ return view('/social_network/chat'); });
Route::get('/user/profile/',function(){ return view('/social_network/description'); });
Route::get('/user/profile/settings',function(){ return view('/social_network/setting'); });
Route::get('/user/image/',function(){ return view('/social_network/image'); });
Route::get('/user/friend/',function(){ return view('/social_network/friend'); });
Route::get('/user/notification/',function(){ return view('/social_network/notification'); });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
//Admin routes
Route::get('/admin', function () {return view('auth/login');});

/*Bagian admin edit News*/
Route::get('/admin/news', 'NewsControllers@show')->name('showNews');
Route::get('/admin/news/form', function() {return view('auth/admin_manage/addnews');})->name('storePage');
Route::post('/admin/news/add', 'NewsControllers@store')->name('storeNews');
Route::get('/admin/news/edit/{id}','NewsControllers@edit');
Route::post('/admin/news/update/{id}', 'NewsControllers@update')->name('updateNews');
Route::post('/admin/news/delete/{id}', 'NewsControllers@destroy')->name('deleteNews');

Route::get('/admin/event', 'EventControllers@show')->name('showEvent');
Route::get('/admin/event/form', function() {return view('auth/admin_manage/Event/addevent');} )->name('storePageEvent');
Route::post('/admin/event/add', 'EventControllers@store')->name('storeEvent');
Route::get('/admin/event/edit/{id}','EventControllers@edit');
Route::post('/admin/event/update/{id}', 'EventControllers@update')->name('updateevent');
Route::post('/admin/event/delete/{id}', 'EventControllers@destroy')->name('deleteEvent');

/*Bagian admin edit user*/
Route::get('/admin/user', 'UserControllers@show');
Route::get('admin/user/edit/{id}', 'UserControllers@edit');
Route::post('admin/user/update/{id}', 'UserControllers@update');
Route::post('admin/user/delete/{id}', 'UserControllers@destroy');




