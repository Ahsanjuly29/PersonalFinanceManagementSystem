<?php

use App\Http\Controllers\backend\CustomerController;
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

    Route::controller(SellerController::class)->group(function () {
        Route::get('seller/{id?}', 'index')->name('blade.seller.index');
        Route::post('seller', 'store')->name('blade.seller.store');
        Route::put('seller/{id}', 'update')->name('blade.seller.update');
        Route::delete('seller', 'delete')->name('blade.seller.delete');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customer/{id?}', 'index')->name('blade.customer.index');
        Route::post('customer', 'store')->name('blade.customer.store');
        Route::put('customer/{id}', 'update')->name('blade.customer.update');
        Route::delete('customer', 'delete')->name('blade.customer.delete');
    });

    Route::prefix('setting')->group(function () {
        Route::controller(PaymentMethodController::class)->group(function () {
            Route::get('payment-method/{id?}', 'index')->name('blade.payment.method.index');
            Route::post('payment-method', 'store')->name('blade.payment.method.store');
            Route::put('payment-method/{id}', 'update')->name('blade.payment.method.update');
            Route::delete('payment-method', 'delete')->name('blade.payment.method.delete');
        });
    });
});
