<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RestaurantController::class, 'index'])->name('home');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'view']);

Route::get('/booking/{restaurant}', [BookingController::class, 'show']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.create');
