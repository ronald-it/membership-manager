<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::controller(FamilieController::class)->group(function () {
    Route::get('/familie', 'create');
    Route::get('/familie/{id}', 'edit');
});

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

Route::get('/family-member', function () {
    return view('family-member');
});
