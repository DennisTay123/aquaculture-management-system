<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WaterQualityController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Routes for authenticated users only
Route::group(['middleware' => 'auth'], function () {

	// Dashboard route
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

	// Profile routes
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');

	// Inventory routes
	Route::get('/inventory', [InventoryController::class, 'index']);
	Route::resource('inventories', InventoryController::class);

	// Vendor routes
	Route::get('/vendor', [VendorController::class, 'index']);
	Route::resource('vendors', VendorController::class);

	// Water Quality routes
	Route::get('/water-quality', [WaterQualityController::class, 'index'])->name('waterQuality.index');

	// Activity routes
	Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
	Route::get('/activity/events', [ActivityController::class, 'getEvents'])->name('activity.events');
	Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
	Route::post('/activity/store', [ActivityController::class, 'store'])->name('activity.store');
	Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activity.show');
	Route::put('/activity/{id}', [ActivityController::class, 'update'])->name('activity.update');

	// Gallery routes
	Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
	Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
	Route::delete('/gallery/multi-delete', [GalleryController::class, 'multiDelete'])->name('gallery.multiDelete');
	Route::resource('gallery', GalleryController::class)->except(['create', 'edit', 'update', 'show']);

	// User routes for account management
	Route::resource('users', UserController::class);


	// Pages routes
	Route::get('{page}', [PageController::class, 'index'])->name('page.index');



});



// Routes for Admin or Manager only
Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {




	// Registration routes accessible by Admin/Manager
	Route::get('register/initiate', [RegisterController::class, 'showInitiateRegistrationForm'])->name('register.initiate');
	Route::post('register/initiate', [RegisterController::class, 'sendRegistrationLink'])->name('register.initiate.send');
	Route::get('register/complete/{token}', [RegisterController::class, 'showCompleteRegistrationForm'])->name('register.complete');
	Route::post('register/complete/{token}', [RegisterController::class, 'completeRegistration'])->name('register.complete.store');
});
