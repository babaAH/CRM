<?php

namespace App\Services\TaskStatus;

use DB;
use App\Models\TaskStatus;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskStatusService implements TaskStatusServiceInterface
{

    public function create($data)
    {
        try {
            DB::beginTransaction();
            $task_status = new TaskStatus();
            $task_status->title = $data["title"];
            $task_status->save();
            DB::commit();

            return $task_status;
        }catch(\Throwable $throwable){
            DB::rollback();
            throw $throwable;
        }
    }

    public function update($data, $id)
    {
        $task_status = TaskStatus::find($id);

        if(is_null($task_status)){
            throw new ModelNotFoundException("Task Status not found");
        }

        try {
            DB::beginTransaction();
            $task_status->title = $data["title"];
            $task_status->save();
            DB::commit();

            return $task_status;
        }catch(\Throwable $throwable){
            DB::rollback();
            throw $throwable;
        }
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
