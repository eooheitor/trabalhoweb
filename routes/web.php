<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;


Route::get('/', [AnimalController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/');
    });

    Route::get('/animais', [AnimalController::class, 'index'])->name('animais.index');
    Route::get('/animais/create', [AnimalController::class, 'create'])->name('animais.create');
    Route::post('/animais/create', [AnimalController::class, 'store'])->name('animais.store');
    Route::delete('/animais/{id}', [AnimalController::class, 'destroy'])->name('animais.destroy');
    Route::get('/animais/edit/{id}', [AnimalController::class, 'edit'])->name('animais.edit');
    Route::put('/animais/update/{id}', [AnimalController::class, 'update'])->name('animais.update');


    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
