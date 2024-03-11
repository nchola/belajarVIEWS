<?php

// Mendefinisikan namespace untuk Controller, yang sesuai dengan struktur direktori dan namespace PSR-4.
namespace App\Http\Controllers;

// Mengimpor trait AuthorizesRequests yang menyediakan metode untuk memberikan otorisasi pada aksi yang berbeda.
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// Mengimpor trait ValidatesRequests yang menyediakan metode untuk melakukan validasi request HTTP masuk.
use Illuminate\Foundation\Validation\ValidatesRequests;
// Mengimpor kelas dasar Controller dari Illuminate\Routing\Controller sebagai BaseController.
use Illuminate\Routing\Controller as BaseController;

// Membuat kelas Controller yang mewarisi BaseController dari Laravel.
class Controller extends BaseController
{
    // Menggunakan trait AuthorizesRequests untuk memberikan metode-metode otorisasi kepada Controller ini.
    use AuthorizesRequests;
    // Menggunakan trait ValidatesRequests untuk memberikan metode-metode validasi kepada Controller ini.
    use ValidatesRequests;
}
