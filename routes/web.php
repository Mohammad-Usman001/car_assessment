<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarInquiryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/car-inquiry', [CarInquiryController::class, 'create'])->name('car.inquiry.create');
Route::post('/car-inquiry', [CarInquiryController::class, 'store'])->name('car.inquiry.store');


Route::prefix('admin')->group(function () {

    Route::get('/', [AdminDashboardController::class,'index'])->name('admin.dashboard');

    // Site Settings
    Route::get('/settings', [SiteSettingController::class,'edit'])->name('admin.settings.edit');
    Route::post('/settings', [SiteSettingController::class,'update'])->name('admin.settings.update');

    // Banners CRUD
    Route::resource('banners', BannerController::class);

    // Cars CRUD
    Route::resource('cars', CarController::class);
});
