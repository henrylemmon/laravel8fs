<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(3),
            'thumbnail' => '/thumbnails/PWczpoqxmXkkBpK3OB20iN7VQ07kF6AZCkFpr2Zp.png',
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . $this->faker->paragraph() . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
        ];
    }
}
