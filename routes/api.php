<?php

use App\Http\Controllers\PaeseController;
use App\Http\Controllers\ViaggioController;
use Illuminate\Support\Facades\Route;

Route::get('/viaggi', [ViaggioController::class, 'index']);
Route::get('/viaggi/{id}', [ViaggioController::class, 'show']);
Route::post('/viaggi', [ViaggioController::class, 'store']);
Route::put('/viaggi/{id}', [ViaggioController::class, 'update']);
Route::delete('/viaggi/{id}', [ViaggioController::class, 'destroy']);

Route::get('/paesi', [PaeseController::class, 'index']);
Route::get('/paesi/{id}', [PaeseController::class, 'show']);
Route::post('/paesi', [PaeseController::class, 'store']);
Route::put('/paesi/{id}', [PaeseController::class, 'update']);
Route::delete('/paesi/{id}', [PaeseController::class, 'destroy']);
