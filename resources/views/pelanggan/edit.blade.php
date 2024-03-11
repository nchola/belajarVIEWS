@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Edit Pelanggan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pelanggan.update', ['pelanggan' => $pelanggan->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ old('nama', $pelanggan->nama) }}" placeholder="Input Nama...">
                                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            value="{{ old('alamat', $pelanggan->alamat) }}" placeholder="Input Alamat...">
                                        <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" class="form-control"
                                            value="{{ old('telepon', $pelanggan->telepon) }}" placeholder="Input Telepon...">
                                        <small class="text-danger">{{ $errors->first('telepon') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', $pelanggan->email) }}" placeholder="Input Email...">
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Periode Polis</label>
                                        <input type="text" name="periode_polis" class="form-control"
                                            value="{{ old('periode_polis', $pelanggan->periode_polis) }}"
                                            placeholder="Input Periode Polis...">
                                        <small class="text-danger">{{ $errors->first('periode_polis') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai Premi</label>
                                        <input type="text" name="nilai_premi" class="form-control"
                                            value="{{ old('nilai_premi', $pelanggan->nilai_premi) }}"
                                            placeholder="Input Nilai Premi...">
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
@endpush
