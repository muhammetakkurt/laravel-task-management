<?php

namespace Database\Factories;

use App\Models\Task;
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
        $taskStatuses = array_values(config('enums.task_statuses'));
        return [
            'title' => $this->faker->text(50),
            'content' => $this->faker->text(400),
            'velocity' => $this->faker->numberBetween(1,8),
            'status' => $taskStatuses[rand(0, count($taskStatuses) -1 )]
        ];
    }
}