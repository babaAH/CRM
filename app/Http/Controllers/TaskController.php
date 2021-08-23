<?php

namespace App\Http\Controllers;

use DB;
use Cache;

use Illuminate\Http\Request;

use App\Facades\TaskFacade;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

use App\Models\TaskStatus;
use App\Models\Task;



class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy("id", "desc")->paginate();
        return view("admin.tasks.tasks-list", compact('tasks'));
    }

    public function show(Request $request, int $id)
    {
        $task = TaskFacade::show($id);

        if($task instanceof \Throwable){
            return view("admin.404", [
                "message" => $task->getMessage(),
            ]);
        }

        return view("admin.tasks.task-detail", compact('task'));
    }

    public function create()
    {
        $task_statuses = Cache::rememberForever("all_task_statuses", function (){
            return TaskStatus::all()->toArray();
        });

        return view("admin.tasks.create-task-form", [
            "task_statuses" => $task_statuses
        ]);
    }

    public function store(CreateTaskRequest $request)
    {
        $result = TaskFacade::create($request->all());

        if($result instanceof \Throwable){
            return back()->withErrors($result->getMessage());
        }

        return redirect()->route("tasks-list");
    }

    public function edit(Request $request, int $id)
    {
        $task = Task::with(['task_statuses'])->findOrFail($id);

        $task_statuses =  Cache::rememberForever("all_task_statuses", function (){
            return TaskStatus::all()->toArray();
        });

        return view("admin.tasks.update-task-form", compact('task', 'task_statuses'));
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        try {
            $task = TaskFacade::update($request->all(), $id);
            return view("admin.tasks.task-detail", compact('task'));
        }catch (\Throwable $throwable){
            return back()->withErrors([
                "message" => $throwable->getMessage(),
            ]);
        }
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
