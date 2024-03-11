<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = "Nilai premi yang diasuransikan";
        $kriteria->bobot = 25;
        $kriteria->save();
        
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = "Jumlah produk asuransi yang dimiliki";
        $kriteria->bobot = 25;
        $kriteria->save();
        
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = "Durasi polis yang dimiliki";
        $kriteria->bobot = 25;
        $kriteria->save();
        
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = "Riwayat pembayaran premi yang lancar";
        $kriteria->bobot = 25;
        $kriteria->save();
    }
}
