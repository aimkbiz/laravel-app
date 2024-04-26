<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTodoController;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', 'App\Http\Controllers\MasterController@index');
Route::get('/ip', [CommonController::class, 'ip']);
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/userTodo', function () {
    return Inertia::render('userTodo');
});

//Route::apiResource('/getUserTodo', [UserTodoController::class, 'index'])->name('userTodo.index');
//Route::apiResource('/getUserTodo', UserTodoController::class);
//Route::middleware('todo')->group(function () {
    //Route::get('/userTodo', Inertia::render('userTodo'));
    
    Route::get('/getUserTodo', [UserTodoController::class, 'index']);
    Route::post('/getUserTodo', [UserTodoController::class, 'create']);
    Route::post('/updateUserTodo', [UserTodoController::class, 'update']);
    Route::post('/deleteUserTodo', [UserTodoController::class, 'delete']);
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
