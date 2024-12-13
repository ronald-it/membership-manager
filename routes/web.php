<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/member-type', function () {
    return view('member-type');
});

Route::get('/contributions', function () {
    return view('contributions');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/family', function () {
    return view('family');
});

Route::get('/family-member', function () {
    return view('family-member');
});
