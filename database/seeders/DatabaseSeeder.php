<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        $henry = User::factory()->create([
            'name' => 'Henry',
            'username' => 'henrylemmon',
            'email' => 'henry@mail.com',
        ]);

        $asshole = User::factory()->create([
            'name' => 'Asshole',
            'username' => 'asshole',
            'email' => 'asshole@mail.com',
        ]);

        $poodle = Category::factory()->create([
            'name' => 'Poodle',
            'slug' => 'poodle',
        ]);

        $person = Category::factory()->create([
            'name' => 'Person',
            'slug' => 'person',
        ]);

        $magnet = Category::factory()->create([
            'name' => 'Magnet',
            'slug' => 'magnet',
        ]);

        Post::factory(3)->create([
            'user_id' => $henry->id,
            'category_id' => $poodle->id,
        ]);

        Post::factory(3)->create([
            'user_id' => $henry->id,
            'category_id' => $person->id,
        ]);

        Post::factory(3)->create([
            'user_id' => $henry->id,
            'category_id' => $magnet->id,
        ]);

        Post::factory(3)->create([
            'user_id' => $asshole->id,
            'category_id' => $poodle->id,
        ]);

        Post::factory(3)->create([
            'user_id' => $asshole->id,
            'category_id' => $person->id,
        ]);

        Post::factory(3)->create([
            'user_id' => $asshole->id,
            'category_id' => $magnet->id,
        ]);
    }
}
