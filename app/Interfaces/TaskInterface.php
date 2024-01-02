<?php

namespace App\Interfaces;

interface TaskInterface {
    public function getTasks();
    public function getTaskDetail($id);
    public function createTask(array $data);
    public function updateTask($id, array $data);
    public function deleteTask($id);
}

?>
