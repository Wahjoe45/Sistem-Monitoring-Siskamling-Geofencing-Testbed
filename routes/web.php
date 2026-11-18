<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

// login
Route::middleware(['auth', 'checkrole:pengurus'])
    ->get('/pengurus', function () {
        return view('pengurus.viewpengurus');
    })->name('pengurus.viewpengurus');


Route::middleware(['auth', 'checkrole:warga'])
    ->get('/warga', function () {
        return view('warga.viewwarga');
    })->name('warga.viewwarga');


//olah data pos jaga
Route::middleware(['auth', 'checkrole:pengurus'])->group(function () {
    Route::resource('posjaga', \App\Http\Controllers\PosjagaController::class);
});

//olah data laporan
Route::resource('laporan', \App\Http\Controllers\LaporanController::class);

Route::middleware(['auth'])->group(function () {

    // Menampilkan jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])
        ->name('jadwal.index');

    // Proses pengacakan jadwal
    Route::post('/jadwal/acak', [JadwalController::class, 'acak'])
        ->name('jadwal.acak');

    // Menghapus jadwal
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])
        ->name('jadwal.destroy');

});


