<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'          => ['required', 'string', 'max:255'],
            'nim'           => ['required', 'string', 'unique:members,nim'],
            'email'         => ['required', 'email', 'unique:members,email'],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'alamat'        => ['required', 'string'],
            'status'        => ['required', Rule::in(['aktif', 'nonaktif'])],
        ];
    }
}

