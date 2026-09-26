@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Anggota</h2>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $member->nim) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $member->nama) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $member->nomor_telepon) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $member->alamat) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="aktif" {{ old('status', $member->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $member->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection