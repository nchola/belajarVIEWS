<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class RangkingController extends Controller
{

    public function index(Request $request)
    {
        // Data Nilai
        $tahun = $request->get('tahun', date('Y'));
        $bulan = $request->get('bulan', date('m'));

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

        // Nilai Kuadrat & Spill pembagi
        $pembagi = collect();
        $pelanggan->map(function ($p) use ($pembagi) {
            $p->nilai_kuadrat = $p->penilaian->map(function ($item) {
                return pow($item->nilai, 2);
            });
            $pembagi->push($p->nilai_kuadrat);
            return $p;
        });
        // Sum pembagi, then sqrt
        $pembagi = $pembagi->reduce(function ($carry, $item) {
            return $carry->map(function ($c, $key) use ($item) {
                return $c + $item[$key];
            });
        }, collect(array_fill(0, count($kriteria), 0)))->map(function ($item) {
            return sqrt($item);
        });

        // Matriks Keputusan Ternormalisasi & Terbobot
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

        // Solusi Ideal Positif(Max) dan Solusi Ideal Negatif(Min)
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

        // D+ dan D- & Preferensi
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
        // Data Nilai
        $tahun = $request->get('tahun', date('Y'));
        $bulan = $request->get('bulan', date('m'));

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

        // Nilai Kuadrat & Spill pembagi
        $pembagi = collect();
        $pelanggan->map(function ($p) use ($pembagi) {
            $p->nilai_kuadrat = $p->penilaian->map(function ($item) {
                return pow($item->nilai, 2);
            });
            $pembagi->push($p->nilai_kuadrat);
            return $p;
        });
        // Sum pembagi, then sqrt
        $pembagi = $pembagi->reduce(function ($carry, $item) {
            return $carry->map(function ($c, $key) use ($item) {
                return $c + $item[$key];
            });
        }, collect(array_fill(0, count($kriteria), 0)))->map(function ($item) {
            return sqrt($item);
        });

        // Matriks Keputusan Ternormalisasi & Terbobot
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

        // Solusi Ideal Positif(Max) dan Solusi Ideal Negatif(Min)
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

        // D+ dan D- & Preferensi
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

        return view('rangking.print', [
            'kriteria' => $kriteria,
            'pelanggan' => $pelanggan,
            'pembagi' => $pembagi,
            'max' => $max,
            'min' => $min,
        ]);
    }
}