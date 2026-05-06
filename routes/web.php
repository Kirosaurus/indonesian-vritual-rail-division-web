<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsPaywareController;
use App\Http\Controllers\ProductsFreewareController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;

Route::get('/', [AnnouncementsController::class, 'index']);
Route::get('/admin', function () {
    return view('dashboard_admin');
});
Route::get('/admin/create', function () {
    return view('dashboard_admin_payware_create');
});

Route::get('/payware', [ProductsPaywareController::class, 'index']);

Route::get('/freeware', [ProductsFreewareController::class, 'index']);

Route::get('/terms&condition', function () {
    return view('terms&condition');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('loginpage');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/admin/payware', function () {
    return view('dashboard_admin_payware');
})->middleware('auth')->name('admin.payware.index');

Route::get('/admin/payware/create', function () {
    return view('dashboard_admin_payware_create');
})->middleware('auth')->name('admin.payware.create');

Route::post('/admin/payware', [ProductsPaywareController::class, 'store'])->middleware('auth')->name('admin.payware.store');

Route::get('/admin/freeware', function () {
    return view('dashboard_admin_freeware');
})->middleware('auth');

Route::get('/admin/announcement', function () {
    return view('dashboard_admin_announcement');
})->middleware('auth');