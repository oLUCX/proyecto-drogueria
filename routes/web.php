<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::get('/api/getUsers', [UserController::class, 'getUsers']);
