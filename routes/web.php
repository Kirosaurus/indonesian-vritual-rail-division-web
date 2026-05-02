<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/admin', function () {
    return view('dashboard_admin');
});
Route::get('/admin/create', function () {
    return view('dashboard_admin_create');
});

Route::get('/payware', function () {
    return view('payware');
});

Route::get('/freeware', function () {
    return view('freeware');
});

Route::get('/terms&condition', function () {
    return view('terms&condition');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('loginpage');
});