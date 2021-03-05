<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::get('/showbaru', function() {
	return view('showroom2.showroom');
});

Route::get('/car-details', function() {
	return view('showroom2.car-details');
});

// Home //
Route::get('/', 'IndexController@index');
Route::get('/news/{slug}', 'IndexController@news');
Route::get('/master', function() {
    return view('layouts.master');
});


Route::group(['middleware' => 'auth'], function() {
Route::group(['middleware' => 'privilege'], function () {
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

// Gallery
Route::get('/admin/gallery/list', 'GalleryController@index');
Route::get('/admin/gallery/tambah', 'GalleryController@create');
Route::post('/admin/gallery/store', 'GalleryController@store');

// User
Route::get('/admin/user/list', 'UserController@index');
Route::get('/admin/user/add', 'UserController@create');
Route::get('/admin/user/store', 'UserController@store');
Route::get('/admin/user/edit/{id}', 'UserController@edit');
Route::post('/admin/user/update/{id}', 'UserController@update');
Route::get('/admin/user/delete/{id}', 'UserController@destroy');
Route::get('/admin/user/verify/{id}', 'UserController@verify');

//Region
Route::post('/admin/region/store', 'RegionController@store');
Route::get('/admin/region/delete/{id}', 'RegionController@destroy');
});

// Keuangan
// Nasional
Route::get('/admin/keuangan', 'KeuanganController@index');
Route::get('/admin/keuangan/add', 'KeuanganController@create');
Route::post('/admin/keuangan/store', 'KeuanganController@store');
Route::get('/admin/keuangan/edit/{id}', 'KeuanganController@edit');
Route::post('/admin/keuangan/update/{id}/{regid}', 'KeuanganController@update');
Route::get('/admin/keuangan/delete/{id}', 'KeuanganController@destroy');
Route::get('/admin/keuangan/details', 'KeuanganController@show');
Route::get('/admin/keuangan/grafik', 'KeuanganController@graphic');
Route::post('/admin/keuangan/nama/', 'KeuanganController@filter_name');
Route::post('/admin/keuangan/getemail', 'KeuanganController@getEmail');

//Regional
Route::get('/admin/keuangan/{region}', 'KeuanganRegionalController@index');
////////////////////////

// Undian
Route::get('/admin/undian', 'UndianController@index');


// ############################################################## //

// Member //
// Home
Route::get('/member/home', 'MemberController@index')->middleware('auth');
Route::get('/member/tentang', 'MemberController@about');
Route::get('/member/galery', 'MemberController@galery');
Route::get('/member/teman/{id}', 'MemberController@friend');
Route::get('/member/home/teman/{id}', 'MemberController@homefriend');
Route::get('/member/profile', 'MemberController@profile');
Route::get('/member/profile/details', 'MemberController@profile_details');
Route::post('/member/edit/profile/{id}', 'MemberController@editProfile');
// DetailMember
Route::get('/member/profile/{username}', 'DetailMemberController@friendDetail');
Route::get('/member/profile/details/{username}', 'DetailMemberController@friendProfileDetails');
Route::get('/member/galery/{username}', 'DetailMemberController@friendGallery');

// Post
Route::get('/member/post/index', 'PostController@index');
Route::post('/member/post/store', 'PostController@store');
Route::get('/member/post/edit/{id}', 'PostController@edit');
Route::post('/member/post/update/{id}', 'PostController@update');
Route::get('/member/post/delete/{id}', 'PostController@destroy');
Route::get('/post', 'PostController@index');

// Like
Route::post('/member/post/like/{id}', 'PostController@like');
// Comment
Route::post('/post/comment', 'CommentpostController@store');
Route::delete('/post/comment/delete/{id}', 'CommentpostController@destroy');

// Iuran
Route::get('/member/kartu/iuran', 'KartuIuranController@index');
Route::post('/member/kartu/iuran/store/{regid}', 'KartuIuranController@store');

// Region
Route::post('/member/daerah/new', 'CrossregionController@create');
Route::post('/member/daerah/delete', 'CrossregionController@delete');
Route::get('/member/daerah', 'CrossregionController@index');

// Like
Route::post('/member/post/like/{id}', 'PostController@like');


// ############################################################## //

//tenant
Route::middleware(['cektenant'])->group(function () { 
	Route::get('/tenant', 'TenantController@index');
	Route::get('/showroom/upload/autoshop', 'AutoshopController@create');
	Route::post('/showroom/upload/autoshop', 'AutoshopController@store');
	Route::get('/showroom/upload/merchandise', 'MerchandiseController@create') ;
	Route::post('/showroom/upload/merchandise', 'MerchandiseController@store') ;
});
Route::get('/tenant/register', 'TenantController@create');
Route::post('/tenant/register', 'TenantController@store');
Route::get('/showroom/upload/car', 'ShowroomController@create');
Route::post('/showroom/upload/car', 'ShowroomController@store');

// Showroom
Route::get('/showroom', 'ShowroomController@index');
Route::get('/showroom/cars', 'ShowroomController@show');
Route::get('/showroom/car/{id}-{slug}', 'ShowroomController@detail');
Route::get('/showroom/car/edit/{id}', 'ShowroomController@edit');
Route::post('/showroom/car/edit', 'ShowroomController@update');
Route::delete('/showroom/car/{id}', 'ShowroomController@destroy');
Route::get('/showroom/car/like', 'ShowroomController@like');
Route::post('/showroom/car/comment', 'ShowroomController@comment');
Route::post('/showroom/car/stok/{id}', 'ShowroomController@stock');

// Autoshop
Route::get('/showroom/autoshop', 'AutoshopController@index');
Route::get('/showroom/autoshop/{id}-{slug}', 'AutoshopController@show');
Route::get('/showroom/autoshop/edit/{id}', 'AutoshopController@edit');
Route::post('/showroom/autoshop/edit', 'AutoshopController@update');
Route::delete('/showroom/autoshop/{id}', 'AutoshopController@destroy');
Route::post('/showroom/autoshop/comment', 'AutoshopController@comment');
Route::get('/showroom/autoshop/like', 'AutoshopController@like');


// Merchandise
Route::get('/showroom/merchandise', 'MerchandiseController@index');
Route::get('/showroom/merchandise/{id}-{slug}', 'MerchandiseController@show');
Route::get('/showroom/merchandise/edit/{id}', 'MerchandiseController@edit');
Route::post('/showroom/merchandise/edit', 'MerchandiseController@update');
Route::delete('/showroom/merchandise/{id}', 'MerchandiseController@destroy');
});


//wishlist
Route::get('/showroom/wishlist', 'WishlistController@index');
Route::post('/showroom/wishlist', 'WishlistController@store');
Route::delete('/showroom/wishlist', 'WishlistController@destroy');

Route::get('/pusher', function() {
	return view('pusherTest');
});

// Test Pusher
Route::get('test', function() {
	event(new App\Events\MyEvent('Hello World'));
	return 'even terkirim';
});

// Route::get('api/login', 'Api\ApiController@login');

Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified')->name('home');

