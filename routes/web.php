<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhishingController;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Auth::routes();

// Home after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Campaign routes
    Route::resource('campaigns', CampaignController::class);
    Route::get('/campaigns/{campaign}/send-test', [CampaignController::class, 'sendTest'])->name('campaigns.sendTest');
    Route::get('/campaigns/{campaign}/send', [CampaignController::class, 'send'])->name('campaigns.send');

    // Logs
    Route::get('/phishing-logs', [PhishingController::class, 'showLogs'])->name('phishing.logs');
});

// Public phishing simulation routes
Route::get('/phishing/{template}/{token}', [PhishingController::class, 'show'])->name('phishing.show');
Route::post('/phishing/{template}/{token}', [PhishingController::class, 'capture'])->name('phishing.capture');
