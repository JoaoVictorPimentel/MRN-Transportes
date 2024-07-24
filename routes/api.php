<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'v1'
], function($router) {
    Route::apiResource('caminhao', 'App\Http\Controllers\CaminhaoController');
    Route::apiResource('motorista', 'App\Http\Controllers\MotoristaController');
    Route::apiResource('viagem', 'App\Http\Controllers\ViagemController');
    
    Route::post('/me', 'App\Http\Controllers\AuthController@me');
    Route::post('/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});


Route::post('/login', 'App\Http\Controllers\AuthController@login');