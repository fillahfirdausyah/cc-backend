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
// Profile
Route::get('/profile/admin/{id}', 'UserController@show');
// News
Route::get('/admin/news/list', 'NewsController@index');
Route::get('/admin/news/add', 'NewsController@create');
Route::post('/admin/news/store', 'NewsController@store');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');
Route::post('/admin/news/update/{id}', 'NewsController@update');
Route::get('/admin/news/delete/{id}', 'NewsController@destroy');
Route::get('//admin/news/show/{slug}', 'NewsController@show');

// Event
Route::get('/admin/event/list', 'EventController@index');
Route::get('/admin/event/add', 'EventController@create');
Route::post('/admin/event/store', 'EventController@store');
Route::get('/admin/event/edit/{id}', 'EventController@edit');
Route::post('/admin/event/update/{id}', 'EventController@update');
Route::get('/admin/event/delete/{id}', 'EventController@destroy');

// User
Route::get('/admin/user/list', 'UserController@index');
Route::get('/admin/user/add', 'UserController@create');
Route::get('/admin/user/store', 'UserController@store');
Route::get('/admin/user/edit/{id}', 'UserController@edit');
Route::post('/admin/user/update/{id}', 'UserController@update');
Route::get('/admin/user/delete/{id}', 'UserController@destroy');

// ############################################################## //

// Member //
// Home
Route::get('/member/home', 'MemberController@index')->middleware('auth');
Route::get('/member/tentang', 'MemberController@about');
Route::get('/member/galery', 'MemberController@galery');
Route::get('/member/teman', 'MemberController@friend');
Route::get('/member/profile', 'MemberController@profile');

// DetailMember
Route::get('/member/{username}', 'DetailMemberController@detail');

// Post
Route::get('/member/post/index', 'PostController@index');
Route::post('/member/post/store', 'PostController@store');
Route::get('/member/post/edit/{id}', 'PostController@edit');
Route::post('/member/post/update/{id}', 'PostController@update');
Route::get('/member/post/delete/{id}', 'PostController@destroy');
Route::get('/post', 'PostController@index');





Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified')->name('home');

// Route::get('api/login', 'Api\ApiController@login');
