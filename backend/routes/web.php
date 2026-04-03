<?php

use App\Modules\Weddings\Controllers\WeddingsController;
use Illuminate\Support\Facades\Route;
use App\Modules\Home\Controllers\HomeController;
use App\Modules\Venue\Controllers\VenueController;

use App\Modules\Destinations\Controllers\DestinationController;

use App\Modules\Contact\Controllers\ContactController;
use App\Modules\AboutUs\Controllers\AboutUsController;
use App\Modules\Press\Controllers\PressController;



/************************************************
 * Web Routes
 ************************************************
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 ************************************************/

Route::middleware(['auth'])->group(function () {
    Route::get('/Home', [HomeController::class, 'index'])->name('Home');
    Route::get('/Weddings', [WeddingsController::class, 'index'])->name('Weddings');
    Route::get('/Venues', [VenueController::class, 'index'])->name('Venues');
    Route::get('/Destinations', [DestinationController::class, 'index'])->name('Destinations');
    Route::get('/About-Us', [AboutUsController::class, 'index'])->name('About-Us');
    Route::get('/Press', [PressController::class, 'index'])->name('Press');
    Route::get('/Contact-Us', [ContactController::class, 'index'])->name('Contact-Us');
});
