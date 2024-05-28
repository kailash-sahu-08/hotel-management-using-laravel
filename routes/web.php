<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/home', function () {
    return view('home');
})->middleware('auth');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [HotelController::class,'index']);
Route::get('/hotels', [HotelController::class,'hotelsPage'])->name('hotelsPage');
Route::get('/registerhotel', [HotelController::class,'registerHotelsPage'])->name('registerHotel');
Route::post('/registerHotel', [HotelController::class,'store'])->name('registerHotel');
Route::get('/editProduct/{id}', [HotelController::class,'edit'])->name('editProduct');
Route::get('/deleteProduct/{id}', [HotelController::class,'destroy'])->name('deleteProduct');
Route::put('/updateHotel/{id}', [HotelController::class,'update'])->name('updateHotel');




