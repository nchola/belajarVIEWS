<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Pelanggan;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenilaianController extends Controller
{
    function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $bulan = $request->get('bulan', date('m'));

        $penilaian = Penilaian::where([
            'tahun' => $tahun,
            'bulan' => $bulan
        ])->get();
        return view('penilaian.index', compact('penilaian'));
    }

    function create()
    {
        // $users = User::where('role', 'Divisi Marketing')->get();
        $pelanggan = Pelanggan::all();
        $kriteria = Kriteria::all();
        return view('penilaian.create', compact('pelanggan', 'kriteria'));
    }

    function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
            'pelanggan_id' => 'required',
            'kriteria_id' => 'required',
            'nilai' => 'required',
        ]);

        $check = Penilaian::where([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'pelanggan_id' => $request->pelanggan_id,
            'kriteria_id' => $request->kriteria_id,
        ])->first();
        if ($check) {
            return redirect()->back()->withErrors([
                'message' => 'Penilaian kriteria untuk pelanggan tersebut pada tahun dan bulan yang dipilih sudah ada!'
            ]);
        }

        $penilaian = new Penilaian;
        $penilaian->pelanggan_id = $request->pelanggan_id;
        $penilaian->kriteria_id = $request->kriteria_id;
        $penilaian->tahun = $request->tahun;
        $penilaian->bulan = $request->bulan;
        $penilaian->nilai = $request->nilai;
        $penilaian->save();

        Session::flash('message', "Penilaian berhasil disimpan!");
        return redirect()->route('penilaian.index');
    }

    function edit($id)
    {
        // $users = User::where('role', 'Divisi Marketing')->get();
        $pelanggan = Pelanggan::all();
        $kriteria = Kriteria::all();
        $penilaian = Penilaian::find($id);

        return view('penilaian.edit', [
            'pelanggan' => $pelanggan,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian
        ]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'nilai' => 'required',
            'kriteria_id' => 'required',
        ]);

        $penilaian = Penilaian::find($id);
        $penilaian->pelanggan_id = $request->pelanggan_id;
        $penilaian->kriteria_id = $request->kriteria_id;
        $penilaian->tahun = $request->tahun;
        $penilaian->bulan = $request->bulan;
        $penilaian->nilai = $request->nilai;
        $penilaian->save();

        return redirect()->route('penilaian.index');
    }

    function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        Session::flash('message', "Penilaian berhasil dihapus!");
        return redirect()->route('penilaian.index');
    }
}
