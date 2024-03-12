<?php

namespace App\Http\Controllers;

//Menggunakan app namespace controllers
use App\Http\Controllers\Controller;
//Menggunakan model eloquent class "Pelanggan" untuk mengatur logic bisnis database disini
use App\Models\Pelanggan;
// Menggunakan kelas Request dari library Illuminate\Http untuk memanipulasi permintaan HTTP
use Illuminate\Http\Request;
// Menggunakan fasad Auth dari library Illuminate\Support\Facades untuk mengelola otentikasi pengguna
use Illuminate\Support\Facades\Auth;
// Menggunakan fasad Session dari library Illuminate\Support\Facades untuk menyimpan pesan sesi
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    //Fungsi untuk menampilkan semua pelanggan
    function index()
    {
        //Mengambil semua nilai data pelanggan dari tabel pelanggan di database
        $pelanggan = Pelanggan::all();
        //Membuat fungsi mengembalikan view pelanggan sebagai "index" untuk ditampilkan
        return view('pelanggan.index', compact('pelanggan'));
    }
    //Fungsi untuk menampilkan form input untuk menginput pelanggan baru
    function create()
    {
        return view('pelanggan.create');// Mengembalikan fungsi ke "view" pelanggan.create
    }

    //Fungsi untuk menyimpan data pelanggan baru ke database melalui form input di web
    function store(Request $request)
    {
        // Memvalidasi input dari formulir pembuatan pelanggan
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'periode_polis' => 'required',
            'nilai_premi' => 'required',
        ]);

        // Membuat objek Pelanggan baru dan menyimpan data dari request ke dalam database
        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->periode_polis = $request->periode_polis;
        $pelanggan->nilai_premi = $request->nilai_premi;
        $pelanggan->save();

        //Membuat session flash tampilan pesan untuk memberi informasi 
        Session::flash('message', "Pelanggan berhasil disimpan!");
        //Setelah pelanggan berhasil disimpan akan mengembalikan ke tampilan pelanggan
        return redirect()->route('pelanggan.index');
    }

    // Fungsi untuk menampilkan formulir untuk mengedit pelanggan
    function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Mengambil data pelanggan berdasarkan ID
        return view('pelanggan.edit', compact('pelanggan')); // Mengembalikan view 'pelanggan.edit' dengan data pelanggan yang akan diubah
    }

    // Fungsi untuk menyimpan perubahan data pelanggan ke dalam database
    function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Mengambil data pelanggan berdasarkan ID

        // Memvalidasi input dari formulir pembuatan pelanggan
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'periode_polis' => 'required',
            'nilai_premi' => 'required',
        ]);

        // Menyimpan data yang diubah ke dalam database
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->periode_polis = $request->periode_polis;
        $pelanggan->nilai_premi = $request->nilai_premi;
        $pelanggan->save();

        // Menyimpan pesan flash ke sesi untuk memberi informasi bahwa pelanggan berhasil diubah
        Session::flash('message', "Pelanggan berhasil diubah!");
        return redirect()->route('pelanggan.index'); // Mengarahkan kembali ke halaman indeks pelanggan
    }

    // Fungsi untuk menghapus pelanggan dari database
    function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Mengambil data pelanggan berdasarkan ID
        $pelanggan->delete(); // Menghapus pelanggan dari database

        // Menyimpan pesan flash ke sesi untuk memberi informasi bahwa pelanggan berhasil dihapus
        Session::flash('message', "Pelanggan berhasil dihapus!");
        return redirect()->route('pelanggan.index'); // Mengarahkan kembali ke halaman indeks pelanggan
    }
}
