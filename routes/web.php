<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AquacultureController;
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });

use App\Http\Controllers\InventoryController;

Route::get('/inventory', [InventoryController::class, 'index']);
Route::resource('inventories', InventoryController::class);

use App\Http\Controllers\VendorController;

Route::get('/vendor', [VendorController::class, 'index']);
Route::resource('vendors', VendorController::class);

Route::get('/user', [UserController::class, 'index']);
Route::resource('users', UserController::class);

use App\Http\Controllers\WaterQualityController;

Route::get('/water-quality', [WaterQualityController::class, 'index'])->name('waterQuality.index');


use App\Http\Controllers\Auth\RegisterController;

Route::get('register/initiate', [RegisterController::class, 'showInitiateRegistrationForm'])->name('register.initiate');
Route::post('register/initiate', [RegisterController::class, 'sendRegistrationLink'])->name('register.initiate.send');
Route::get('register/complete/{token}', [RegisterController::class, 'showCompleteRegistrationForm'])->name('register.complete');
Route::post('register/complete/{token}', [RegisterController::class, 'completeRegistration'])->name('register.complete.store');
Route::get('register/expired', function () {
	return view('auth.expired');
})->name('register.expired');

use App\Http\Controllers\GalleryController;

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');

// Add this route for the multi-delete functionality
Route::delete('/gallery/multi-delete', [GalleryController::class, 'multiDelete'])->name('gallery.multiDelete');

// Resource route (except for the create, edit, update, show actions)
Route::resource('gallery', GalleryController::class)->except(['create', 'edit', 'update', 'show']);



Route::get('/activity', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities/store', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/events', [ActivityController::class, 'getEvents'])->name('activities.events');
Route::resource('activities', ActivityController::class);




Route::group(['middleware' => 'auth'], function () {
	// Route::get('register/initiate', [RegisterController::class, 'showInitiateRegistrationForm'])->name('register.initiate');
	// Route::post('register/initiate', [RegisterController::class, 'sendRegistrationLink'])->name('register.initiate.send');
	// Route::get('register/complete/{token}', [RegisterController::class, 'showCompleteRegistrationForm'])->name('register.complete');
	// Route::post('register/complete/{token}', [RegisterController::class, 'completeRegistration'])->name('register.complete.store');

	// Route::resource('userlist', UserController::class, ['except' => ['show']]);
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
	Route::get('{page}', [PageController::class, 'index'])->name('page.index');
});



