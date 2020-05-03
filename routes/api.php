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

Route::middleware('auth:api')->group(function () {
    Route::get('user', function (\Illuminate\Http\Request $request){
        return $request->user();
    });

    Route::put('columns/sort/{dashboard}', 'ColumnController@sort')->name('columns.sort');

    Route::put('tasks/sort/{column}', 'TaskController@sort')->name('tasks.sort');
    Route::put('tasks/move/{column}/{task}', 'TaskController@move')->name('tasks.move');

    Route::name('comments.')->group(function () {
        Route::post('create/{task}', 'CommentController@store')->name('create');
        Route::put('update/{comment}', 'CommentController@update')->name('update');
        Route::delete('delete/{comment}', 'CommentController@destroy')->name('delete');
    });

    Route::resources([
        'dashboards' => DashboardController::class,
        'columns'   => ColumnController::class,
        'tasks'     => TaskController::class,
    ]);

});
