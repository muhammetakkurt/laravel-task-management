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
        return [
            'task_status_id' => TaskStatus::inRandomOrder()->first()->id,
            'title' => $this->faker->text(50),
            'content' => $this->faker->text(400),
            'velocity' => $this->faker->numberBetween(1,8),
            'priority' => $this->faker->numberBetween(1,10),
        ];
    }
}
