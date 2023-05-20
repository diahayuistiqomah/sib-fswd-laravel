<?php


use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('layout.home');
});

Route::get('/home', function () {
    return view('layout.home');
});

// Rute untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route resource
Route::resource('/users', UsersController::class);

Route::post('/users/add', [UsersController::class, 'store'])->name('store');

Route::get('/users/add', [UsersController::class, 'create'])->name('users.create');


Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

