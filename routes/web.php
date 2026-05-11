<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminAnnouncementsController;
use App\Http\Controllers\AdminUsersController;

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;

// Perloginan, Autentikasi or Middleware
Route::get('/login', function () {
    return view('loginpage');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


// Routing buat Client / Public / Pengguna
Route::get('/', [DashboardController::class, 'index']);

Route::get('/payware', [ProductsController::class, 'payware']);

Route::get('/freeware', [ProductsController::class, 'freeware']);

Route::get('/terms&condition', function () {
    return view('terms&condition');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/how2order', function () {
    return view('h2o');
});

//Routing Buat Admin
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('products', AdminProductsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('announcements', AdminAnnouncementsController::class);
    Route::resource('users', AdminUsersController::class);
    Route::delete('images/{image}', [ImagesController::class, 'destroy'])->name('images.destroy');
});

Route::get('/admin', function () {
    return redirect('/admin/products');
})->middleware('auth')->name('admin.payware.index');