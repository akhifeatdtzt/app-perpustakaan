@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Anggota</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>NIM:</strong> {{ $member->nim }}</p>
            <p><strong>Nama:</strong> {{ $member->nama }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $member->nomor_telepon }}</p>
            <p><strong>Alamat:</strong> {{ $member->alamat }}</p>
            <p><strong>Status:</strong> {{ ucfirst($member->status) }}</p>
        </div>
    </div>
    <a href="{{ route('members.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection