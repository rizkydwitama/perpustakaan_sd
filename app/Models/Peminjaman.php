<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Peminjaman extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $guarded = ['id'];

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'judul_buku'
    //         ]
    //     ];
    // }

    public function anggota(){
        return $this->belongsTo(Anggota::class);
    }
    public function buku(){
        return $this->belongsTo(Category::class, 'id_buku');
    }


}
