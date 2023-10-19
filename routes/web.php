<?php

use App\Http\Controllers\{FincashController, ProfileController, ProductController, StockController, GroupController};
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

// Fallback 404
Route::fallback(function () {
    return view('404');
});

// Redirect to login if exist route
Route::middleware(['auth'])->group(function () {

    // Home / Dashboard
    Route::get('/', function () {
        return view('sb-admin.dashboard');
    })->name('home');

    // Financial Cashes
    Route::controller(FincashController::class)->group(function () {
        Route::get('/Fechamentos', 'index')->name('fincash.index');
        Route::get('/caixa', 'create')->name('fincash.create');
        Route::post('/caixa', 'store')->name('fincash.store');

        Route::get('/vender', 'sale')->name('sale');
        Route::post('/vender', 'saleStore')->name('salestore');
    });

    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/novo', 'create')->name('product.create');
        Route::post('/novo', 'store')->name('product.store');
        Route::get('/produtos', 'index')->name('product.index');
    });

    // Stock
    Route::controller(StockController::class)->group(function () {
        Route::get('/estoque', 'index')->name('stock.index');
    });

    // Groups
    Route::controller(GroupController::class)->group(function () {
        Route::get('/grupos', 'index')->name('group.index');
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
