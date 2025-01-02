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
    Route::get('/family', 'showFamilyCreate');
    Route::post('/family', 'createFamily');

    // Familie bewerk pagina
    Route::get('/family/{id}', 'showFamilyEdit');
    Route::put('/family/{id}', 'editFamily');
    Route::post('family/{id}/family-member', 'createFamilyMember');
    Route::delete('/family/{id}', 'deleteFamily');
    Route::delete('family/{id}/family-member/{familyMemberId}', 'deleteFamilyMember');
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
    Route::get('/login', [GebruikerController::class,'showLogin']);
    Route::post('/login',[GebruikerController::class,'login']);
    
    // Registratie pagina
    Route::get('/registration', [GebruikerController::class,'showRegistration']);
    Route::post('/registration', [GebruikerController::class,'register']);
});

// Uitloggen
Route::post('/logout', [GebruikerController::class, 'logout']);
