<?php

use Illuminate\Support\Facades\Route;

# routes for testing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome');
});
