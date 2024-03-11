<?php

namespace App\Models; // Namespace yang menentukan lokasi file ini dalam struktur aplikasi Laravel.

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk pembuatan factory model.
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas Model dari Eloquent.

class Pelanggan extends Model // Kelas Pelanggan yang mewarisi kelas Model.
{
    use HasFactory; // Menggunakan trait HasFactory yang menyediakan factory method untuk model ini.
    
    protected $table = 'pelanggan'; // Property yang mendefinisikan tabel database yang dikaitkan dengan model ini.

    public function Penilaian() // Mendefinisikan hubungan one-to-many ke model Penilaian.
    {
        // Kembalikan hasil dari method hasMany yang mendefinisikan hubungan ini.
        // Parameter pertama adalah nama kelas dari model yang terkait,
        // parameter kedua adalah nama foreign key di tabel penilaian yang merujuk ke id pelanggan,
        // dan parameter ketiga adalah kolom id di tabel pelanggan yang menjadi primary key.
        return $this->hasMany(Penilaian::class, 'pelanggan_id', 'id');
    }
}
