<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@arsip.com',
            'password' => bcrypt('1234567')
        ]);

        $admin->assignRole('admin');
        
        $user = User::create([
            'name' => 'User',
            'email' => 'user@arsip.com',
            'password' => bcrypt('1234567')
        ]);

        $user->assignRole('user');

        $sarana = User::create([
            'name' => 'Operator Bagian Sarana',
            'email' => 'sarana@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $sarana->assignRole('operator');

        $tatausaha = User::create([
            'name' => 'Operator Bagian Tata Usaha',
            'email' => 'tatausaha@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $tatausaha->assignRole('operator');

        $gudang = User::create([
            'name' => 'Operator Bagian Gudang',
            'email' => 'gudang@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $gudang->assignRole('operator');

        $kesiswaan = User::create([
            'name' => 'Operator Bagian Kesiswaan',
            'email' => 'kesiswaan@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $kesiswaan->assignRole('operator');

        $kurikulum = User::create([
            'name' => 'Operator Bagian Kurikulum',
            'email' => 'kurikulum@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $kurikulum->assignRole('operator');


        $humas = User::create([
            'name' => 'Operator Bagian HUMAS',
            'email' => 'humas@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $humas->assignRole('operator');



    }
}
