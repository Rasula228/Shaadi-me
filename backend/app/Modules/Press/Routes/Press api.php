<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Press\Controllers\PressController;

Route::prefix('contacts')->group(function () {
    Route::post('/', [PressController::class, 'store']);
    Route::get('/{id}', [PressController::class, 'view']);
    Route::delete('/{id}', [PressController::class, 'delete']);
    Route::get('/check/{id}', [PressController::class, 'checkcontactlist']);
});
