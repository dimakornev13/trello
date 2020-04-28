<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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

Route::middleware('auth:api')->group(function (){
    Route::put('columns/sort', 'ColumnController@sort')->name('columns.sort');
    Route::put('tasks/sort', 'TaskController@sort')->name('tasks.sort');

    Route::resources([
        'dashboard' => DashboardController::class,
        'columns' => ColumnController::class,
        'tasks' => TaskController::class,
    ]);

});
