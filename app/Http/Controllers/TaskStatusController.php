<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Services\TaskStatus\TaskStatusService;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function index()
    {
        $task_statuses = TaskStatusService::index();
        return view("admin.task-statuses.task-status-list", compact('task_statuses'));
    }

    public function show($id)
    {
        $task = TaskStatusService::show($id);
    }

    public function create()
    {
        return view("admin.task-statuses.task-status-form");
    }

    public function store(CreateTaskRequest $request)
    {
        try {
            TaskStatusService::create($request->all());

            return redirect()->toute("task-statuses-list");
        }catch (\Throwable $throwable){
            return back()->withErrors([
                "message" => $throwable->getMessage(),
            ]);
        }
    }

    public function destroy()
    {

    }
}
