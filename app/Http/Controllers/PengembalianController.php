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
        $pinjams = Peminjaman::latest();

        if(request('search')){
            $pinjams->where('judul_buku', 'like', '%'.request('search').'%')
                    ->orWhere('nama_peminjam', 'like', '%'.request('search').'%')
                    ->orWhere('nomor_induk_peminjam', 'like', '%'.request('search').'%')
                    ->orWhere('tanggal_peminjaman', 'like', '%'.request('search').'%')
                    ->orWhere('tanggal_pengembalian', 'like', '%'.request('search').'%');
        }

        return view('PagePengembalian.dataPengembalian', [
            "pinjams" => $pinjams->get()
        ]);
    }

    public function formEditDataKembali(Peminjaman $pinjam)
    {

        return view('PagePengembalian.EditPengembalian',[
            'pinjam' => $pinjam
        ]);
    }

    public function update(Request $request, Peminjaman $pinjam){
       
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'nama_peminjam' => 'required|max:255',
            'nomor_induk_peminjam' => 'required|numeric',
            'tanggal_kembali_faktual' => 'required',
            'tanggal_peminjaman' => 'required'
            
        ]);

        if($request->tanggal_peminjaman != $pinjam->tanggal_peminjaman ){
            $date_pinjam = Carbon::createFromFormat('d/m/Y', $request->tanggal_peminjaman)->format('Y-m-d');
            $validatedData['tanggal_peminjaman'] = $date_pinjam;
        } else{
            $validatedData['tanggal_peminjaman'] = $pinjam->tanggal_peminjaman;
        }
        
        if($request->tanggal_kembali_faktual !=$pinjam->tanggal_kembali_faktual){
            $date_kembali = Carbon::createFromFormat('d/m/Y', $request->tanggal_kembali_faktual)->format('Y-m-d');
            $validatedData['tanggal_kembali_faktual'] = $date_kembali;
        } else{
            $validatedData['tanggal_kembali_faktual'] = $pinjam->tanggal_kembali_faktual;
        }
    
        

        // $validatedData = $request->validate($validatedData);
        // dd($validatedData);
        Peminjaman::where('id', $pinjam->id)->update($validatedData);

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
