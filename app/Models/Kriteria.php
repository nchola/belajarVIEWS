<?php

namespace App\Models; // Namespace yang menentukan lokasi file ini dalam struktur aplikasi Laravel.

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk pembuatan factory model.
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas Model dari Eloquent.

class Kriteria extends Model // Kelas Kriteria yang mewarisi kelas Model.
{
    use HasFactory; // Menggunakan trait HasFactory yang menyediakan factory method untuk model ini.
    protected $table = 'kriteria'; // Property yang mendefinisikan tabel database yang dikaitkan dengan model ini.
}
