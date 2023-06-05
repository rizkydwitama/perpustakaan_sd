<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function viewDataPengembalian()
    {

        return view('PagePengembalian.dataPengembalian', [
            "pinjams" => Peminjaman::all()
        ]);
    }

    public function formEditDataKembali(Peminjaman $pinjam)
    {

        return view('PagePengembalian.EditPengembalian',[
            'pinjam' => $pinjam
        ]);
    }

    public function update(Request $request, Peminjaman $pinjam){
       
        $rules = [
            'judul_buku' => $request->judul_buku,
            'nama_peminjam' => $request->nama_peminjam,
            'nomor_induk_peminjam' => $request->nomor_induk_peminjam,
        ];

        if($request->tanggal_peminjaman != $pinjam->tanggal_peminjaman ){
            $date_pinjam = Carbon::createFromFormat('m/d/Y', $request->tanggal_peminjaman)->format('Y-m-d');
            $rules['tanggal_peminjaman'] = $date_pinjam;
        } else{
            $rules['tanggal_peminjaman'] = $pinjam->tanggal_peminjaman;
        }
        
        if($request->tanggal_kembali_faktual !=$pinjam->tanggal_kembali_faktual){
            $date_kembali = Carbon::createFromFormat('m/d/Y', $request->tanggal_kembali_faktual)->format('Y-m-d');
            $rules['tanggal_kembali_faktual'] = $date_kembali;
        } else{
            $rules['tanggal_kembali_faktual'] = $pinjam->tanggal_kembali_faktual;
        }
    
        

        // $validatedData = $request->validate($rules);
        // dd($validatedData);
        Peminjaman::where('id', $pinjam->id)->update($rules);

        return redirect('/dataPengembalian')->with('success', 'Data Berhasil Diedit!');


    }

    public function hapus(Peminjaman $pinjam){
        $data = Peminjaman::find($pinjam->id);

        $data->delete();
        return redirect('/dataPengembalian')->with('success', 'Data Berhasil Dihapus!');

    }

    public function batal_kembali(Peminjaman $pinjam){
        // dd($pinjam);
        $data = Peminjaman::find($pinjam->id);
        $data->status_peminjaman = true;
        $data->tanggal_kembali_faktual = $data->tanggal_pengembalian;
        $data->save();

        return redirect('/dataPengembalian')->with('success', 'Data Dikembalikan ke Halaman Peminjaman!');
    }
}
