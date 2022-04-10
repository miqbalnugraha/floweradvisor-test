<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Youtube($faker));

        return [
            'title' => $this->faker->sentence(mt_rand(2,5)),
            'category' => mt_rand(1,5),
            'url' => $faker->youtubeEmbedUri(),
        ];
    }
}
