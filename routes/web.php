<?php

use App\Http\Controllers\ContributionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Startpagina
Route::get('/', [DashboardController::class, 'showFamilies']);

Route::controller(FamilyController::class)->group(function () {
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

Route::controller(MemberTypeController::class)->group(function () {
    // Soort lid overzicht pagina
    Route::get('/member-type', 'showMemberTypes')->name('member-type.show');

    // Soort lid bewerk pagina
    Route::get('/member-type/{id}', 'showMemberTypeEdit');
    Route::put('/member-type/{id}', 'editMemberType');
});

Route::controller(ContributionController::class)->group(function () {
    // Contributie overzicht pagina
    Route::get('/contribution', 'showContributions')->name('contribution.show');

    // Contributie bewerk pagina
    Route::get('/contribution/{id}', 'showContributionEdit');
    Route::put('/contribution/{id}', 'editContribution');
});

Route::middleware(['guest'])->group(function () {
    // Login pagina
    Route::get('/login', [UserController::class,'showLogin']);
    Route::post('/login',[UserController::class,'login']);
    
    // Registratie pagina
    Route::get('/registration', [UserController::class,'showRegistration']);
    Route::post('/registration', [UserController::class,'register']);
});

// Uitloggen
Route::post('/logout', [UserController::class, 'logout']);
