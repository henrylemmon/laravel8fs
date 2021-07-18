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
        $user = User::factory()->create([
            'name' => 'Henry',
            'username' => 'henrylemmon',
            'email' => 'henry@mail.com',
        ]);

        $poodle = Category::factory()->create([
            'name' => 'Poodle',
            'slug' => 'poodle',
        ]);

        $person = Category::factory()->create([
            'name' => 'Person',
            'slug' => 'person',
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id,
            'category_id' => $poodle->id,
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id,
            'category_id' => $person->id,
        ]);
    }
}
