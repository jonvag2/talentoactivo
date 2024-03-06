<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Jon Apiscope',
            'email' => 'jon.apiscope@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jensen Krovatovic',
            'email' => '2jon.apiscope@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Blogger');
        User::factory(8)->create();

    }
}
 