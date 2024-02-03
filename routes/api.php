<?php

use App\Http\Controllers\Api\V1\SecurityPriceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('/securities/prices/{securityType}', [SecurityPriceController::class, 'updateSecurityPrices']);
});
