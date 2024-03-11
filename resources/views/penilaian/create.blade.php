@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Tambah Penilaian</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('penilaian.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <select name="pelanggan_id" class="form-control">
                                            @foreach ($pelanggan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('pelanggan_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('pelanggan_id') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            @for ($tahun = 2010; $tahun <= 2050; $tahun++)
                                                <option value="{{ $tahun }}"
                                                    {{ old('tahun', date('Y')) == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}</option>
                                            @endfor
                                        </select>
                                        <small class="text-danger">{{ $errors->first('tahun') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="number" name="nilai" class="form-control"
                                            value="{{ old('nilai') }}" placeholder="Input Nilai...">
                                        <small class="text-danger">{{ $errors->first('nilai') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <select name="kriteria_id" class="form-control">
                                            @foreach ($kriteria as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('kriteria_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_kriteria }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('kriteria_id') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            @php
                                                $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            @endphp
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('bulan', date('m')) == $i ? 'selected' : '' }}>
                                                    {{ $bulan[$i - 1] }}</option>
                                            @endfor
                                        </select>
                                        <small class="text-danger">{{ $errors->first('bulan') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if ($errors->has('message'))
        <script>
            alert("{{ $errors->first('message') }}")
        </script>
    @endif
@endpush
