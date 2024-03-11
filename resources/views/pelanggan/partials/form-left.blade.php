<!-- Isi dari form-left.blade.php -->
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Input Nama...">
    <small class="text-danger">{{ $errors->first('nama') }}</small>
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" placeholder="Input Alamat...">
    <small class="text-danger">{{ $errors->first('alamat') }}</small>
</div>
<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" placeholder="Input Telepon...">
    <small class="text-danger">{{ $errors->first('telepon') }}</small>
</div>
