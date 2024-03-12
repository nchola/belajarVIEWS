<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Menggunakan kelas Controller dari namespace App\Http\Controllers
use App\Models\Kriteria; // Menggunakan model Kriteria dari namespace App\Models
use App\Models\Pelanggan; // Menggunakan model Pelanggan dari namespace App\Models
use Illuminate\Http\Request; // Menggunakan kelas Request dari library Illuminate\Http untuk memanipulasi permintaan HTTP

class RangkingController extends Controller
{

    public function index(Request $request)
    {
        // Mengambil nilai tahun dan bulan dari request, defaultnya adalah tahun dan bulan saat ini
        $tahun = $request->get('tahun', date('Y'));
        $bulan = $request->get('bulan', date('m'));

        // Mengambil semua data pelanggan yang memiliki penilaian pada tahun dan bulan yang dipilih
        $pelanggan = Pelanggan::whereHas('penilaian', function ($q) use ($tahun, $bulan) {
            $q->where([
                'tahun' => $tahun,
                'bulan' => $bulan
            ]);
        })
            ->with('penilaian', function ($q) use ($tahun) {
                $q->where('tahun', $tahun)->orderBy('kriteria_id');
            })->get();
        $kriteria = Kriteria::orderBy('id')->get();

        // Menghitung pembagi untuk normalisasi
        $pembagi = collect();
        $pelanggan->map(function ($p) use ($pembagi) {
            $p->nilai_kuadrat = $p->penilaian->map(function ($item) {
                return pow($item->nilai, 2);
            });
            $pembagi->push($p->nilai_kuadrat);
            return $p;
        });
        // Menghitung jumlah pembagi, kemudian melakukan operasi akar kuadrat
        $pembagi = $pembagi->reduce(function ($carry, $item) {
            return $carry->map(function ($c, $key) use ($item) {
                return $c + $item[$key];
            });
        }, collect(array_fill(0, count($kriteria), 0)))->map(function ($item) {
            return sqrt($item);
        });

        // Menghitung matriks keputusan ternormalisasi dan terbobot untuk setiap pelanggan
        $pelanggan->map(function ($p) use ($pembagi, $kriteria) {
            // Ternormalisasi
            $p->matriks_ternormalisasi = $p->penilaian->map(function ($item, $key) use ($pembagi) {
                return $item->nilai / $pembagi[$key];
            });
            // Terbobot
            $p->matriks_terbobot = $p->matriks_ternormalisasi->map(function ($item, $key) use ($kriteria) {
                return $item * $kriteria[$key]->bobot;
            });
        });

        // Menghitung solusi ideal positif (max) dan solusi ideal negatif (min)
        $matriks_terbobot = $pelanggan->first() ? $pelanggan->first()->matriks_terbobot : [];
        $max = collect($matriks_terbobot);
        $min = collect($matriks_terbobot);
        $pelanggan->map(function ($p, $key) use ($max, $min) {
            if ($key != 0) {
                $p->matriks_terbobot->each(function ($mt, $i) use ($max, $min) {
                    $max[$i] = ($max[$i] < $mt) ? $mt : $max[$i];
                    $min[$i] = ($min[$i] > $mt) ? $mt : $min[$i];
                });
            }
        });

        // Menghitung nilai D+ dan D- serta preferensi untuk setiap pelanggan
        $pelanggan->map(function ($p) use ($max, $min, $pelanggan) {
            $p->dPlus = sqrt($p->matriks_terbobot->reduce(function ($carry, $item, $key) use ($max) {
                return $carry + pow($max[$key] - $item, 2);
            }, 0));
            $p->dMin = sqrt($p->matriks_terbobot->reduce(function ($carry, $item, $key) use ($min) {
                return $carry + pow($min[$key] - $item, 2);
            }, 0));
            if (count($pelanggan) <= 1) {
                $p->preferensi = 1;
            } else {
                $p->preferensi = $p->dMin / ($p->dMin + $p->dPlus);
            }
        });

        // Mengembalikan view 'rangking.index' dengan data yang diperlukan
        return view('rangking.index', [
            'kriteria' => $kriteria,
            'pelanggan' => $pelanggan,
            'pembagi' => $pembagi,
            'max' => $max,
            'min' => $min,
        ]);
    }

    public function print(Request $request)
    {
        // Implementasi print sama seperti index, hanya untuk view yang berbeda
    }
}
