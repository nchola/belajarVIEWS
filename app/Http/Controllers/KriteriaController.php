<?php

//mendefinisikan nama ruang yang membantu dalam pengelompokan kelas terkait dan meghindari konflik nama.
namespace App\Http\Controllers;

//Mengimpor kelas-kelas yang diperlukan dari framework laravel dan aplikasi itu senndiri
use App\Http\Controllers\Controller;
use App\Models\Kriteria; //Model kriteria untuk berinteraksi dengan tabel kriteria di database
use Illuminate\Http\Request; //Untuk menangani request HTTP
use Illuminate\Support\Facades\Session; //Fasade session untuk flash messaging

//Mendefinisikan kelas kriteriacontroller yang mewarisi fitur fitur dasar laravel terhadap kelas controller
class KriteriaController extends Controller
{   
    //Menampilkan semua kriteria.
    function index()
    {   
        //Mengambil semua kriteria dari database
        $kriterias = Kriteria::all();
        //Mengembalikan view 'kriteria.index' dan mengoper data kriteria ke view tersebut.
        return view('kriteria.index', compact('kriterias'));
    }

    // Menampilkan form create untuk membuat fungsi kriteria baru
    function create()
    {   // Memanggil "views" 'kriteria.create'
        return view('kriteria.create');
    }
    // Menyimpan kriteria baru ke dalam database
    function store(Request $request)
    {
        // Membuat validasi untuk menerima input dari user
        $request->validate([
            'nama_kriteria' => 'required', // Nama kriteria harus diisi
            'bobot' => 'required', // Bobot juga harus diisi
        ]);

        // Membuat instance baru dari model kriteria dan mengisinya dengan input form.
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->save(); // Menyimpan kriteria ke database

        // Menggunakan session flash message yang berfungsi sebagai penampilan message box
        Session::flash('message', "Kriteria berhasil disimpan!");
        // Redirect kembali ke halaman kriteria
        return redirect()->route('kriteria.index');
    }

    // Membuat fungsi edit terhadap kriteria yang telah diinput
    function edit($id)
    {   // Mengambil kriteria berdasarkan id atau jika false menampilkan error jika kriteria tidak ditemukan
        $kriteria = Kriteria::findOrFail($id);
        // Mengembalikan nilai view ke eit kriteria dengan data kriteria untuk di edit
        return view('kriteria.edit', compact('kriteria'));
    }

    // Membuat fungsi untuk mengupdate/memperbarui data kriteria ke database berdasarkan foreign key
    function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id); //Mencari kriteria berdasarkan id atau jika false menampilkan pesan rror
        // Fungsi belakang untukk validasi input sebelum dapat meng update
        $validation_rules = [
            'nama_kriteria' => 'required',
            'bobot' => 'required',
        ];
        $request->validate($validation_rules);

        //Memperbarui record kriteria dengan data baru yang diterima diinput formm
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->save(); // Menyimpan perubahan ke database

        Session::flash('message', "Kriteria berhasil diubah!"); // Menampikan pesan bahwa kriteria berhasil diubah
        return redirect()->route('kriteria.index'); //Mengembalikan nilai view ke kriteria index dan menuju kembali kehalaman kriteria
    }

    // Fungsi untuk menghapus kriteria dari database
    function destroy($id)
    {
        // Mencari kriteria yang akan dihapus berdasarkan id
        $kriteria = Kriteria::findOrFail($id);
        // Fungsi untuk mmenghapus kriteria
        $kriteria->delete();

        //Menampilkan pesan bahwa kriteria berhasil dihapus
        Session::flash('message', "Kriteria berhasil dihapus!");
        //Mengembalikan tampilan ke halaman menuju halaman kriteria
        return redirect()->route('kriteria.index');
    }
}
