<?php

namespace App\Services\TaskStatus;

use App\Models\TaskStatus;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskStatusService implements TaskStatusServiceInterface
{

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return TaskStatus::orderBy("id", "desc")->paginate();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function show(int $id)
    {
        $task_status = TaskStatus::find($id);

        if($task_status){
            return $task_status;
        }

        throw new ModelNotFoundException("Task Status Not Found");
    }

    public function delete($id)
    {
        //TODO
    }
}
