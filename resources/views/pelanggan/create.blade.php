<!-- @extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Tambah Pelanggan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
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
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ old('nama') }}" placeholder="Input Nama...">
                                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            value="{{ old('alamat') }}" placeholder="Input Alamat...">
                                        <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" class="form-control"
                                            value="{{ old('telepon') }}" placeholder="Input Telepon...">
                                        <small class="text-danger">{{ $errors->first('telepon') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Input Email...">
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Periode Polis</label>
                                        <input type="text" name="periode_polis" class="form-control"
                                            value="{{ old('periode_polis') }}" placeholder="Input Periode Polis...">
                                        <small class="text-danger">{{ $errors->first('periode_polis') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai Premi</label>
                                        <input type="text" name="nilai_premi" class="form-control"
                                            value="{{ old('nilai_premi') }}" placeholder="Input Nilai Premi...">
                                        <small class="text-danger">{{ $errors->first('nilai_premi') }}</small>
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
    <script>
        $(function() {
            // let table = new DataTable('#myTable');
        })
    </script>
@endpush -->

@extends('layouts.index')

@section('content')
<div class="container-fluid mt-4">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="page-title">Tambah Pelanggan</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                @include('pelanggan.partials.form-left')
                            </div>
                            <div class="col-md-6">
                                @include('pelanggan.partials.form-right')
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        // Initialization code here
    })
</script>
@endpush
