<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\produtcs_freeware;



Route::get('/', function () {
    return view('dashboard', [ProductController::class, 'index']);
});
Route::get('/admin', function () {
    return view('dashboard_admin');
});
Route::get('/admin/create', function () {
    return view('dashboard_admin_create');
});

Route::get('/payware', [ProductController::class, 'index']);

Route::get('/freeware', [produtcs_freeware::class, 'index']);

Route::get('/terms&condition', function () {
    return view('terms&condition');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('loginpage');
});