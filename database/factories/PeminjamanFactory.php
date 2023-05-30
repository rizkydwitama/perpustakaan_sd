<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_buku'=> $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'nama_peminjam' => $this->faker->name(),
            'nomor_induk_peminjam' => mt_rand(10000000,99999999),
            'tanggal_peminjaman' => $this->faker->date(),
            'tanggal_pengembalian' => $this->faker->dateTime(),
            'status_peminjaman' => (bool)rand(0,1)
        ];
    }
}
