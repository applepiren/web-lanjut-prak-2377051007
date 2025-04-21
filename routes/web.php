<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/profile/{nama}/{kelas}/{npm}', [ProfileController::class, 'profile']);

Route::get('/user/create', [UserController::class, 'create'])->name('user_create');
  
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('/user', [UserController::class, 'index'])->name('user.index');