<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function viewDataKembali()
    {

        return view('PagePengembalian.DataPengembalian');
    }

    public function formEditDataKembali()
    {

        return view('PagePengembalian.EditPengembalian');
    }
}
