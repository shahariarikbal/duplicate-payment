<?php

use App\Http\Controllers\AmountController;
use App\Http\Middleware\DuplicatePaymentChecker;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::middleware([DuplicatePaymentChecker::class])->group(function () {
    Route::post('amount/store', [AmountController::class, 'store'])->name('amount.store');
});
