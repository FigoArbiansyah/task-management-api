<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Board::create([
            "title" => 'To do',
        ]);
        Board::create([
            "title" => 'In progress',
        ]);
        Board::create([
            "title" => 'Done',
        ]);
    }
}
