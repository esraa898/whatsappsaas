<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
    //    $user = [
    //     'id' => 1,
    //     'username' => 'admin',
    //     'email' => 'ilmansunannudin2@gmail.com',
    //     'email_verified_at' => now(),
    //     'password' => bcrypt(123456),
    //     'api_key' => Str::random(15),
    //     'chunk_blast' =>100
    //     ];
        $super_admin = [
            'id' => 1,
            'username' => 'super_admin',
            'email' => 'admin@admin.com',
            'balance' => '100',
            'email_verified_at' => now(),
            'password' => bcrypt(123456789),
            'api_key' => Str::random(15),
            'chunk_blast' =>100,
            'role' => 'admin'
        ];
    // User::create($user);
    User::create($super_admin);

    }
}
