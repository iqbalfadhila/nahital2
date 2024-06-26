<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('pegawai', PegawaiController::class);
Route::post('pegawai/cari', [PegawaiController::class, 'detail'])->name('pegawai.detail');
Route::post('pegawai/export/excel', [PegawaiController::class, 'exportExcel'])->name('pegawai.export.excel');
Route::post('pegawai/export/pdf', [PegawaiController::class, 'exportPdf'])->name('pegawai.export.pdf');
