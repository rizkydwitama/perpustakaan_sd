<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PeminjamanController extends Controller
{
    
    public function viewDataPinjam()
    {   
        if(Auth::guard('anggota')->check()){
            $pinjams = Peminjaman::where('nomor_induk_peminjam', Auth::guard('anggota')->user()->nomor_induk_anggota);
        }else{
            $pinjams = Peminjaman::latest();

        }

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

    public function formAddPinjam(Request $request)
    {
        if($request->slugBuku!=null){
            $slugBuku = $request->slugBuku;
            $buku = Buku::where('slug', $slugBuku)->get()[0];
            // dd($buku);
            return view('PagePeminjaman.addPeminjam',[
                "slugBuku" => $slugBuku,
                "buku" => $buku
            ]);
        }

        return view('PagePeminjaman.addPeminjam',[
            "slugBuku"=> null,
            "buku" => null
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'nama_peminjam' => 'required|max:255',
            'nomor_induk_peminjam' => 'required|numeric',
            'tanggal_pengembalian' => 'required',
            'tanggal_peminjaman' => 'required'
            
        ]);

        $date_pinjam = Carbon::createFromFormat('d/m/Y', $request->tanggal_peminjaman)->format('Y-m-d');
        $date_kembali = Carbon::createFromFormat('d/m/Y', $request->tanggal_pengembalian)->format('Y-m-d');
        $validatedData['tanggal_peminjaman'] = $date_pinjam;
        $validatedData['tanggal_pengembalian'] = $date_kembali;
        // dd($request);
        $buku = Buku::where('slug', $request->slugBuku)->get()[0];
        $validatedData['id_buku'] = $buku->id;
        $buku->jumlah_buku -= 1;
        $buku->save();

        $siswa = Anggota::where('nomor_induk_anggota', $request->nomor_induk_peminjam)->get()[0];
        $siswa->jumlah_pinjam += 1;
        $siswa->save();

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
            $date_pinjam = Carbon::createFromFormat('d/m/Y', $request->tanggal_peminjaman)->format('Y-m-d');
            $validatedData['tanggal_peminjaman'] = $date_pinjam;
        } else{
            $validatedData['tanggal_peminjaman'] = $pinjam->tanggal_peminjaman;
        }
        
        if($request->tanggal_pengembalian !=$pinjam->tanggal_pengembalian){
            $date_kembali = Carbon::createFromFormat('d/m/Y', $request->tanggal_pengembalian)->format('Y-m-d');
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
    //    dd(Buku::where('slug','like', '%' . $data->slug . '%')->get()[0]);
        $buku = Buku::where('id',$data->id_buku)->get()[0];
        $buku->jumlah_buku += 1;
        $buku->save();
        
        $siswa = Anggota::where('nomor_induk_anggota', $data->nomor_induk_peminjam)->get()[0];
        $siswa->jumlah_pinjam -= 1;
        $siswa->save();

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

