<?php

namespace App\Repositories;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskRepository implements TaskInterface {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getTasks() {
        return Task::with('board')->where('user_id', $this->userRepository->getId())->get();
    }
    public function getTaskDetail($id) {
        return Task::with('board')->where('id', $id)->where('user_id', $this->userRepository->getId())->firstOrFail();
    }
    public function createTask(array $data) {
        $requestData = [
            "title" => $data['title'],
            "description" => $data['description'],
            "level" => $data['level'],
            "board_id" => $data['board_id'],
            "thumbnail" => $data['thumbnail'],
            "user_id" => $this->userRepository->getId(),
        ];
        return Task::create($requestData);
    }
    public function updateTask($id, array $data) {
        $task = Task::where('id', $id)->where('user_id', $this->userRepository->getId())->firstOrFail();
        $task->update($data);
        return $task;
    }
    public function deleteTask($id = null) {
        $task = Task::where('id', $id)->where('user_id', $this->userRepository->getId())->firstOrFail();
        $task->delete();
        return $task;
    }
}

