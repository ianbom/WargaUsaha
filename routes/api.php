<?php

use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('callback', [TransactionController::class, 'callBackAfterPayment']);
Route::post('checkPayment', [PaymentController::class, 'checkStatus']);
