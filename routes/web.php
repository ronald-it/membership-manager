<?php

use App\Http\Controllers\ContributieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilieController;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\LidsoortController;
use Illuminate\Support\Facades\Route;

// Startpagina
Route::get('/', [DashboardController::class, 'showFamilies']);

Route::controller(FamilieController::class)->group(function () {
    // Familie creëer pagina
    Route::get('/familie', 'toonFamilieCreëren');
    Route::post('/familie', 'creëerFamilie');

    // Familie bewerk pagina
    Route::get('/familie/{id}', 'toonFamilieBewerken');
    Route::put('/familie/{id}', 'bewerkFamilie');
    Route::post('familie/{id}/familielid', 'creëerFamilielid');
    Route::delete('/familie/{id}', 'verwijderFamilie');
    Route::delete('familie/{id}/familielid/{lidId}', 'verwijderFamilielid');
});

Route::controller(LidsoortController::class)->group(function () {
    // Soort lid overzicht pagina
    Route::get('/lidsoort', 'toonLidsoorten')->name('lidsoort.toon');

    // Soort lid bewerk pagina
    Route::get('/lidsoort/{id}', 'toonLidsoortBewerken');
    Route::put('/lidsoort/{id}', 'bewerkLidsoort');
});

Route::controller(ContributieController::class)->group(function () {
    // Contributie overzicht pagina
    Route::get('/contributie', 'toonContributies')->name('contributie.toon');

    // Contributie bewerk pagina
    Route::get('/contributie/{id}', 'toonContributieBewerken');
    Route::put('/contributie/{id}', 'bewerkContributie');
});

Route::middleware(['guest'])->group(function () {
    // Login pagina
    Route::get('/login', [GebruikerController::class,'toonLogin']);
    Route::post('/login',[GebruikerController::class,'inloggen']);
    
    // Registratie pagina
    Route::get('/registratie', [GebruikerController::class,'toonRegistratie']);
    Route::post('/registratie', [GebruikerController::class,'registreer']);
});

// Uitloggen
Route::post('/uitloggen', [GebruikerController::class, 'uitloggen']);
