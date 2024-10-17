<?php

use App\Http\Controllers\SikapController;
use App\Http\Controllers\SiswaController;
use App\Models\Sikap;
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
    return view('home');
});

Route::prefix('/siswa')->name('siswa.')->group(function () {
    Route::get('/create', [SiswaController::class, 'create'])->name('create');
    Route::post('/store', [SiswaController::class, 'store'])->name('store');
    Route::get('/',[SiswaController::class, 'index'])->name('home');
    Route::get('/{id}', [SiswaController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('delete');
});

Route::prefix('/sikap')->name('sikap.')->group(function () {
    Route::get('/create', [SikapController::class, 'create'])->name('create');
    Route::post('/store', [SikapController::class, 'store'])->name('store');
    Route::get('/', [SikapController::class, 'index'])->name('home');
    Route::get('/{id}', [SikapController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [SikapController::class, 'update'])->name('update');
    Route::delete('/{id}', [SikapController::class, 'destroy'])->name('delete');
});