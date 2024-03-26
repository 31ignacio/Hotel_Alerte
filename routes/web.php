<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::prefix('hotel')->group(function () {

Route::get('/', [AccueilController::class, 'index'])->name('hotel.accueil');
Route::get('/listeHotel', [HotelController::class, 'listeHotel'])->name('hotel.liste');

Route::get('/hotel', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/store', [HotelController::class, 'store'])->name('hotel.store');
Route::get('/profil', [HotelController::class, 'profil'])->name('hotel.profil');
Route::post('/update/profil/{hotel}', [HotelController::class, 'updateProfil'])->name('hotel.profil.update');
Route::post('/update/{client}', [HotelController::class, 'updateSignalement'])->name('signalement.update');
Route::get('/contact', [AccueilController::class, 'contact'])->name('hotel.contact');
Route::get('/test-view', [AccueilController::class, 'testView'])->name('hotel.testView');
Route::post('/postMessage', [AccueilController::class, 'postMessage'])->name('hotel.postMessage');


Route::get('/liste', [ClientController::class, 'index'])->name('client.liste');
Route::get('/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/{id}', [ClientController::class, 'show'])->name('client.show');
Route::post('/recherche', [ClientController::class, 'recherche'])->name('client.recherche');
Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

// });
