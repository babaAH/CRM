<?php

namespace App\Services\Task;

use App\Facades\TaskStatusFacade;
use DB;
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

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show(int $id)
    {
        // TODO: Implement show() method.
    }
}
