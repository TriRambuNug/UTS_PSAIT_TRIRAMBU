<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
            DB::table('matakuliah')->insert([
                'kode_mk' => 'svpl_001',
                'nama_mk' => 'database',
                'sks' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('matakuliah')->insert([
                'kode_mk' => 'svpl_002',
                'nama_mk' => 'AI',
                'sks' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('matakuliah')->insert([
                'kode_mk' => 'svpl_003',
                'nama_mk' => 'interoperabilitas',
                'sks' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
    }
}
