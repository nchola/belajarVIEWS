<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * Model untuk pengguna yang mengatur otentikasi dan otorisasi.
 * Kelas ini menggunakan trait 'Notifiable' dan 'HasApiTokens' dari Laravel,
 * yang memungkinkan model untuk mengirim notifikasi dan menggunakan token API.
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    /**
     * Nama tabel yang dikaitkan dengan model ini.
     *
     * Mendefinisikan secara eksplisit tabel yang terkait dengan model User.
     * Laravel secara default akan mencoba mencari tabel dengan nama jamak
     * dari nama kelas, tetapi mendefinisikannya memungkinkan untuk penyesuaian.
     *
     * @var string
     */
    protected $table = 'users';
    
    // Anda dapat menambahkan lebih banyak properti dan metode di sini sesuai dengan kebutuhan aplikasi Anda.

    // Misalnya, mendefinisikan kolom apa saja yang bisa diisi secara massal (mass assignment).
    // protected $fillable = [...];

    // Atau, mendefinisikan kolom mana saja yang harus disembunyikan saat model dikonversi menjadi array atau JSON.
    // protected $hidden = [...];
    
    // Juga menentukan relasi ke model lain jika diperlukan.
    // public function posts() { return $this->hasMany(Post::class); }
}
