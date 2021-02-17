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
Route::post('/admin/keuangan/update/{id}', 'KeuanganController@update');
Route::get('/admin/keuangan/delete/{id}', 'KeuanganController@destroy');
Route::get('/admin/keuangan/details', 'KeuanganController@show');
Route::get('/admin/keuangan/grafik', 'KeuanganController@graphic');
Route::post('/admin/keuangan/nama/', 'KeuanganController@filter_name');

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
Route::get('/member/profile', 'MemberController@profile');

// // DetailMember
Route::get('/member/details/{username}', 'DetailMemberController@detail');

// Post
Route::get('/member/post/index', 'PostController@index');
Route::post('/member/post/store', 'PostController@store');
Route::get('/member/post/edit/{id}', 'PostController@edit');
Route::post('/member/post/update/{id}', 'PostController@update');
Route::get('/member/post/delete/{id}', 'PostController@destroy');
Route::get('/post', 'PostController@index');

// Like
Route::post('/member/post/like/{id}', 'PostController@like');

// Showroom
Route::get('/showroom', 'ShowroomController@show');
Route::get('/showroom/image', function(){ return "../../public/public/image/"; })->name('takeImage');
Route::post('/showroom/search', 'ShowroomController@search');
Route::post('/showroom/category', 'ShowroomController@category');
Route::delete('/showroom/{id}', 'ShowroomController@destroy')->name('delete');
Route::post('/showroom/edit/{id}', 'ShowroomController@edit');
Route::post('/showroom/edit/proccess/{id}', 'ShowroomController@update');
Route::get('/showroom/promoSR/{id}', 'ShowroomController@createPromo');
Route::post('/showroom/tambahPromo/{id}', 'ShowroomController@promo');
Route::post('/showroom/stok/{id}', 'ShowroomController@stock');
Route::get('/showroom/more/sr', 'ShowroomController@moreSR');
Route::post('/showroom/more/sr/search', 'ShowroomController@searchSR');

// Bengkel
Route::get('/showroom/bengkel/promo/{id}', 'ShowroomController@createBengkelPromo');
Route::post('/showroom/bengkel/promo/{id}', 'ShowroomController@BengkelPromo');
Route::get('/showroom/bengkel/{id}', 'ShowroomController@editBengkel');
Route::post('/showroom/bengkel/{id}', 'ShowroomController@editBengkel');
Route::delete('/showroom/bengkel/{id}', 'ShowroomController@destroyBengkel');
Route::get('/showroom/more/bengkel', 'ShowroomController@moreBengkel');
Route::post('/showroom/more/bengkel/search', 'ShowroomController@searchBengkel');

//Showroom Support
Route::get('/showroom/like', 'VisitSRController@like');
Route::get('/showroom/likeBengkel', 'VisitSRController@likeBengkel');
Route::get('/showroom/bengkel/show/{id}-{slug}', 'VisitSRController@showBengkel');
Route::post('/showroom/comment', 'VisitSRController@comment');
Route::post('/showroom/commentbengkel', 'VisitSRController@comment_bengkel');
Route::get('/showroom/{id}-{slug}', 'VisitSRController@show');

// Route::middleware(['cekpenjual'])->group(function () { 
	Route::get('/showroom/upload/bengkel', 'ShowroomController@createBengkel');
	Route::Post('/showroom/upload/bengkel', 'ShowroomController@storeBengkel'); 
	Route::get('/showroom/upload', 'ShowroomController@create');
	Route::post('/showroom/upload/proccess', 'ShowroomController@store');
// });

// Comment
Route::post('/post/comment', 'CommentpostController@store');
Route::delete('/post/comment/delete/{id}', 'CommentpostController@destroy');

// Region
Route::post('/member/daerah/new', 'CrossregionController@create');
Route::post('/member/daerah/delete', 'CrossregionController@delete');
Route::get('/member/daerah', 'CrossregionController@index');

// Like
Route::post('/member/post/like/{id}', 'PostController@like');

});

Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->middleware('verified')->name('home');

// Route::get('api/login', 'Api\ApiController@login');
