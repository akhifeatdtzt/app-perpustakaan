<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // 1. Menampilkan halaman profil petugas
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    // 2. Mengubah password petugas
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        // Validasi input
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                // Memeriksa apakah password lama cocok dengan database
                if (!Hash::check($value, $user->password)) {
                    $fail('Password lama tidak cocok dengan data kami.');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        // Simpan password baru menggunakan Hash::make()
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.show')->with('success', 'Password berhasil diperbarui.');
    }
}
