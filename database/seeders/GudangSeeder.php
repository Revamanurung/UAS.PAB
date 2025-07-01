<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gudang;

class GudangSeeder extends Seeder
{
    public function run(): void
    {
        $gudangs = [
            [
                'nama' => 'Gudang A',
                'kode' => 'GA',
                'alamat' => 'Lokasi Gudang A',
                'status' => true
            ],
            [
                'nama' => 'Gudang B',
                'kode' => 'GB',
                'alamat' => 'Lokasi Gudang B',
                'status' => true
            ],
            [
                'nama' => 'Gudang C',
                'kode' => 'GC',
                'alamat' => 'Lokasi Gudang C',
                'status' => true
            ],
        ];

        foreach ($gudangs as $gudang) {
            Gudang::create($gudang);
        }
    }
} 