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
            'email' => 'admin@pkl.com',
            'password' => bcrypt('1234567')
        ]);

        $admin->assignRole('admin');
        
        $user = User::create([
            'name' => 'User',
            'email' => 'user@pkl.com',

            'password' => bcrypt('1234567')
        ]);

        $user->assignRole('user');

        $sarana = User::create([
            'name' => 'Admin Sarana',
            'email' => 'sarana@pkl.com',

            'password' => bcrypt('1234567')
        ]);

        $sarana->assignRole('operator');
    }
}
