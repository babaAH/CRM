<?php

namespace App\Services\Task;

use App\Http\Requests\CreateTaskRequest;
use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function create($data);
    public function update($data, $id);
    public function index();
    public function show(int $id);
}
