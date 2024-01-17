<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\Board;
use App\Models\Task;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boards_collection = Board::all();
        $boards = $boards_collection->map(function($board) {
            $count = Task::where('board_id', $board->id)->count();
            return [
                "id" => $board->id,
                "title" => $board->title,
                "count" => $count,
                "created_at" => $board->created_at,
                "updated_at" => $board->updated_at,
            ];
        });
        return ApiResponseHelper::success(200, 'Berhasil mendapatkan data!', $boards);
    }
}
