<?php

use App\Http\Controllers\CoursesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses', [CoursesController::class, 'get']);
Route::post('/courses', [CoursesController::class, 'create']);
Route::get('/courses/{id}', [CoursesController::class, 'show']);
Route::put('/courses/{id}', [CoursesController::class, 'update']);
Route::delete('/courses/{id}', [CoursesController::class, 'destroy']);