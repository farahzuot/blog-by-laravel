<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Jhon Doe',
            'username' => 'JhonDoe',
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
