<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\Board;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $tasksCount = Task::count();
        $boards = Board::with('tasks')->select('id', 'title', 'created_at', 'updated_at')->get();
        $boardsCount = $boards->map(function($board) {
            return (object) [
                "title" => $board->title,
                "count" => $board->tasks->count(),
            ];
        });
        $data = (object) [
            "task" => (object) [
                "count" => $tasksCount,
            ],
            "boards" => $boardsCount
        ];
        return ApiResponseHelper::success(200, 'Berhasil mendapatkan data!', $data);
    }
}
