<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chamadaController;

Route::get('/', [chamadaController::class, 'index'])->middleware('auth');

// Route::get('/index', [chamadaController::class, 'index']);

Route::get('/chamadas/create', [chamadaController::class, 'create'])->middleware('auth');
Route::get('/chamadas/{id}', [chamadaController::class, 'show'])->middleware('auth');

Route::post('/chamadas', [chamadaController::class, 'store'])->middleware('auth');

Route::delete('chamadas/{id}', [chamadaController::class, 'destroy'])->middleware('auth');

Route::get('chamadas/edit/{id}', [chamadaController::class, 'edit'])->middleware('auth');

Route::put('chamadas/update/{id}', [chamadaController::class, 'update'])->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
