<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Anggota::truncate();

        $csvFile = fopen(base_path("database/data/dataSiswa.csv"), "r");
        $firstline = True;
        while(($data = fgetcsv($csvFile,2000,",")) !== FALSE){
            if(!$firstline){
                Anggota::create([
                    "nama_anggota" => $data['2'],
                    "nomor_induk_anggota" => $data['1'],
                    "password" => Hash::make($data['1']),
                    "kelas" => $data['3'],
                    "jumlah_pinjam" => 0
                ]);

            }
            $firstline = false;
        }

        fclose($csvFile);


    }
}
