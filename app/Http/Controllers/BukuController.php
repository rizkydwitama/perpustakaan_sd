<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BukuController extends Controller
{
    public function ViewBuku(Request $request)
    {

        $search = $request->input('search');
        $bukus = Buku::where('judul_buku', 'like', '%' . $search . '%')->get();

        return view('PageBuku.buku', [
            'bukus' => $bukus
        ]);
    }

    public function ViewDetailBuku(Buku $buku)
    {
        return view('PageBuku.detailBuku', [
            'buku' => $buku
        ]);
    }

    public function ViewTambahBuku()
    {
        return view('PageBuku.tambahBuku');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'impresium' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'jumlah_buku' => 'required|max:255',
            'kolasi' => 'required|max:255',
            'no_class' => 'required|max:255',
        ]);
        if ($request->hasFile('gambar')) {
            $image = $validatedData['gambar'];
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $validatedData['gambar'] = 'storage/images/' . $filename;
        } else {
            $validatedData['gambar'] = 'post-gambar/no-cover.jpg';
        }

        Buku::create($validatedData);
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function ViewEditBuku(Buku $buku)
    {
        return view('PageBuku.editBuku', [
            'buku' => $buku
        ]);
    }

    public function update(Request $request, Buku $buku){
        // dd($request);
        $rules = [
            'judul_buku' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'impresium' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'jumlah_buku' => 'required|max:255',
            'kolasi' => 'required|max:255',
            'no_class' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-gambar');
        }
        Buku::where('id', $buku->id)->update($validatedData);
        return redirect('/buku')->with('success', 'Data Buku berhasil diupdate');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Buku::class, 'slug', $request->judul_buku);
        return response()->json(['slug' => $slug]);
    }

    public function destroy(Buku $buku){
        if ($buku->gambar !== 'post-gambar/no-cover.jpg') {
            Storage::delete($buku->gambar);
        }

        $buku->delete();
        return redirect('/buku')->with('success', 'Data Buku berhasil dihapus');
    }
}
