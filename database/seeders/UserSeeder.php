<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::create([
            'name' => 'Deni Robbiansyah',
            'username' => 'denirobbiansyah45',
            'email' => 'denirobbiansyah@gmail.com',
            'nik' => '140303070048',
            'email_verified_at' => now(),
            'is_admin' => 'True',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        
    }
}
