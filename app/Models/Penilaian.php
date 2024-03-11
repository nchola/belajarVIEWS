<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penilaian
 *
 * Representasi model untuk tabel 'penilaian' dalam database.
 * 
 * Model ini mendefinisikan hubungan antara penilaian dan pelanggan, serta
 * penilaian dan kriteria, menggunakan relasi Eloquent ORM.
 *
 * @package App\Models
 */
class Penilaian extends Model
{
    // Menggunakan trait HasFactory yang menyediakan metode factory untuk pembuatan seed dan testing.
    use HasFactory;

    // Mendefinisikan nama tabel yang dikaitkan dengan model ini.
    protected $table = 'penilaian';

    /**
     * Mendefinisikan relasi 'belongsTo' antara Penilaian dan Pelanggan.
     *
     * Ini menunjukkan bahwa setiap penilaian berelasi dengan satu pelanggan.
     * 'pelanggan_id' di tabel penilaian adalah foreign key yang merujuk ke kolom 'id'
     * di tabel pelanggan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    /**
     * Mendefinisikan relasi 'belongsTo' antara Penilaian dan Kriteria.
     *
     * Ini menunjukkan bahwa setiap penilaian berelasi dengan satu kriteria.
     * 'kriteria_id' di tabel penilaian adalah foreign key yang merujuk ke kolom 'id'
     * di tabel kriteria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
    
}
