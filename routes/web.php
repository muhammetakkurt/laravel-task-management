<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum' , 'verified']] , function(){
    Route::get('/dashboard' , [\App\Http\Controllers\DashboardController::class , 'getIndex'])->name('dashboard');
    Route::resource('/tasks' , \App\Http\Controllers\TaskController::class );

    Route::group(['middleware' => 'isAdmin'] , function (){
        Route::group(['as' => 'admin.'] , function(){
            Route::resource('/roles' , \App\Http\Controllers\Admin\RoleControler::class );
            Route::resource('/users' , \App\Http\Controllers\Admin\UserController::class );
        });
    });
});
