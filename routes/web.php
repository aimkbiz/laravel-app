<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTodoController;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', 'App\Http\Controllers\MasterController@index');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware('todo')->group(function () {
    Route::get('/userTodo', [UserTodoController::class, 'index'])->name('userTodo.index');
    Route::post('/userTodo', [UserTodoController::class, 'create'])->name('userTodo.create');
    Route::put('/userTodo', [UserTodoController::class, 'update'])->name('userTodo.update');
    Route::delete('/userTodo', [UserTodoController::class, 'delete'])->name('userTodo.delete');
//});
/* 
Route::get('/userTodo', 'App\Http\Controllers\UserTodoController@index');
Route::post('/userTodo', 'App\Http\Controllers\UserTodoController@create');
Route::put('/userTodo', 'App\Http\Controllers\UserTodoController@update');
Route::delete('/userTodo', 'App\Http\Controllers\UserTodoController@delete');
*/

Route::get('/aiChat', 'App\Http\Controllers\MasterController@index');
Route::get('/apiAiChat', 'App\Http\Controllers\MasterController@apiAiChat');


require __DIR__.'/auth.php';
require __DIR__.'/api.php';
