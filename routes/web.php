<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get(RouteServiceProvider::HOME, [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('user/{user}')->group(function () {

        Route::resource('wallets', WalletController::class)->only(['index', 'create', 'store', 'edit', 'update']);

        Route::get('wallets/{wallet}/transactions/deposit', [TransactionController::class, 'deposit'])->name('transactions.deposit');
        Route::get('wallets/{wallet}/transactions/withdraw', [TransactionController::class, 'withdraw'])->name('transactions.withdraw');
        Route::get('wallets/{wallet}/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('wallets/{wallet}/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });

    Route::get('users', [UserController::class, 'index'])->name('users.index');
});
