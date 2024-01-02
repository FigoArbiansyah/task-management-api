<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function index() {
        try {
            $tasks = $this->taskRepository->getTasks();
            return ApiResponseHelper::success(200, 'Berhasil mendapatkan data.', $tasks);
        } catch (\Exception $e) {
            return ApiResponseHelper::error(200, $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $task = $this->taskRepository->getTaskDetail($id);
            return ApiResponseHelper::success(200, 'Berhasil mendapatkan detail data.', $task);
        } catch (\Exception $e) {
            return ApiResponseHelper::error(200, $e->getMessage());
        }
    }

    public function store(TaskRequest $request) {
        try {
            $validatedData = $request->validated();
            $this->taskRepository->createTask($validatedData);
            return ApiResponseHelper::success(201, "Berhasil menambahkan data!", $validatedData);

        } catch (\Exception $e) {
            if ($e->getCode() === 422) {
                return $e;
            }
            return ApiResponseHelper::error(500, "Gagal menambahkan data.", $e->getMessage());
        }
    }

    public function update($id, TaskRequest $request) {
        try {
            $validatedData = $request->validated();
            $this->taskRepository->updateTask($id, $validatedData);
            return ApiResponseHelper::success(201, "Berhasil mengubah data!", $validatedData);

        } catch (\Exception $e) {
            if ($e->getCode() === 422) {
                return $e;
            }
            return ApiResponseHelper::error(500, "Gagal mengubah data.", $e->getMessage());
        }
    }
    public function delete($id) {
        try {
            $this->taskRepository->deleteTask($id);
            return ApiResponseHelper::success(201, "Berhasil menghapus data!", null);

        } catch (\Exception $e) {
            return ApiResponseHelper::error(500, "Gagal menghapus data.", $e->getMessage());
        }
    }
}
