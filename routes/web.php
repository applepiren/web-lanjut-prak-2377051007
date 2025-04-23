<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/user/show/{id}', [UserController::class, 'show'])->name('users.show');

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::get('/user', [UserController::class, 'index'])->name('user.list');

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');