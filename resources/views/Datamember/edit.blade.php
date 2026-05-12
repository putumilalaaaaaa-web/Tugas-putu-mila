<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<h3>Edit Member</h3>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('datamember.update', $datamember->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $datamember->nama }}" class="form-control mb-2 @error('nama') is-invalid @enderror" required>
@error('nama')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="email" name="email" value="{{ $datamember->email }}" class="form-control mb-2 @error('email') is-invalid @enderror" required>
@error('email')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="text" name="no_hp" value="{{ $datamember->no_hp }}" class="form-control mb-2 @error('no_hp') is-invalid @enderror" required>
@error('no_hp')
    <span class="text-danger">{{ $message }}</span>
@enderror

<select name="jenis_membership" class="form-control mb-2 @error('jenis_membership') is-invalid @enderror" required>
    <option value="harian" {{ $datamember->jenis_membership=='harian'?'selected':'' }}>Harian</option>
    <option value="bulanan" {{ $datamember->jenis_membership=='bulanan'?'selected':'' }}>Bulanan</option>
    <option value="tahunan" {{ $datamember->jenis_membership=='tahunan'?'selected':'' }}>Tahunan</option>
</select>
@error('jenis_membership')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="date" name="tanggal_daftar" value="{{ $datamember->tanggal_daftar->format('Y-m-d') }}" class="form-control mb-2 @error('tanggal_daftar') is-invalid @enderror" required>
@error('tanggal_daftar')
    <span class="text-danger">{{ $message }}</span>
@enderror

<input type="date" name="tanggal_berakhir" value="{{ $datamember->tanggal_berakhir->format('Y-m-d') }}" class="form-control mb-2 @error('tanggal_berakhir') is-invalid @enderror" required>
@error('tanggal_berakhir')
    <span class="text-danger">{{ $message }}</span>
@enderror

<select name="status" class="form-control mb-2 @error('status') is-invalid @enderror" required>
    <option value="aktif" {{ $datamember->status=='aktif'?'selected':'' }}>Aktif</option>
    <option value="nonaktif" {{ $datamember->status=='nonaktif'?'selected':'' }}>Nonaktif</option>
</select>
@error('status')
    <span class="text-danger">{{ $message }}</span>
@enderror

<button class="btn btn-primary">Update</button>
<a href="{{ route('datamember.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</body>
</html>