<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/payware', function () {
    return view('payware');
});

Route::get('/freeware', function () {
    return view('freeware');
});

Route::get('/contact', function() {
    return view('contact');
});