<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PeminjamanController extends Controller
{
    
    public function viewDataPinjam()
    {

        return view('PagePeminjaman.dataPeminjaman', [
            "pinjams" => Peminjaman::all()
        ]);
    }

    public function formAddPinjam()
    {

        return view('PagePeminjaman.addPeminjam');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'nama_peminjam' => 'required|max:255',
            'nomor_induk_peminjam' => 'required',
            'tanggal_pengembalian' => 'required',
            'tanggal_peminjaman' => 'required'
            
        ]);

        $date_pinjam = Carbon::createFromFormat('m/d/Y', $request->tanggal_peminjaman)->format('Y-m-d');
        $date_kembali = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengembalian)->format('Y-m-d');
        $validatedData['tanggal_peminjaman'] = $date_pinjam;
        $validatedData['tanggal_pengembalian'] = $date_kembali;

        // dd($validatedData);
        Peminjaman::create($validatedData);

        return redirect('/dataPeminjaman')->with('success', 'New Post has been added!');
    }

    public function formEditPinjam(Peminjaman $pinjam)
    {

        return view('PagePeminjaman.editPeminjam', [
            'pinjam' => $pinjam
        ]);
    }

    public function update(Request $request, Peminjaman $pinjam){
        $rules = [
            'judul_buku' => $request->judul_buku,
            'nama_peminjam' => $request->nama_peminjam,
            'nomor_induk_peminjam' => $request->nomor_induk_peminjam,
        ];

        $date_pinjam = Carbon::createFromFormat('m/d/Y', $request->tanggal_peminjaman)->format('Y-m-d');
        $date_kembali = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengembalian)->format('Y-m-d');
        $rules['tanggal_peminjaman'] = $date_pinjam;
        $rules['tanggal_pengembalian'] = $date_kembali;

        // $validatedData = $request->validate($rules);
        // dd($validatedData);
        Peminjaman::where('id', $pinjam->id)->update($rules);

        return redirect('/dataPeminjaman')->with('success', 'New Post has been added!');


    }

    public function kembalikan(Peminjaman $pinjam){
        // dd($pinjam);
        $data = Peminjaman::find($pinjam->id);
        $data->status_peminjaman = false;
        $data->save();

        return redirect('/dataPeminjaman')->with('success', 'New Post has been added!');
    }

    public function checkSlug(Request $request){
        
        $slug = SlugService::createSlug(Peminjaman::class, 'slug', $request->judul_buku);
        return response()->json(['slug' => $slug]);
    }
}

