<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\HotelController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('hotel')->group(function () {

Route::get('index', [AccueilController::class, 'index'])->name('hotel.accueil');
Route::post('store', [HotelController::class, 'store'])->name('hotel.store');
Route::get('profil', [HotelController::class, 'profil'])->name('hotel.profil');


// });
