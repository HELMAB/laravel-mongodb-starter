<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Post;
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
        $author_ids = Author::pluck('id');
        return [
            'title' => $this->faker->realText(),
            'body' => $this->faker->realText(),
            'author_id' => $this->faker->randomElement($author_ids),
        ];
    }
}
