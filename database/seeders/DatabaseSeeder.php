<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $admin = User::create([
        //     'name' => 'Administrator',
        //     'username' => 'Admin',
        //     'email' => 'administrator@gmail.com',
        //     'nik' => '140303070048',
        //     'email_verified_at' => now(),
        //     'is_admin' => 'True',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        
        // //DATABASE SEEDING - Model Bersatu
        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     @admin,
        //     User::factory(5)->create()
        // ])->create();

        // Model terpisah
        $this->call([CategorySeeder::class, UserSeeder::class]);
        
        Post::factory(2000)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
