<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserTodoController;
use App\Http\Controllers\ApiMasterController;

Route::get('api/userTodo', [ApiUserTodoController::class, 'index']);
Route::get('api/aiChat', [ApiMasterController::class, 'index']);

