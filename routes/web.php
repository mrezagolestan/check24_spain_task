<?php

use App\FinanceAdsService;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/credit_cards', [CreditCardController::class, 'list']);
Route::get('/credit_cards/edit', [CreditCardController::class, 'edit']);
Route::post('/credit_cards/edit', [CreditCardController::class, 'edit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
