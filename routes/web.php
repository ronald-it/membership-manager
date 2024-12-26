<?php

use App\Http\Controllers\ContributieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilieController;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\LidsoortController;
use Illuminate\Support\Facades\Route;

// Startpagina
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

Route::controller(LidsoortController::class)->group(function () {
    // Soort lid overzicht pagina
    Route::get('/lidsoort', 'show')->name('lidsoort.show');

    // Soort lid bewerk pagina
    Route::get('/lidsoort/{id}', 'edit');
    Route::put('/lidsoort/{id}', 'update');
});

Route::controller(ContributieController::class)->group(function () {
    // Contributie overzicht pagina
    Route::get('/contributie', 'show')->name('contributie.show');

    // Contributie bewerk pagina
    Route::get('/contributie/{id}', 'edit');
    Route::put('/contributie/{id}', 'update');
});

Route::controller(ContributieController::class)->group(function () {
    // Contributie overzicht pagina
    Route::get('/contributie', 'show')->name('contributie.show');

    // Contributie bewerk pagina
    Route::get('/contributie/{id}', 'edit');
    Route::put('/contributie/{id}', 'update');
});

Route::middleware(['guest'])->group(function () {
    // Login pagina
    Route::get('/login', [GebruikerController::class,'showLogin']);
    Route::post('/login',[GebruikerController::class,'login']);
    
    // Registratie pagina
    Route::get('/registratie', [GebruikerController::class,'showRegistration']);
    Route::post('/registratie', [GebruikerController::class,'register']);
});

// Uitloggen
Route::post('/uitloggen', [GebruikerController::class, 'logout']);
