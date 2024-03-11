@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Pengguna</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Pengguna</h3>
                        <table id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Username</td>
                                    @if (request()->user()->role == 'Admin')
                                        <td>Jabatan</td>
                                    @endif
                                    <td>Tanggal Lahir</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->username }}</td>
                                        @if (request()->user()->role == 'Admin')
                                            <td>{{ $item->role }}</td>
                                        @endif
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>
                                            <div class="d-flex gap-2" style="align-items: center">
                                                <div>
                                                    <a class="btn btn-xs btn-warning"
                                                        href="{{ route('users.edit', ['user' => $item->id]) }}">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('users.destroy', ['user' => $item->id]) }}"
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
