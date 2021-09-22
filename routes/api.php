<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'v1'] , function(){
    Route::get('/user', [\App\Http\Controllers\API\v1\UserController::class , 'show']);

    Route::group(['prefix' => '/tasks'] , function(){
        Route::get('/', [\App\Http\Controllers\API\v1\TaskController::class , 'index']);
        Route::post('/create' , [\App\Http\Controllers\API\v1\TaskController::class , 'store']);
        Route::get('/{task}' , [\App\Http\Controllers\API\v1\TaskController::class , 'show']);
        Route::post('/{task}' , [\App\Http\Controllers\API\v1\TaskController::class , 'update']);
        Route::delete('/{task}/destroy' , [\App\Http\Controllers\API\v1\TaskController::class , 'destroy']);
    });

    Route::group(['prefix' => '/task-statuses'] , function(){
        Route::get('/', [\App\Http\Controllers\API\v1\TaskStatusController::class , 'index']);
    });

});
