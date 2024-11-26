<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // User::create([
        //     'name' => 'Admin',
        //     'username' => 'admin',
        //     'email' => 'Q2A7H@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Category::create([
        //     'name' => 'General',
        //     'slug' => 'general'
        // ]);

        // Post::create([
        //     'title' => 'First Post',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'first-post',
        //     'body' => 'This is the first post'
        // ]);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'username' => 'admin',
        //     'email' => 'Q2A7H@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     $admin,
        //     User::factory(5)->create(),
        // ])->create();

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        Post::factory(100)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }
}
