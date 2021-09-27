<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'v1', 'as' => 'api.'], function () {
    Route::get('/user', [\App\Http\Controllers\API\v1\UserController::class, 'show']);

    Route::group(['prefix' => '/tasks', 'as' => 'tasks.'], function () {
        Route::get('/', [\App\Http\Controllers\Api\v1\TaskController::class, 'index'])->name('index');
        Route::post('/create', [\App\Http\Controllers\Api\v1\TaskController::class, 'store'])->name('store');
        Route::get('/{task}', [\App\Http\Controllers\Api\v1\TaskController::class, 'show'])->name('show');
        Route::post('/{task}', [\App\Http\Controllers\Api\v1\TaskController::class, 'update'])->name('update');
        Route::delete('/{task}/destroy', [\App\Http\Controllers\Api\v1\TaskController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/task-statuses', 'as' => 'tasks-statuses.'], function () {
        Route::get('/', [\App\Http\Controllers\API\v1\TaskStatusController::class, 'index'])->name('index');
    });
});
