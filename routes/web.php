<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chamadaController;

Route::get('/', [chamadaController::class, 'index']);

Route::get('/chamadas/create', [chamadaController::class, 'create']);

Route::post('/chamadas', [chamadaController::class, 'store']);

Route::get('/chamadas/{id}', [chamadaController::class, 'show']);

Route::get('/historico', function () {
    return view('historico');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
