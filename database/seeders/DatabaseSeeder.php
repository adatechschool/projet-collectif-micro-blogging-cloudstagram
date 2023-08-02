<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() 
    {
        User::factory(5)->create()->each(function ($user) {
            $user->posts()->saveMany(Post::factory(2)->make());
        });
    }
}
