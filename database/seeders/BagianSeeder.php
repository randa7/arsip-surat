<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagian')->insert([
            'nama_bagian' => 'Tata Usaha'
        ]);

        DB::table('bagian')->insert([
            'nama_bagian' => 'Kesiswaan'
        ]);

        DB::table('bagian')->insert([
            'nama_bagian' => 'Kurikulum'
        ]);

        DB::table('bagian')->insert([
            'nama_bagian' => 'Sarana dan Gudang'
        ]);
        
        DB::table('bagian')->insert([
            'nama_bagian' => 'Hubungan Masyarakat'
        ]);
    }
}
