<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\HoldingsController;
use App\Http\Controllers\PriceAlertsController;

// Manage cryptocurrency holdings
Route::middleware('auth:sanctum')->group(function () {
    // Fetch all holdings for the authenticated user
    Route::get('/holdings', [HoldingsController::class, 'index']);

    // Add a new holding for the authenticated user
    Route::post('/holdings', [HoldingsController::class, 'store']);

    // Update a holding for the authenticated user
    Route::put('/holdings/{id}', [HoldingsController::class, 'update']);

    // Delete a holding for the authenticated user
    Route::delete('/holdings/{id}', [HoldingsController::class, 'destroy']);

    // View portfolio value for the authenticated user
    Route::get('/portfolio/value', [HoldingsController::class, 'getPortfolioValue']);

    // Set price alerts for the authenticated user
    Route::post('/price-alerts', [PriceAlertsController::class, 'store']);

    // Update price alerts for the authenticated user
    Route::put('/price-alerts/{id}', [PriceAlertsController::class, 'update']);

    // Delete price alerts for the authenticated user
    Route::delete('/price-alerts/{id}', [PriceAlertsController::class, 'destroy']);
});
