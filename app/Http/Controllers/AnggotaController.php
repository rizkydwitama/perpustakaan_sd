<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function ViewDataAnggotaPage(Request $request)
    {
        $search = $request->input('search');
        $anggotas = Anggota::where('nama_anggota', 'like', '%' . $search . '%')->get();

        return view('PageAnggota.dataAnggota', [
            "anggotas" => $anggotas
        ]);
    }

    public function ViewTambahAnggotaPage()
    {
        return view('PageAnggota.tambahAnggota');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_anggota' => 'required|max:255',
            'nomor_induk_anggota' => 'required|max:255',
            'kelas' => 'required|max:255',
            'jumlah_pinjam' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        Anggota::create($validatedData);
        return redirect('/dataAnggota')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function ViewEditAnggotaPage(Anggota $anggota)
    {
        return view('PageAnggota.editAnggota', [
            'anggota' => $anggota
        ]);
    }

    public function update(Request $request, Anggota $anggota){
        $validatedData = $request->validate([
            'nama_anggota' => 'required|max:255',
            'nomor_induk_anggota' => 'required|max:255',
            'kelas' => 'required|max:255',
            'jumlah_pinjam' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        Anggota::where('id', $anggota->id)->update($validatedData);
        return redirect('/dataAnggota')->with('success', 'Data Anggota berhasil diupdate');
    }

    public function destroy(Anggota $anggota){
        $anggota->delete();
        return redirect('/dataAnggota')->with('success', 'Data Anggota berhasil dihapus');
    }

}