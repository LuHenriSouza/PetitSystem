<?php

use App\Http\Controllers\{ProfileController, OpenedfincashController};
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

// Redirecionar para a página de login caso a rota exista
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('sb-admin.dashboard');
    })->name('home');

    Route::get('/caixa', function () {
        return view('sb-admin.fincash');
    })->name('fincash');

    Route::post('/caixa', [OpenedfincashController::class, 'store'])->name('fincash.store');

    Route::get('/produtos', function () {
        return view('sb-admin.products');
    })->name('products');

    Route::get('/dashboard', function () {
        return view('sb-admin.dashboard');
    })->middleware('verified')->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
