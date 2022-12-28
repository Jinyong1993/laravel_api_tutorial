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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks', 'App\Http\Controllers\TaskController@getTasks');
Route::get('/task', 'App\Http\Controllers\TaskController@getTask');
Route::post('/task', 'App\Http\Controllers\TaskController@postTask');
Route::delete('/task', 'App\Http\Controllers\TaskController@deleteTask');
Route::put('/task', 'App\Http\Controllers\TaskController@putTask');