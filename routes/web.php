<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\YouVerifyController;
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

Route::get('/', [UsersController::class, 'home']);
Route::get('/register', [UsersController::class, 'index'])->name('add-user');
Route::post('/login', [AuthController::class, 'userLogin'])->name('login');
Route::get('/login', [UsersController::class, 'home']);
Route::post('/verify', [YouVerifyController::class, 'verify'])->name('verify')->middleware('auth');
Route::get('/dashboard', [YouVerifyController::class, 'index'])->middleware('auth');
Route::post('/register', [UsersController::class, 'userRegistration'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

