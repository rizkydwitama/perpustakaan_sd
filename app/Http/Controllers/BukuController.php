<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function ViewBuku()
    {
        return view('PageBuku.buku');
    }

    public function ViewDetailBuku()
    {
        return view('PageBuku.detailBuku');
    }

    public function ViewTambahBuku()
    {
        return view('PageBuku.tambahBuku');
    }

    public function ViewEditBuku()
    {
        return view('PageBuku.editBuku');
    }

}
