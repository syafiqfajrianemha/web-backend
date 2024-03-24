<?php

use App\Http\Controllers\ApiController;
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

Route::get('/students', [ApiController::class, 'getAllStudents']);
Route::post('/students', [ApiController::class, 'addNewStudent']);
Route::get('/students/{id}', [ApiController::class, 'detailStudent']);
Route::post('/students/{id}', [ApiController::class, 'updateStudent']);
Route::post('/students/delete/{id}', [ApiController::class, 'deleteStudent']);
