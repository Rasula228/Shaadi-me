<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Contact\Controllers\ContactController;

Route::prefix('contacts')->group(function () {
    Route::post('/', [ContactController::class, 'store']);
    Route::get('/', [ContactController::class, 'index']);
    Route::get('/{id}', [ContactController::class, 'show']);
    Route::put('/{id}', [ContactController::class, 'update']);
    Route::delete('/{id}', [ContactController::class, 'delete']);
    Route::get('/check/{id}', [ContactController::class, 'checkcontactlist']);
});
