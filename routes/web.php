<?php

use App\Http\Controllers\addMahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
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



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login-post', [AuthController::class, 'login'])->name('login-submit');
});

Route::middleware('isSuperAdmin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin-dashboard');

    // Create Mahasiswa

    Route::get('/add-mahasiswa', [addMahasiswaController::class, 'index'])->name('add-mahasiswa');
    Route::get('/add-mahasiswa-create', [addMahasiswaController::class, 'create'])->name('add-mahasiswa-create');
    Route::post('/add-mahasiswa-store', [addMahasiswaController::class, 'store'])->name('add-mahasiswa-store');
});
