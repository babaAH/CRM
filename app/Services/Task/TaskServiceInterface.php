<?php

namespace App\Services\Task;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function create($data);
    public function update($data, $id):Task;
    public function index();
    public function show(int $id);
    public function delete($id);
}
