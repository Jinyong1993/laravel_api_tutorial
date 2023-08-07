<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'task_name' => $i . '番目のタスク',
                'task_detail' => $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細' . $i . '番目のタスクの詳細',
            ]);
        }
    }
}
