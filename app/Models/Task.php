<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "description", "level", "user_id", "board_id", "thumbnail"
    ];

    public function board() {
        return $this->belongsTo(Board::class);
    }
}
