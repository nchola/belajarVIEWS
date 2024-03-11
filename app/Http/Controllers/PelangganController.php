<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    function create()
    {
        return view('pelanggan.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'periode_polis' => 'required',
            'nilai_premi' => 'required',
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->periode_polis = $request->periode_polis;
        $pelanggan->nilai_premi = $request->nilai_premi;
        $pelanggan->save();

        Session::flash('message', "Pelanggan berhasil disimpan!");
        return redirect()->route('pelanggan.index');
    }

    function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $validation_rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'periode_polis' => 'required',
            'nilai_premi' => 'required',
        ];

        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->periode_polis = $request->periode_polis;
        $pelanggan->nilai_premi = $request->nilai_premi;
        $pelanggan->save();

        Session::flash('message', "Pelanggan berhasil diubah!");
        return redirect()->route('pelanggan.index');
    }

    function destroy($id)
    {
        $user = Pelanggan::findOrFail($id);
        $user->delete();

        Session::flash('message', "Pelanggan berhasil dihapus!");
        return redirect()->route('pelanggan.index');
    }
}
