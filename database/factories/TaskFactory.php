<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $task_status_count = TaskStatus::count();

        if($task_status_count === 0){
            TaskStatus::factory(10)->create();
        }

        $task_status = TaskStatus::inRandomOrder()->first();

        return [
            "title" => $this->faker->jobTitle(),
            "description" => $this->faker->realText(),
            "task_status_id" => $task_status->id,
        ];
    }
}
