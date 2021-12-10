<?php

namespace Database\Seeders;

use App\Models\{Category, User, Post};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Edo Wardaya',
            'username' => 'Edo',
            'email' => 'muhammadedowarday4@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory(3)->create();
        Post::factory(20)->create();

        Category::create([
            'name' => 'Event',
            'slug' => 'event'
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
    }
}