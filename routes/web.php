<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Route::get('/register', [AuthController::class, 'register'])->name('view.register')->middleware('guest');
Route::post('/register', [AuthController::class, 'userRegister'])->name('user.register');

Route::get('/login', [AuthController::class, 'login'])->name('view.login')->middleware('guest');
Route::post('/login', [AuthController::class, 'userLogin'])->name('user.login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [NavController::class, 'home'])->name('home');
    Route::get('/user', [NavController::class, 'user'])->name('user');

    Route::get('/logout', [AuthController::class, 'userLogout'])->name('user.logout');

    Route::get('/user-search', [NavController::class, 'userSearch'])->name('user.search');
    Route::get('/student', [NavController::class, 'student'])->name('student');
    Route::get('/student/create', [NavController::class, 'studentCreate'])->name('student.create');

    Route::post('/student/store', [NavController::class, 'studentStore'])->name('student.store');

    Route::get('/student/edit/{id}', [NavController::class, 'studentEdit'])->name('student.edit');
    Route::put('/student/update/{id}', [NavController::class, 'studentUpdate'])->name('student.update');

    Route::delete('/student/delete/{id}', [NavController::class, 'deleteStudent'])->name('student.delete');

    Route::get('/search-student', [NavController::class, 'studentSearch'])->name('student.search');
});
