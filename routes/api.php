<?php

use App\Http\Controllers\TasksController;
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
Route::post('/task/store', [TasksController::class, 'store']);
Route::put('/task/{task}/update', [TasksController::class, 'update']);
Route::get('/task/{task}/edit', [TasksController::class, 'edit']);
Route::delete('/task/{task}/delete', [TasksController::class, 'destroy']);
Route::post('/task/filter-task', [TasksController::class, 'filterTask']);
Route::get('/task', [TasksController::class, 'index']);

