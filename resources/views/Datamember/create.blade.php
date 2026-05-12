<!DOCTYPE html>
<html>
<head>
    <title>Tambah Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<h3>Tambah Member</h3>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('datamember.store') }}" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama" class="form-control mb-2 @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
@error('nama')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="email" name="email" placeholder="Email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
@error('email')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="text" name="no_hp" placeholder="No HP" class="form-control mb-2 @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required>

<select name="jenis_membership" class="form-control mb-2 @error('jenis_membership') is-invalid @enderror" required>
    <option value="">Pilih Jenis Membership</option>
    <option value="harian" {{ old('jenis_membership') == 'harian' ? 'selected' : '' }}>Harian</option>
    <option value="bulanan" {{ old('jenis_membership') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
    <option value="tahunan" {{ old('jenis_membership') == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
</select>
@error('jenis_membership')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="date" name="tanggal_daftar" class="form-control mb-2 @error('tanggal_daftar') is-invalid @enderror" value="{{ old('tanggal_daftar') }}" required>
@error('tanggal_daftar')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="date" name="tanggal_berakhir" class="form-control mb-2 @error('tanggal_berakhir') is-invalid @enderror" value="{{ old('tanggal_berakhir') }}" required>
@error('tanggal_berakhir')
    <span class="text-danger">{{ $message }}</span>
@enderror

<select name="status" class="form-control mb-2 @error('status') is-invalid @enderror" required>
    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
</select>
@error('status')
    <span class="text-danger">{{ $message }}</span>
@enderror

<button class="btn btn-success">Simpan</button>
<a href="{{ route('datamember.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</body>
</html>