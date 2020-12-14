<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Saqib Aminul Islam',
            'email' => 'saqib29111@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
