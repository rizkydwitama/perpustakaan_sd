<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    
    public function viewDataPinjam()
    {

        return view('PagePeminjaman.dataPeminjaman');
    }

    public function formAddPinjam()
    {

        return view('PagePeminjaman.addPeminjam');
    }

    public function formEditPinjam()
    {

        return view('PagePeminjaman.editPeminjam');
    }
}

