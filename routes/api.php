<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/students', [StudentsController::class, 'index']);
Route::post('/students', [StudentsController::class, 'store']);
Route::get('/students/{id}', [StudentsController::class, 'show']);
Route::put('/students/{id}', [StudentsController::class, 'update']);
Route::delete('/students/{id}', [StudentsController::class, 'destroy']);


