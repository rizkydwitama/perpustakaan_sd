<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function ViewDataAnggotaPage()
    {
        return view('PageAnggota.dataAnggota');
    }

    public function ViewTambahAnggotaPage()
    {
        return view('PageAnggota.tambahAnggota');
    }

    public function ViewEditAnggotaPage()
    {
        return view('PageAnggota.editAnggota');
    }
}
