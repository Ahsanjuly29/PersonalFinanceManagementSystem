<?php

use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\PaymentMethodController;
use App\Http\Controllers\backend\SellerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    // return Hash::make(123456789);
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::prefix('seller')->controller(SellerController::class)->group(function () {
        Route::get('{id?}', 'index')->name('blade.seller.index');
        Route::post('', 'store')->name('blade.seller.store');
        Route::put('{id}', 'update')->name('blade.seller.update');
        Route::delete('', 'delete')->name('blade.seller.delete');
    });

    Route::prefix('customer')->controller(CustomerController::class)->group(function () {
        Route::get('{id?}', 'index')->name('blade.customer.index');
        Route::post('', 'store')->name('blade.customer.store');
        Route::put('{id}', 'update')->name('blade.customer.update');
        Route::delete('', 'delete')->name('blade.customer.delete');
    });

    Route::prefix('setting/payment-method')->group(function () {
        Route::controller(PaymentMethodController::class)->group(function () {
            Route::get('{id?}', 'index')->name('blade.payment.method.index');
            Route::post('', 'store')->name('blade.payment.method.store');
            Route::put('{id}', 'update')->name('blade.payment.method.update');
            Route::delete('', 'delete')->name('blade.payment.method.delete');
        });
    });

    Route::prefix('expense')->group(function () {
        Route::controller(ExpenseController::class)->group(function () {
            Route::get('', 'index')->name('blade.expense.index');
            Route::get('create', 'create')->name('blade.expense.create');
            Route::post('', 'store')->name('blade.expense.store');
            Route::get('{id?}', 'edit')->name('blade.expense.edit');
            Route::put('{id}', 'update')->name('blade.expense.update');
            Route::delete('', 'delete')->name('blade.expense.delete');
        });
    });
});
