<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BukuController;
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
Route::get('/buku', [BukuController::class, 'ViewBuku'])->name('buku');
Route::get('/detailBuku', [BukuController::class, 'ViewDetailBuku'])->name('detailBuku');

Route::get('/addPeminjam', [PeminjamanController::class, 'formAddPinjam'])->name('AddPinjam');
Route::post('/addPeminjam/store', [PeminjamanController::class, 'store']);
Route::get('/addPeminjam/checkSlug', [PeminjamanController::class, 'checkSlug']);

Route::get('/editPeminjam/{pinjam:slug}', [PeminjamanController::class, 'formEditPinjam'])->name('EditPinjam');
Route::put('/editPeminjam/editPeminjam/{pinjam:slug}', [PeminjamanController::class, 'update']);

Route::get('/editPeminjam/{pinjam:slug}/kembalikan', [PeminjamanController::class, 'kembalikan']);


Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

