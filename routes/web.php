<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*-----------------------------------------------------------------------------------*/

Route::get('/showroom', 'ShowroomController@show');
// Route::get('/visit', function () {return view('layouts/visit');});
Route::get('/showroom/upload', function () {return view('showroom/uploadshowroom');});
Route::post('/showroom/upload/proccess', 'ShowroomController@store');
Route::get('/showroom/image', function(){ return "../../public/public/image/"; })->name('takeImage');
Route::get('/showroom/{id}-{slug}', 'VisitController@show');
Route::post('/showroom/search', 'ShowroomController@search');
Route::post('/showroom/comment', 'VisitController@comment');
Route::get('/showroom/like', 'VisitController@like');
Route::post('/showroom/category', 'ShowroomController@category');
Route::delete('/showroom/{id}', 'ShowroomController@destroy')->name('delete');
Route::post('/showroom/edit/{id}', 'ShowroomController@edit');
Route::post('/showroom/edit/proccess/{id}', 'ShowroomController@update');

// //layouts
// Route::get('/user', function () {return view('layouts.Social_Network');});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();
// //Admin routes
// Route::get('/admin', function () {return view('auth/login');});

// /*Bagian admin edit News*/
// Route::get('/admin/news', 'NewsControllers@show')->name('showNews');
// Route::get('/admin/news/form', function() {return view('auth/admin_manage/addnews');})->name('storePage');
// Route::post('/admin/news/add', 'NewsControllers@store')->name('storeNews');
// Route::get('/admin/news/edit/{id}','NewsControllers@edit');
// Route::post('/admin/news/update/{id}', 'NewsControllers@update')->name('updateNews');
// Route::post('/admin/news/delete/{id}', 'NewsControllers@destroy')->name('deleteNews');

// Route::get('/admin/event', 'EventControllers@show')->name('showEvent');
// Route::get('/admin/event/form', function() {return view('auth/admin_manage/Event/addevent');} )->name('storePageEvent');
// Route::post('/admin/event/add', 'EventControllers@store')->name('storeEvent');
// Route::get('/admin/event/edit/{id}','EventControllers@edit');
// Route::post('/admin/event/update/{id}', 'EventControllers@update')->name('updateevent');
// Route::post('/admin/event/delete/{id}', 'EventControllers@destroy')->name('deleteEvent');

// /*Bagian admin edit user*/
// Route::get('/admin/user', 'UserControllers@show');
// Route::get('admin/user/edit/{id}', 'UserControllers@edit');
// Route::post('admin/user/update/{id}', 'UserControllers@update');
// Route::post('admin/user/delete/{id}', 'UserControllers@destroy');




