<?php

// Menentukan namespace, yang membantu dalam mengorganisir dan mengelompokkan kelas-kelas yang berhubungan.
// Ini juga membantu dalam menghindari konflik nama dengan kelas dari pustaka lain.
namespace App\Http\Controllers;

// Mengimpor kelas Controller dari namespace yang sudah ditentukan oleh Laravel.
// Kelas Controller dasar menyediakan beberapa fitur bantuan untuk mengelola request dan responses.
use App\Http\Controllers\Controller;

// Mengimpor kelas Request dari Illuminate\Http. Kelas Request menyediakan objek yang mewakili permintaan HTTP masuk,
// termasuk data input, file, dan informasi sesi.
use Illuminate\Http\Request;

// Mendefinisikan kelas DashboardController yang mewarisi fitur dari kelas Controller dasar.
// DashboardController ditujukan untuk menangani logic yang berkaitan dengan halaman dashboard aplikasi.
class DashboardController extends Controller
{
    // Method index adalah action controller yang dijalankan ketika ada request ke route yang ditentukan untuk dashboard.
    // Ini adalah titik masuk utama untuk halaman dashboard.
    public function index()
    {
        // Method ini mengembalikan view yang akan ditampilkan di browser.
        // View 'dashboard.index' merujuk pada file blade PHP di resources/views/dashboard/index.blade.php.
        // Blade adalah sistem templating Laravel yang memungkinkan Anda untuk menulis kode PHP dengan sintaks yang lebih bersih dan sederhana.
        return view('dashboard.index');
    }
}
