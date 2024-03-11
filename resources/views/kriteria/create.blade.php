@extends('layouts.index')

@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Tambah Kriteria</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Kriteria</h4>
                        <div class="form-group">
                            <label for="namaKriteria" class="form-label">Kriteria</label>
                            <input id="namaKriteria" type="text" name="nama_kriteria" class="form-control"
                                value="{{ old('nama_kriteria') }}" placeholder="Input Kriteria..." required>
                            <small class="text-danger">{{ $errors->first('nama_kriteria') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="
                            bobotKriteria" class="form-label">Bobot</label>
                            <input id="bobotKriteria" type="number" name="bobot" class="form-control"
                                value="{{ old('bobot') }}" placeholder="Input Bobot..." required>
                            <small class="text-danger">{{ $errors->first('bobot') }}</small>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $(function() {
        // Script untuk inisialisasi atau konfigurasi tambahan jika diperlukan
    })
</script>
@endpush