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
            'name' => 'Super Admin',
            'email' => 'admin@arsip.com',
            'password' => bcrypt('1234567')
        ]);

        $admin->assignRole('superadmin');
        
        $user = User::create([
            'name' => 'User',
            'email' => 'user@arsip.com',
            'password' => bcrypt('1234567')
        ]);

        $user->assignRole('user');

        $sarana = User::create([
            'name' => 'Admin Bagian Sarana',
            'email' => 'sarana@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $sarana->assignRole('admin');

        $tatausaha = User::create([
            'name' => 'Admin Bagian Tata Usaha',
            'email' => 'tatausaha@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $tatausaha->assignRole('admin');

        $gudang = User::create([
            'name' => 'Admin Bagian Gudang',
            'email' => 'gudang@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $gudang->assignRole('admin');

        $kesiswaan = User::create([
            'name' => 'Admin Bagian Kesiswaan',
            'email' => 'kesiswaan@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $kesiswaan->assignRole('admin');

        $kurikulum = User::create([
            'name' => 'Admin Bagian Kurikulum',
            'email' => 'kurikulum@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $kurikulum->assignRole('admin');


        $humas = User::create([
            'name' => 'Admin Bagian HUMAS',
            'email' => 'humas@arsip.com',
            'password' => bcrypt('1234567')
        ]);
        $humas->assignRole('admin');



    }
}
