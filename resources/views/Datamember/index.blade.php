<!DOCTYPE html>
<html>
<head>
    <title>Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h3>Data Member</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('datamember.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Membership</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($members as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->email }}</td>
            <td>{{ $m->no_hp }}</td>
            <td>{{ $m->jenis_membership }}</td>
            <td>
                <span class="badge bg-{{ $m->status == 'aktif' ? 'success' : 'secondary' }}">
                    {{ $m->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('datamember.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('datamember.destroy', $m->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>
</body>
</html>