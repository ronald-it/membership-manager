<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::controller(FamilieController::class)->group(function () {
    // Familie creëer pagina
    Route::get('/familie', 'create');
    Route::post('/familie', 'store');

    // Familie bewerk pagina
    Route::get('/familie/{id}', 'edit');
    Route::put('/familie/{id}', 'update');
    Route::post('familie/{id}/familielid', 'addMember');
    Route::delete('/familie/{id}', 'delete');
    Route::delete('familie/{id}/familielid/{lidId}', 'removeMember');
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
