<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('caminhao', 'App\Http\Controllers\CaminhaoController');
Route::apiResource('motorista', 'App\Http\Controllers\MotoristaController');
Route::apiResource('viagem', 'App\Http\Controllers\ViagemController');
