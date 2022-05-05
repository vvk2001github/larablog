<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descr' => $this->faker->sentence($nbWords = 3),
            'content' => $this->faker->text($maxNbChars = 2000),
            'published' => true,
            'user_id' => 1,
        ];
    }
}
