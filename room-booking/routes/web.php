<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;

// Ruang
use App\Livewire\Ruang\ListRuang;
use App\Livewire\Ruang\CreateRuang;
use App\Livewire\Ruang\EditRuang;

// Pegawai
use App\Livewire\Pegawai\ListPegawai;
use App\Livewire\Pegawai\CreatePegawai;
use App\Livewire\Pegawai\EditPegawai;

// Peminjaman
use App\Livewire\Peminjaman\ListPeminjaman;
use App\Livewire\Peminjaman\CreatePeminjaman;
use App\Livewire\Peminjaman\EditPeminjaman;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/counter', Counter::class);

// Ruang
Route::get('/ruang', ListRuang::class)->name('ruang.index');
Route::get('/ruang/create', CreateRuang::class)->name('ruang.create');
Route::get('/ruang/edit/{ruang}', EditRuang::class)->name('ruang.edit');

// Pegawai
Route::get('/pegawai', ListPegawai::class)->name('pegawai.index');
Route::get('/pegawai/create', CreatePegawai::class)->name('pegawai.create');
Route::get('/pegawai/edit/{pegawai}', EditPegawai::class)->name('pegawai.edit');

// Peminjaman
Route::get('/peminjaman', ListPeminjaman::class)->name('peminjaman.index');
Route::get('/peminjaman/create', CreatePeminjaman::class)->name('peminjaman.create');
Route::get('/peminjaman/edit/{peminjaman}', EditPeminjaman::class)->name('peminjaman.edit');