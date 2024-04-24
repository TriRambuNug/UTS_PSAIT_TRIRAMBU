<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('mahasiswa')->insert([
                'nim' => 'sv_001',
                'nama' => 'Joko',
                'alamat' => 'Bantul',
                'tanggal_lahir' => '1999-12-07',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('mahasiswa')->insert([
                'nim' => 'sv_002',
                'nama' => 'Paul',
                'alamat' => 'Sleman',
                'tanggal_lahir' => '2000-10-07',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('mahasiswa')->insert([
                'nim' => 'sv_003',
                'nama' => 'Andy',
                'alamat' => 'Surabaya',
                'tanggal_lahir' => '2000-02-09',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
