<?php

namespace Database\Factories;

use App\Models\Post;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 8),
            'photo_id' => 110,
            'title' => $this->faker->sentence(5, 15),
            'body'  => $this->faker->paragraph(rand(10, 15)),
            'slug'  => $this->faker->slug(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
