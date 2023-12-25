<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chamadaController;

Route::get('/', [chamadaController::class, 'index']);

Route::get('/chamadas/create', [chamadaController::class, 'create']);

Route::get('/historico', function () {
    return view('historico');
});