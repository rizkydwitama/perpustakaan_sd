<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function viewHomePage()
    {

        return view('homepage',[
            'anggota' => Anggota::count(),
            'buku' => Buku::count(),
            'peminjaman' => Peminjaman::all()->where('status_peminjaman', 1)->count(),
            'pengembalian' => Peminjaman::all()->where('status_peminjaman', 0)->count()
        ]);
    }
}