<?php

use App\Http\Controllers\ContributionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [DashboardController::class, 'showFamilies']);

Route::controller(FamilyController::class)->group(function () {
    // Family create page
    Route::get('/family', 'showFamilyCreate');
    Route::post('/family', 'createFamily');

    // Family edit page
    Route::get('/family/{id}', 'showFamilyEdit');
    Route::put('/family/{id}', 'editFamily');
    Route::post('family/{id}/family-member', 'createFamilyMember');
    Route::delete('/family/{id}', 'deleteFamily');
    Route::delete('family/{id}/family-member/{familyMemberId}', 'deleteFamilyMember');
});

Route::controller(MemberTypeController::class)->group(function () {
    // Member type overview page
    Route::get('/member-type', 'showMemberTypes')->name('member-type.show');

    // Member type edit page
    Route::get('/member-type/{id}', 'showMemberTypeEdit');
    Route::put('/member-type/{id}', 'editMemberType');
});

Route::controller(ContributionController::class)->group(function () {
    // Contribution overview page
    Route::get('/contribution', 'showContributions')->name('contribution.show');

    // Contribution edit page
    Route::get('/contribution/{id}', 'showContributionEdit');
    Route::put('/contribution/{id}', 'editContribution');
});

Route::middleware(['guest'])->group(function () {
    // Login page
    Route::get('/login', [UserController::class,'showLogin']);
    Route::post('/login',[UserController::class,'login']);
    
    // Registration page
    Route::get('/registration', [UserController::class,'showRegistration']);
    Route::post('/registration', [UserController::class,'register']);
});

// Logout
Route::post('/logout', [UserController::class, 'logout']);
