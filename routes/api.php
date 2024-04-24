<?php

use App\Http\Controllers\Api\NilaiMahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/nilai-mahasiswa',[NilaiMahasiswaController::class, 'index']);
Route::get('/nilai-mahasiswa/mahasiswa',[NilaiMahasiswaController::class, 'indexMahasiswa']);
Route::get('/nilai-mahasiswa/{nim}',[NilaiMahasiswaController::class, 'show']);
Route::post('/nilai-mahasiswa/{nim}',[NilaiMahasiswaController::class, 'store']);
Route::put('/nilai-mahasiswa/{nim}/{kode_mk}',[NilaiMahasiswaController::class, 'update']);
Route::delete('/nilai-mahasiswa/{nim}/{kode_mk}',[NilaiMahasiswaController::class, 'destroy']);