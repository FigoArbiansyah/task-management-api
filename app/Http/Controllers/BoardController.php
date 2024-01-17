<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boards = Board::all();
        return ApiResponseHelper::success(200, 'Berhasil mendapatkan data!', $boards);
    }
}
