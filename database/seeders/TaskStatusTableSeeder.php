<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::insert(
            [
                ['name' => 'Open', 'code' => 'open', 'color' => 'indigo', 'order' => 1],
                ['name' => 'In Progress', 'code' => 'in_progress', 'color' => 'blue', 'order' => 2],
                ['name' => 'In Review', 'code' => 'in_review', 'color' => 'gray', 'order' => 3],
                ['name' => 'Completed', 'code' => 'completed', 'color' => 'green', 'order' => 4],
            ]
        );
    }
}
