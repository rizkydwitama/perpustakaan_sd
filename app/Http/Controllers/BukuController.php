<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BukuController extends Controller
{
    public function ViewBuku(Request $request)
    {
        $bukus = Buku::all();

        if($request->category){
            $bukus = Buku::where('category_id', $request->input('category'))->get();
            // dd( $request->input('category'));

        }
        $search = $request->input('search');
        if($search !=null){
            $bukus = Buku::where('judul_buku', 'like', '%' . $search . '%')->get();

        }
        return view('PageBuku.buku', [
            'bukus' => $bukus,
            'categories' => Category::all()
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
        return view('PageBuku.tambahBuku',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'category_id' => 'required',
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
            $validatedData['gambar'] = $image->storeAs('images', $filename);
        } else {
            $validatedData['gambar'] = 'images/no-cover.png';
        }
        Buku::create($validatedData);
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function ViewEditBuku(Buku $buku)
    {
        return view('PageBuku.editBuku', [
            'buku' => $buku,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Buku $buku){
        // dd($request);
        $rules = [
            'judul_buku' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'category_id' => 'required',
            'impresium' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'jumlah_buku' => 'required|max:255',
            'kolasi' => 'required|max:255',
            'no_class' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        if ($request->hasFile('gambar')) {
            if ($buku->gambar !== 'images/no-cover.png') {
                Storage::delete($buku->gambar);
            }
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $validatedData['gambar'] = $image->storeAs('images', $filename);
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