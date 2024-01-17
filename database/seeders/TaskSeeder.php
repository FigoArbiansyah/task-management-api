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
            'level' => 'low',
            'user_id' => 1,
            'board_id' => 1,
            'thumbnail' => 'https://www.dicoding.com/blog/wp-content/uploads/2023/06/complex-flowchart-complex.drawio-1024x936.png'
        ]);
        Task::create([
            'title' => 'Fixing Fitur B',
            'description' => 'Memperbaiki fitur b',
            'level' => 'medium',
            'user_id' => 1,
            'board_id' => 2,
            'thumbnail' => 'https://www.dicoding.com/blog/wp-content/uploads/2023/06/complex-flowchart-complex.drawio-1024x936.png'
        ]);
    }
}
