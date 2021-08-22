<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $job_title = $this->faker->unique()->jobTitle();
        $desription = $this->faker->realText();

        return [
            "name" => $job_title,
            "display_name" => $job_title,
            "description" => $desription,
        ];
    }
}
