<?php

namespace App\Services\TaskStatus;

interface TaskStatusServiceInterface
{
    public function create($data);
    public function update($data, $id);
    public function index();
    public function show($id);
}
