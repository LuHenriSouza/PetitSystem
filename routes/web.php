<?php

use App\Http\Controllers\{FincashController, ProfileController, ProductController};
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

Route::fallback(function () {
    return view('404');
});

// Redirect to login if exist route
Route::middleware(['auth'])->group(function () {

    // Fallback 404
    Route::get('/', function () {
        return view('sb-admin.dashboard');
    })->name('home');

    // Financial Cashes
    Route::controller(FincashController::class)->group(function () {
        Route::get('/Fechamentos', 'index')->name('fincash.index');
        Route::get('/Fechamentos-{id}', 'show')->name('fincash.show');
        Route::get('/caixa', 'create')->name('fincash.create');
        Route::post('/caixa', 'store')->name('fincash.store');
    });

    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/novo', 'create')->name('product.create');
        Route::post('/novo', 'store')->name('product.store');
        Route::get('/produtos', 'index')->name('product.index');
    });

    // Dashboard
    Route::get('/dashboard', function () {
        return view('sb-admin.dashboard');
    })->middleware('verified')->name('dashboard');

    // Profile
    Route::middleware('auth')->controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
