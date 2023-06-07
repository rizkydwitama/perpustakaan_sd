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
        $pinjams = Peminjaman::latest();

        if(request('search')){
            $pinjams->where('judul_buku', 'like', '%'.request('search').'%')
                    ->orWhere('nama_peminjam', 'like', '%'.request('search').'%')
                    ->orWhere('nomor_induk_peminjam', 'like', '%'.request('search').'%')
                    ->orWhere('tanggal_peminjaman', 'like', '%'.request('search').'%')
                    ->orWhere('tanggal_pengembalian', 'like', '%'.request('search').'%');
        }


        return view('PagePeminjaman.dataPeminjaman', [
            
            "pinjams" => $pinjams->get()
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
            'nomor_induk_peminjam' => 'required|numeric',
            'tanggal_pengembalian' => 'required',
            'tanggal_peminjaman' => 'required'
            
        ]);

        $date_pinjam = Carbon::createFromFormat('m/d/Y', $request->tanggal_peminjaman)->format('Y-m-d');
        $date_kembali = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengembalian)->format('Y-m-d');
        $validatedData['tanggal_peminjaman'] = $date_pinjam;
        $validatedData['tanggal_pengembalian'] = $date_kembali;

        // dd($validatedData);
        Peminjaman::create($validatedData);

        return redirect('/dataPeminjaman')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function formEditPinjam(Peminjaman $pinjam)
    {

        return view('PagePeminjaman.editPeminjam', [
            'pinjam' => $pinjam
        ]);
    }

    public function update(Request $request, Peminjaman $pinjam){
        
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'nama_peminjam' => 'required|max:255',
            'nomor_induk_peminjam' => 'required|numeric',
            'tanggal_pengembalian' => 'required',
            'tanggal_peminjaman' => 'required'
            
        ]);

        if($request->tanggal_peminjaman != $pinjam->tanggal_peminjaman ){
            $date_pinjam = Carbon::createFromFormat('m/d/Y', $request->tanggal_peminjaman)->format('Y-m-d');
            $validatedData['tanggal_peminjaman'] = $date_pinjam;
        } else{
            $validatedData['tanggal_peminjaman'] = $pinjam->tanggal_peminjaman;
        }
        
        if($request->tanggal_pengembalian !=$pinjam->tanggal_pengembalian){
            $date_kembali = Carbon::createFromFormat('m/d/Y', $request->tanggal_pengembalian)->format('Y-m-d');
            $validatedData['tanggal_pengembalian'] = $date_kembali;
        } else{
            $validatedData['tanggal_pengembalian'] = $pinjam->tanggal_pengembalian;
        }
    
        

        // $validatedData = $request->validate($rules);
        // dd($validatedData);
        Peminjaman::where('id', $pinjam->id)->update($validatedData);

        return redirect('/dataPeminjaman')->with('success', 'Data Peminjaman berhasil diedit!');


    }

    public function kembalikan(Peminjaman $pinjam){
        // dd($pinjam);
        $data = Peminjaman::find($pinjam->id);
        $data->status_peminjaman = false;
        $data->tanggal_kembali_faktual = $data->updated_at;
        $data->save();

        return redirect('/dataPeminjaman')->with('success', 'Buku telah dikembalikan!');
    }

    public function hapus(Peminjaman $pinjam){
        $data = Peminjaman::find($pinjam->id);

        $data->delete();
        return redirect('/dataPeminjaman')->with('success', 'Data Berhasil Dihapus');

    }

    public function checkSlug(Request $request){
        
        $slug = SlugService::createSlug(Peminjaman::class, 'slug', $request->judul_buku);
        return response()->json(['slug' => $slug]);
    }
}

