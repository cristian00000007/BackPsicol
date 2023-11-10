<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('usuarios', UserController::class);
