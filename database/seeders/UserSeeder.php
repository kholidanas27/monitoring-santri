<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'email' => 'admin@monitoring.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $wali_santri = User::create([
            'name' => 'Wali Santri',
            'email' => 'wali_santri@monitoring.id',
            'password' => bcrypt('12345678'),
        ]);

        $wali_santri->assignRole('wali_santri');

        $santri = User::create([
            'name' => 'Santri',
            'email' => 'santri@monitoring.id',
            'password' => bcrypt('12345678'),
        ]);

        $santri->assignRole('santri');
    }
}
