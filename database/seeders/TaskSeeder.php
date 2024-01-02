<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Fixing Fitur A',
            'description' => 'Memperbaiki fitur a',
            'status' => 'done'
        ]);
        Task::create([
            'title' => 'Fixing Fitur B',
            'description' => 'Memperbaiki fitur b',
            'status' => 'undone'
        ]);
    }
}
