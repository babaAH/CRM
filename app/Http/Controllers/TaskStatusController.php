<?php

namespace App\Http\Controllers;

use App\Facades\TaskStatusFacade;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\CreateTaskStatusRequest;
use App\Services\TaskStatus\TaskStatusService;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function index()
    {
        $task_statuses = TaskStatusFacade::index();
        return view("admin.task-statuses.tasks-status-list", compact('task_statuses'));
    }

    public function show($id)
    {
        $task = TaskStatusFacade::show($id);
    }

    public function create()
    {
        return view("admin.task-statuses.task-status-create-form");
    }

    public function store(CreateTaskStatusRequest $request)
    {
        try {
            TaskStatusFacade::create($request->all());

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
