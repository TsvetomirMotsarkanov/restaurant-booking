<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RestaurantController;
use App\Models\Subscriber;
use Illuminate\Http\Request;
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
Route::post('/subscribe', function (Request $request) {
    $result = "The email is invalid";
    $error = true;
    if ($request->email) {
        try {
            $error = false;
            Subscriber::create(['email' => $request->email]);
            $result = "Thank you for subscribing to our newsletter! Stay tuned for the latest updates.";
        } catch (\Throwable $th) {
            $result = "It appears that this email address is already on our subscription list.";
            $error = true;
        }
    }

    return redirect('/')->with(["result" => $result, 'error' => $error]);
})->name('subscriber.create');
