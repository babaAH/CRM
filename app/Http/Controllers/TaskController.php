<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\TaskStatus;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate();
        return view("admin.tasks.tasks-list", compact('tasks'));
    }

    public function show(Request $request, int $id)
    {
        $task = Task::findOrFail($id);

        return view("admin.task-detail", compact('task'));
    }

    public function create()
    {
        $task_statuses = TaskStatus::all();

        return view("admin.tasks.create-task-form", [
            "task_statuses" => $task_statuses
        ]);
    }

    public function store(CreateTaskRequest $request)
    {
        try {
            DB::beginTransaction();
            $taskStatus = TaskStatus::findOrFail($request->task_status_id);

            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();

            $task->task_statuses()->associate($taskStatus);
            $task->save();
            DB::commit();

            return redirect()->route("tasks-list");
        }catch (\Throwable $throwable){
            DB::rollback();
            return back()->withErrors([
                "message" => $throwable->getMessage()
            ]);
        }
    }

    public function edit(Request $request, int $id)
    {
        $task = Task::findOrFail($id);

        return view("admin.task-edit", compact('task'));
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        //todo
    }

    public function destroy(Request $request, int $id)
    {
        try {
            DB::beginTransaction();

            $task = Task::findOrFail($id);
            $task->delete();

            DB::commit();

            return redirect()->route('tasks-list');
        }catch (\Throwable $throwable){
            DB::rollback();

            return back()->withErrors([
                "message" => $throwable->getMessage()
            ]);
        }
    }
}
