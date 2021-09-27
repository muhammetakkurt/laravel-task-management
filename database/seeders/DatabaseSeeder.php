<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskStatusTableSeeder::class);
        $this->call(CreateStaticPermissions::class);

        $users = \App\Models\User::factory(10)->has(
            Task::factory(random_int(5, 10))
        )->create();

        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
