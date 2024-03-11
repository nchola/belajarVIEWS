@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Penilaian</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Tambah Penilaian</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Penilaian</h3>
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
                            <div class="d-flex" style="align-items: center">
                                <button class="btn btn-primary" style="margin-top: 14px">Cari</button>
                            </div>
                        </form>
                        <table id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Kriteria</td>
                                    <td>Tahun</td>
                                    <td>Bulan</td>
                                    <td>Nilai</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    $i = 1;
                                @endphp
                                @foreach ($penilaian as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->pelanggan->nama }}</td>
                                        <td>{{ $item->kriteria->nama_kriteria }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $bulan[$item->bulan - 1] }}</td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>
                                            <div class="d-flex gap-2" style="align-items: center">
                                                <div>
                                                    <a class="btn btn-xs btn-warning"
                                                        href="{{ route('penilaian.edit', ['penilaian' => $item->id]) }}">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('penilaian.destroy', ['penilaian' => $item->id]) }}"
                                                    method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-xs btn-danger text-white" type="submit"
                                                        href="{{ route('penilaian.edit', ['penilaian' => $item->id]) }}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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
