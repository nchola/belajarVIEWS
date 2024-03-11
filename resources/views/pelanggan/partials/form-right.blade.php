<!-- Isi dari form-right.blade.php -->
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Input Email...">
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<div class="form-group">
    <label>Periode Polis</label>
    <input type="text" name="periode_polis" class="form-control" value="{{ old('periode_polis') }}" placeholder="Input Periode Polis...">
    <small class="text-danger">{{ $errors->first('periode_polis') }}</small>
</div>
<div class="form-group">
    <label>Nilai Premi</label>
    <input type="number" name="nilai_premi" class="form-control" value="{{ old('nilai_premi') }}" placeholder="Input Nilai Premi...">
    <small class="text-danger">{{ $errors->first('nilai_premi') }}</small>
</div>
