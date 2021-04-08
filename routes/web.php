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
Route::get('/admin/user/showdata/{id}', 'UserController@showData');
Route::get('/admin/user/verify/{id}', 'UserController@verify');
Route::get('/admin/user/tenant', 'TenantController@list');
Route::get('/admin/user/tenant/verify/{id}', 'TenantController@verify');

//Region
Route::post('/admin/region/store', 'RegionController@store');
Route::get('/admin/region/delete/{id}', 'RegionController@destroy');
});

// Keuangan
// Nasional
Route::get('/admin/keuangan', 'KeuanganController@index');
Route::get('/admin/keuangan/pemasukan/add', 'KeuanganController@create');
Route::post('/admin/keuangan/pemasukan/store', 'KeuanganController@store');
Route::get('/admin/keuangan/pemasukan/edit/{id}', 'KeuanganController@edit');
Route::post('/admin/keuangan/pemasukan/update/{id}/{regid}', 'KeuanganController@update');
Route::get('/admin/keuangan/pemasukan/delete/{id}', 'KeuanganController@destroy');
Route::get('/admin/keuangan/pemasukan/details', 'KeuanganController@show');
Route::get('/admin/keuangan/grafik', 'KeuanganController@graphic');
Route::post('/admin/keuangan/nama/', 'KeuanganController@filter_name');
Route::post('/admin/keuangan/getemail', 'KeuanganController@getEmail');
Route::post('/admin/keuangan/getsaldo', 'KeuanganController@getSaldo');
Route::get('/admin/keuangan/pemasukan', 'KeuanganController@pemasukanIndex');
Route::get('/admin/keuangan/pemasukan/show/{id}', 'KeuanganController@pemasukanShow');
Route::get('/admin/keuangan/pemasukan/verify/{id}/{regid}', 'KeuanganController@pemasukanVerify');
Route::get('/admin/keuangan/pengeluaran', 'KeuanganController@pengeluaranIndex');
Route::get('/admin/keuangan/pengeluaran/add', 'KeuanganController@pengeluaranAdd');
Route::post('/admin/keuangan/pengeluaran/store', 'KeuanganController@pengeluaranStore');

// Undian
Route::get('/admin/undian', 'UndianController@index');

// Showroom
Route::get('/admin/showroom/acc/{id}', 'ShowroomController@accept');


// ############################################################## //

// Member //
// Home
Route::get('/member/home', 'MemberController@index')->middleware('auth', 'verifyAdmin');
Route::get('/member/home/verify', 'MemberController@verify')->middleware('notVerified');
Route::post('/member/home/verify/store', 'MemberController@verifyStore');
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
	Route::get('/tenant/edit/{id}', 'TenantController@edit');
	Route::post('/tenant/edit', 'TenantController@update');
	Route::get('/showroom/upload/autoshop', 'AutoshopController@create');
	Route::post('/showroom/upload/autoshop', 'AutoshopController@store');
	Route::get('/showroom/upload/merchandise', 'MerchandiseController@create') ;
	Route::post('/showroom/upload/merchandise', 'MerchandiseController@store') ;
	Route::get('/showroom/upload/car', 'ShowroomController@create');
	Route::post('/showroom/upload/car', 'ShowroomController@store');
});
Route::get('/tenant/register', 'TenantController@create');
Route::post('/tenant/register', 'TenantController@store');
Route::get('/tenant/car', 'TenantController@car');
Route::get('/tenant/merchandise', 'TenantController@merchandise');
Route::get('/tenant/autoshop', 'TenantController@autoshop');

// Showroom
Route::get('/showroom', 'ShowroomController@index');
Route::get('/showroom/cars', 'ShowroomController@show');
Route::get('/showroom/car/{id}-{slug}', 'ShowroomController@detail');
Route::get('/showroom/car/edit/{id}', 'ShowroomController@edit');
Route::post('/showroom/car/edit', 'ShowroomController@update');
Route::delete('/showroom/car/{id}', 'ShowroomController@destroy');
Route::get('/showroom/car/like', 'ShowroomController@like');
Route::get('/showroom/list/car', 'ShowroomController@list');
Route::post('/showroom/search/car', 'ShowroomController@search');

// Autoshop
Route::get('/showroom/autoshop', 'AutoshopController@index');
Route::get('/showroom/autoshop/{id}-{slug}', 'AutoshopController@show');
Route::get('/showroom/autoshop/edit/{id}', 'AutoshopController@edit');
Route::post('/showroom/autoshop/edit', 'AutoshopController@update');
Route::delete('/showroom/autoshop/{id}', 'AutoshopController@destroy');
Route::post('/showroom/autoshop/comment', 'AutoshopController@comment');
Route::delete('/showroom/autoshop/comment/{$id}', 'AutoshopController@deleteComment');
Route::get('/showroom/autoshop/like', 'AutoshopController@like');
Route::post('/showroom/search/autoshop', 'AutoshopController@search');


// Merchandise
Route::get('/showroom/merchandise', 'MerchandiseController@index');
Route::get('/showroom/merchandise/{id}-{slug}', 'MerchandiseController@show');
Route::get('/showroom/merchandise/edit/{id}', 'MerchandiseController@edit');
Route::post('/showroom/merchandise/edit', 'MerchandiseController@update');
Route::delete('/showroom/merchandise/{id}', 'MerchandiseController@destroy');
Route::post('/showroom/merchandise/comment', 'MerchandiseController@comment');
Route::post('/showroom/search/merchandise', 'MerchandiseController@search');
Route::get('/showroom/merchandise/comment/{id}', 'MerchandiseController@deleteComment');
});


//wishlist
Route::get('/showroom/wishlist', 'WishlistController@index');
Route::post('/showroom/wishlist', 'WishlistController@store');
Route::delete('/showroom/wishlist', 'WishlistController@destroy');

Route::get('/pusher', function() {
	return view('pusherTest');
});

// showroom Transaction
Route::post('/showroom/interest/merchandise', 'MerchandiseController@transaction');
Route::post('/showroom/interest/car', 'ShowroomController@transaction');
Route::post('/showroom/full', 'TransactionController@full');
Route::get('/showroom/transaction', 'TransactionController@index');
Route::post('/showroom/confirm', 'TransactionController@confirm');
Route::post('/showroom/received', 'TransactionController@received');
Route::post('/showroom/transfer', 'TransactionController@transfer');
Route::post('/showroom/notification/list', 'TransactionController@notifBuyer');
Route::post('/showroom/notification/tenant', 'TransactionController@notifSeller');


// Test Pusher
Route::get('/pushnotif', function() {
	event(new App\Events\KartuIuran('hello world'));
	return 'even terkirim';
});

Route::get('/pushertest', function() {
	return view('pusherTest');
});

// Route::get('api/login', 'Api\ApiController@login');

Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified')->name('home');
