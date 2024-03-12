

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
