<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Arjun Gunawan',
            'email' => "arjun.gnw09@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("bumiayu123"),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
