<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Menggunakan kelas Controller dari namespace App\Http\Controllers
use App\Models\User; // Menggunakan model User dari namespace App\Models
use Illuminate\Http\Request; // Menggunakan kelas Request dari library Illuminate\Http untuk memanipulasi permintaan HTTP
use Illuminate\Support\Facades\Auth; // Menggunakan fasad Auth dari library Illuminate\Support\Facades untuk mengelola otentikasi pengguna

class LoginController extends Controller
{
    // Membuat fungsi untuk mengembalikan tampilan view terhadap login sebagai index
    function index()
    {
        return view('login');
    }
    // Membuat fungsi untuk proses login saat form login disubmit
    function login(Request $request)
    {
        $login_credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // Mencoba pencari pengguna ketika login berdasarkan kredensial login
        $user = User::where($login_credentials)->first();
        // Jika pengguna ditemukan atau berdasarkan kredensial login
        if ($user) {
            Auth::login($user);
            return redirect('/');
        }
        // Jika nilai fungsi tidak sesuai terhadap properti login pengguna
        // Maka akan ditujukan kembali ke halaman login dengan pesan tampilan
        return redirect()->route('login')->withErrors([
            'login_fail' => "Username atau password salah!"
        ]);
    }
    // Mengelola proses log out
    function logout()
    {
        //Fungsi fasade auth sebagai autorisasi fungsi untuk log out
        Auth::logout();
        //Mengatur parameter mengembalikan rute nilai kehalaman login jika selesai logout
        return redirect()->route('login');
    }
}
