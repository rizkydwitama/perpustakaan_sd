<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
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
    return view('login');
});



//Autentikasi
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

//Homepage
Route::get('/homepage', [HomePageController::class, 'viewHomePage'])->name('homepage')->middleware('auth');

//Buku
Route::get('/buku', [BukuController::class, 'ViewBuku'])->name('buku')->middleware('auth');
Route::get('/detailBuku/{buku:slug}', [BukuController::class, 'ViewDetailBuku'])->name('detailBuku')->middleware('auth');
Route::get('/tambahBuku', [BukuController::class, 'ViewTambahBuku'])->name('tambahBuku')->middleware('auth');
Route::post('/tambahBuku/store', [BukuController::class, 'store']);
Route::get('/tambahBuku/checkSlug', [BukuController::class, 'checkSlug']);
Route::get('/detailBuku/editBuku/{buku:slug}', [BukuController::class, 'ViewEditBuku'])->name('EditBuku')->middleware('auth');
Route::put('detailBuku/editBuku/editBuku/{buku:slug}', [BukuController::class, 'update']);
Route::delete('/hapusBuku/{buku:slug}', [BukuController::class, 'destroy'])->name('hapusBuku')->middleware('auth');


//Anggota
Route::get('/dataAnggota', [AnggotaController::class, 'ViewDataAnggotaPage'])->name('dataAnggota')->middleware('auth');
Route::get('/tambahAnggota', [AnggotaController::class, 'ViewTambahAnggotaPage'])->name('tambahAnggota')->middleware('auth');
Route::post('/tambahAnggota/store', [AnggotaController::class, 'store']);
Route::get('/editAnggota', [AnggotaController::class, 'ViewEditAnggotaPage'])->name('editAnggota')->middleware('auth');
Route::get('/editAnggota/{anggota:id}', [AnggotaController::class, 'ViewEditAnggotaPage'])->name('EditAnggota');
Route::put('/editAnggota/editAnggota/{anggota:id}', [AnggotaController::class, 'update']);
Route::delete('/hapusAnggota/{anggota:id}', [AnggotaController::class, 'destroy'])->name('hapusAnggota');


//Peminjaman
Route::get('/dataPeminjaman', [PeminjamanController::class, 'viewDataPinjam'])->name('DataPinjam')->middleware('auth');
Route::get('/addPeminjam', [PeminjamanController::class, 'formAddPinjam'])->name('AddPinjam')->middleware('auth');
Route::post('/addPeminjam/store', [PeminjamanController::class, 'store']);
Route::get('/addPeminjam/checkSlug', [PeminjamanController::class, 'checkSlug']);
Route::get('/editPeminjam/{pinjam:slug}', [PeminjamanController::class, 'formEditPinjam'])->name('EditPinjam')->middleware('auth');
Route::put('/editPeminjam/editPeminjam/{pinjam:slug}', [PeminjamanController::class, 'update']);
Route::get('/editPeminjam/{pinjam:slug}/kembalikan', [PeminjamanController::class, 'kembalikan']);
Route::get('/editPeminjam/{pinjam:slug}/hapus', [PeminjamanController::class, 'hapus'])->middleware('auth');

//Pengembalian
Route::get('/dataPengembalian', [PengembalianController::class, 'viewDataKembali'])->name('DataKembali')->middleware('auth');
Route::get('/editPengembalian', [PengembalianController::class, 'formEditDataKembali'])->name('EditKembali')->middleware('auth');

//pengembalian
Route::get('/dataPengembalian', [PengembalianController::class, 'viewDataPengembalian'])->name('DataKembali')->middleware('auth');
Route::get('/editPengembalian/{pinjam:slug}', [PengembalianController::class, 'formEditDataKembali'])->name('EditKembali')->middleware('auth');
Route::put('/editPengembalian/editPengembalian/{pinjam:slug}', [PengembalianController::class, 'update']);
Route::get('/editPengembalian/{pinjam:slug}/hapus', [PengembalianController::class, 'hapus']);
Route::get('/editPengembalian/{pinjam:slug}/batal', [PengembalianController::class, 'batal_kembali']);

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
