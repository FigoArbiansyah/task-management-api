<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\Board;
use App\Models\Task;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boards = Board::with('tasks')->select('id', 'title', 'created_at', 'updated_at')->get();

        $boards = $boards->map(function($board) {
            return [
                "id" => $board->id,
                "title" => $board->title,
                "count" => $board->tasks->count(),
                "created_at" => $board->created_at,
                "updated_at" => $board->updated_at,
            ];
        });
        return ApiResponseHelper::success(200, 'Berhasil mendapatkan data!', $boards);
    }
}
