@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Edit Kriteria</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
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
                <form action="{{ route('kriteria.update', ['kriterium' => $kriteria->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <input type="text" name="nama_kriteria" class="form-control"
                                            value="{{ old('nama_kriteria',$kriteria->nama_kriteria) }}" placeholder="Input Kriteria...">
                                        <small class="text-danger">{{ $errors->first('nama_kriteria') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="number" name="bobot" class="form-control"
                                            value="{{ old('bobot',$kriteria->bobot) }}" placeholder="Input Bobot...">
                                        <small class="text-danger">{{ $errors->first('bobot') }}</small>
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
