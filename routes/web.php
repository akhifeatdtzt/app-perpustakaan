
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    // Route khusus admin
    Route::middleware(['admin'])->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });

    // Route untuk buku
    Route::resource('books', BookController::class);

    // Route untuk anggota
    Route::resource('members', MemberController::class);

    // Route untuk peminjaman
    Route::resource('loans', LoanController::class);

    // Route untuk mengembalikan buku
    Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');
});
