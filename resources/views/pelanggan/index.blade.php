@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Pelanggan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    
    
    <div class="container-fluid mt-4">
        <div class="row mb-3">
            <div class="col-md-12 text-end">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success shadow-sm">Tambah Pelanggan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Pelanggan</h3>
                        <table id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>Telepon</td>
                                    <td>Email</td>
                                    <td>Periode Polis</td>
                                    <td>Nilai Premi</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($pelanggan as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->periode_polis }}</td>
                                        <td>{{ $item->nilai_premi }}</td>
                                        <td>
                                            <div class="d-flex gap-2" style="align-items: center">
                                                <div>
                                                    <a 
                                                        href="{{ route('pelanggan.edit', ['pelanggan' => $item->id]) }}">
                                                        <i class="btn btn-sm btn-outline-warning">Edit</i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('pelanggan.destroy', ['pelanggan' => $item->id]) }}"
                                                    method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-xs btn-danger text-white" type="submit">
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
