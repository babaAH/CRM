<?php

namespace App\Services\Task;

use App\Facades\TaskStatusFacade;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskStatus;

class TaskService implements TaskServiceInterface
{
    public function create($data)
    {
        try {
            DB::beginTransaction();
            $task_status = TaskStatusFacade::show($data["task_status_id"]);
            $task = new Task();
            $task->title = $data["title"];
            $task->description = $data["description"];
            $task->save();

            $task->task_statuses()->associate($task_status);
            $task->save();
            DB::commit();
        }catch (\Throwable $throwable){
            DB::rollback();
            return $throwable;
        }
    }

    /**
     * @param $data
     * @param $id
     * @return Task
     * @throws \Throwable
     */
    public function update($data, $id): Task
    {
        $task = Task::find($id);
        $task_status = TaskStatusFacade::show((int)$data["task_status_id"]);

        if($task && $task_status){
            try {
                DB::beginTransaction();

                $task->title = $data["title"];
                $task->description = $data["description"];
                $task->save();

                $task->task_statuses()->dissociate();
                $task->task_statuses()->associate($task_status);

                $task->save();
                DB::commit();
                return $task;
            }catch (\Throwable $throwable){
                DB::rollback();
                throw $throwable;
            }
        }

        throw new ModelNotFoundException("Task or Task Status not found");
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show(int $id)
    {
        $task = Task::find($id);

        if($task){
            return $task;
        }

        return new ModelNotFoundException("Task not found");
    }
}
