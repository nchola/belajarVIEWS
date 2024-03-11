@extends('layouts.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Edit Pengguna</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></li>
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
                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ old('nama', $user->nama) }}" placeholder="Input Nama...">
                                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ old('username', $user->username) }}" placeholder="Input Username...">
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ old('password', $user->password) }}" placeholder="Input Password...">
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if (request()->user()->role == 'Admin')
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" class="form-control">
                                                <option value="Admin" {{ old('role',$user->role) == 'Admin' ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="Kepala Marketing" {{ old('role',$user->role) == 'Kepala Marketing' ? 'selected' : '' }}>Kepala Marketing
                                                </option>
                                                <option value="Divisi Marketing" {{ old('role',$user->role) == 'Divisi Marketing' ? 'selected' : '' }}>Divisi Marketing
                                                </option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('role') }}</small>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control"
                                            value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}">
                                        <small class="text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="Laki-Laki"
                                                {{ old('jenis_kelamin',$user->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin',$user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        <small class="text-danger">{{ $errors->first('jenis_kelamin') }}</small>
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
