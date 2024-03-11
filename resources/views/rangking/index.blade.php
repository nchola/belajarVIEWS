@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Rangking</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rangking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Rangking</h3>
                        <form class="d-flex gap-2">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    @for ($tahun = 2000; $tahun <= 2099; $tahun++)
                                        <option value="{{ $tahun }}"
                                            {{ request()->get('tahun', date('Y')) == $tahun ? 'selected' : '' }}>
                                            {{ $tahun }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
                                    @php
                                        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    @endphp
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ request()->get('bulan', date('m')) == $i ? 'selected' : '' }}>
                                            {{ $bulan[$i - 1] }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="d-flex" style="align-items: center;gap:4px">
                                <button class="btn btn-primary" style="margin-top: 14px">Cari</button>
                                <a target="_blank" href="{{ route('rangking.print') }}?tahun={{ request()->get('tahun', date('Y')) }}&bulan={{ request()->get('bulan', date('m')) }}"
                                    class="btn btn-info text-white" style="margin-top: 14px">Print</a>
                            </div>
                        </form>

                        <hr>
                        <h5>Nilai</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan as $item)
                                    <tr>
                                        <td style="min-width: 120px">{{ $item->nama }}</td>
                                        @foreach ($item->penilaian as $penilaian)
                                            <td>{{ $penilaian->nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <h5>Matriks Keputusan Ternormalisasi</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <thead>
                                {{-- <tr style="font-size: 12px;background-color:rgba(0,255,255,0.5)">
                                    <th>Pembagi</th>
                                    @foreach ($pembagi as $item)
                                        <th>{{ $item }}</th>
                                    @endforeach
                                </tr> --}}
                                <tr>
                                    <th>Pelanggan</th>
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan as $item)
                                    <tr>
                                        <td style="min-width: 120px">{{ $item->nama }}</td>
                                        @foreach ($item->matriks_ternormalisasi as $nilai)
                                            <td>{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <h5>Matriks Keputusan Ternormalisasi & Terbobot</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan as $item)
                                    <tr>
                                        <td style="min-width: 120px">{{ $item->nama }}</td>
                                        @foreach ($item->matriks_terbobot as $nilai)
                                            <td>{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <h5>Solusi Ideal Positif(Max) dan Solusi Ideal Negatif(Min)</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold">Max</td>
                                    @foreach ($max as $item)
                                        <td>{{ $item }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td style="font-weight: bold">Min</td>
                                    @foreach ($min as $item)
                                        <td>{{ $item }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <h5>D+ dan D-</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>D+</th>
                                    <th>D-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan as $item)
                                    <tr>
                                        <td style="min-width: 120px">{{ $item->nama }}</td>
                                        <td>{{ $item->dPlus }}</td>
                                        <td>{{ $item->dMin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <h5>Rangking</h5>
                        <table style="font-size:12px" class="table table-bordered table-hover table-compact">
                            <thead>
                                <tr>
                                    <th>Rangking</th>
                                    <th>Pelanggan</th>
                                    <th>Preferensi(V)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($pelanggan->sortByDesc('preferensi') as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->preferensi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            let table = new DataTable('#myTable');
        })
    </script>
@endpush
