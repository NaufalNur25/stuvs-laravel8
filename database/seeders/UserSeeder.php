<?php

namespace Database\Seeders;

use App\Models\User\User;
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
        User::create([
            'username' => 'AdminStuvs23',
            'email' => 'admin@role.stuvs',
            'password' => bcrypt('semicolon.code'),
            'role' => 'Administrator'
        ]);
    }
}
