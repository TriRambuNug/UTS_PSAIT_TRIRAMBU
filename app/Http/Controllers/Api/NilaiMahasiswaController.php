<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perkuliahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai_mahasiswa = Mahasiswa::select('mahasiswa.nim', 'mahasiswa.nama','mahasiswa.alamat', 'mahasiswa.tanggal_lahir', 'matakuliah.kode_mk', 'matakuliah.nama_mk','matakuliah.sks', 'perkuliahan.nilai')
        ->join('perkuliahan', 'mahasiswa.nim', '=', 'perkuliahan.nim')
        ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
        ->get();
        
            return response()->json([
                'status' => 'success',
                'massage' => 'Daftar Nilai Mahasiswa',
                'data' => $nilai_mahasiswa
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $validateData = Validator::make($request->all(), [
            'nim' => 'required',
            'kode_mk' => 'required',
            'nilai' => 'required'
        ]);

        if($validateData->fails()){
            return response()->json([
                'status' => 'failed',
                'massage' => $validateData->errors()
            ]);
        }


        $tambah_nilai = new Perkuliahan();
        $tambah_nilai->nim = $request->nim;
        $tambah_nilai->kode_mk = $request->kode_mk;
        $tambah_nilai->nilai = $request->nilai;

        $post = $tambah_nilai->save();

        return response()->json([
            'status' => 'success',
            'massage' => 'Nilai Mahasiswa Berhasil Ditambahkan',
            'data' => $tambah_nilai
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $nilai_mahasiswa = Mahasiswa::select('mahasiswa.nim', 'mahasiswa.nama','mahasiswa.alamat', 'mahasiswa.tanggal_lahir', 'matakuliah.kode_mk', 'matakuliah.nama_mk','matakuliah.sks', 'perkuliahan.nilai')
        ->join('perkuliahan', 'mahasiswa.nim', '=', 'perkuliahan.nim')
        ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
        ->where('mahasiswa.nim', $nim)
        ->get();
        
        if($mahasiswa){
            return response()->json([
                'status' => 'success',
                'massage' => 'Nilai Mahasiswa',
                'data' => $nilai_mahasiswa
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'massage' => 'Data Mahasiswa Tidak Ditemukan',
                'data' => null
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nim, string $kode_mk)
    {
        $validateData = Validator::make($request->all(), [
            'nim' => 'required',
            'kode_mk' => 'required',
            'nilai' => 'required'
        ]);

        if($validateData->fails()){
            return response()->json([
                'status' => 'failed',
                'massage' => $validateData->errors()
            ]);
        }

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan',
            ]);
        }


        $ubah_nilai = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->first();

        if(empty($ubah_nilai)){
            return response()->json([
                'status' => 'failed',
                'message' => 'Nilai Mahasiswa dengan NIM ' . $nim . ' dan Kode MK ' . $kode_mk . ' tidak ditemukan',
            ]);
        }
        $ubah_nilai->nim = $request->nim;
        $ubah_nilai->kode_mk = $request->kode_mk;
        $ubah_nilai->nilai = $request->nilai;

        $put = $ubah_nilai->save();

        return response()->json([
            'status' => 'success',
            'massage' => 'Nilai Mahasiswa Berhasil DiUbah',
            'data' => $ubah_nilai
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim, $kode_mk)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan',
            ]);
        }

        $hapus_nilai = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->first();

        if(empty($hapus_nilai)){
            return response()->json([
                'status' => 'failed',
                'message' => 'Nilai Mahasiswa dengan NIM ' . $nim . ' dan Kode MK ' . $kode_mk . ' tidak ditemukan',
            ]);
        }

        $delete = $hapus_nilai->delete();

        return response()->json([
            'status' => 'success',
            'massage' => 'Nilai Mahasiswa Berhasil Dihapus',
            'data' => $hapus_nilai
        ]);
    }
}
