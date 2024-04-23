<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('index');
});
/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/userTodo', 'App\Http\Controllers\UserTodoController@index');
Route::post('/userTodo', 'App\Http\Controllers\UserTodoController@create');
Route::put('/userTodo', 'App\Http\Controllers\UserTodoController@update');
Route::delete('/userTodo', 'App\Http\Controllers\UserTodoController@delete');

Route::get('/aiChat', 'App\Http\Controllers\MasterController@index');
Route::get('/apiAiChat', 'App\Http\Controllers\MasterController@apiAiChat');


require __DIR__.'/auth.php';
