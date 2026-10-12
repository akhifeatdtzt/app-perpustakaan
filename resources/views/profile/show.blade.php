@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div class="container">
    <h1>Profil Petugas</h1>

    {{-- Alert Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Informasi Profil User --}}
    <div class="card mb-4" style="border: 1px solid #ccc; padding: 16px;">
        <h3>Informasi Akun</h3>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'Petugas') }}</p>
    </div>

    {{-- Form Ganti Password --}}
    <div class="card" style="border: 1px solid #ccc; padding: 16px;">
        <h3>Ganti Password</h3>

        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input Password Lama --}}
            <div style="margin-bottom: 12px;">
                <label for="current_password">Password Lama:</label><br>
                <input type="password" id="current_password" name="current_password" required style="width: 100%; padding: 8px;">
                @error('current_password')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Input Password Baru --}}
            <div style="margin-bottom: 12px;">
                <label for="password">Password Baru (min 8 karakter):</label><br>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
                @error('password')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Input Konfirmasi Password Baru --}}
            <div style="margin-bottom: 12px;">
                <label for="password_confirmation">Konfirmasi Password Baru:</label><br>
                <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 8px;">
            </div>

            <button type="submit" class="btn" style="padding: 8px 16px; cursor: pointer;">Simpan Password Baru</button>
        </form>
    </div>
</div>
@endsection