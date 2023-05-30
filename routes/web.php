<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
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


Route::get('/dataPengembalian', [PengembalianController::class, 'viewDataKembali'])->name('DataKembali');
Route::get('/editPengembalian', [PengembalianController::class, 'formEditDataKembali'])->name('EditKembali');
Route::get('/homepage', [HomePageController::class, 'viewHomePage'])->name('homepage');
Route::get('/dataPeminjaman', [PeminjamanController::class, 'viewDataPinjam'])->name('DataPinjam');
Route::get('/addPeminjam', [PeminjamanController::class, 'formAddPinjam'])->name('AddPinjam');
Route::get('/editPeminjam', [PeminjamanController::class, 'formEditPinjam'])->name('EditPinjam');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
