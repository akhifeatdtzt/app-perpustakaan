@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Anggota</h2>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>

    <!-- Form Search -->
    <form action="{{ route('members.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama anggota..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links dengan parameter search -->
    <div class="d-flex justify-content-center">
        {{ $members->appends(request()->query())->links() }}
    </div>
</div>
@endsection