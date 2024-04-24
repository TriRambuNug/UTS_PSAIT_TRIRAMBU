<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerkuliahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
            DB::table('perkuliahan')->insert([
                'nim' => 'sv_001',
                'kode_mk' =>'svpl_001',
                'nilai' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('perkuliahan')->insert([
                'nim' => 'sv_001',
                'kode_mk' =>'svpl_002',
                'nilai' => 87,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('perkuliahan')->insert([
                'nim' => 'sv_001',
                'kode_mk' =>'svpl_003',
                'nilai' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('perkuliahan')->insert([
                'nim' => 'sv_002',
                'kode_mk' =>'svpl_001',
                'nilai' => 98,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('perkuliahan')->insert([
                'nim' => 'sv_002',
                'kode_mk' =>'svpl_002',
                'nilai' => 77,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
