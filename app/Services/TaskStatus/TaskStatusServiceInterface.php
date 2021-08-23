<?php

namespace App\Services\TaskStatus;

interface TaskStatusServiceInterface
{
    public function create($data);
    public function update($data,int $id);
    public function index();
    public function show(int $id);
    public function delete(int $id);
}
