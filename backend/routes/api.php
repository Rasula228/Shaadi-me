<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

Route::post('/leads', [LeadController::class, 'store']);
Route::get('/venues', [VenueController::class, 'index']);
