<?php

namespace App\Repositories;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskRepository implements TaskInterface {
    public function getTasks() {
        return Task::all();
    }
    public function getTaskDetail($id) {
        return Task::findOrFail($id);
    }
    public function createTask(array $data) {
        return Task::create($data);
    }
    public function updateTask($id, array $data) {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }
    public function deleteTask($id = null) {
        $task = Task::findOrFail($id);
        $task->delete();
        return $task;
    }
}

?>
