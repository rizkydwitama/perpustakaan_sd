<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Anggota;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'Admin01',
            'email' => 'admin01@gmail.com',
            'password' => Hash::make('admin01')
        ]);

        \App\Models\User::create([
            'nama' => 'Admin02',
            'email' => 'admin02@gmail.com',
            'password' => Hash::make('admin02')
        ]);

        \App\Models\User::create([
            'nama' => 'Admin03',
            'email' => 'admin03@gmail.com',
            'password' => Hash::make('admin03')
        ]);


        Category::create([
            'name' => 'Agama',
            'slug' => 'agama'
        ]);
        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);
        Category::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan'
        ]);

        \App\Models\Peminjaman::factory(3)->create();

        // Anggota::create([
        //     'name' => 'Hiburan',
        //     'slug' => 'hiburan'
        // ]);

    }
}
