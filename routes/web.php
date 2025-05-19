<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;


/*
|--------------------------------------------------------------------------
| Giriş Sayfası (Login)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // Giriş ekranın burası
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.perform');

/*
|--------------------------------------------------------------------------
| Kayıt Sayfası (Register)
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Dashboard (Sadece giriş yapanlar görebilir)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Otel Ana Sayfası (Geçici olarak veritabanı olmadan)
|--------------------------------------------------------------------------
*/

Route::get('/hotel', function () {
    return view('home'); // Eğer home.blade.php varsa
})->name('hotel');


Route::post('/hotels/search', [HotelController::class, 'search'])->name('hotels.search');


use App\Http\Controllers\OwnerController;

Route::post('/owner/login', [OwnerController::class, 'login'])->name('owner.login');
Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');







