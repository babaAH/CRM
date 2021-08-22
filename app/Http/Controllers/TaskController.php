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
        $task = Task::paginate();
        return view("admin.tasks-list", compact('task'));
    }

    public function show(Request $request, int $id)
    {
        $task = Task::findOrFail($id);

        return view("admin.task-detail", compact('task'));
    }

    public function create()
    {
        return view("create-task-form");
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

            $task->task_statuses()->assign($taskStatus);
            $task->save();
            DB::commit();
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
