@extends('layouts.index')

@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Kriteria</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-12 text-end">
            <a href="{{ route('kriteria.create') }}" class="btn btn-success shadow-sm">Tambah Kriteria</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Daftar Kriteria</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <a href="{{ route('kriteria.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('kriteria.destroy', $item->id) }}"
                                            method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?');">
                                                Hapus
                                            </button>
                                        </form>
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
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#myTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "search": "Cari:",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                // Tambahkan terjemahan lain sesuai kebutuhan
            }
        });
    });
</script>
@endpush
