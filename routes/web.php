<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminAnnouncementsController;

use App\Http\Controllers\ProductsPaywareController;
use App\Http\Controllers\ProductsFreewareController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;

// Perloginan, Autentikasi or Middleware
Route::get('/login', function () {
    return view('loginpage');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


// Routing buat Client / Public / Pengguna
// Route::get('/', [AnnouncementsController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);


Route::get('/admin/create', function () {
    return view('dashboard_admin_payware_create');
    });
    
Route::get('/payware', [ProductsPaywareController::class, 'get']);

Route::get('/freeware', [ProductsFreewareController::class, 'index']);

Route::get('/terms&condition', function () {
    return view('terms&condition');
    });
    
    Route::get('/contact', function () {
        return view('contact');
});







//Routing Buat Admin
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('products', AdminProductsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('announcements', AdminAnnouncementsController::class);
});

Route::get('/admin', function() {
    return redirect('/admin/products');
})->middleware('auth')->name('admin.payware.index');

// Route::get('/admin/payware', [ProductsController::class, 'index'])->middleware('auth')->name('admin.payware.index');

// Route::get('/admin/payware/create', [CategoriesController::class, 'getCategories']);

// Route::post('/admin/{type}', [ProductsController::class, 'store'])
//     ->whereIn('type', ['payware', 'freeware']);

// Route::get('/admin/freeware', function () {
//     return view('dashboard_admin_freeware');
// })->middleware('auth');

// Route::get('/admin/announcement', function () {
//     return view('dashboard_admin_announcement');
// })->middleware('auth');